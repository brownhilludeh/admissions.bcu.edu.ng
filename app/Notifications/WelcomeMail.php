<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeMail extends Notification
{
    use Queueable;

   protected $user;
    
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
        return (new MailMessage)
            ->from('dev@brownportal.com', config('app.name', 'brownportal ng'))
            ->subject('2024/2025 Application')
            ->greeting('Hello' . ' ' . $this->user->name .',')
            ->line('Recent changes to the study permit process may cause uncertainty regarding your plans to enrol to study at Holland College in September 2024. If you have already paid your $1000 confirmation fee and your plans have changed, we can refund this fee.  To cancel your application and apply for a refund please complete this form. <br>
                    If you are accepted but have not paid your confirmation fee, we have extended your due date to February 19th to give you additional time to decide.  <br>
                    Holland College does not defer applications.  If you cancel your application and regulations change in your favour, you will need to reapply to be considered for admission.   Your acceptance is not guaranteed.  ')
            ->action('Complete registration', url('/login'))
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
