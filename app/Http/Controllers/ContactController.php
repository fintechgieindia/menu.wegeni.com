<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Csubmissions;

class ContactController extends Controller
{

    /**
     * Display the contact form.
     */


    /**
     * Handle contact form submission.
     */


    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'nullable|string|max:255',
            'designation' => 'nullable|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:500',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        try {

            // Save to database
            Csubmissions::create($validated);
            \Log::info('Mail sending started');

            $data = $validated;
            $data['user_message'] = $validated['message'];

            Mail::send('emails.admin-contact', $data, function ($message) {
                $message->to('business@wegeni.com')
                    ->subject('New Contact Submission - Geni Fast');
            });

            Mail::send('emails.user-thankyou', $data, function ($message) use ($validated) {
                $message->to($validated['email'])
                    ->subject('Thank You for Contacting Geni Fast');
            });

            return back()->with(
                'success',
                'Thank you for your message! We will get back to you within 24 hours.'
            );

        } catch (\Exception $e) {

            \Log::error('Mail Error: ' . $e->getMessage());

            return back()->with('error', $e->getMessage());
        }
    }

    public function index()
    {
        $contacts = Csubmissions::latest()->paginate(10);
        return view('contactsubmission.index', compact('contacts'));
    }
    public function show($id)
    {
        $contact = Csubmissions::findOrFail($id);
        return view('contactsubmission.show', compact('contact'));
    }
    public function destroy($id)
    {
        $contact = Csubmissions::findOrFail($id);
        $contact->delete();
        return redirect()->route('superadmin.admin.contacts')->with('success', 'Contact submission deleted successfully.');
    }

}
