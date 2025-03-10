<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventUpdateOnSentMessages
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if ($request->fullUrl() === url('/patient/messaging?status=sent')) {
            return response()->json(['success' => false, 'message' => 'Cannot update message status on sent messages'], 403);
        }
        
        return $next($request);
    }
}
