<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactNotification extends Notification
{
    use Queueable;

        //pour récuper les infos du formulaire contact
    public $inputs = [];

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(array $inputs)
    {
        //pour récuper les infos du formulaire contact
        $this->inputs = $inputs;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        //la nature de la notification, on peut faire des SMS et autres possibilités de communication
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
        //le contenu du mail envoyé par Laravel
        return (new MailMessage)
                    ->subject('Nouveau message')
                    ->from($this->inputs['email'])
                    ->line("Nouveau message de {$this->inputs['name']}")
                    ->line("Localisation : {$this->inputs['adress']}")
                    ->line("Numéro de téléphone : {$this->inputs['phone']}")
                    ->line("Email : {$this->inputs['email']}")
                    ->line($this->inputs['message']);
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
