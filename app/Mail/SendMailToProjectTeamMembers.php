<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailToProjectTeamMembers extends Mailable
{
    use Queueable, SerializesModels;
    private $team;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($team)
    {
       $this->team = $team;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $team_members = $this->team;
        return $this->view('theme.laravel.mails.notifications.send_mail_to_project_team_members', compact('team_members'));
    }
}
