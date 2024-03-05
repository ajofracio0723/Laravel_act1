<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; // Import the Mail facade

class TicketController extends Controller
{
    public function showForm()
    {
        return view('ticket.form');
    }

    public function submitForm(Request $request)
    {
        // Validate form data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'problem_description' => 'required|string',
            'attachment' => 'file|max:10240', // Max 10 MB
        ]);

        // Process form data
        $name = $request->input('name');
        $email = $request->input('email');
        $problemDescription = $request->input('problem_description');
        $attachment = $request->file('attachment');

        // Send email
        $data = compact('name', 'problemDescription');
        $emailSubject = 'Support Ticket Submission';
        $emailTemplate = 'emails.ticket';
        $emailFrom = $email;

        Mail::send($emailTemplate, $data, function ($message) use ($email, $emailSubject, $attachment) {
            $message->to($email) // Use the user's email
                ->subject($emailSubject);
        
            if ($attachment) {
                $message->attach($attachment->getRealPath(), [
                    'as' => $attachment->getClientOriginalName(),
                    'mime' => $attachment->getMimeType(),
                ]);
            }
        });

        // Display success page
        return view('ticket.success');
    }
}
