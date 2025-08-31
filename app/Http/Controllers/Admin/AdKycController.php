<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\Settings;
use App\Models\Transactions;
use App\Models\User;
use App\Models\Referral;
use App\Models\Activity;
use App\Models\Kyc;
use App\Mail\Newmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;

class AdKycController extends Controller
{
    public function downloadfile($file)
    {
        $download_path = public_path('storage/photos/' . $file);
        if (file_exists($download_path)) {
            return Response::download($download_path);
        }
        return redirect()->back()->with('error', 'File not found');
    }

    public function accept($id)
    {
        try {
            $record = Kyc::where('id', $id)->first();
            if (!$record) {
                return redirect()->back()->with('error', 'KYC record not found');
            }
            
            // Update KYC status
            $record->status = "Verified";
            $record->save();

            // Update user verification status
            $user = User::where('id', $record->user)->first();
            if ($user) {
                $user->verification_status = "Verified";
                $user->save();
            }

            $settings = Settings::where('id', '=', '1')->first();

            // Prepare email data
            $objDemo = new \stdClass();
            $objDemo->message = "Congratulations! Your KYC verification has been approved by our team. You can now participate in token sales without any restrictions.";
            $objDemo->sender = $settings->site_name;
            $objDemo->date = \Carbon\Carbon::Now();
            $objDemo->subject = "KYC Verification Approved";
            $objDemo->greeting = "Hello " . $user->name;

            // Try to send email with error handling
            try {
                Mail::to($user->email)->send(new Newmail($objDemo));
                Log::info('KYC approval email sent successfully to: ' . $user->email);
            } catch (\Exception $mailException) {
                Log::error('Failed to send KYC approval email: ' . $mailException->getMessage());
                // Don't fail the entire process if email fails
            }

            return redirect()->back()->with('success', "User Successfully Verified and notified via email");

        } catch (\Exception $e) {
            Log::error('Error in KYC accept method: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to verify user: ' . $e->getMessage());
        }
    }

    public function reject($id)
    {
        try {
            $record = Kyc::where('id', $id)->first();
            if (!$record) {
                return redirect()->back()->with('error', 'KYC record not found');
            }

            // Update KYC status
            $record->status = "Rejected";
            $record->save();

            // Update user verification status
            $user = User::where('id', $record->user)->first();
            if ($user) {
                $user->verification_status = "Not Verified";
                $user->save();
            }

            $settings = Settings::where('id', '=', '1')->first();

            // Prepare email data
            $objDemo = new \stdClass();
            $objDemo->message = "We regret to inform you that your KYC verification has been rejected by our team. This may be due to incorrect information or invalid documents. Please contact support for more details or resubmit your verification documents.";
            $objDemo->sender = $settings->site_name;
            $objDemo->date = \Carbon\Carbon::Now();
            $objDemo->subject = "KYC Verification Rejected";
            $objDemo->greeting = "Hello " . $user->name;

            // Try to send email with error handling
            try {
                Mail::to($user->email)->send(new Newmail($objDemo));
                Log::info('KYC rejection email sent successfully to: ' . $user->email);
            } catch (\Exception $mailException) {
                Log::error('Failed to send KYC rejection email: ' . $mailException->getMessage());
                // Don't fail the entire process if email fails
            }

            return redirect()->back()->with('success', "User Verification Declined and user notified");

        } catch (\Exception $e) {
            Log::error('Error in KYC reject method: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to reject verification: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $record = Kyc::where('id', $id)->first();
            if (!$record) {
                return redirect()->back()->with('error', 'KYC record not found');
            }

            // Delete associated files from storage
            if ($record->doc1) {
                Storage::disk('public')->delete($record->doc1);
            }
            if ($record->doc2) {
                Storage::disk('public')->delete($record->doc2);
            }
            if ($record->photo) {
                Storage::disk('public')->delete($record->photo);
            }

            // Update user verification status
            $user = User::where('id', $record->user)->first();
            if ($user) {
                $user->verification_status = "Not Verified";
                $user->save();
            }

            // Delete the KYC record
            $record->delete();

            $settings = Settings::where('id', '=', '1')->first();

            // Prepare email data
            $objDemo = new \stdClass();
            $objDemo->message = "Your KYC verification record has been removed from our system. You may resubmit your verification documents if needed. Please contact support for assistance.";
            $objDemo->sender = $settings->site_name;
            $objDemo->date = \Carbon\Carbon::Now();
            $objDemo->subject = "KYC Record Deleted";
            $objDemo->greeting = "Hello " . $user->name;

            // Try to send email with error handling
            try {
                Mail::to($user->email)->send(new Newmail($objDemo));
                Log::info('KYC deletion email sent successfully to: ' . $user->email);
            } catch (\Exception $mailException) {
                Log::error('Failed to send KYC deletion email: ' . $mailException->getMessage());
                // Don't fail the entire process if email fails
            }

            return redirect()->back()->with('success', "User Verification Deleted and user notified");

        } catch (\Exception $e) {
            Log::error('Error in KYC delete method: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete verification record: ' . $e->getMessage());
        }
    }
}
