<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TransaccionRecibidaMailable extends Mailable
{
    use Queueable, SerializesModels;

      public $subject ="Transaccion a sido recibida";

      public $transaccion ;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($transaccion)
    {
        $this->transaccion = $transaccion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.transaccionRecibida');
    }
}
