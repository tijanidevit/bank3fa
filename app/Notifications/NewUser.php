<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewUser extends Notification
{
    use Queueable;
    public User $user;
    /**
     * Create a new notification instance.
     */

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $message = "Dear {$this->user->fullname}, thanks for registering on our website, we are happy to have you here with us. As part of our security, you will need to verify your account with this OTP: >>>{$this->user->otp->otp}";
        return (new MailMessage)
                ->subject("Email Verification")
                ->greeting("Hello Dear {$this->user->fullname}")
                ->line($message)
                ->action('Go to verification page', url('/email-verification'))
                ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
