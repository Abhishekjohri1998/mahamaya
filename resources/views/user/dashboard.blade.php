<?php
if (Auth::user()->dashboard_style == "light") {
    $bg="light";
    $text = "dark";
} else {
    $bg="dark";
    $text = "light";
}
?>

@extends('layouts.app')

@section('content')
    <!-- Add this CSS to force text visibility -->
    <style>
        .token-balance-card .numbers {
            color: white !important;
        }
        .token-balance-card .numbers * {
            color: white !important;
        }
        .token-balance-card .text-warning {
            color: #ffc107 !important;
        }
    </style>

    @include('user.topmenu')
    @include('user.sidebar')
    <div class="main-panel bg-{{$bg}}">
        <div class="content bg-{{$bg}}">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h2 class="text-{{$text}} pb-2">Welcome, {{ Auth::user()->name}}!</h2>
                    @if(isset($settings->annoucement) && !empty($settings->annoucement))
                        <div class="alert alert-info alert-dismissible fade show">
                            <i class="fas fa-info-circle"></i>
                            <strong>Announcement:</strong> {{$settings->annoucement}}
                            <button type="button" class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
                
                <x-danger-alert/>
                <x-success-alert/>

                <!-- Enhanced Dashboard Stats -->
                <div class="row row-card-no-pd bg-{{$bg}} shadow-none">
                    <!-- Token Balance Card - FIXED WITH FORCED WHITE TEXT -->
                    <div class="col-sm-6 col-md-4">
                        <div class="card card-round bg-gradient-primary token-balance-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="p-3 col-12 col-stats">
                                        <div class="numbers">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <i class="fas fa-coins fa-2x text-warning"></i>
                                                </div>
                                                <div class="text-right">
                                                    <p class="card-category" style="color: black !important; font-size: 14px;">Total Token Balance</p>
                                                    <h4 class="card-title mb-0" style="color: black !important; font-weight: bold; font-size: 18px;">
                                                        {{number_format(Auth::user()->tot_tk_bal ?? 0, 2, ".", ",")}} {{$settings->token_symbol}}
                                                    </h4>
                                                    <small style="color: black !important; opacity: 0.8;">≈ ${{number_format((Auth::user()->tot_tk_bal ?? 0) * $settings->amt_usd, 2)}}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Stage Information Card -->
                    <div class="p-2 col-sm-6 col-md-4">
                        <div class="card card-round bg-{{$bg == 'light' ? 'white' : 'dark'}} border-{{$bg == 'light' ? 'light' : 'secondary'}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-stats">
                                        <div class="numbers">
                                            <h3 class="card-category text-{{$text}}">
                                                @if ($stage)
                                                    <i class="fas fa-rocket text-primary"></i> {{$stage->stage_name}} 
                                                    @if ($stage->sales == "on" && $stage->status == "active")
                                                    <span class="px-2 py-1 badge badge-success">
                                                        <i class="fas fa-play"></i> Active
                                                    </span>
                                                    @else
                                                    <span class="px-2 py-1 badge badge-warning">
                                                        <i class="fas fa-pause"></i> Paused
                                                    </span>
                                                    @endif
                                                @else
                                                    <i class="fas fa-info-circle text-muted"></i> No Active Stage
                                                @endif
                                            </h3>
                                            <h4 class="card-title text-{{$text}} mb-3">
                                                <i class="fas fa-tag text-success"></i> 1 {{$settings->token_symbol}} = ${{number_format($settings->amt_usd, 2)}}
                                            </h4>
                                            <div class="row">
                                                <div class="col-6">
                                                    <a href="{{route('buytoken')}}" class="btn btn-primary btn-block btn-sm">
                                                        <i class="fas fa-credit-card"></i><br>
                                                        <small>Buy Traditional</small>
                                                    </a>
                                                </div>
                                                <div class="col-6">
                                                    <a href="{{route('buytoken')}}" class="btn btn-warning btn-block btn-sm">
                                                        <i class="fab fa-ethereum"></i><br>
                                                        <small>Buy MetaMask</small>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Account Status Card -->
                    <div class="p-2 col-sm-6 col-md-4">
                        <div class="card card-round bg-{{$bg == 'light' ? 'white' : 'dark'}} border-{{$bg == 'light' ? 'light' : 'secondary'}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="p-3 col-12 col-stats">
                                        <div class="numbers">
                                            <h3 class="mb-3 card-category text-bold text-{{$text}}">
                                                <i class="fas fa-user-check"></i> Account Status
                                            </h3>
                                            <div class="mb-2">
                                                @if (Auth::user()->email_verified_at)
                                                    <span class="badge badge-success">
                                                        <i class="fas fa-check-circle"></i> Email Verified
                                                    </span>
                                                @else
                                                    <a href="{{ route('verification.notice') }}" class="badge badge-danger">
                                                        <i class="fas fa-exclamation-circle"></i> Email Not Verified
                                                    </a>
                                                @endif
                                            </div>
                                            
                                            <div class="mb-2">
                                                @if (Auth::user()->verification_status != "Verified")
                                                    <a href="{{route('kycinfo')}}" class="badge badge-warning">
                                                        <i class="fas fa-id-card"></i> Complete KYC
                                                    </a>
                                                @else
                                                    <span class="badge badge-success">
                                                        <i class="fas fa-shield-alt"></i> KYC Verified
                                                    </span>
                                                @endif
                                            </div>

                                            <div>
                                                @if(Auth::user()->wallet_address)
                                                    <span class="badge badge-info">
                                                        <i class="fab fa-ethereum"></i> MetaMask Ready
                                                    </span>
                                                @else
                                                    <a href="#" data-toggle="modal" data-target="#walletmodal" class="badge badge-secondary">
                                                        <i class="fas fa-wallet"></i> Add Wallet
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent MetaMask Transactions (if any) -->
                @if(isset($recent_metamask_txn) && $recent_metamask_txn->count() > 0)
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card bg-{{$bg == 'light' ? 'white' : 'dark'}} border-{{$bg == 'light' ? 'light' : 'secondary'}}">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-{{$text}}">
                                        <i class="fab fa-ethereum text-warning"></i> Recent MetaMask Purchases
                                    </h4>
                                    <a href="{{route('transactions')}}" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-list"></i> View All
                                    </a>
                                </div>
                                
                                <div class="row">
                                    @foreach($recent_metamask_txn as $txn)
                                    <div class="col-md-6 col-lg-4 mb-3">
                                        <div class="card bg-{{$bg == 'light' ? 'light' : 'secondary'}} border">
                                            <div class="card-body p-3">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <h6 class="text-{{$text}} mb-1">{{number_format($txn->tokens)}} {{$settings->token_symbol}}</h6>
                                                        <small class="text-muted">
                                                            {{$txn->amount}} ETH
                                                            @if($txn->gst_amount_eth)
                                                                <br><span class="text-info">(+{{$txn->gst_amount_eth}} GST)</span>
                                                            @endif
                                                        </small>
                                                    </div>
                                                    <div class="text-right">
                                                        <small class="text-muted">{{$txn->created_at->diffForHumans()}}</small>
                                                        @if($txn->txn_id)
                                                            <br><a href="https://etherscan.io/tx/{{$txn->txn_id}}" target="_blank" class="btn btn-xs btn-outline-info">
                                                                <i class="fas fa-external-link-alt"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Welcome Section -->
                <div class="row row-card-no-pd bg-{{$bg}} shadow-none mt-4">
                    <div class="col-md-12">
                        <div class="card bg-{{$bg == 'light' ? 'white' : 'dark'}} border-{{$bg == 'light' ? 'light' : 'secondary'}}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="p-3 col-md-3 text-center">
                                        <img src="{{ asset('storage/app/public/'. $settings->logo) }}" class="img-fluid" style="max-width: 150px;"> 
                                    </div> 
                                    <div class="p-3 col-md-9">
                                        <h3 class="text-{{$text}}">
                                            <i class="fas fa-handshake text-primary"></i> Thank you for choosing {{$settings->site_name}}
                                        </h3>
                                        <p class="text-{{$text}} mb-3">
                                            {{$settings->whitepaper}}
                                        </p>
                                        
                                        <!-- Quick Actions -->
                                        <div class="row">
                                            <div class="col-md-3 mb-2">
                                                <a href="{{route('buytoken')}}" class="btn btn-primary btn-block">
                                                    <i class="fas fa-shopping-cart"></i> Buy Tokens
                                                </a>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <a href="{{route('mytoken')}}" class="btn btn-info btn-block">
                                                    <i class="fas fa-coins"></i> My Portfolio
                                                </a>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <a href="{{route('transactions')}}" class="btn btn-success btn-block">
                                                    <i class="fas fa-history"></i> Transactions
                                                </a>
                                            </div>
                                            <div class="col-md-3 mb-2">
                                                <a href="#" class="btn btn-secondary btn-block">
                                                    <i class="fas fa-download"></i> Whitepaper
                                                </a>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    @include('user.modal')
@endsection
