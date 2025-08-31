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
use App\Models\Paymethod;
use Illuminate\Support\Facades\DB;

class AdminViewsController extends Controller
{
    public function dashboard_admin()
    {
        try {
            // Get active stage
            $active_stage = Stage::where('status', 'active')->first();
            
            // Get latest transactions with user relationship
            $tran = Transactions::with('tuser')
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();

            // Calculate totals based on active stage
            $trans_total = 0;
            $amount_total = 0;
            
            if ($active_stage) {
                $trans_total = Transactions::where('stage', $active_stage->stage_name)->sum('tokens');
                $amount_total = Transactions::where('stage', $active_stage->stage_name)->sum('base_amt');
            }

            // Get user statistics
            $total_users = User::count();

            // Get MetaMask and other statistics
            $metamask_count = Transactions::where('type', 'like', '%MetaMask%')->count();
            $kyc_verified = User::where('verification_status', 'Verified')->count();
            $pending_txn = Transactions::where('status', 'pending')->count();
            $wallets_connected = User::whereNotNull('wallet_address')->count();

            $settings = Settings::where('id', '1')->first();

            return view('admin.dashboard', [
                'latest' => $tran,
                'settings' => $settings,
                'stage' => $active_stage,
                'tran' => $trans_total,
                'usdamt' => $amount_total,
                'users' => $total_users,
                'metamask_count' => $metamask_count,
                'kyc_verified' => $kyc_verified,
                'pending_txn' => $pending_txn,
                'wallets_connected' => $wallets_connected,
                'title' => "Admin Dashboard",
            ]);

        } catch (\Exception $e) {
            \Log::error('Admin dashboard error: ' . $e->getMessage());
            
            return view('admin.dashboard', [
                'latest' => collect([]),
                'settings' => Settings::first() ?? new \stdClass(),
                'stage' => new \stdClass(),
                'tran' => 0,
                'usdamt' => 0,
                'users' => 0,
                'metamask_count' => 0,
                'kyc_verified' => 0,
                'pending_txn' => 0,
                'wallets_connected' => 0,
                'title' => "Admin Dashboard",
            ]);
        }
    }

    public function stages()
    {
        return view('admin.stages', [
            'stages' => Stage::orderByDesc('id')->get(),
            'settings' => Settings::where('id', '1')->first(),
            'title' => "Stages",
        ]);
    }

    public function newstage()
    {
        return view('admin.newstage', [
            'settings' => Settings::where('id', '1')->first(),
            'title' => "Add Stage",
        ]);
    }

    public function updatestage($id)
    {
        return view('admin.update-stage', [
            'stage' => Stage::where('id', $id)->first(),
            'settings' => Settings::where('id', '1')->first(),
            'title' => "Update Stage",
        ]);
    }

    public function adminProfile()
    {
        return view('admin.profile')->with([
            'title' => 'Admin Profile',
        ]);
    }

    public function useractivity($id)
    {
        return view('admin.activity', [
            'useract' => Activity::where('user', $id)->get(),
            'user' => User::where('id', $id)->first(),
            'settings' => Settings::where('id', '1')->first(),
            'title' => "Login Activity",
        ]);
    }

    public function userreferral($id)
    {
        $checrefby = User::where('id', $id)->first();
        $refbyuser = null;
        
        if (!empty($checrefby->ref_by)) {
            $refby = User::where('id', $checrefby->ref_by)->first();
            if ($refby) {
                $refbyuser = $refby;
            }
        }

        return view('admin.referral', [
            'referrals' => User::where('ref_by', $id)->get(),
            'user' => User::where('id', $id)->first(),
            'referdby' => $refbyuser,
            'settings' => Settings::where('id', '1')->first(),
            'title' => "User Referrals",
        ]);
    }

    public function viewuser($id)
    {
        return view('admin.useractions', [
            'user' => User::where('id', $id)->first(),
            'settings' => Settings::where('id', '1')->first(),
            'title' => "View User",
        ]);
    }

    public function settings()
    {
        $set = Settings::where('id', '1')->first();
        $options = $set->pay_methods;
        $optarray = json_decode($options);
        $duration = $set->duration;
        $duraarray = json_decode($duration);

        return view('admin.settings', [
            'options' => $optarray,
            'duraarray' => $duraarray,
            'payset' => Paymethod::orderByDesc('id')->get(),
            'settings' => Settings::where('id', '1')->first(),
            'title' => "System Settings",
        ]);
    }

    public function manageusers()
    {
        return view('admin.userslist', [
            'settings' => Settings::where('id', '1')->first(),
            'users' => User::orderByDesc('id')->get(),
            'title' => "manage users",
        ]);
    }

    public function transactions()
    {
        $transactions = Transactions::with('tuser')
            ->orderByDesc('id')
            ->paginate(20);

        return view('admin.transactions', [
            'settings' => Settings::where('id', '1')->first(),
            'trxns' => $transactions,
            'users' => User::orderByDesc('id')->get(),
            'stage' => Stage::orderByDesc('id')->get(),
            'title' => "System Transactions",
        ]);
    }

    public function kyclist()
    {
        return view('admin.kyclist', [
            'settings' => Settings::where('id', '1')->first(),
            'kycs' => Kyc::orderByDesc('id')->get(),
            'title' => "Kyc List",
        ]);
    }

    public function viewDoc($id)
    {
        return view('admin.kyc-images', [
            'kyc' => Kyc::where('id', $id)->first(),
            'title' => "Kyc Documents",
        ]);
    }

    public function viewtransaction($id)
    {
        return view('admin.transaction_details', [
            'txn' => Transactions::where('id', $id)->first(),
            'settings' => Settings::where('id', '1')->first(),
            'title' => "View transaction",
        ]);
    }

    public function viewkyc($id)
    {
        return view('admin.kyc_details', [
            'kyc' => Kyc::where('id', $id)->first(),
            'settings' => Settings::where('id', '1')->first(),
            'title' => "View KYC Information",
        ]);
    }
}
