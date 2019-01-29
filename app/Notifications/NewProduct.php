<?php

namespace App\Notifications;

use App\Models\Produit;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewProduct extends Notification
{
    use Queueable;
    /**
     * @var Produit
     */
    public $product;

    /**
     * Create a new notification instance.
     *
     * @param Produit $product
     */
    public function __construct($product)
    {
        //
        $this->product = $product;
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
        return (new MailMessage)
            ->greeting('Bonjour l\'Administrateur!')
            ->subject('Nouveau produit ajouté ')
            ->line('Ce nouveau produit à été crée par '. $this->product->user->name .' besoin d\'approuvé')
            ->line('Pour approuvé veuillez cliquer ici')
            ->line('Nom produit '. $this->product->nom)
            ->action('Voir ce produit', url('admin/product/'.$this->product->id))
            ->line('Thank you for using our application!');
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
