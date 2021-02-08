<?php

namespace App\Mail;

use App\Models\StartUp;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StartupCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $startUp;

    /**
     * Create a new message instance.
     *
     * @param StartUp $startUp>
     */
    public function __construct(StartUp $startUp)
    {
        $this->startUp = $startUp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@tech-team-builder.com')->view('mails.startup_created_mail');
    }
}
