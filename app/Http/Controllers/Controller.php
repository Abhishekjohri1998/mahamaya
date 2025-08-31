<?php

namespace App\Http\Controllers;

use App\Mail\NewNotification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Staking;
use App\Models\Settings;
use App\Models\User;
use App\Models\RoiLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function homepage()
    {
        try {
            $settings = Settings::first();
            
            if (!$settings) {
                // Create default settings if none exist
                $settings = new Settings();
                $settings->site_name = 'Prechain';
                $settings->site_email = 'admin@prechain.com';
                $settings->token_symbol = 'PRC';
                $settings->sales_start_date = now()->addDays(30);
                $settings->save();
            }
            
            return view('home.index', compact('settings'));
            
        } catch (\Exception $e) {
            \Log::error('Error loading homepage: ' . $e->getMessage());
            return view('home.index', ['settings' => new Settings()]);
        }
    }

    public function sendContact(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'nullable|string|max:255',
                'message' => 'required|string|max:1000',
            ]);

            $settings = Settings::first();
            
            if (!$settings || !$settings->site_email) {
                return redirect()->back()->with('error', 'Contact email not configured. Please try again later.');
            }

            $message = $request->message;
            $subject = $request->subject ?? "Inquiry from {$request->name} with email {$request->email}";
            
            Mail::to($settings->site_email)->send(new NewNotification($message, $subject, 'Admin'));

            return redirect()->back()->with('success', 'Your message was sent successfully!');

        } catch (\Exception $e) {
            \Log::error('Error sending contact message: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to send message. Please try again later.');
        }
    }

    public function getRoi()
    {
        try {
            $activeStakes = Staking::where('status', 'active')->get();
            $settings = Settings::first();

            foreach ($activeStakes as $stake) {
                $user = User::find($stake->user_id);
                
                if (!$user) {
                    continue;
                }

                $lastGrowth = Carbon::parse($stake->last_growth);
                $toGrow = Carbon::now()->subDay();

                $percentageValue = ($stake->amount * $stake->expected_roi) / 100;
                $numDays = $stake->created_at->diffInDays($stake->expire_date);
                
                if ($numDays == 0) {
                    continue;
                }
                
                $increment = $percentageValue / $numDays;

                // Determine conditions based on stake duration
                [$condition1, $condition2] = $this->getStakeConditions($stake);

                // Apply daily ROI if conditions are met
                if ($condition1 && $lastGrowth <= $toGrow) {
                    $this->applyDailyRoi($stake, $user, $increment);
                }

                // Release capital if stake has matured
                if ($condition2) {
                    $this->releaseStakeCapital($stake, $user);
                }
            }

        } catch (\Exception $e) {
            \Log::error('Error processing ROI: ' . $e->getMessage());
        }
    }

    private function getStakeConditions($stake)
    {
        $condition1 = false;
        $condition2 = false;

        switch ($stake->stake_duration) {
            case '1 Month':
            case 'onem':
                $condition1 = $stake->created_at->diffInMonths() < 1;
                $condition2 = $stake->created_at->diffInMonths() >= 1;
                break;
            case '4 Months':
            case 'fourm':
                $condition1 = $stake->created_at->diffInMonths() < 4;
                $condition2 = $stake->created_at->diffInMonths() >= 4;
                break;
            case '6 Months':
            case 'sixm':
                $condition1 = $stake->created_at->diffInMonths() < 6;
                $condition2 = $stake->created_at->diffInMonths() >= 6;
                break;
            case '9 Months':
            case 'ninem':
                $condition1 = $stake->created_at->diffInMonths() < 9;
                $condition2 = $stake->created_at->diffInMonths() >= 9;
                break;
            case '1 Year':
            case 'oney':
                $condition1 = $stake->created_at->diffInYears() < 1;
                $condition2 = $stake->created_at->diffInYears() >= 1;
                break;
        }

        return [$condition1, $condition2];
    }

    private function applyDailyRoi($stake, $user, $increment)
    {
        User::where('id', $stake->user_id)->update([
            'roi_bal' => $user->roi_bal + $increment,
            'tot_tk_bal' => $user->tot_tk_bal + $increment,
        ]);

        // Save to ROI logs
        RoiLog::create([
            'staking_id' => $stake->id,
            'user_id' => $user->id,
            'amount' => $increment,
            'narration' => 'Daily Profit',
        ]);

        // Update last growth timestamp
        $stake->update(['last_growth' => Carbon::now()]);
    }

    private function releaseStakeCapital($stake, $user)
    {
        // Return capital to user
        User::where('id', $stake->user_id)->update([
            'tot_tk_bal' => $user->tot_tk_bal + $stake->amount,
        ]);

        // Mark stake as expired
        $stake->update(['status' => 'expired']);

        // Log capital return
        RoiLog::create([
            'staking_id' => $stake->id,
            'user_id' => $user->id,
            'amount' => $stake->amount,
            'narration' => 'Capital Returned',
        ]);
    }
}
