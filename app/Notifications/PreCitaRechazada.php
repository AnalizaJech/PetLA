<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PreCitaRechazada extends Notification
{
    use Queueable;

    public function __construct()
    {
        
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Tu pre-cita fue rechazada')
            ->greeting('Hola.')
            ->line('Lamentamos informarte que tu solicitud de pre-cita no pudo ser procesada en este momento.')
            ->line('Puedes intentar agendar nuevamente más adelante o contactar con nuestro centro veterinario para más información.')
            ->line('Gracias por tu comprensión.');
    }

    public function toArray(object $notifiable): array
    {
        return [
            
        ];
    }
}
