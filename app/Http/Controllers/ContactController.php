<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Mail\ContactMail;

// use Mail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        // return $request->all();

        $user_email = User::find($request->user_id)->email;
        $user_name = User::find($request->user_id)->user_name;

        $content = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ];

        Mail::to($user_email)->send(new ContactMail($content));

        return redirect()->route('home',$user_name)->with('success', 'message send successfully');
    }
}
