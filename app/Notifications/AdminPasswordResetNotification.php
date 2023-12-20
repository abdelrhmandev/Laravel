<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminPasswordResetNotification extends Notification
{
    use Queueable;
    public function __construct($token){
        $this->token = $token;
    }

    public function via($notifiable){
        return ['mail'];
    }

    public function toMail($notifiable){
        
        $url = url(route('admin.auth.password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));
        return (new MailMessage)
            ->subject('Reset Password')
            ->line('Password Reset Notification You are receiving this email because we received a password reset request for your account.') // Here are the lines you can safely override
            ->action('Reset Password', $url)
            ->line('If you did not request a password reset, no further action is required.');
    }
    public function toArray($notifiable){
        return [
            //
        ];
    }
}
