<h2 class="mb-2 d-inline">Add Referral Commission</h2>
<div>
    <form method="POST" action="{{route('saverefcom')}}">
        @csrf
        @method('put')
        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Referral Commission(%)</label>
                <small>How many percent of {{$settings->token_symbol ?? 'TOKEN'}}</small>
                <input type="number" step="0.01" class="form-control" value="{{$settings->ref_com ?? 0}}" name="ref_com" required>
            </div>
        </div>
        <button type="submit" class="px-3 btn btn-primary">Update Commission</button>
    </form>  
</div>
