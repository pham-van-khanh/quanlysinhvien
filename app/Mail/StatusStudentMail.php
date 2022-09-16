<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StatusStudentMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $result;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($result)
    {
        $this->result = $result;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.StatusStudentEmail')
            ->subject('ALO ALO ALO ALO')
            ->with([
                'result' => $this->result,
            ]);
    }
}
