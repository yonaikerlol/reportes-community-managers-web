<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * The token of the user to reset the password.
     *
     * @var string
     */
    protected $token;

    /**
     * Create a new notification instance.
     *
     * @param string $token
     *
     * @return void
     */
    public function __construct(string $token)
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
        return ["mail"];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->subject("Reiniciar Contraseña")
            ->line(
                "Estás recibiendo este correo porque has solicitado cambiar la contraseña."
            )
            ->action(
                "CAMBIAR CONTRASEÑA",
                route("password.reset", $this->token)
            )
            ->line("Este enlace caducará en 60 minutos.")
            ->line(
                "Si no has solicitado el cambio de contraseña, no tienes que hacer nada."
            );
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
