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
                <div class="mt-2 mb-4">
                    <h2 class="text-{{$text}} pb-2">
                        <i class="fas fa-user-edit"></i> Account Settings
                    </h2>
                    <p class="text-{{$text}}">Manage your personal information, security settings, and wallet configuration.</p>
                </div>

                <x-danger-alert/>
                <x-success-alert/>
                <x-error-alert/>
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <!-- Profile Information Card -->
                            <div class="col-md-12">
                                <div class="card bg-{{$bg == 'light' ? 'white' : 'dark'}} border-{{$bg == 'light' ? 'light' : 'secondary'}}">
                                    <div class="card-body">
                                        <ul class="nav nav-pills nav-fill">
                                            <li class="nav-item">
                                                <a href="#per" class="nav-link active" data-toggle="tab">
                                                    <i class="fas fa-user"></i> Personal Data
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#pas" class="nav-link" data-toggle="tab">
                                                    <i class="fas fa-lock"></i> Password
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#wallet" class="nav-link" data-toggle="tab">
                                                    <i class="fab fa-ethereum"></i> MetaMask Wallet
                                                </a>
                                            </li>
                                        </ul>
                                        
                                        <div class="tab-content mt-4">
                                            <!-- Personal Data Tab -->
                                            <div class="tab-pane fade show active" id="per">
                                                <h5 class="text-{{$text}} mb-3">
                                                    <i class="fas fa-info-circle text-primary"></i> Personal Information
                                                </h5>
                                                
                                                <form method="POST" action="{{route('profile.update')}}">
                                                    @csrf
                                                    @method('put')
                                                    
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="text-{{$text}}">
                                                                <i class="fas fa-user"></i> Full Name
                                                            </label>
                                                            <input type="text" class="form-control" value="{{Auth::user()->name}}" name="fullname" required>
                                                        </div>
                                                        
                                                        <div class="form-group col-md-6">
                                                            <label class="text-{{$text}}">
                                                                <i class="fas fa-envelope"></i> Email Address
                                                            </label>
                                                            <input type="email" class="form-control" value="{{Auth::user()->email}}" name="email" readonly>
                                                            <small class="form-text text-muted">Email cannot be changed for security reasons</small>
                                                        </div>
                                                        
                                                        <div class="form-group col-md-6">
                                                            <label class="text-{{$text}}">
                                                                <i class="fas fa-phone"></i> Mobile Number
                                                            </label>
                                                            <input type="text" class="form-control" value="{{Auth::user()->phone_number}}" name="number">
                                                        </div>
                                                        
                                                        <div class="form-group col-md-6">
                                                            <label class="text-{{$text}}">
                                                                <i class="fas fa-calendar"></i> Date of Birth
                                                            </label>
                                                            <input type="date" value="{{Auth::user()->dob}}" class="form-control" name="dob">
                                                        </div>
                                                        
                                                        <div class="form-group col-md-6">
                                                            <label class="text-{{$text}}">
                                                                <i class="fas fa-globe"></i> Nationality
                                                            </label>
                                                            <select class="form-control" name="nationality">
                                                                <option selected>{{Auth::user()->nationality ?? 'Select Country'}}</option>
                                                                @include('profile.countries')
                                                            </select>
                                                        </div>
                                                        
                                                        @if (Auth::user()->verification_status == "Verified" && isset($address))
                                                        <div class="form-group col-md-6">
                                                            <label class="text-{{$text}}">
                                                                <i class="fas fa-map-marker-alt"></i> Verified Address
                                                            </label>
                                                            <textarea class="form-control" disabled rows="3">{{$address->address ?? 'No address on file'}}</textarea>
                                                            <small class="form-text text-muted">Address verified through KYC process</small>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fas fa-save"></i> Update Profile
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            
                                            <!-- Password Tab -->
                                            <div class="tab-pane fade" id="pas">
                                                <h5 class="text-{{$text}} mb-3">
                                                    <i class="fas fa-shield-alt text-warning"></i> Change Password
                                                </h5>
                                                
                                                <form method="POST" action="{{route('password.update')}}">
                                                    @csrf
                                                    @method('put')
                                                    
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="text-{{$text}}">
                                                                <i class="fas fa-key"></i> Current Password
                                                            </label>
                                                            <input type="password" class="form-control" name="old_password" required>
                                                        </div>
                                                        
                                                        <div class="form-group col-md-6">
                                                            <label class="text-{{$text}}">
                                                                <i class="fas fa-lock"></i> New Password
                                                            </label>
                                                            <input type="password" class="form-control" name="password" required minlength="8">
                                                            <small class="form-text text-muted">Minimum 8 characters required</small>
                                                        </div>
                                                        
                                                        <div class="form-group col-md-6">
                                                            <label class="text-{{$text}}">
                                                                <i class="fas fa-check-circle"></i> Confirm New Password
                                                            </label>
                                                            <input type="password" class="form-control" name="password_confirmation" required>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-warning">
                                                            <i class="fas fa-key"></i> Update Password
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            
                                            <!-- MetaMask Wallet Tab -->
                                            <div class="tab-pane fade" id="wallet">
                                                <h5 class="text-{{$text}} mb-3">
                                                    <i class="fab fa-ethereum text-primary"></i> MetaMask Wallet Configuration
                                                </h5>
                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @if(Auth::user()->wallet_address)
                                                            <!-- Current Wallet Display -->
                                                            <div class="alert alert-success">
                                                                <h6><i class="fas fa-check-circle"></i> Wallet Connected</h6>
                                                                <p class="mb-2">
                                                                    <strong>Address:</strong><br>
                                                                    <code class="text-success">{{Auth::user()->wallet_address}}</code>
                                                                </p>
                                                                <div class="mt-2">
                                                                    <button class="btn btn-sm btn-outline-primary" onclick="copyWalletAddress()">
                                                                        <i class="fas fa-copy"></i> Copy Address
                                                                    </button>
                                                                    <a href="https://etherscan.io/address/{{Auth::user()->wallet_address}}" target="_blank" class="btn btn-sm btn-outline-info">
                                                                        <i class="fas fa-external-link-alt"></i> View on Etherscan
                                                                    </a>
                                                                    <button class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#walletmodal">
                                                                        <i class="fas fa-edit"></i> Change Wallet
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            
                                                            <!-- Wallet Statistics -->
                                                            <div class="card bg-{{$bg == 'light' ? 'light' : 'secondary'}}">
                                                                <div class="card-body">
                                                                    <h6 class="text-{{$text}}">MetaMask Integration Status</h6>
                                                                    <div class="row text-center">
                                                                        <div class="col-md-4">
                                                                            <div class="p-2">
                                                                                <i class="fas fa-check text-success fa-2x"></i>
                                                                                <p class="text-{{$text}} mt-2 mb-0">Wallet Connected</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="p-2">
                                                                                <i class="fas fa-coins text-primary fa-2x"></i>
                                                                                <p class="text-{{$text}} mt-2 mb-0">Ready for Purchases</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="p-2">
                                                                                <i class="fas fa-shield-alt text-warning fa-2x"></i>
                                                                                <p class="text-{{$text}} mt-2 mb-0">Secure Transactions</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <!-- No Wallet Connected -->
                                                            <div class="alert alert-warning">
                                                                <h6><i class="fas fa-exclamation-triangle"></i> No Wallet Connected</h6>
                                                                <p>Connect your MetaMask wallet to enable cryptocurrency purchases and enhanced security features.</p>
                                                                <button class="btn btn-primary" data-toggle="modal" data-target="#walletmodal">
                                                                    <i class="fab fa-ethereum"></i> Connect MetaMask Wallet
                                                                </button>
                                                            </div>
                                                            
                                                            <!-- Wallet Benefits -->
                                                            <div class="card bg-{{$bg == 'light' ? 'light' : 'secondary'}}">
                                                                <div class="card-body">
                                                                    <h6 class="text-{{$text}}">Benefits of Connecting MetaMask</h6>
                                                                    <ul class="list-unstyled text-{{$text}}">
                                                                        <li><i class="fas fa-check text-success"></i> Direct cryptocurrency payments</li>
                                                                        <li><i class="fas fa-check text-success"></i> Lower transaction fees</li>
                                                                        <li><i class="fas fa-check text-success"></i> Instant token purchases</li>
                                                                        <li><i class="fas fa-check text-success"></i> Blockchain transaction verification</li>
                                                                        <li><i class="fas fa-check text-success"></i> Enhanced account security</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Two-Factor Authentication Card -->
                            <div class="col-md-12">
                                <div class="card bg-{{$bg == 'light' ? 'white' : 'dark'}} border-{{$bg == 'light' ? 'light' : 'secondary'}}">
                                    <div class="card-body">
                                        <h3 class="card-title text-{{$text}}">
                                            <i class="fas fa-mobile-alt text-success"></i> Two-Factor Authentication
                                        </h3>
                                        <p class="card-text text-{{$text}}">
                                            Two-factor authentication adds an extra layer of security to your account. When activated, you'll need to enter both your password and a special code from your mobile authenticator app to access your account.
                                        </p>
                                        
                                        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                                            <div class="mt-3">
                                                @livewire('profile.two-factor-authentication-form')
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Sidebar -->
                    <div class="col-md-4">
                        <!-- Account Overview Card -->
                        <div class="card bg-{{$bg == 'light' ? 'white' : 'dark'}} border-{{$bg == 'light' ? 'light' : 'secondary'}} mb-3">
                            <div class="card-body">
                                <h5 class="card-title text-{{$text}}">
                                    <i class="fas fa-user-circle"></i> Account Overview
                                </h5>
                                <div class="mb-2">
                                    <strong class="text-{{$text}}">Name:</strong><br>
                                    <span class="text-{{$text}}">{{Auth::user()->name}}</span>
                                </div>
                                <div class="mb-2">
                                    <strong class="text-{{$text}}">Email Status:</strong><br>
                                    @if(Auth::user()->email_verified_at)
                                        <span class="badge badge-success">
                                            <i class="fas fa-check-circle"></i> Verified
                                        </span>
                                    @else
                                        <span class="badge badge-warning">
                                            <i class="fas fa-exclamation-circle"></i> Not Verified
                                        </span>
                                    @endif
                                </div>
                                <div class="mb-2">
                                    <strong class="text-{{$text}}">KYC Status:</strong><br>
                                    @if(Auth::user()->verification_status == "Verified")
                                        <span class="badge badge-success">
                                            <i class="fas fa-shield-alt"></i> Verified
                                        </span>
                                    @else
                                        <span class="badge badge-warning">
                                            <i class="fas fa-clock"></i> Pending
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    <strong class="text-{{$text}}">Member Since:</strong><br>
                                    <span class="text-{{$text}}">{{Auth::user()->created_at->format('M d, Y')}}</span>
                                </div>
                            </div>
                        </div>

                        @include('user.include.sideaction')
                    </div>   
                </div>
            </div>
        </div>
    </div>
    
    <!-- Copy Wallet Address Script -->
    <script>
        function copyWalletAddress() {
            const walletAddress = '{{Auth::user()->wallet_address}}';
            navigator.clipboard.writeText(walletAddress).then(function() {
                // Success notification
                const alertDiv = document.createElement('div');
                alertDiv.className = 'alert alert-success alert-dismissible fade show position-fixed';
                alertDiv.style.cssText = 'top: 20px; right: 20px; z-index: 9999; max-width: 300px;';
                alertDiv.innerHTML = `
                    <i class="fas fa-check-circle"></i> Wallet address copied to clipboard!
                    <button type="button" class="close" onclick="this.parentElement.remove()">
                        <span>&times;</span>
                    </button>
                `;
                document.body.appendChild(alertDiv);
                
                // Auto-remove after 3 seconds
                setTimeout(() => {
                    if (alertDiv.parentNode) {
                        alertDiv.parentNode.removeChild(alertDiv);
                    }
                }, 3000);
            }).catch(function(err) {
                console.error('Could not copy text: ', err);
                alert('Copy failed. Address: ' + walletAddress);
            });
        }
    </script>
    
    @include('user.modal')
@endsection
