<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        return view('contact', compact('settings'));
    }
    
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);
        
        $settings = Setting::first();
        
        try {
            Mail::send('emails.contact', ['data' => $validated], function($message) use ($validated, $settings) {
                $message->to($settings->email)
                    ->subject('Contact Form: ' . $validated['subject'])
                    ->replyTo($validated['email'], $validated['name']);
            });
            
            return back()->with('success', 'Message sent successfully! We will get back to you soon.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send message. Please try again.');
        }
    }
}