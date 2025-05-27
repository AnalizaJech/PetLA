<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PreCitaConvertida extends Notification
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
            ->subject('Tu pre-cita fue aceptada')
            ->greeting('Hola!')
            ->line('Te informamos que tu solicitud de pre-cita ha sido aceptada y convertida en una cita real.')
            ->line('Pronto recibirás un correo con más detalles sobre tu cita, incluyendo el comprobante de pago y la confirmación del veterinario asignado.')
            ->line('Gracias por confiar en nuestros servicios veterinarios.');
    }

    public function toArray(object $notifiable): array
    {
        return [
            
        ];
    }
}
