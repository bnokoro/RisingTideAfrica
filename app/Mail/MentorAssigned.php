<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MentorAssigned extends Mailable
{
    use Queueable, SerializesModels;

    public $mentee;
    public $mentor;
    public $time_choosen;

    public function __construct($mentee, $mentor)
    {
        $this->mentee = $mentee;
        $this->mentor = $mentor;
        switch ($this->mentor->time_choosen) {
            case 5:
                $this->time_choosen = '5pm - 6pm';
                break;
            case 6:
                $this->time_choosen = '6pm - 7pm';
                break;
            default:
                $this->time_choosen = '';
                break;
        }
    }

    public function build()
    {
        return $this
            ->subject('Mentee Assigned To You')
            ->markdown('mails.mentor_assigned');
    }
}
