<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventRegistration;

class AdminRegistrationController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $registrations = EventRegistration::with('event')
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        
        return view('admin.registrations.index', compact('registrations'));
    }
    
    public function destroy($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        EventRegistration::findOrFail($id)->delete();
        
        return redirect()->route('admin.registrations.index')->with('success', 'Registration deleted successfully!');
    }
}