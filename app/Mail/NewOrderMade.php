<?php

namespace App\Mail;

use App\Models\Order;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrderMade extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $dishes;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, $dishes)
    {
        $this->order = $order;
        $this->dishes = json_decode($dishes, TRUE);

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->markdown('mail.orders.order')
        ->from('noreply@example.com')
        ->subject('Nuovo ordine effettuato')
        ->view('mail.orders.order');
    }
}
