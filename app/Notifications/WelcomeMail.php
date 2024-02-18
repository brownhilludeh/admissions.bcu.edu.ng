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
            ->subject('Congratulations on your application to '. '' . config('app.name', 'brownportal ng') . ''. '!')
            ->greeting('Hello' . ' ' . $this->user->name . ',')
            ->line('
                We are delighted to receive your application to ' . '' .config('app.name', 'brownportal ng'). ''. ' for the [Academic Year] term. Thank you for your interest in joining our community of learners and leaders.

                Your application is currently under review by our admission committee. We will notify you of our decision forthwith. In the meantime, please make sure to check your email regularly for any updates or requests from us. You can also track the status of your application on our online portal [https://admissions.bcu.edu.ng].

                We are excited to learn more about you and your academic goals. As part of our holistic admission process, we may invite you to participate in an interview or a test to assess your fit and readiness for our program. If you are selected for an interview or a test, we will contact you with the details and instructions.

                At . '. '' .config('app.name', 'brownportal ng'). ''. '., we are committed to providing a high-quality education that prepares you for success in your chosen field and beyond. We offer a rigorous curriculum, a supportive learning environment, and a diverse and inclusive campus culture.

                We encourage you to explore our website [Website Link] to learn more about our program, faculty, students, alumni, and campus life. You can also follow us on social media [Social Media Links] to stay updated on our news and events. If you have any questions or concerns, please do not hesitate to contact us at [Email Address] or [Phone Number]. We are here to help you throughout the admission process and beyond.

                We look forward to hearing from you soon and hope to welcome you to our . ' . '' .config('app.name', 'brownportal ng'). '' . ' . family!

                Warm regards,

                Admissions Team . '. '' .config('app.name', 'brownportal ng'). ''. ' .', 'text/html')
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
