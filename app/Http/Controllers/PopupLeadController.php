<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PopupLeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'restaurant_name' => 'required',
            'city' => 'required',
        ]);

        DB::table('popup_leads')->insert($data);

        // Admin Mail
        Mail::send('emails.popup-admin', $data, function ($m) {
            $m->to('business@wegeni.com')
                ->subject('New Popup Submission From Geni Fast');
        });

        // User Mail
        Mail::to($data['email'])->send(new \App\Mail\PopupLeadUserMail($data));

        // Notify SuperAdmins
        $superAdmins = \App\Models\User::whereNull('restaurant_id')->get();
        \Illuminate\Support\Facades\Notification::send($superAdmins, new \App\Notifications\NewPopupLeadNotification($data));

        return back()->with('success', 'Thank you! We will contact you soon.');
    }
}
