<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ActivateProperty extends Notification
{
    use Queueable;


    private $user;
    private $property;
    public function __construct($property, $user)
    {
        $this->property = $property;
        $this->user = $user;
    }



    public function via($notifiable)
    {
        return ['mail'];
    }

    
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line(__('custom.congrats') . ' ' . $this->user->fullName() . ' ' . __('custom.your_property') . ' ' . ucwords($this->property->name) . ' ' . __('custom.has_been_accepted'))
                    ->action('view', route('properties.view', $this->property));
    }


    
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
