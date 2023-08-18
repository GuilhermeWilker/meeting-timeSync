<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MeetingScheduled extends Mailable
{
    use Queueable;
    use SerializesModels;

    public string $visitorName;
    public string $visitorEmail;
    public string $meetingDate;
    public string $organizerEmail;
    public $user;

    /**
     * Create a new message instance.
     */
    public function __construct(string $visitorName, string $visitorEmail, string $meetingDate, string $organizerEmail, User $user)
    {
        $this->visitorName = $visitorName;
        $this->visitorEmail = $visitorEmail;
        $this->meetingDate = \Carbon\Carbon::createFromFormat('F j, Y', $meetingDate)->format('d-m-Y');
        $this->organizerEmail = $organizerEmail;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.meeting-scheduled')
                    ->from($this->organizerEmail, $this->user->name) // Definir o remetente corretamente aqui
                    ->subject('Agendamento de Reunião');
    }
}
