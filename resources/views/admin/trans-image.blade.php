@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
    <div class="content">
        <div class="page-inner">
           <div class="mt-2 mb-5">
                <h1 class="title1 d-inline">Transaction Screenshot</h1>
                <div class="d-inline">
                    <div class="float-right btn-group">
                        <a class="btn btn-primary btn-sm" href="{{route('viewtransaction', $tran->id)}}"> <i class="fa fa-arrow-left"></i> back</a>
                    </div>
                </div>
            </div>
            <x-danger-alert/>
            <x-success-alert/>
            <!-- Beginning of  Dashboard Stats  -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">
                                <i class="fas fa-receipt"></i> Payment Proof Screenshot
                            </h4>
                            @if($tran->proof)
                                <div class="text-center">
                                    <img src="{{ asset('storage/'. $tran->proof) }}" class="img-fluid w-75" alt="transaction-screenshot">
                                </div>
                                <div class="mt-3">
                                    <small class="text-muted">
                                        <i class="fas fa-info-circle"></i> 
                                        Transaction ID: {{ $tran->txn_id ?? 'N/A' }}
                                    </small>
                                </div>
                            @else
                                <div class="alert alert-warning text-center">
                                    <i class="fas fa-exclamation-triangle"></i> 
                                    No payment proof screenshot uploaded for this transaction
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
