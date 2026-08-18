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


        return back()->with('success', 'Thank you! We will contact you soon.');
    }
}
