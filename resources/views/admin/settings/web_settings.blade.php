<h2 class="d-inline">Website Settings</h2>
<div>
    <form method="POST" action="{{route('savewebsettings')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-12">
                <label>Site Name</label>
                <input type="text" class="form-control" name="site_name" value="{{$settings->site_name ?? ''}}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Site Email</label>
                <input type="email" class="form-control" name="email" value="{{$settings->site_email ?? ''}}" required>
            </div>
            <div class="form-group col-md-6">
                <label>Site Contact Address</label>
                <input type="text" class="form-control" name="address" value="{{$settings->address ?? ''}}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Site URL</label>
                <input type="url" class="form-control" name="url" value="{{$settings->site_url ?? ''}}" required>
            </div>
            <div class="form-group col-md-6">
                <label>Site Phone Number</label>
                <input type="text" class="form-control" name="phone" value="{{$settings->phone ?? ''}}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <label>WhitePaper Description</label>
                <textarea name="whitepaper" class="form-control" rows="4">{{$settings->whitepaper ?? ''}}</textarea>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Live-Chat</label>
                <textarea name="livechat" class="form-control" rows="3">{{$settings->livechat ?? ''}}</textarea>
            </div>
            <div class="form-group col-md-6">
                <label>Installation Type</label>
                <select name="install_type" class="form-control">
                    <option value="{{$settings->install_type ?? 'Main-Domain'}}">{{$settings->install_type ?? 'Main-Domain'}}</option>
                    <option value="Main-Domain">Main-Domain</option>
                    <option value="Sub-Domain">Sub-Domain</option>
                    <option value="Sub-Folder">Sub-Folder</option>
                </select> 
            </div> 
        </div>
        <div class="form-row mb-3">
            <div class="mt-4 col-md-6">
                <label>Google ReCaptcha:</label>
                <div class="selectgroup">
                    <label class="selectgroup-item">
                        <input type="radio" name="captcha" value="true" {{($settings->captcha ?? 'false') == 'true' ? 'checked' : ''}} class="selectgroup-input">
                        <span class="selectgroup-button">On</span>
                    </label>
                    <label class="selectgroup-item">
                        <input type="radio" name="captcha" value="false" class="selectgroup-input" {{($settings->captcha ?? 'false') != 'true' ? 'checked' : ''}}>
                        <span class="selectgroup-button">Off</span>
                    </label>
                </div>
                <div>
                   <small>if turned on, Users will need to pass the google recaptcha challenge upon registration, also please see how to set up google recpatcha on your website before you can use it.</small> 
                </div>
            </div>
            <div class="mt-4 col-md-6">
                <label>Google Login</label>
                <div class="selectgroup">
                    <label class="selectgroup-item">
                        <input type="radio" name="social" value="yes" {{($settings->social ?? 'no') == 'yes' ? 'checked' : ''}} class="selectgroup-input">
                        <span class="selectgroup-button">On</span>
                    </label>
                    <label class="selectgroup-item">
                        <input type="radio" name="social" value="no" {{($settings->social ?? 'no') != 'yes' ? 'checked' : ''}} class="selectgroup-input">
                        <span class="selectgroup-button">Off</span>
                    </label>
                </div>
                <div>
                  <small>Google Login allows users to login/register with their google account</small> 
                </div>
            </div>
            <div class="mt-4 col-md-6">
                <label>Email Verification</label>
                <div class="selectgroup">
                    <label class="selectgroup-item">
                        <input type="radio" name="email_verify" value="true" {{($settings->email_verify ?? 'false') == 'true' ? 'checked' : ''}} class="selectgroup-input">
                        <span class="selectgroup-button">Enable</span>
                    </label>
                    <label class="selectgroup-item">
                        <input type="radio" name="email_verify" value="false" {{($settings->email_verify ?? 'false') == 'false' ? 'checked' : ''}} class="selectgroup-input">
                        <span class="selectgroup-button">Disable</span>
                    </label>
                </div>
                <div>
                  <small>If email verification is disabled users will not be ask to verify their email address.</small> 
                </div>
            </div>
            <div class="mt-4 col-md-6">
                <label>ICO sales countdown date</label>
                @php
                    $salesStartDate = $settings->sales_start_date ?? now();
                    if ($salesStartDate) {
                        $formattedDate = date('Y-m-d\TH:i', strtotime($salesStartDate));
                    } else {
                        $formattedDate = date('Y-m-d\TH:i');
                    }
                @endphp
                <input type="datetime-local" name="sales_start_date" value="{{ $formattedDate }}" class="form-control">
                <div>
                  <small>Set the date we're counting down to</small> 
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Logo (Recommended size; max width, 200px and max height 100px.)</label>
                <input name="logo" class="form-control" type="file" accept="image/*">
            </div>
            <div class="form-group col-md-6">
                <label>Favicon (Recommended type: png, size: max width, 32px and max height 32px.)</label>
                <input name="favicon" class="form-control" type="file" accept="image/*">
            </div> 
        </div>
        
        <button type="submit" class="btn btn-primary">Save Settings</button>
    </form>  
</div>
