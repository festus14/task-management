<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\TestNotification;
use App\User;




class sendMailsController extends Controller
{
    //sendMail
    public function sendMail(){
        $user = App\User::find(1);

        $user->notify(new TestNotification("A new user has visited on our application."));


        return view('pages.send_email');
    }
}
