<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class RestorePasswordByEmail extends Notification
{
    use Queueable;

    private $token;

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
        $confUrl = '/renew-password/' . 'token/' . $this->token;

        return (new MailMessage)
            ->subject('Восстановление пароля на ria.local')
            ->greeting('Здравствуйте!')
            ->line('Вы использовали систему восстановления на ria.ru Чтобы восстановить пароль, пожалуйста, 
                пройдите по ссылке ниже, нажав на неё или скопировать её в адресную строку браузера:')
            ->action('Восстановить пароль', url($confUrl))
            ->line('Если вы не запрашивали восстановление пароля, пожалуйста, проигнорируйте это письмо.')
            ->line('Это письмо сформировано автоматически, пожалуйста, не отвечайте на него.');
    }

}
