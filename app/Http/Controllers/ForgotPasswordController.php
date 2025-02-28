<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\Models\ResetToken;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class ForgotPasswordController extends Controller
{
    public function forgotPassword() {
        return view('forgot-password.forgot-password');
    }

    private function sendPasswordResetLink($email) {
        $token = Str::random(64);
    
        try {
            // Store the new reset token
            ResetToken::create([
                'email' => $email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
    
            Log::info("Password reset token generated for: {$email}");
    
            // Send the password reset email
            Mail::to($email)->send(new ForgotPassword($token));
    
            Log::info("Password reset email sent successfully to: {$email}");
        } catch (\Exception $e) {
            Log::error("Failed to send password reset email to {$email}: " . $e->getMessage());
    
            // Return a response instead of redirecting inside a private method
            throw new \Exception('Failed to send email. Please try again.');
        }
    }
    
    public function forgotPasswordPost(Request $request) {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email']
        ]);

        $email = $request->input('email');
        $existingToken = ResetToken::where('email', $email)->first();

        if ($existingToken) {
            return view('forgot-password.resend-link', ['email' => $email]);
        }

        $this->sendPasswordResetLink($email);

        return redirect()->route('forgot-password')->with('success', 'We have sent an email to reset your password.');
    }

    public function resendPasswordResetLink(Request $request) {
        $email = $request->input('email');
        
        // Delete the existing token
        ResetToken::where('email', $email)->delete();
        
        // Resend the password reset link
        $this->sendPasswordResetLink($email);

        return redirect()->route('forgot-password')->with('success', 'Password reset link has been resent.');
    }

    public function resetPassword($token)
    {
        return view('forgot-password.new-password', compact('token'));
    }

    public function resetPasswordPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required', 'confirmed', Password::min(8)
                            ->mixedCase()
                            ->letters()
                            ->numbers()
                            ->symbols()],
            'token' => ['required']
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all(); // Get all error messages as an array
            $errorMessage = '<ul>'; // Start list
            foreach ($messages as $message) {
                $errorMessage .= '<li>' . $message . '</li>'; // Add each message as a list item
            }
            $errorMessage .= '</ul>'; // End list
    
            return redirect()->back()->with('error', $errorMessage)->withInput();
        }

        $email = $request->input('email');
        $token = $request->input('token');

        $updatePassword = ResetToken::where([
            'email' => $email,
            'token' => $token
        ])->first();

        if (!$updatePassword) {
            return redirect()->route('reset-password', ['token' => $token])->with('error', 'Invalid email.');
        }

        User::where('email', $email)->update(['password' => Hash::make($request->input('password'))]);

        ResetToken::where(['email' => $email])->delete();

        return redirect()->route('login')->with('success', 'Password reset successfully.');
    }
}
