@extends('layouts.app')
@section('content')
    @include('admin.topmenu')
    @include('admin.sidebar')
    <div class="main-panel">
    <div class="content">
        <div class="page-inner">
           <div class="mt-2 mb-5">
                <h1 class="title1 d-inline">KYC Documents</h1>
                <div class="d-inline">
                    <div class="float-right btn-group">
                        <a class="btn btn-primary btn-sm" href="{{route('viewkyc', $kyc->id)}}"> <i class="fa fa-arrow-left"></i> back</a>
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
                            <h4>Document (Front)</h4>
                            @if($kyc->doc1)
                                <img src="{{ asset('storage/'. $kyc->doc1) }}" class="img-fluid w-75" alt="document-front">
                            @else
                                <div class="alert alert-warning">
                                    <i class="fas fa-exclamation-triangle"></i> No front document uploaded
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Document (Back)</h4>
                            @if($kyc->doc2)
                                <img src="{{ asset('storage/'. $kyc->doc2) }}" class="img-fluid w-75" alt="document-back">
                            @else
                                <div class="alert alert-warning">
                                    <i class="fas fa-exclamation-triangle"></i> No back document uploaded
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Photograph</h4>
                            @if($kyc->photo)
                                <img src="{{ asset('storage/'. $kyc->photo) }}" class="img-fluid w-75" alt="photograph">
                            @else
                                <div class="alert alert-warning">
                                    <i class="fas fa-exclamation-triangle"></i> No photograph uploaded
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
