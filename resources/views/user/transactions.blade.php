@extends('layouts.app')
@section('content')
    @include('user.topmenu')
    @include('user.sidebar')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <x-danger-alert/>
                <x-success-alert/>
                <div class="row">
                   <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Transactions List</h5>
                                <div class="table-responsive"> 
                                    <table class="table" id="ttable"> 
                                        <thead> 
                                            <tr> 
                                                <th>TRANX NO.</th>
                                                <th>WALLET ADDRESS</th>
                                                <th>TOKENS</th>
                                                <th>ETH AMOUNT</th>
                                                <th>USD AMOUNT</th>
                                                <th>GST (18%)</th>
                                                <th>TYPE</th>
                                                <th>DATE</th>
                                                <th>STATUS</th>
                                                <th>ETHERSCAN</th>
                                            </tr> 
                                        </thead> 
                                        <tbody> 
                                            @foreach ($recent_txn as $txn)
                                               <tr> 
                                                <td>
                                                    <small>{{substr($txn->txn_id, 0, 10)}}...</small>
                                                </td>
                                                <td>
                                                    @if($txn->wallet_address)
                                                        <small>{{substr($txn->wallet_address, 0, 6)}}...{{substr($txn->wallet_address, -4)}}</small>
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>{{number_format($txn->tokens)}} {{$settings->token_symbol}}</td> 
                                                <td>{{$txn->amount}} {{$txn->to}}</td>
                                                <td>${{number_format($txn->base_amt, 2)}} USD</td>
                                                <td>
                                                    @if($txn->gst_amount_eth)
                                                        {{$txn->gst_amount_eth}} ETH
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="badge badge-info">{{$txn->type}}</span>
                                                </td>
                                                <td>{{\Carbon\Carbon::parse($txn->created_at)->toDayDateTimeString()}}</td>
                                                <td>
                                                    @if ($txn->status == "pending")
                                                        <span class="badge badge-warning">{{$txn->status}}</span>
                                                    @else
                                                        <span class="badge badge-success">{{$txn->status}}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($txn->type == 'MetaMask Purchase' && $txn->txn_id)
                                                        <a href="https://etherscan.io/tx/{{$txn->txn_id}}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                            <i class="fas fa-external-link-alt"></i> View
                                                        </a>
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                            </tr>  
                                            @endforeach
                                        </tbody> 
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
@endsection
