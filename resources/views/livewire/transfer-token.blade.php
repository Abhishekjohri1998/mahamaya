<div>
    @php
        $bg = (Auth::user()->dashboard_style == 'light') ? 'light' : 'dark';
        $text = ($bg === 'light') ? 'dark' : 'light';
    @endphp

    <x-danger-alert/>
    <x-success-alert/>
    
    <div class="card bg-{{$bg == 'light' ? 'white' : 'dark'}} border-{{$bg == 'light' ? 'light' : 'secondary'}}">
        <div class="card-body">
            <h5 class="card-title text-{{$text}}">Transfer {{$settings->token_symbol}} Tokens</h5>
            <p class="card-text text-{{$text}}">Transfer your tokens to another user registered in our system.</p>
            
            <form wire:submit.prevent='transfer'>
                <div class="form-group">
                    <label class="text-{{$text}}">Recipient Email Address</label>
                    <input type="email" wire:model='email' wire:keyup='validateentry' 
                           class="form-control" placeholder="Enter recipient's email" required>
                    <small class="form-text text-muted">
                        Enter the email of the user you want to transfer tokens to. The email must be registered in our system.
                    </small>
                </div>
                
                <div class="form-group">
                    <label class="col-form-label text-{{$text}}">Amount of {{$settings->token_symbol}} to transfer</label>
                    <input type="number" wire:model='token' wire:keyup='validateentry' 
                           class="form-control" min="1" step="1" placeholder="Enter token amount" required>
                    <small class="form-text text-muted">
                        Available balance: {{number_format(Auth::user()->tot_tk_bal ?? 0)}} {{$settings->token_symbol}}
                    </small>
                </div>
                
                <div class="form-group">
                    <button wire:target='transfer' wire:loading.attr="disabled" 
                            wire:loading.class='bg-secondary' 
                            class='p-2 px-4 btn btn-primary' type="submit" {{$dis}}>
                        <div wire:target='transfer' wire:loading class="sk-chase">
                            <div class="sk-chase-dot"></div>
                            <div class="sk-chase-dot"></div>
                            <div class="sk-chase-dot"></div>
                            <div class="sk-chase-dot"></div>
                            <div class="sk-chase-dot"></div>
                            <div class="sk-chase-dot"></div>
                        </div>
                        <span wire:loading.remove wire:target='transfer'>
                            <i class="fas fa-paper-plane"></i> Transfer Now
                        </span> 
                    </button>
                </div>
                
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i>
                    <strong>Important:</strong> Token transfers are immediate and cannot be reversed. 
                    Please verify the recipient email address before confirming the transfer.
                </div>
            </form>
        </div>
    </div>

    <!-- Recent Transfers -->
    <div class="card bg-{{$bg == 'light' ? 'white' : 'dark'}} border-{{$bg == 'light' ? 'light' : 'secondary'}} mt-4">
        <div class="card-body">
            <h5 class="card-title text-{{$text}}">Recent Transfers</h5>
            <div class="table-responsive">
                <table class="table table-{{$bg == 'light' ? 'light' : 'dark'}}">
                    <thead>
                        <tr>
                            <th class="text-{{$text}}">Date</th>
                            <th class="text-{{$text}}">Recipient</th>
                            <th class="text-{{$text}}">Amount</th>
                            <th class="text-{{$text}}">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentTransfers ?? [] as $transfer)
                        <tr>
                            <td class="text-{{$text}}">{{$transfer->created_at->format('M d, Y')}}</td>
                            <td class="text-{{$text}}">{{$transfer->recipient_email}}</td>
                            <td class="text-{{$text}}">{{number_format($transfer->amount)}} {{$settings->token_symbol}}</td>
                            <td>
                                @if($transfer->status == 'completed')
                                    <span class="badge badge-success">Completed</span>
                                @elseif($transfer->status == 'pending')
                                    <span class="badge badge-warning">Pending</span>
                                @else
                                    <span class="badge badge-danger">Failed</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-{{$text}}">
                                <i class="fas fa-info-circle"></i> No transfers found
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
