<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\OrderShipped;

class TestSendMail extends Controller
{
     public function sendMail()
    {
    	$content = [
    		'title'=> 'Itsolutionstuff.com mail', 
    		'body'=> 'The body of your message.',
    		'button' => 'Click Here'
    		];

    	$receiverAddress = 'wayantisna74@gmail.com';

    	Mail::to($receiverAddress)->send(new OrderShipped($content));

    	dd('mail send successfully');
    }
}
