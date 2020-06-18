<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailProvider extends Mailable
{
    use Queueable, SerializesModels;

    private $provider;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($provider)
    {
        $this->provider = $provider;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $link = route('active.provider', ['id' => $this->provider->id]);

        return $this->markdown('mail.index')->with(['link' => $link, 'name' => $this->provider->name]);
    }
}
