@extends('layouts.admin_cms')

@section('header_title', 'Footer Settings')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h2 style="color: var(--admin-sidebar); font-size: 1.5rem;">Settings</h2>
        <p style="color: #64748b; font-size: 0.9rem;">Manage and update configuration settings for the website.</p>
    </div>

    @if(session('success'))
        <div style="background: rgba(164, 198, 57, 0.15); border-left: 4px solid var(--admin-green); padding: 15px; margin-bottom: 25px; border-radius: 4px; color: #627722;">
            <i class="fa-solid fa-circle-check" style="margin-right: 5px;"></i> {{ session('success') }}
        </div>
    @endif

    <div class="card" style="margin-bottom: 30px;">
        <h2 style="font-size: 1.5rem; color: #1e293b; margin-bottom: 20px; font-weight: 700;">Footer Information</h2>
        <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
        @csrf
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 350px), 1fr)); gap: 30px;">
            
            @foreach(['footer' => 'Footer Content'] as $groupKey => $groupName)
                @if(isset($settings[$groupKey]))
                    <div class="card" style="margin-bottom: 0;">
                        <h3 style="color: var(--admin-sidebar); font-size: 1.2rem; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid var(--admin-border);">{{ $groupName }}</h3>
                        
                        @foreach($settings[$groupKey] as $setting)
                            <div style="margin-bottom: 20px;">
                                <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px; font-size: 0.9rem;">{{ $setting->label ?? ucfirst(str_replace('_', ' ', $setting->key)) }}</label>
                                
                                @if($setting->type == 'textarea')
                                    <textarea name="{{ $setting->key }}" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-family: 'Poppins', sans-serif; font-size: 0.95rem;" rows="4">{{ old($setting->key, $setting->value) }}</textarea>
                                @elseif($setting->type == 'image')
                                    <div id="preview_{{ $setting->key }}_container" style="margin-bottom: 10px; {{ $setting->value ? '' : 'display: none;' }}">
                                        <img id="preview_{{ $setting->key }}" src="{{ $setting->value ? (str_starts_with($setting->value, 'http') ? $setting->value : asset($setting->value)) : '' }}" style="max-width: 100%; max-height: 150px; border-radius: 8px; border: 1px solid var(--admin-border);">
                                    </div>
                                    <input type="file" name="{{ $setting->key }}" accept="image/*" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-size: 0.95rem;" onchange="previewImage(this, 'preview_{{ $setting->key }}_container', 'preview_{{ $setting->key }}')">
                                    <small style="color: #64748b; display: block; margin-top: 5px;">Leave blank to keep current image.</small>
                                @else
                                    <input type="text" name="{{ $setting->key }}" value="{{ old($setting->key, $setting->value) }}" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-family: 'Poppins', sans-serif; font-size: 0.95rem;">
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            @endforeach
            
            <div class="card" style="margin-bottom: 0;">
                <div class="form-group" style="padding: 25px;">
                    <label style="display: block; font-weight: 600; color: var(--admin-sidebar); margin-bottom: 10px;">Useful Links</label>
                    <p style="font-size: 0.8rem; color: #64748b; margin-bottom: 10px;">Format: <strong>Link Text | URL</strong> (one per line). Example:<br>Home | /<br>Speakers | #speakers</p>
                    <textarea name="footer_useful_links" class="form-control" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px;" rows="5">{{ $settings['footer']['footer_useful_links'] ?? "Home | /\nSpeakers | #\nCommittee | #" }}</textarea>
                </div>
            </div>
            
            <div class="card" style="margin-bottom: 0;">
                <div class="form-group" style="padding: 25px;">
                    <label style="display: block; font-weight: 600; color: var(--admin-sidebar); margin-bottom: 10px;">Quick Links</label>
                    <p style="font-size: 0.8rem; color: #64748b; margin-bottom: 10px;">Format: <strong>Link Text | URL</strong> (one per line).</p>
                    <textarea name="footer_quick_links" class="form-control" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px;" rows="5">{{ $settings['footer']['footer_quick_links'] ?? "Terms & Conditions | #\nPrivacy Policy | #\nCancellation Policy | #\nContact | #" }}</textarea>
                </div>
            </div>
            
        </div>

        <div style="margin-top: 30px; text-align: right;">
            <button type="submit" class="btn" style="padding: 12px 30px; font-size: 1.05rem;">
                <i class="fa-solid fa-save"></i> Save All Settings
            </button>
        </div>
    </form>

    <script>
        function previewImage(input, containerId, imgId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var container = document.getElementById(containerId);
                    var img = document.getElementById(imgId);
                    img.src = e.target.result;
                    container.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
