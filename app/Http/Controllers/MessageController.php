<?php

namespace App\Http\Controllers;
use App\Models\UserMessages;
use App\Models\Reply;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    public function postMessage(Request $request, $messageId)
    {

        $request->validate([
            'message' => 'required|string|max:5000',
            'user_to' => 'required|email',
            'user_from' => 'required|email',
        ], [
            'message.required' => 'Message is required!',
        ]);

        // Retrieve user IDs from emails
        $toUser = \App\Models\User::where('email', $request->user_to)->firstOrFail();
        $fromUser = \App\Models\User::where('email', $request->user_from)->firstOrFail();
        $usermessage = $request->message;

        if (!$fromUser || !$toUser) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Create a message
        UserMessages::create([
            'message_id' => $messageId,
            'user_id' => auth()->id(),
            'message' => $usermessage,
            'subject' => $request->subject,
            'status' => 'sent',
            'sender_id' => $fromUser->id,
            'receiver_id' => $toUser->id,
            'read_at' => null
        ]);

        return redirect()->back()->with('success', 'message uploaded');
    }

    public function getMessages(Request $request)
    {
        $userId = Auth::id();

        $status = $request->query('status', 'received');

        if ($status == 'sent') {
            $messages = UserMessages::where('sender_id', $userId)
                ->where('status', 'sent')
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $messages = UserMessages::where('receiver_id', $userId)
                ->where('status', 'received')
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('patient.messages', compact('messages'));
    }


    public function getReplies($messageId)
    {

        $replies = Reply::where('message_id', $messageId)
            ->with('sender:id,firstname,image_path') // Load sender details
            ->orderBy('created_at', 'asc')
            ->get()
            ->map(function ($reply) {
                return [
                    'id' => $reply->id,
                    'from_user_name' => $reply->sender->firstname,
                    'message' => $reply->message,
                    'sender_image' => $reply->sender->profile_image ?? '/images/default-avatar.png',
                    'created_at' => $reply->created_at->format('F j, Y h:i A'),
                ];
            });

        return response()->json($replies);
    }

    public function postReply(Request $request, $messageId)
    {
        $request->validate([
            'message' => 'required|string|max:5000',
            'user_to' => 'required|email',
            'user_from' => 'required|email',
        ], [
            'message.required' => 'Message is required!',
        ]);

        // Retrieve user IDs from emails
        $fromUser = \App\Models\User::where('email', $request->user_from)->firstOrFail();
        $toUser = \App\Models\User::where('email', $request->user_to)->firstOrFail();
        $usermessage = $request->message;



        if (!$fromUser || !$toUser) {
            return redirect()->back()->with('error', 'User not found.');
        }


        // Create the reply
        Reply::create([
            'message_id' => $messageId,
            'user_id' => auth()->id(),
            'message' => $usermessage,
            'subject' => $request->subject,
            'from_user_id' => $fromUser->id,
            'to_user_id' => $toUser->id,
        ]);




        return redirect()->back()->with('success', 'Reply sent successfully!');
    }

}
