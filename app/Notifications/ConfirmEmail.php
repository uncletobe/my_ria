<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ConfirmEmail extends Notification implements ShouldQueue
{
    use Queueable;

    protected $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $confUrl = '/confirm/' . 'token/' . $this->token;

        return (new MailMessage)
                    ->subject('Завершение регистрации на ria.local')
                    ->greeting('Здравствуйте!')
                    ->line('Для завершения регистрации на сайте ria.local вам необходимо подтвердить свой email.
                        Для этого просто нажмите по кнопке ниже.')
                    ->action('Подтвердить email', url($confUrl))
                    ->line('Это письмо сформировано автоматически, пожалуйста, не отвечайте на него.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
