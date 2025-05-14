<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewArtisanRegistration extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public $user) {}

    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Nouvel artisan inscrit: ' . $this->user->name)
            ->line('Un nouvel artisan s\'est inscrit sur la plateforme.')
            ->action('Voir le profil', url('/admin/artisans/'.$this->user->id))
            ->line('Merci de vérifier ses documents!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'Nouvel artisan: ' . $this->user->name,
            'link' => '/admin/artisans/'.$this->user->id,
        ];
    }
}