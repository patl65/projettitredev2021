<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Notifications\ContactNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    public function contact(Request $request)
    {
        $inputs = $request->only([
            'name', 'phone', 'email', 'adress', 'message'
        ]);
        Notification::route('mail', $inputs['email'])->notify(new ContactNotification($inputs));
        return redirect()->route('contact')->with('success', 'Message envoyé');
    }
}