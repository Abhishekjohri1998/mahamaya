<?php
if (Auth('admin')->User()->dashboard_style == "light") {
    $bg="light";
    $text = "dark";
} else {
    $bg="dark";
    $text = "light";
}
?>

@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
        <div class="content bg-{{$bg}}">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h2 class="text-{{$text}} pb-2">
                        <i class="fas fa-tachometer-alt"></i> Welcome, {{ Auth('admin')->User()->name }}!
                    </h2>
                    <p class="text-{{$text}}">Monitor your token sale progress and recent transactions</p>
                </div>

                <x-danger-alert/>
                <x-success-alert/>

                @if(Session::has('message'))
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i> {{ Session::get('message') }}
                        </div>
                    </div>
                </div>
                @endif

                <!-- Enhanced Dashboard Stats -->
                <div class="row">
                    <!-- Token Sale Stats -->
                    <div class="col-md-4">
                        <div class="card bg-gradient-info text-white shadow-lg">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="text-black-50 mb-1">TOKEN SALE</h5>
                                        @if($stage && isset($stage->stage_name))
                                            <h6 class="text-black-50 mb-2">{{$stage->stage_name}}</h6>
                                        @else
                                            <h6 class="text-black-50 mb-2">No Active Stage</h6>
                                        @endif
                                        <h2 class="text-black-50 mb-0">{{number_format($tran ?? 0)}}</h2>
                                        <span class="badge badge-light text-info">{{$settings->token_symbol ?? 'TOKEN'}} Sold</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-coins fa-3x text-black-50"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    @if($stage && isset($stage->token_avail))
                                        <small class="text-black-50">Tokens Available: {{number_format($stage->token_avail)}}</small>
                                    @else
                                        <small class="text-black-50">No tokens available</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Users -->
                    <div class="col-md-4">
                        <div class="card bg-gradient-success text-white shadow-lg">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="text-black-50 mb-1">TOTAL USERS</h5>
                                        <h2 class="text-black-50 mb-0">{{number_format($users ?? 0)}}</h2>
                                        <span class="badge badge-light text-success">Registered</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-users fa-3x text-black-50"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a href="{{route('userlist')}}" class="text-black-50 text-decoration-none">
                                        <small>View All Users <i class="fas fa-arrow-right"></i></small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Amount Collected -->
                    <div class="col-md-4">
                        <div class="card bg-gradient-primary text-white shadow-lg">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="text-black-50 mb-1">AMOUNT COLLECTED</h5>
                                        <h2 class="text-black-50 mb-0">${{number_format($usdamt ?? 0, 2)}}</h2>
                                        <span class="badge badge-light text-primary">USD Total</span>
                                    </div>
                                    <div>
                                        <i class="fas fa-dollar-sign fa-3x text-black-50"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <small class="text-black-50">
                                        <i class="fab fa-ethereum"></i> ETH + <i class="fas fa-credit-card"></i> Traditional
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Transactions Enhanced -->
                <div class="mt-4 row">
                    <div class="col-md-12">
                        <div class="card bg-{{$bg == 'light' ? 'white' : 'dark'}} border-{{$bg == 'light' ? 'light' : 'secondary'}}">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="card-title text-{{$text}} mb-0">
                                        <i class="fas fa-history"></i> Recent Transactions
                                        <small class="text-muted">(Latest 5)</small>
                                    </h5>
                                    <a href="{{route('admin.trx')}}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-list"></i> View All Transactions
                                    </a>
                                </div>

                                <div class="table-responsive"> 
                                    <table class="table table-hover"> 
                                        <thead class="thead-light"> 
                                            <tr> 
                                                <th>TRANX NO.</th>
                                                <th>USER</th>
                                                <th>WALLET</th>
                                                <th>TOKENS</th>
                                                <th>ETH AMOUNT</th>
                                                <th>USD AMOUNT</th>
                                                <th>GST</th>
                                                <th>TYPE</th>
                                                <th>STATUS</th>
                                                <th>ACTION</th>
                                            </tr> 
                                        </thead> 
                                        <tbody> 
                                            @forelse ($latest ?? [] as $txn)
                                            <tr> 
                                                <td>
                                                    <small><code>{{substr($txn->txn_id ?? '', 0, 8)}}...</code></small>
                                                </td>
                                                <td>
                                                    @if(isset($txn->tuser) && $txn->tuser)
                                                        <strong class="text-{{$text}}">{{$txn->tuser->name}}</strong>
                                                        <br><small class="text-muted">{{$txn->tuser->email ?? 'No email'}}</small>
                                                    @else
                                                        <span class="text-muted">Unknown User</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(isset($txn->wallet_address) && $txn->wallet_address)
                                                        <small><code>{{substr($txn->wallet_address, 0, 6)}}...{{substr($txn->wallet_address, -4)}}</code></small>
                                                    @else
                                                        <span class="text-muted">N/A</span>
                                                    @endif
                                                </td> 
                                                <td>
                                                    <strong>{{number_format($txn->tokens ?? 0)}}</strong> {{$settings->token_symbol ?? 'TOKEN'}}
                                                </td> 
                                                <td>
                                                    @if(isset($txn->amount) && isset($txn->to))
                                                        <span class="text-primary">{{$txn->amount}} {{$txn->to}}</span>
                                                    @else
                                                        <span class="text-muted">N/A</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="text-success">${{number_format($txn->base_amt ?? 0, 2)}}</span>
                                                </td>
                                                <td>
                                                    @if(isset($txn->gst_amount_eth) && $txn->gst_amount_eth)
                                                        <span class="text-warning">{{$txn->gst_amount_eth}} ETH</span>
                                                    @else
                                                        <span class="text-muted">N/A</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(isset($txn->type))
                                                        @if($txn->type == 'MetaMask Purchase')
                                                            <span class="badge badge-info">
                                                                <i class="fab fa-ethereum"></i> MetaMask
                                                            </span>
                                                        @elseif($txn->type == 'MetaMask Sepolia Test Purchase')
                                                            <span class="badge badge-warning">
                                                                <i class="fab fa-ethereum"></i> Sepolia Test
                                                            </span>
                                                        @elseif(strpos($txn->type, 'MetaMask') !== false)
                                                            <span class="badge badge-info">
                                                                <i class="fab fa-ethereum"></i> {{$txn->type}}
                                                            </span>
                                                        @else
                                                            <span class="badge badge-secondary">{{$txn->type}}</span>
                                                        @endif
                                                    @else
                                                        <span class="badge badge-secondary">Unknown</span>
                                                    @endif
                                                </td>
                                                <td> 
                                                    @if(isset($txn->status))
                                                        @if ($txn->status == "pending")
                                                            <span class="badge badge-warning">
                                                                <i class="fas fa-clock"></i> Pending
                                                            </span>
                                                        @elseif ($txn->status == "completed")
                                                            <span class="badge badge-success">
                                                                <i class="fas fa-check"></i> Completed
                                                            </span>
                                                        @elseif ($txn->status == "failed")
                                                            <span class="badge badge-danger">
                                                                <i class="fas fa-times"></i> Failed
                                                            </span>
                                                        @else
                                                            <span class="badge badge-secondary">
                                                                <i class="fas fa-question"></i> {{$txn->status}}
                                                            </span>
                                                        @endif
                                                    @else
                                                        <span class="badge badge-secondary">Unknown</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        @if(isset($txn->id))
                                                            <a href="{{route('viewtransaction', $txn->id)}}" class="btn btn-outline-info btn-sm" title="View Details">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        @endif
                                                        
                                                        @if(isset($txn->type) && isset($txn->txn_id) && $txn->txn_id)
                                                            @if($txn->type == 'MetaMask Purchase')
                                                                <a href="https://etherscan.io/tx/{{$txn->txn_id}}" target="_blank" 
                                                                   class="btn btn-outline-primary btn-sm" title="View on Etherscan">
                                                                    <i class="fas fa-external-link-alt"></i>
                                                                </a>
                                                            @elseif($txn->type == 'MetaMask Sepolia Test Purchase' || strpos($txn->type, 'Sepolia') !== false)
                                                                <a href="https://sepolia.etherscan.io/tx/{{$txn->txn_id}}" target="_blank" 
                                                                   class="btn btn-outline-warning btn-sm" title="View on Sepolia Etherscan">
                                                                    <i class="fas fa-external-link-alt"></i>
                                                                </a>
                                                            @elseif(strpos($txn->type, 'MetaMask') !== false)
                                                                <a href="https://etherscan.io/tx/{{$txn->txn_id}}" target="_blank" 
                                                                   class="btn btn-outline-primary btn-sm" title="View on Etherscan">
                                                                    <i class="fas fa-external-link-alt"></i>
                                                                </a>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="10" class="text-center py-5">
                                                    <div class="text-center">
                                                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                                        <h5 class="text-muted">No Recent Transactions</h5>
                                                        <p class="text-muted">Transactions will appear here once users start purchasing tokens</p>
                                                    </div>
                                                </td>
                                            </tr>    
                                            @endforelse
                                        </tbody> 
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Statistics Row -->
                <div class="mt-4 row">
                    <div class="col-md-3">
                        <div class="card bg-{{$bg == 'light' ? 'light' : 'secondary'}} text-{{$text}} shadow-sm">
                            <div class="card-body text-center">
                                <i class="fab fa-ethereum fa-2x text-primary mb-2"></i>
                                <h6 class="card-title">MetaMask Purchases</h6>
                                <h4 class="text-primary">{{$metamask_count ?? 0}}</h4>
                                <small class="text-muted">Total MetaMask Transactions</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-{{$bg == 'light' ? 'light' : 'secondary'}} text-{{$text}} shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-shield-alt fa-2x text-success mb-2"></i>
                                <h6 class="card-title">KYC Verified</h6>
                                <h4 class="text-success">{{$kyc_verified ?? 0}}</h4>
                                <small class="text-muted">Verified Users</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-{{$bg == 'light' ? 'light' : 'secondary'}} text-{{$text}} shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-clock fa-2x text-warning mb-2"></i>
                                <h6 class="card-title">Pending Transactions</h6>
                                <h4 class="text-warning">{{$pending_txn ?? 0}}</h4>
                                <small class="text-muted">Awaiting Confirmation</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-{{$bg == 'light' ? 'light' : 'secondary'}} text-{{$text}} shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-wallet fa-2x text-info mb-2"></i>
                                <h6 class="card-title">Wallets Connected</h6>
                                <h4 class="text-info">{{$wallets_connected ?? 0}}</h4>
                                <small class="text-muted">Users with Wallets</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Action Buttons -->
                <div class="mt-4 row">
                    <div class="col-md-12">
                        <div class="card bg-{{$bg == 'light' ? 'white' : 'dark'}} border-{{$bg == 'light' ? 'light' : 'secondary'}}">
                            <div class="card-body">
                                <h6 class="card-title text-{{$text}} mb-3">
                                    <i class="fas fa-tools"></i> Quick Actions
                                </h6>
                                <div class="row">
                                    <div class="col-md-2 col-sm-4 mb-3">
                                        <a href="{{route('admin.trx')}}" class="btn btn-outline-primary btn-block">
                                            <i class="fas fa-list"></i><br>
                                            All Transactions
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-4 mb-3">
                                        <a href="{{route('userlist')}}" class="btn btn-outline-success btn-block">
                                            <i class="fas fa-users"></i><br>
                                            Manage Users
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-4 mb-3">
                                        <a href="{{route('kyclist')}}" class="btn btn-outline-warning btn-block">
                                            <i class="fas fa-id-card"></i><br>
                                            KYC Applications
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-4 mb-3">
                                        <a href="{{route('stages')}}" class="btn btn-outline-info btn-block">
                                            <i class="fas fa-layer-group"></i><br>
                                            Token Stages
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-4 mb-3">
                                        <a href="{{route('settings')}}" class="btn btn-outline-secondary btn-block">
                                            <i class="fas fa-cog"></i><br>
                                            Settings
                                        </a>
                                    </div>
                                    <div class="col-md-2 col-sm-4 mb-3">
                                        <a href="{{route('newstage')}}" class="btn btn-outline-dark btn-block">
                                            <i class="fas fa-plus"></i><br>
                                            Add Stage
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
@endsection
