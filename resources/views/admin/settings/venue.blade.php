@extends(isset($is_included) ? 'layouts.empty' : 'layouts.admin_cms')

@section('header_title', 'Venue & Gallery Settings')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h2 style="color: var(--admin-sidebar); font-size: 1.5rem;">Venue Page Content</h2>
    </div>

    @if(session('success'))
        <div style="background: rgba(164, 198, 57, 0.15); border-left: 4px solid var(--admin-green); padding: 15px; margin-bottom: 25px; border-radius: 4px; color: #627722;">
            <i class="fa-solid fa-circle-check" style="margin-right: 5px;"></i> {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.event_details.update') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="card">
            <h3 style="margin-bottom: 20px; color: var(--admin-sidebar); border-bottom: 2px solid var(--admin-border); padding-bottom: 10px;">
                Media & Location
            </h3>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-bottom: 20px;">
                <!-- Main Image -->
                <div>
                    <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">Main Venue Image</label>
                    <div style="margin-bottom: 10px;">
                        <img id="preview_venue_image_main" src="{{ asset($settings['venue']->where('key', 'venue_image_main')->first()->value ?? 'images/mcc_main.jpg') }}" style="max-width: 100%; height: 150px; object-fit: cover; border-radius: 8px; border: 1px solid var(--admin-border);">
                    </div>
                    <input type="file" name="venue_image_main_file" accept="image/*" style="width: 100%; padding: 10px; border: 1px solid var(--admin-border); border-radius: 8px;" onchange="document.getElementById('preview_venue_image_main').src = window.URL.createObjectURL(this.files[0])">
                </div>

                <!-- Secondary Image 1 -->
                <div>
                    <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">Secondary Image 1</label>
                    <div style="margin-bottom: 10px;">
                        <img id="preview_venue_image_sec1" src="{{ asset($settings['venue']->where('key', 'venue_image_sec1')->first()->value ?? 'images/mcc4.jpg') }}" style="max-width: 100%; height: 150px; object-fit: cover; border-radius: 8px; border: 1px solid var(--admin-border);">
                    </div>
                    <input type="file" name="venue_image_sec1_file" accept="image/*" style="width: 100%; padding: 10px; border: 1px solid var(--admin-border); border-radius: 8px;" onchange="document.getElementById('preview_venue_image_sec1').src = window.URL.createObjectURL(this.files[0])">
                </div>

                <!-- Secondary Image 2 -->
                <div>
                    <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">Secondary Image 2</label>
                    <div style="margin-bottom: 10px;">
                        <img id="preview_venue_image_sec2" src="{{ asset($settings['venue']->where('key', 'venue_image_sec2')->first()->value ?? 'images/mcc_images.jpg') }}" style="max-width: 100%; height: 150px; object-fit: cover; border-radius: 8px; border: 1px solid var(--admin-border);">
                    </div>
                    <input type="file" name="venue_image_sec2_file" accept="image/*" style="width: 100%; padding: 10px; border: 1px solid var(--admin-border); border-radius: 8px;" onchange="document.getElementById('preview_venue_image_sec2').src = window.URL.createObjectURL(this.files[0])">
                </div>
            </div>

            <div style="margin-bottom: 10px;">
                <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">Google Maps Embed Link (src only)</label>
                <textarea name="venue_map_src" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-family: monospace; font-size: 0.85rem;" rows="3" placeholder="https://www.google.com/maps/embed?pb=...">{{ $settings['venue']->where('key', 'venue_map_src')->first()->value ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.756314815256!2d80.12157431482143!3d12.92336669088665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a525f1719b49b39%3A0xcb1b5907406a0a03!2sMadras%20Christian%20College!5e0!3m2!1sen!2sin!4v1717409254320!5m2!1sen!2sin' }}</textarea>
                <small style="color: #64748b;">Extract the URL inside the src="..." attribute from the Google Maps iframe code.</small>
            </div>
        </div>

        <div class="card">
            <h3 style="margin-bottom: 20px; color: var(--admin-sidebar); border-bottom: 2px solid var(--admin-border); padding-bottom: 10px;">
                Discover MCC Section
            </h3>
            
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">{{ $settings['venue']->where('key', 'venue_discover_title')->first()->label ?? 'Discover Title' }}</label>
                <input type="text" name="venue_discover_title" value="{{ $settings['venue']->where('key', 'venue_discover_title')->first()->value ?? '' }}" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">{{ $settings['venue']->where('key', 'venue_discover_text')->first()->label ?? 'Discover Text' }}</label>
                <textarea name="venue_discover_text" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-family: 'Poppins', sans-serif;" rows="5">{{ $settings['venue']->where('key', 'venue_discover_text')->first()->value ?? '' }}</textarea>
            </div>
        </div>

        <div class="card">
            <h3 style="margin-bottom: 20px; color: var(--admin-sidebar); border-bottom: 2px solid var(--admin-border); padding-bottom: 10px;">
                Heritage & Innovation Section
            </h3>
            
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">{{ $settings['venue']->where('key', 'venue_heritage_title')->first()->label ?? 'Heritage Title' }}</label>
                <input type="text" name="venue_heritage_title" value="{{ $settings['venue']->where('key', 'venue_heritage_title')->first()->value ?? '' }}" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">{{ $settings['venue']->where('key', 'venue_heritage_text')->first()->label ?? 'Heritage Text' }}</label>
                <textarea name="venue_heritage_text" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-family: 'Poppins', sans-serif;" rows="5">{{ $settings['venue']->where('key', 'venue_heritage_text')->first()->value ?? '' }}</textarea>
            </div>
        </div>

        <div class="card">
            <h3 style="margin-bottom: 20px; color: var(--admin-sidebar); border-bottom: 2px solid var(--admin-border); padding-bottom: 10px;">
                Campus Biodiversity Section
            </h3>
            
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">{{ $settings['venue']->where('key', 'venue_biodiversity_title')->first()->label ?? 'Biodiversity Title' }}</label>
                <input type="text" name="venue_biodiversity_title" value="{{ $settings['venue']->where('key', 'venue_biodiversity_title')->first()->value ?? '' }}" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">{{ $settings['venue']->where('key', 'venue_biodiversity_text')->first()->label ?? 'Biodiversity Text' }}</label>
                <textarea name="venue_biodiversity_text" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-family: 'Poppins', sans-serif;" rows="3">{{ $settings['venue']->where('key', 'venue_biodiversity_text')->first()->value ?? '' }}</textarea>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">{{ $settings['venue']->where('key', 'venue_biodiversity_list')->first()->label ?? 'Biodiversity Bullets (One per line)' }}</label>
                <textarea name="venue_biodiversity_list" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-family: 'Poppins', sans-serif;" rows="5">{{ $settings['venue']->where('key', 'venue_biodiversity_list')->first()->value ?? '' }}</textarea>
            </div>
        </div>

        <div class="card">
            <h3 style="margin-bottom: 20px; color: var(--admin-sidebar); border-bottom: 2px solid var(--admin-border); padding-bottom: 10px;">
                Accessibility Section
            </h3>
            
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">{{ $settings['venue']->where('key', 'venue_accessibility_title')->first()->label ?? 'Accessibility Title' }}</label>
                <input type="text" name="venue_accessibility_title" value="{{ $settings['venue']->where('key', 'venue_accessibility_title')->first()->value ?? '' }}" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">{{ $settings['venue']->where('key', 'venue_accessibility_text')->first()->label ?? 'Accessibility Text' }}</label>
                <textarea name="venue_accessibility_text" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-family: 'Poppins', sans-serif;" rows="4">{{ $settings['venue']->where('key', 'venue_accessibility_text')->first()->value ?? '' }}</textarea>
            </div>
        </div>

        <div class="card">
            <h3 style="margin-bottom: 20px; color: var(--admin-sidebar); border-bottom: 2px solid var(--admin-border); padding-bottom: 10px;">
                Conference Facilities Section
            </h3>
            
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">{{ $settings['venue']->where('key', 'venue_facilities_title')->first()->label ?? 'Facilities Title' }}</label>
                <input type="text" name="venue_facilities_title" value="{{ $settings['venue']->where('key', 'venue_facilities_title')->first()->value ?? '' }}" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px;">{{ $settings['venue']->where('key', 'venue_facilities_text')->first()->label ?? 'Facilities Text' }}</label>
                <textarea name="venue_facilities_text" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-family: 'Poppins', sans-serif;" rows="4">{{ $settings['venue']->where('key', 'venue_facilities_text')->first()->value ?? '' }}</textarea>
            </div>
        </div>

        <div style="margin-bottom: 40px; text-align: right;">
            <button type="submit" class="btn" style="padding: 12px 30px; font-size: 1rem;">
                <i class="fa-solid fa-save"></i> Save All Changes
            </button>
        </div>
    </form>
@endsection
