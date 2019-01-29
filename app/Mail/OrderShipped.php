<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;
    public $order;

    /**
     * Create a new message instance.
     *
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        //
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return
            $this
            ->to($this->order->email, $this->order->name)
            ->bcc('agromalimarket@bamako-incubateur.com',"Bamako Incubateur")
            ->cc('kantediakante@gmail.com',"Administrateur")
            ->subject("Reçu de paiement")
            ->markdown('emails.orders.shipped');
    }
}
