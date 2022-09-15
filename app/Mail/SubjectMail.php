<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubjectMail extends Mailable
{
    use Queueable, SerializesModels;
    private $subjects;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subjects)
    {
        $this->subjects = $subjects;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.subject_mail')
            ->subject('SUBJECT REGISTRATION NOTICE')
            ->with([
                'subjects' => $this->subjects,
            ]);
    }
}
