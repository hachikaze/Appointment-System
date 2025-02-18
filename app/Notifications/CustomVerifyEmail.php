<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailNotification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Mail\VerifyEmail as VerifyEmailMailable;
use Illuminate\Support\Facades\Mail;

class CustomVerifyEmail extends VerifyEmailNotification
{
    public function toMail($notifiable)
    {
        return (new VerifyEmailMailable($notifiable))->to($notifiable->email);
    }
}
