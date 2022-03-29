<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(){
        $details = [
            'title' => 'Mail from RRK network.',
            'body' => 'This is the content of the mail.'
        ];

        Mail::to("admin@gmail.co")->send(new TestMail($details));
        return "Email sent";
    }
}
