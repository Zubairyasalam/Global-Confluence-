@extends('layouts.admin_cms')

@section('header_title', 'Venue & Highlights Section')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h2 style="color: var(--admin-sidebar); font-size: 1.5rem;">Homepage Venue & Highlights</h2>
    </div>

    @if(session('success'))
        <div style="background: rgba(164, 198, 57, 0.15); border-left: 4px solid var(--admin-green); padding: 15px; margin-bottom: 25px; border-radius: 4px; color: #627722;">
            <i class="fa-solid fa-circle-check" style="margin-right: 5px;"></i> {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="card">
            <h3 style="margin-bottom: 20px; color: var(--admin-sidebar); border-bottom: 2px solid var(--admin-border); padding-bottom: 10px;">
                Section Content
            </h3>
            
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">{{ $settings['venue_highlights']->where('key', 'venue_high_title')->first()->label ?? 'Main Title' }}</label>
                <input type="text" name="venue_high_title" value="{{ $settings['venue_highlights']->where('key', 'venue_high_title')->first()->value ?? '' }}" style="width: 100%; padding: 10px 15px; border: 1px solid var(--admin-border); border-radius: 8px;">
            </div>

            <h3 style="margin-top: 30px; margin-bottom: 20px; color: var(--admin-sidebar); border-bottom: 2px solid var(--admin-border); padding-bottom: 10px;">
                Images
            </h3>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <!-- Image 1 -->
                <div>
                    <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">{{ $settings['venue_highlights']->where('key', 'venue_high_img1')->first()->label ?? 'Tall Image' }}</label>
                    @php $img1 = $settings['venue_highlights']->where('key', 'venue_high_img1')->first()->value ?? ''; @endphp
                    
                    <div id="preview-container-img1" style="margin-bottom: 10px; {{ $img1 ? '' : 'display: none;' }}">
                        <img id="preview-img1" src="{{ $img1 ? (str_starts_with($img1, 'http') ? $img1 : asset($img1)) : '' }}" alt="Preview" style="max-height: 150px; border-radius: 8px; border: 1px solid var(--admin-border);">
                    </div>
                    
                    <input type="file" name="venue_high_img1" accept="image/*" style="width: 100%; padding: 10px 15px; border: 1px solid var(--admin-border); border-radius: 8px;" onchange="previewImage(this, 'preview-container-img1', 'preview-img1')">
                </div>

                <!-- Image 2 -->
                <div>
                    <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">{{ $settings['venue_highlights']->where('key', 'venue_high_img2')->first()->label ?? 'Top Stacked Image' }}</label>
                    @php $img2 = $settings['venue_highlights']->where('key', 'venue_high_img2')->first()->value ?? ''; @endphp
                    
                    <div id="preview-container-img2" style="margin-bottom: 10px; {{ $img2 ? '' : 'display: none;' }}">
                        <img id="preview-img2" src="{{ $img2 ? (str_starts_with($img2, 'http') ? $img2 : asset($img2)) : '' }}" alt="Preview" style="max-height: 150px; border-radius: 8px; border: 1px solid var(--admin-border);">
                    </div>
                    
                    <input type="file" name="venue_high_img2" accept="image/*" style="width: 100%; padding: 10px 15px; border: 1px solid var(--admin-border); border-radius: 8px;" onchange="previewImage(this, 'preview-container-img2', 'preview-img2')">
                </div>

                <!-- Image 3 -->
                <div>
                    <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">{{ $settings['venue_highlights']->where('key', 'venue_high_img3')->first()->label ?? 'Bottom Stacked Image' }}</label>
                    @php $img3 = $settings['venue_highlights']->where('key', 'venue_high_img3')->first()->value ?? ''; @endphp
                    
                    <div id="preview-container-img3" style="margin-bottom: 10px; {{ $img3 ? '' : 'display: none;' }}">
                        <img id="preview-img3" src="{{ $img3 ? (str_starts_with($img3, 'http') ? $img3 : asset($img3)) : '' }}" alt="Preview" style="max-height: 150px; border-radius: 8px; border: 1px solid var(--admin-border);">
                    </div>
                    
                    <input type="file" name="venue_high_img3" accept="image/*" style="width: 100%; padding: 10px 15px; border: 1px solid var(--admin-border); border-radius: 8px;" onchange="previewImage(this, 'preview-container-img3', 'preview-img3')">
                </div>
            </div>

            <h3 style="margin-top: 30px; margin-bottom: 20px; color: var(--admin-sidebar); border-bottom: 2px solid var(--admin-border); padding-bottom: 10px;">
                Location
            </h3>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">{{ $settings['venue_highlights']->where('key', 'venue_high_map')->first()->label ?? 'Google Maps Embed URL' }}</label>
                
                @php $currentMap = $settings['venue_highlights']->where('key', 'venue_high_map')->first()->value ?? ''; @endphp
                <div id="map-preview-container" style="margin-bottom: 15px; {{ $currentMap ? '' : 'display: none;' }}">
                    <iframe id="map-preview" src="{{ $currentMap }}" width="100%" height="250" style="border:0; border-radius: 8px; border: 1px solid var(--admin-border);" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <textarea name="venue_high_map" rows="4" style="width: 100%; padding: 10px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-family: monospace;" oninput="previewMap(this.value)">{{ $currentMap }}</textarea>
                <small style="color: #64748b; display: block; margin-top: 5px;">Paste the <code>src="..."</code> URL from the Google Maps iframe embed code here.</small>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">{{ $settings['venue_highlights']->where('key', 'venue_high_live_tracking')->first()->label ?? 'Live Tracking Location Link' }}</label>
                <input type="text" name="venue_high_live_tracking" value="{{ $settings['venue_highlights']->where('key', 'venue_high_live_tracking')->first()->value ?? '' }}" style="width: 100%; padding: 10px 15px; border: 1px solid var(--admin-border); border-radius: 8px;" placeholder="https://maps.google.com/...">
                <small style="color: #64748b; display: block; margin-top: 5px;">Link for users to click and track the location live on Google Maps.</small>
            </div>

            <div style="text-align: right; margin-top: 30px;">
                <button type="submit" class="btn"><i class="fa-solid fa-save"></i> Save Content</button>
            </div>
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

        function previewMap(url) {
            var container = document.getElementById('map-preview-container');
            var iframe = document.getElementById('map-preview');
            if (url.trim() !== '') {
                iframe.src = url;
                container.style.display = 'block';
            } else {
                container.style.display = 'none';
            }
        }
    </script>
@endsection
