<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\Models\Mail;

//Request
use App\Http\Requests\Mail\UpdateMailRequest; 


class MailController extends Controller
{
    //
    public function index() {

        $mails = Mail::get();

        return view('mails.index', compact('mails'));
    }

    public function edit(Mail $mail){

         return view('mails.show', compact('mail'));
    }

    public function update(Mail $mail, UpdateMailRequest $request) { 
        $validated = $request->validated();

        $mail->update([ 
            'description' => $validated['description'],
        ]);

        return redirect('mail/'.$mail->id.'/edit')->with('status', [
            'success' => true, 
            'message' => 'Success', 
            'description' => $mail->tag.' Mail content successfully updated',
        ]);

    }
}
