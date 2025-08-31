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
                                <h5 class="card-title">
                                    <i class="fas fa-history"></i> My Transactions
                                </h5>
                                <div class="table-responsive"> 
                                    <table class="table table-hover" id="ttable"> 
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
                                            @forelse ($recent_txn as $txn)
                                               <tr> 
                                                <td>
                                                    <small><code>{{substr($txn->txn_id, 0, 10)}}...</code></small>
                                                </td>
                                                <td>
                                                    @if($txn->wallet_address)
                                                        <small><code>{{substr($txn->wallet_address, 0, 6)}}...{{substr($txn->wallet_address, -4)}}</code></small>
                                                    @else
                                                        <span class="text-muted">N/A</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <strong>{{number_format($txn->tokens)}}</strong> {{$settings->token_symbol}}
                                                </td> 
                                                <td>
                                                    <span class="text-primary">{{$txn->amount}} {{$txn->to}}</span>
                                                </td>
                                                <td>
                                                    <span class="text-success">${{number_format($txn->base_amt, 2)}} USD</span>
                                                </td>
                                                <td>
                                                    @if($txn->gst_amount_eth)
                                                        <span class="text-warning">{{$txn->gst_amount_eth}} ETH</span>
                                                    @else
                                                        <span class="text-muted">N/A</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($txn->type == 'MetaMask Purchase')
                                                        <span class="badge badge-info">
                                                            <i class="fab fa-ethereum"></i> {{$txn->type}}
                                                        </span>
                                                    @else
                                                        <span class="badge badge-secondary">{{$txn->type}}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <small>{{\Carbon\Carbon::parse($txn->created_at)->format('M d, Y g:i A')}}</small>
                                                </td>
                                                <td>
                                                    @if ($txn->status == "pending")
                                                        <span class="badge badge-warning">
                                                            <i class="fas fa-clock"></i> {{$txn->status}}
                                                        </span>
                                                    @elseif ($txn->status == "completed")
                                                        <span class="badge badge-success">
                                                            <i class="fas fa-check"></i> {{$txn->status}}
                                                        </span>
                                                    @else
                                                        <span class="badge badge-danger">
                                                            <i class="fas fa-times"></i> {{$txn->status}}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($txn->type == 'MetaMask Purchase' && $txn->txn_id)
                                                        @if($txn->to == 'ETH')
                                                            <a href="https://etherscan.io/tx/{{$txn->txn_id}}" target="_blank" 
                                                               class="btn btn-sm btn-outline-primary" title="View on Etherscan">
                                                                <i class="fas fa-external-link-alt"></i> View
                                                            </a>
                                                        @elseif($txn->to == 'Sepolia ETH')
                                                            <a href="https://sepolia.etherscan.io/tx/{{$txn->txn_id}}" target="_blank" 
                                                               class="btn btn-sm btn-outline-info" title="View on Sepolia Etherscan">
                                                                <i class="fas fa-external-link-alt"></i> Sepolia
                                                            </a>
                                                        @endif
                                                    @else
                                                        <span class="text-muted">N/A</span>
                                                    @endif
                                                </td>
                                            </tr>  
                                            @empty
                                            <tr>
                                                <td colspan="10" class="text-center py-4">
                                                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                                    <p class="text-muted">No transactions found</p>
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody> 
                                    </table>
                                </div>

                                @if(method_exists($recent_txn, 'links'))
                                    <div class="d-flex justify-content-center">
                                        {{ $recent_txn->links() }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
@endsection
