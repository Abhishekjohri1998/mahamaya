<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\Stage;
use App\Models\Transactions;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $settings = Settings::first();
            $active_stage = Stage::where('status', 'active')->first();
            
            // Get some basic statistics for display
            $total_transactions = Transactions::count();
            $total_amount = Transactions::sum('base_amt');
            $total_users = User::count();
            $total_tokens_sold = Transactions::sum('tokens');
            
            return view('home.index', compact(
                'settings', 
                'active_stage', 
                'total_transactions', 
                'total_amount',
                'total_users',
                'total_tokens_sold'
            ));

        } catch (\Exception $e) {
            \Log::error('Error loading frontend: ' . $e->getMessage());
            
            $settings = new Settings();
            $settings->site_name = 'Prechain';
            $settings->token_symbol = 'PRC';
            $settings->sales_start_date = now()->addDays(30);
            
            return view('home.index', compact('settings'));
        }
    }

    public function enquiry(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'subject' => 'required|string|max:255',
                'message' => 'required|string|max:1000',
            ]);

            // Here you can save enquiry to database or send email
            $settings = Settings::first();
            
            if ($settings && $settings->site_email) {
                // Send email notification
                \Mail::to($settings->site_email)->send(new \App\Mail\NewNotification(
                    $request->message,
                    "Website Enquiry from {$request->name}",
                    'Admin'
                ));
            }
            
            return redirect()->back()->with('success', 'Thank you for your enquiry. We will get back to you soon!');

        } catch (\Exception $e) {
            \Log::error('Error sending enquiry: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to send enquiry. Please try again.');
        }
    }
}
