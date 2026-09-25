@extends('layouts.admin_cms')

@section('header_title', 'Submit Paper Page Settings')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h2 style="color: var(--admin-sidebar); font-size: 1.5rem;">Submit Paper Page Settings</h2>
    </div>

    @if(session('success'))
        <div style="background: rgba(164, 198, 57, 0.15); border-left: 4px solid var(--admin-green); padding: 15px; margin-bottom: 25px; border-radius: 4px; color: #627722;">
            <i class="fa-solid fa-circle-check" style="margin-right: 5px;"></i> {{ session('success') }}
        </div>
    @endif

    <div class="card" style="margin-bottom: 30px;">
        <form method="POST" action="{{ route('admin.submit_paper_settings.update') }}" enctype="multipart/form-data">
            @csrf
            
            <h3 style="color: var(--admin-sidebar); font-size: 1.2rem; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid var(--admin-border);">Submit Paper Page Content</h3>
            
            @foreach($settings as $setting)
                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px; font-size: 0.9rem;">{{ $setting->label ?? ucfirst(str_replace('_', ' ', $setting->key)) }}</label>
                    
                    @if($setting->type == 'textarea')
                        <textarea name="{{ $setting->key }}" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-family: 'Poppins', sans-serif; font-size: 0.95rem;" rows="4">{{ old($setting->key, $setting->value) }}</textarea>
                    @elseif($setting->type == 'image')
                        <div id="preview_{{ $setting->key }}_container" style="margin-bottom: 10px; {{ $setting->value ? '' : 'display: none;' }}">
                            <img id="preview_{{ $setting->key }}" src="{{ $setting->value ? asset($setting->value) : '' }}" style="max-width: 100%; max-height: 150px; border-radius: 8px; border: 1px solid var(--admin-border);">
                        </div>
                        <input type="file" name="{{ $setting->key }}" accept="image/*" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-size: 0.95rem;" onchange="previewImage(this, 'preview_{{ $setting->key }}_container', 'preview_{{ $setting->key }}')">
                        <small style="color: #64748b; display: block; margin-top: 5px;">Leave blank to keep current image.</small>
                    @elseif($setting->type == 'file')
                        @if($setting->value)
                            <div style="margin-bottom: 10px;">
                                <a href="{{ asset($setting->value) }}" target="_blank" style="color: var(--admin-primary); text-decoration: none; font-weight: 600;"><i class="fa-solid fa-file"></i> View Current File</a>
                            </div>
                        @endif
                        <input type="file" name="{{ $setting->key }}" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-size: 0.95rem;">
                        <small style="color: #64748b; display: block; margin-top: 5px;">Leave blank to keep current file.</small>
                    @else
                        <input type="text" name="{{ $setting->key }}" value="{{ old($setting->key, $setting->value) }}" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-family: 'Poppins', sans-serif; font-size: 0.95rem;">
                    @endif
                </div>
            @endforeach
            
            <div style="text-align: right; margin-top: 30px;">
                <button type="submit" class="btn btn-primary" style="padding: 10px 25px;">
                    <i class="fa-solid fa-save"></i> Save Settings
                </button>
            </div>
        </form>
    </div>

    <script>
        function previewImage(input, containerId, imageId) {
            var container = document.getElementById(containerId);
            var image = document.getElementById(imageId);
            
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    image.src = e.target.result;
                    container.style.display = 'block';
                }
                
                reader.readAsDataURL(input.files[0]);
            } else {
                image.src = '';
                container.style.display = 'none';
            }
        }
    </script>
@endsection
