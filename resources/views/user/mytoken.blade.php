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
    @include('user.topmenu')
    @include('user.sidebar')
    <div class="main-panel bg-{{$bg}}">
        <div class="content bg-{{$bg}}">
            <div class="page-inner">
                <x-danger-alert/>
                <x-success-alert/>
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card bg-{{$bg == 'light' ? 'white' : 'dark'}} border-{{$bg == 'light' ? 'light' : 'secondary'}}">
                                    <div class="p-4 card-body">
                                        <h3 class="card-title text-{{$text}}">My {{$settings->token_symbol}} Token Portfolio</h3>
                                        
                                        <!-- Token Purchased Section -->
                                        <div class="p-3 mt-3 border rounded bg-{{$bg == 'light' ? 'light' : 'secondary'}}">
                                            <h5 class="text-{{$text}}">Token Purchased</h5> 
                                            <h1 class="text-primary d-inline">{{number_format(Auth::user()->token_bal ?? 0)}} {{$settings->token_symbol}}</h1>
                                            <div class="float-right">
                                                <a href="{{route('buytoken')}}" class="p-2 btn btn-primary">
                                                    <i class="fas fa-plus"></i> Buy More Tokens
                                                </a>
                                            </div>
                                            <div class="clearfix"></div>
                                            <p class="mt-2 text-{{$text}}">
                                                <i class="fas fa-dollar-sign"></i> 
                                                Equivalent to <strong>{{number_format($total)}} USD</strong>
                                            </p>
                                        </div>

                                        <!-- Total Token Balance Section -->
                                        <div class="p-3 mt-3 border rounded bg-{{$bg == 'light' ? 'light' : 'secondary'}}">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h5 class="text-{{$text}} mb-2">Total Token Balance</h5> 
                                                    <h1 class="text-success d-inline">{{number_format(Auth::user()->tot_tk_bal ?? 0)}} {{$settings->token_symbol}}</h1>
                                                </div>
                                                <div>
                                                    <a href="#" data-toggle="modal" data-target="#transfermodal" class="btn btn-warning">
                                                        <i class="fas fa-exchange-alt"></i> Transfer
                                                    </a>
                                                </div>
                                            </div>
                                            
                                            <!-- Token Breakdown -->
                                            <div class="row mt-3">
                                                <div class="col-md-4">
                                                    <div class="text-center p-2 border rounded bg-{{$bg == 'light' ? 'white' : 'dark'}}">
                                                        <span class="text-{{$text}}"><strong>Referral Tokens</strong></span><br>
                                                        <span class="text-info">{{number_format(Auth::user()->ref_bonus ?? 0)}} {{$settings->token_symbol}}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="text-center p-2 border rounded bg-{{$bg == 'light' ? 'white' : 'dark'}}">
                                                        <span class="text-{{$text}}"><strong>Bonus Tokens</strong></span><br>
                                                        <span class="text-warning">{{number_format(Auth::user()->tk_bonus_bal ?? 0)}} {{$settings->token_symbol}}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="text-center p-2 border rounded bg-{{$bg == 'light' ? 'white' : 'dark'}}">
                                                        <span class="text-{{$text}}"><strong>ROI Tokens</strong></span><br>
                                                        <span class="text-success">{{number_format(Auth::user()->roi_bal ?? 0, 2, '.', ',')}} {{$settings->token_symbol}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Total Contributed Section -->
                                        <div class="p-3 mt-3 border rounded bg-{{$bg == 'light' ? 'light' : 'secondary'}}">
                                            <h5 class="text-{{$text}}">Total Contributed</h5> 
                                            <h1 class="text-info">
                                                <i class="fas fa-chart-line"></i> 
                                                {{number_format($total)}} USD
                                            </h1>
                                            <p class="text-{{$text}} mb-0">
                                                Your total investment in {{$settings->token_symbol}} tokens
                                            </p>
                                        </div>

                                        <!-- Recent Transactions Overview -->
                                        <div class="p-3 mt-3 border rounded bg-{{$bg == 'light' ? 'light' : 'secondary'}}">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h5 class="text-{{$text}} mb-0">Recent Activity</h5>
                                                <a href="{{route('transactions')}}" class="btn btn-sm btn-outline-primary">
                                                    View All Transactions
                                                </a>
                                            </div>
                                            <div class="mt-2">
                                                <small class="text-{{$text}}">
                                                    <i class="fas fa-info-circle"></i> 
                                                    Click "View All Transactions" to see your complete MetaMask and traditional payment history
                                                </small>
                                            </div>
                                        </div>

                                        <!-- Token Distribution Chart (Optional) -->
                                        <div class="p-3 mt-3 border rounded bg-{{$bg == 'light' ? 'light' : 'secondary'}}">
                                            <h5 class="text-{{$text}}">Token Distribution</h5>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="progress mb-2">
                                                        <div class="progress-bar bg-primary" role="progressbar" 
                                                             style="width: {{Auth::user()->token_bal > 0 ? (Auth::user()->token_bal / Auth::user()->tot_tk_bal * 100) : 0}}%">
                                                        </div>
                                                    </div>
                                                    <small class="text-{{$text}}">Purchased Tokens</small>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="progress mb-2">
                                                        <div class="progress-bar bg-success" role="progressbar" 
                                                             style="width: {{Auth::user()->tot_tk_bal > 0 ? ((Auth::user()->ref_bonus + Auth::user()->tk_bonus_bal + Auth::user()->roi_bal) / Auth::user()->tot_tk_bal * 100) : 0}}%">
                                                        </div>
                                                    </div>
                                                    <small class="text-{{$text}}">Earned Tokens (Referral + Bonus + ROI)</small>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Quick Actions -->
                                        <div class="p-3 mt-3 border rounded bg-{{$bg == 'light' ? 'light' : 'secondary'}}">
                                            <h5 class="text-{{$text}} mb-3">Quick Actions</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <a href="{{route('buytoken')}}" class="btn btn-primary btn-block">
                                                        <i class="fas fa-shopping-cart"></i><br>
                                                        <small>Buy More Tokens</small>
                                                    </a>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="#" data-toggle="modal" data-target="#transfermodal" class="btn btn-warning btn-block">
                                                        <i class="fas fa-paper-plane"></i><br>
                                                        <small>Transfer Tokens</small>
                                                    </a>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="{{route('transactions')}}" class="btn btn-info btn-block">
                                                        <i class="fas fa-history"></i><br>
                                                        <small>View History</small>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <!-- Wallet Information Card -->
                        <div class="card bg-{{$bg == 'light' ? 'white' : 'dark'}} border-{{$bg == 'light' ? 'light' : 'secondary'}} mb-3">
                            <div class="card-body">
                                <h5 class="card-title text-{{$text}}">Wallet Information</h5>
                                @if(Auth::user()->wallet_address)
                                    <p class="text-{{$text}}">
                                        <strong>Address:</strong><br>
                                        <small class="text-muted">{{Str::limit(Auth::user()->wallet_address, 20, '...')}}</small>
                                    </p>
                                    <button class="btn btn-sm btn-outline-info" onclick="copyToClipboard('{{Auth::user()->wallet_address}}')">
                                        <i class="fas fa-copy"></i> Copy Address
                                    </button>
                                @else
                                    <p class="text-danger">No wallet address added</p>
                                    <a href="#" data-toggle="modal" data-target="#walletmodal" class="btn btn-warning btn-sm">
                                        Add Wallet Address
                                    </a>
                                @endif
                            </div>
                        </div>

                        <!-- Token Stats Card -->
                        <div class="card bg-{{$bg == 'light' ? 'white' : 'dark'}} border-{{$bg == 'light' ? 'light' : 'secondary'}} mb-3">
                            <div class="card-body">
                                <h5 class="card-title text-{{$text}}">Token Statistics</h5>
                                <ul class="list-unstyled">
                                    <li class="text-{{$text}}">
                                        <i class="fas fa-coins text-primary"></i> 
                                        Current Price: <strong>${{$settings->amt_usd ?? '0.00'}}</strong>
                                    </li>
                                    <li class="text-{{$text}}">
                                        <i class="fas fa-chart-line text-success"></i> 
                                        Your Holdings: <strong>{{number_format(Auth::user()->tot_tk_bal ?? 0)}}</strong>
                                    </li>
                                    <li class="text-{{$text}}">
                                        <i class="fas fa-percentage text-info"></i> 
                                        Portfolio Value: <strong>${{number_format($total)}}</strong>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        @include('user.include.sideaction')
                    </div>   
                </div>
            </div>
        </div>
    </div>

    @include('user.modal')

    <!-- Copy to Clipboard Script -->
    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                alert('Wallet address copied to clipboard!');
            }, function(err) {
                console.error('Could not copy text: ', err);
            });
        }
    </script>
@endsection
