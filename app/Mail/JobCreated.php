<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class JobCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url)
    {
      $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = $this->url;
        return $this->markdown('email.jobs')
                      ->subject('Nuevo trabajo asignado');
    }
}
