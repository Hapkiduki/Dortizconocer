<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordNotification extends Notification
{
    use Queueable;
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * Create a notification instance.
     *
     * @param  string  $token
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject("Restablecer Contraseña")
            ->greeting("Hola ". $notifiable->name)
            ->line('Usted está recibiendo este correo electrónico porque recibimos una solicitud de
             restablecimiento de contraseña para su cuenta.')
            ->action('Restablecer Contraseña', url(config('app.url').route('password.reset', $this->token, false)))
            ->line('Si no solicitó restablecer la contraseña, haga caso omiso a esta notificación.')
            ->salutation("¡Saludos!");
    }
}
