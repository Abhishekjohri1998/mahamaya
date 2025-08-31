<h2 class="d-inline">Staking Settings</h2>
<div>
    <form method="POST" action="{{route('savestakeset')}}">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-12 ">
                <h5>Allow users to stake</h5>
                <div class="selectgroup">
                    <label class="selectgroup-item">
                        <input type="radio" name="usestatke" id="social" value="1" class="selectgroup-input" {{($settings->usestake ?? 0) == 1 ? 'checked' : ''}}>
                        <span class="selectgroup-button">Yes</span>
                    </label>
                    <label class="selectgroup-item">
                        <input type="radio" name="usestatke" id="socialoff" value="0" class="selectgroup-input" {{($settings->usestake ?? 0) != 1 ? 'checked' : ''}}>
                        <span class="selectgroup-button">No</span>
                    </label>
                </div>
                <div>
                    <small>If set to No, your users will not be able to stake their token</small> 
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Minimum Amount of {{$settings->token_symbol ?? 'TOKEN'}} to Stake</label>
                <input type="number" step="0.01" class="form-control" name="minstake" value="{{$settings->minstake ?? 0}}" required>
            </div>
            <div class="form-group col-md-6">
                <label>Maximum amount of {{$settings->token_symbol ?? 'TOKEN'}} to stake</label>
                <input type="number" step="0.01" class="form-control" name="maxstake" value="{{$settings->maxstake ?? 0}}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="checkbox" name="duration[]" id="onem" value="onem" {{(isset($duraarray) && in_array("onem", $duraarray)) ? 'checked' : ''}}>
                <label>1 Month</label>
            </div>
            <div class="form-group col-md-6">
                <input type="number" step="0.01" class="form-control" name="onem" value="{{$settings->one_month_roi ?? 0}}" required>
                <small>Total ROI for 1 Month duration(%)</small>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="checkbox" name="duration[]" id="fourm" value="fourm" {{(isset($duraarray) && in_array("fourm", $duraarray)) ? 'checked' : ''}}>
                <label>4 Months</label>
            </div>
            <div class="form-group col-md-6">
                <input type="number" step="0.01" class="form-control" name="fourm" value="{{$settings->four_month_roi ?? 0}}" required>
                <small>Total ROI for 4 Months duration(%)</small>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="checkbox" name="duration[]" id="sixm" value="sixm" {{(isset($duraarray) && in_array("sixm", $duraarray)) ? 'checked' : ''}}>
                <label>6 Months</label>
            </div>
            <div class="form-group col-md-6">
                <input type="number" step="0.01" class="form-control" name="sixm" value="{{$settings->six_month_roi ?? 0}}" required>
                <small>Total ROI for 6 Months duration(%)</small>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="checkbox" name="duration[]" id="ninem" value="ninem" {{(isset($duraarray) && in_array("ninem", $duraarray)) ? 'checked' : ''}}>
                <label>9 Months</label>
            </div>
            <div class="form-group col-md-6">
                <input type="number" step="0.01" class="form-control" name="ninem" value="{{$settings->nine_month_roi ?? 0}}" required>
                <small>Total ROI for 9 Months duration(%)</small>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="checkbox" name="duration[]" id="oney" value="oney" {{(isset($duraarray) && in_array("oney", $duraarray)) ? 'checked' : ''}}>
                <label>1 Year</label>
            </div>
            <div class="form-group col-md-6">
                <input type="number" step="0.01" class="form-control" name="oneyear" value="{{$settings->one_year_roi ?? 0}}" required>
                <small>Total ROI for 1 Year duration(%)</small>
            </div>
        </div>
        <button type="submit" class="px-4 btn btn-primary">Save</button>
    </form>  
</div>
