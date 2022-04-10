<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

//Model
use App\Models\User; 
use App\Models\Mail; 

class ApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $user; 
    protected $password;

    public function __construct(User $user, String $password)
    {
        //

        $this->user = $user; 
        $this->password = $password;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = Mail::where('tag', 'Application')->first();
        
        return $this->view('mails.application')->with([
            'email' => $this->user->email,
            'password' => $this->password,
            'description' => $mail->description
        ]);
    }
}
