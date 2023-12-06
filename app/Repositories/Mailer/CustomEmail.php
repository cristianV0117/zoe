<?php

declare(strict_types=1);

namespace App\Repositories\Mailer;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailable;

final class CustomEmail extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * The demo object instance.
     *
     */
    public $demo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($demo)
    {
        $this->demo = $demo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): self
    {
        return $this->from($this->demo->from)
            ->subject($this->demo->subject)
            ->with('message', $this->demo->message)
            ->markdown($this->demo->markdown);
    }
}
