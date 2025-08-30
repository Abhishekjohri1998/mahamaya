<?php
if (Auth::user()->dashboard_style == "light") {
    $bg = "light";
    $text = "dark";
} else {
    $bg = "dark";
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
                    <div class="col-md-12">
                        <div class="card bg-{{$bg == 'light' ? 'white' : 'dark'}} border-{{$bg == 'light' ? 'light' : 'secondary'}}">
                            <div class="card-body">
                                <h5 class="card-title text-{{$text}}">Transactions List</h5>
                                <div class="table-responsive"> 
                                    <table class="table table-striped table-bordered table-hover table-sm table-{{$bg == 'light' ? 'light' : 'dark'}}" id="ttable"> 
                                        <thead class="thead-{{$bg == 'light' ? 'light' : 'secondary'}}"> 
                                            <tr> 
                                                <th class="text-{{$text}}">TRANX NO.</th>
                                                <th class="text-{{$text}}">TOKENS</th>
                                                <th class="text-{{$text}}">AMOUNT</th>
                                                <th class="text-{{$text}}">USD AMOUNT</th>
                                                <th class="text-{{$text}}">TYPE</th>
                                                <th class="text-{{$text}}">DATE</th>
                                                <th class="text-{{$text}}">STATUS</th>
                                            </tr> 
                                        </thead> 
                                        <tbody> 
                                            @forelse ($recent_txn as $txn)
                                               <tr class="bg-{{$bg == 'light' ? 'white' : 'dark'}} text-{{$text}}"> 
                                                <td class="text-{{$text}}">{{$txn->txn_id}}</td>
                                                <td class="text-{{$text}}">{{$txn->tokens}} {{$settings->token_symbol}}</td> 
                                                <td class="text-{{$text}}">{{$txn->amount}} {{$txn->to}}</td>
                                                <td class="text-{{$text}}">{{$txn->base_amt}} USD</td>
                                                <td class="text-{{$text}}">{{$txn->type}}</td>
                                                <td class="text-{{$text}}">{{\Carbon\Carbon::parse($txn->created_at)->toDayDateTimeString()}}</td>
                                                <td> 
                                                    @if ($txn->status == "pending")
                                                        <span class="badge badge-warning">{{$txn->status}}</span>
                                                    @elseif ($txn->status == "completed")
                                                        <span class="badge badge-success">{{$txn->status}}</span>
                                                    @elseif ($txn->status == "failed")
                                                        <span class="badge badge-danger">{{$txn->status}}</span>
                                                    @else
                                                        <span class="badge badge-secondary">{{$txn->status}}</span>
                                                    @endif
                                                </td>
                                            </tr>  
                                            @empty
                                            <tr class="bg-{{$bg == 'light' ? 'white' : 'dark'}}">
                                                <td colspan="7" class="text-center text-{{$text}}">
                                                    <i class="fa fa-info-circle"></i> No transactions found
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
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#ttable').DataTable({
        "responsive": true,
        "pageLength": 25,
        "order": [[ 5, "desc" ]], // Order by date column
        "columnDefs": [
            { "orderable": false, "targets": 6 } // Disable sorting on status column
        ]
    });
});
</script>
@endsection
