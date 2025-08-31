@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <x-danger-alert/>
            <x-success-alert/>
            <!-- Beginning of  Dashboard Stats  -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-5">
                                <span class="card-title">
                                    <i class="fas fa-list"></i> All Transactions
                                    <small class="text-muted">(Including MetaMask Purchases)</small>
                                </span>
                                <a href="#" data-toggle="modal" data-target="#addtoken" class="float-right btn btn-primary"> 
                                    <i class='fas fa-plus-circle'></i> Add Tokens
                                </a>
                                
                                <!-- Modal for Adding Tokens -->
                                <div class="modal fade" id="addtoken" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Manually Add Tokens</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{route('addtoken')}}">
                                                    @csrf
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Transaction Type</label>
                                                            <select class="form-control" name="t_type" required>
                                                                <option selected disabled>Select Type</option>
                                                                <option>PURCHASE</option>
                                                                <option>BONUS</option>
                                                                <option>MANUAL</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Transaction Date</label>
                                                            <input type="datetime-local" class="form-control" name="date" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Token Added To</label>
                                                            <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="user" required>
                                                                <option selected disabled>Select User</option>
                                                                @foreach ($users as $user)
                                                                   <option value='{{$user->id}}'>{{$user->name}} ({{$user->email}})</option> 
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Token for Stage</label>
                                                            <select class="form-control" name="stage" required>
                                                                <option selected disabled>Select Stage</option>
                                                                @foreach ($stage as $stg)
                                                                   <option value='{{$stg->stage_name}}'>
                                                                       {{$stg->stage_name}}
                                                                        @if ($stg->status == "active")
                                                                            <span class="text-success">(Active)</span>
                                                                        @endif
                                                                    </option> 
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Payment Gateway</label>
                                                            <select class="form-control" name="payment_mode" required>
                                                                <option selected disabled>Select Gateway</option>
                                                                <option>MetaMask</option>
                                                                <option>Paypal</option>
                                                                <option>Manual</option>
                                                                <option>Bitcoin</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Payment Amount</label>
                                                            <input type="number" class="form-control" name="amount" step="0.000001" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Wallet Address (Optional)</label>
                                                            <input type="text" class="form-control" name="address" placeholder="0x...">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Number of Tokens</label>
                                                            <input type="number" class="form-control" name="tokens" required>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="px-3 btn btn-primary">
                                                        <i class="fas fa-plus"></i> Add Token
                                                    </button>
                                                </form>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="table-responsive"> 
                                <table class="table table-hover" id="ttable"> 
                                    <thead> 
                                        <tr> 
                                            <th>TRANX NO.</th>
                                            <th>USER</th>
                                            <th>WALLET ADDRESS</th>
                                            <th>TOKENS</th>
                                            <th>ETH AMOUNT</th>
                                            <th>USD AMOUNT</th>
                                            <th>GST (18%)</th>
                                            <th>TYPE</th>
                                            <th>DATE</th>
                                            <th>STATUS</th>
                                            <th>ACTIONS</th>
                                        </tr> 
                                    </thead> 
                                    <tbody> 
                                        @forelse ($trxns as $txn)
                                         <tr> 
                                            <td>
                                                <small><code>{{substr($txn->txn_id, 0, 12)}}...</code></small>
                                            </td> 
                                            <td>
                                                @if($txn->tuser)
                                                    <strong>{{$txn->tuser->name}}</strong>
                                                    <br><small class="text-muted">{{$txn->tuser->email}}</small>
                                                @else
                                                    <span class="text-muted">Unknown User</span>
                                                @endif
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
                                                <span class="text-success">${{number_format($txn->base_amt, 2)}}</span>
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
                                                <div class="btn-group btn-group-sm" role="group">
                                                    <a href="{{route('viewtransaction', $txn->id)}}" class="btn btn-info btn-sm" title="View Details">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    
                                                    @if($txn->type == 'MetaMask Purchase' && $txn->txn_id)
                                                        @if($txn->to == 'ETH')
                                                            <a href="https://etherscan.io/tx/{{$txn->txn_id}}" target="_blank" 
                                                               class="btn btn-outline-primary btn-sm" title="View on Etherscan">
                                                                <i class="fas fa-external-link-alt"></i>
                                                            </a>
                                                        @elseif($txn->to == 'Sepolia ETH')
                                                            <a href="https://sepolia.etherscan.io/tx/{{$txn->txn_id}}" target="_blank" 
                                                               class="btn btn-outline-info btn-sm" title="View on Sepolia Etherscan">
                                                                <i class="fas fa-external-link-alt"></i>
                                                            </a>
                                                        @endif
                                                    @endif

                                                    @if ($txn->status == "pending")
                                                        <a href="{{route('confirmtran', $txn->id)}}" class="btn btn-success btn-sm" title="Confirm Transaction">
                                                            <i class="fas fa-check"></i>
                                                        </a>
                                                        <a href="{{route('canceltran', $txn->id)}}" class="btn btn-danger btn-sm" title="Cancel Transaction">
                                                            <i class="fas fa-times"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="11" class="text-center py-4">
                                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                                <p class="text-muted">No transactions found</p>
                                            </td>
                                        </tr>  
                                        @endforelse
                                    </tbody> 
                                </table>
                            </div>

                            @if(method_exists($trxns, 'links'))
                                <div class="d-flex justify-content-center">
                                    {{ $trxns->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
