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
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <div class="d-flex justify-content-between align-items-center">
                                               <h2 class="text-{{$text}}">
                                                   <i class="fas fa-coins text-primary"></i> Stake Your {{$settings->token_symbol}} Tokens
                                               </h2>
                                               <div class="text-right">
                                                   <small class="text-{{$text}}">Available Balance:</small><br>
                                                   <strong class="text-success">{{number_format(Auth::user()->tot_tk_bal ?? 0)}} {{$settings->token_symbol}}</strong>
                                               </div>
                                            </div>
                                            
                                            <div class="p-4 mt-3 shadow-lg rounded bg-{{$bg == 'light' ? 'light' : 'secondary'}}">
                                                @if (!$mystake)
                                                    <!-- Staking Information -->
                                                    <div class="row mb-4">
                                                        <div class="col-md-6">
                                                            <div class="text-center p-3 border rounded bg-{{$bg == 'light' ? 'white' : 'dark'}}">
                                                                <span class="text-danger"><i class="fas fa-arrow-down"></i> <strong>Minimum Amount</strong></span><br>
                                                                <span class="text-{{$text}}">{{number_format($settings->minstake)}} {{$settings->token_symbol}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="text-center p-3 border rounded bg-{{$bg == 'light' ? 'white' : 'dark'}}">
                                                                <span class="text-danger"><i class="fas fa-arrow-up"></i> <strong>Maximum Amount</strong></span><br>
                                                                <span class="text-{{$text}}">{{number_format($settings->maxstake)}} {{$settings->token_symbol}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- Staking Form -->
                                                    <div class="p-3 border rounded bg-{{$bg == 'light' ? 'white' : 'dark'}}">
                                                        <h5 class="text-{{$text}} mb-3">
                                                            <i class="fas fa-lock"></i> Create New Stake
                                                        </h5>
                                                        <form action="{{route('stakenow')}}" method="post">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label class="text-{{$text}}">Duration</label>
                                                                    <select name="duration" id="dura" class="form-control" onchange="calcAmount(this)">
                                                                        @if (in_array("onem", $duraarray))
                                                                        <option value="1 Month">1 Month</option> 
                                                                        @endif
                                                                        @if (in_array("fourm", $duraarray))
                                                                          <option value="4 Months">4 Months</option>  
                                                                        @endif
                                                                        @if (in_array("sixm", $duraarray))
                                                                          <option value="6 Months">6 Months</option>  
                                                                        @endif
                                                                        @if (in_array("ninem", $duraarray))
                                                                          <option value="9 Months">9 Months</option>  
                                                                        @endif
                                                                        @if (in_array("oney", $duraarray))
                                                                          <option value="1 Year">1 Year</option>  
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label class="text-{{$text}}">Expected ROI</label>
                                                                    <input type="text" id="exroi" value="{{$settings->one_month_roi ?? 0}}%" class="form-control" readonly>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label class="text-{{$text}}">Amount to Stake</label>
                                                                    <input type="number" name="amount" min="{{$settings->minstake}}" placeholder="Enter amount" max="{{$settings->maxstake}}" class="form-control" required>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label class="text-{{$text}}">&nbsp;</label>
                                                                    <button type="submit" class="btn btn-primary btn-block">
                                                                        <i class="fas fa-lock"></i> Stake Now
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="roiexpected" id="exroireal">
                                                        </form>
                                                    </div>
                                                @else
                                                   <!-- Active Stake Display -->
                                                   <div class="text-center">
                                                        <div class="mb-4">
                                                            <h4 class="text-{{$text}}">Your Stake is Currently 
                                                                @if ($mystake->status == 'active')
                                                                    <span class="badge badge-success badge-lg">
                                                                        <i class="fas fa-check-circle"></i> Active
                                                                    </span>
                                                                @else
                                                                    <span class="badge badge-danger badge-lg">
                                                                        <i class="fas fa-times-circle"></i> Expired
                                                                    </span>
                                                                @endif
                                                            </h4>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="p-3 border rounded bg-{{$bg == 'light' ? 'white' : 'dark'}}">
                                                                    <h5 class="text-primary">{{number_format($mystake->amount)}} {{$settings->token_symbol}}</h5>
                                                                    <small class="text-{{$text}}">Amount Staked</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="p-3 border rounded bg-{{$bg == 'light' ? 'white' : 'dark'}}">
                                                                    <h5 class="text-success">{{$mystake->expected_roi}}%</h5>
                                                                    <small class="text-{{$text}}">Expected ROI</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row mt-3">
                                                            <div class="col-md-6">
                                                                <div class="p-3 border rounded bg-{{$bg == 'light' ? 'white' : 'dark'}}">
                                                                    <h5 class="text-info">{{\Carbon\Carbon::parse($mystake->created_at)->format('M d, Y')}}</h5>
                                                                    <small class="text-{{$text}}">Start Date</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="p-3 border rounded bg-{{$bg == 'light' ? 'white' : 'dark'}}">
                                                                    <h5 class="text-warning">{{\Carbon\Carbon::parse($mystake->expire_date)->format('M d, Y')}}</h5>
                                                                    <small class="text-{{$text}}">Expiry Date</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="mt-4">
                                                          <a href="{{route('cancelstake',$mystake->id)}}" class="btn btn-danger btn-lg" onclick="return confirm('Are you sure you want to cancel this stake?')">
                                                              <i class="fas fa-unlock"></i> Cancel Stake
                                                          </a>  
                                                        </div>
                                                </div> 
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <!-- ROI Log Section -->
                                        <div class="mt-4">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h3 class="text-{{$text}}">
                                                    <i class="fas fa-chart-line text-success"></i> ROI History
                                                </h3>
                                                <div class="text-right">
                                                    <small class="text-{{$text}}">Total ROI Earned:</small><br>
                                                    <strong class="text-success">{{number_format(Auth::user()->roi_bal ?? 0, 2)}} {{$settings->token_symbol}}</strong>
                                                </div>
                                            </div>
                                            
                                            <div class="card bg-{{$bg == 'light' ? 'white' : 'dark'}} border-{{$bg == 'light' ? 'light' : 'secondary'}}">
                                                <div class="card-body">
                                                    @if($rois && $rois->count() > 0)
                                                        <div class="table-responsive"> 
                                                            <table class="table table-{{$bg == 'light' ? 'light' : 'dark'}}" id="ttable"> 
                                                                <thead> 
                                                                    <tr> 
                                                                        <th class="text-{{$text}}">
                                                                            <i class="fas fa-coins"></i> Token Received
                                                                        </th>
                                                                        <th class="text-{{$text}}">
                                                                            <i class="fas fa-info-circle"></i> Narration
                                                                        </th>
                                                                        <th class="text-{{$text}}">
                                                                            <i class="fas fa-calendar"></i> Date
                                                                        </th>
                                                                    </tr> 
                                                                </thead> 
                                                                <tbody> 
                                                                    @foreach ($rois as $profit)
                                                                        <tr> 
                                                                            <td class="text-{{$text}}">
                                                                                <strong class="text-success">{{number_format($profit->amount, 2, '.', ',')}} {{$settings->token_symbol}}</strong>
                                                                            </td> 
                                                                            <td class="text-{{$text}}">
                                                                                <span class="badge badge-info">{{$profit->narration}}</span>
                                                                            </td> 
                                                                            <td class="text-{{$text}}">
                                                                                {{\Carbon\Carbon::parse($profit->created_at)->format('M d, Y h:i A')}}
                                                                            </td>
                                                                        </tr>   
                                                                    @endforeach
                                                                </tbody> 
                                                            </table>
                                                        </div>
                                                    @else
                                                        <div class="text-center py-4">
                                                            <i class="fas fa-chart-line fa-3x text-muted mb-3"></i>
                                                            <h5 class="text-{{$text}}">No ROI History Yet</h5>
                                                            <p class="text-muted">Your ROI earnings will appear here once you start staking tokens.</p>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Sidebar -->
                    <div class="col-md-4">
                        <!-- Staking Stats Card -->
                        <div class="card bg-{{$bg == 'light' ? 'white' : 'dark'}} border-{{$bg == 'light' ? 'light' : 'secondary'}} mb-3">
                            <div class="card-body">
                                <h5 class="card-title text-{{$text}}">
                                    <i class="fas fa-chart-pie"></i> Staking Statistics
                                </h5>
                                <ul class="list-unstyled">
                                    <li class="text-{{$text}} mb-2">
                                        <i class="fas fa-coins text-primary"></i> 
                                        Available Balance: <strong>{{number_format(Auth::user()->tot_tk_bal ?? 0)}} {{$settings->token_symbol}}</strong>
                                    </li>
                                    <li class="text-{{$text}} mb-2">
                                        <i class="fas fa-lock text-warning"></i> 
                                        Currently Staked: 
                                        <strong>{{$mystake ? number_format($mystake->amount) : 0}} {{$settings->token_symbol}}</strong>
                                    </li>
                                    <li class="text-{{$text}} mb-2">
                                        <i class="fas fa-percentage text-success"></i> 
                                        Total ROI Earned: <strong>{{number_format(Auth::user()->roi_bal ?? 0, 2)}} {{$settings->token_symbol}}</strong>
                                    </li>
                                    <li class="text-{{$text}}">
                                        <i class="fas fa-calendar text-info"></i> 
                                        Staking Status: 
                                        @if($mystake)
                                            <strong class="text-success">Active</strong>
                                        @else
                                            <strong class="text-muted">Not Staking</strong>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>

                        @include('user.include.sideaction')
                    </div>   
                </div>
                
                <!-- ROI Calculation Script -->
                <script type="text/javascript">
                    var amount = document.getElementById('exroi');
                    var amountpay = document.getElementById('exroireal');
                    
                    // Set default values
                    if(amount && amountpay) {
                        amount.value = "{{$settings->one_month_roi ?? 0}}" + '%';
                        amountpay.value = "{{$settings->one_month_roi ?? 0}}";
                    }
                    
                    function calcAmount(sub) {
                        if(!amount || !amountpay) return;
                        
                        if(sub.value == "1 Month"){
                            amount.value = "{{$settings->one_month_roi ?? 0}}" + '%';
                            amountpay.value = "{{$settings->one_month_roi ?? 0}}";
                        }
                        else if(sub.value == "4 Months"){
                            amount.value = "{{$settings->four_month_roi ?? 0}}" + '%';
                            amountpay.value = "{{$settings->four_month_roi ?? 0}}";
                        }
                        else if(sub.value == "6 Months"){
                            amount.value = "{{$settings->six_month_roi ?? 0}}" + '%';
                            amountpay.value = "{{$settings->six_month_roi ?? 0}}";
                        }
                        else if(sub.value == "9 Months"){
                            amount.value = "{{$settings->nine_month_roi ?? 0}}" + '%';
                            amountpay.value = "{{$settings->nine_month_roi ?? 0}}";
                        }
                        else if(sub.value == "1 Year"){
                            amount.value = "{{$settings->one_year_roi ?? 0}}" + '%';
                            amountpay.value = "{{$settings->one_year_roi ?? 0}}";
                        }
                    }
                </script>
            </div>
        </div>
    </div>
    @include('user.modal')
@endsection
