@extends('layouts.admin_cms')

@section('header_title', 'Visit & Places of Interest CMS')

@section('content')
<style>
    .visit-admin-wrap {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    .admin-card-section {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
    }

    .form-label {
        display: block;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 8px;
        font-size: 0.92rem;
    }

    .form-input {
        width: 100%;
        padding: 11px 15px;
        border: 1.5px solid #cbd5e1;
        border-radius: 8px;
        font-size: 0.95rem;
        color: #0f172a;
        font-family: inherit;
        transition: border-color 0.2s;
    }

    .form-input:focus {
        border-color: #00A896;
        outline: none;
    }

    .place-item-card {
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 14px;
        padding: 22px;
        display: grid;
        grid-template-columns: 140px 1fr auto;
        gap: 20px;
        align-items: start;
        transition: all 0.2s ease;
    }

    .place-item-card:hover {
        border-color: #00A896;
        background: #ffffff;
        box-shadow: 0 6px 20px rgba(0, 168, 150, 0.08);
    }

    @media (max-width: 768px) {
        .place-item-card {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="visit-admin-wrap">

    <!-- Top Action Bar -->
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
        <div>
            <h2 style="font-size: 1.7rem; font-weight: 800; color: #0a192f; margin: 0 0 4px 0;">
                <i class="fa-solid fa-map-location-dot" style="color: #00A896; margin-right: 8px;"></i> Visit & Places of Interest CMS
            </h2>
            <p style="color: #64748b; font-size: 0.95rem; margin: 0;">Customize destination cards, images, titles, and descriptions for the Visit page.</p>
        </div>
        <div style="display: flex; gap: 12px; align-items: center;">
            <a href="/venue" target="_blank" style="background: #ffffff; color: #0f172a; border: 1.5px solid #cbd5e1; padding: 11px 20px; border-radius: 10px; font-weight: 700; font-size: 0.92rem; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> View Live Page
            </a>
        </div>
    </div>

    @if(session('success'))
        <div style="background-color: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; border-radius: 12px; padding: 16px 20px; display: flex; align-items: center; gap: 10px; font-weight: 600;">
            <i class="fa-solid fa-circle-check" style="font-size: 1.3rem;"></i> {{ session('success') }}
        </div>
    @endif

    @php
        $heroTitle = $settings['visit_hero_title'] ?? 'VISIT';
        $sectionTitle = $settings['visit_section_title'] ?? 'Places of Interest in Chennai';
        $sectionSubtitle = $settings['visit_section_subtitle'] ?? 'Chennai, the vibrant capital of Tamil Nadu, offers a rich blend of cultural heritage, history, art and coastal beauty. Conference delegates may explore these iconic destinations:';
    @endphp

    <!-- 1. LIVE VISUAL PREVIEW (Exact match to Screenshot 4) -->
    <div style="background: #ffffff; border-radius: 20px; border: 2px solid #e2e8f0; overflow: hidden; box-shadow: 0 10px 35px rgba(15, 23, 42, 0.06); position: relative;">
        <div style="position: absolute; top: 15px; right: 20px; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; color: #00A896; background: rgba(255, 255, 255, 0.9); padding: 5px 14px; border-radius: 20px; border: 1px solid #b2dfdb; z-index: 10;">
            <i class="fa-solid fa-eye"></i> Live Visual Preview
        </div>

        <!-- Hero Banner Preview -->
        <div style="background: url('{{ asset('images/hero-bg.png') }}') center center/cover no-repeat; padding: 65px 20px 50px; position: relative; text-align: center;">
            <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(15, 23, 42, 0.88);"></div>
            <div style="position: relative; z-index: 1;">
                <h1 style="color: #ffffff; font-size: 2.3rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; margin: 0;">
                    {{ $heroTitle }}
                </h1>
            </div>
        </div>

        <!-- Section Header Preview -->
        <div style="padding: 45px 30px; background-color: #f8fafc;">
            <div style="text-align: center; margin-bottom: 40px; max-width: 850px; margin-left: auto; margin-right: auto;">
                <h2 style="color: #0f172a; font-size: 1.9rem; font-weight: 800; margin: 0 0 14px 0;">
                    {{ $sectionTitle }}
                </h2>
                <p style="color: #475569; font-size: 1rem; line-height: 1.7; margin: 0;">
                    {{ $sectionSubtitle }}
                </p>
            </div>

            <!-- 3-Column Preview of Places Cards -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; max-width: 1050px; margin: 0 auto;">
                @php
                    $previewPlaces = array_slice($places ?? [], 0, 3);
                @endphp
                @foreach($previewPlaces as $place)
                    <div style="background: #ffffff; border-radius: 14px; overflow: hidden; box-shadow: 0 6px 18px rgba(0,0,0,0.06); border: 1px solid #e2e8f0; display: flex; flex-direction: column;">
                        <div style="height: 170px; overflow: hidden;">
                            <img src="{{ asset($place['image'] ?? 'images/marina_beach.jpg') }}" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 20px;">
                            <h3 style="color: #009688; font-size: 1.15rem; font-weight: 700; margin: 0 0 8px 0;">
                                {{ $place['title'] }}
                            </h3>
                            <p style="color: #475569; font-size: 0.88rem; line-height: 1.6; margin: 0;">
                                {{ $place['desc'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            @if(count($places ?? []) > 3)
                <p style="text-align: center; color: #64748b; font-size: 0.88rem; margin-top: 25px; font-weight: 600;">
                    + {{ count($places) - 3 }} more places of interest active on live page
                </p>
            @endif
        </div>
    </div>

    <!-- 2. EDIT FORM -->
    <form method="POST" action="{{ route('admin.venue.update') }}" enctype="multipart/form-data">
        @csrf

        <div style="display: flex; flex-direction: column; gap: 30px;">

            <!-- Header Settings Card -->
            <div class="admin-card-section">
                <h3 style="margin: 0 0 18px 0; font-size: 1.25rem; font-weight: 700; color: #0f172a; display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-pen-to-square" style="color: #00A896;"></i> 1. Page Header & Section Content
                </h3>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label class="form-label">Hero Banner Title</label>
                        <input type="text" name="visit_hero_title" value="{{ $heroTitle }}" class="form-input" required>
                    </div>
                    <div>
                        <label class="form-label">Main Section Heading</label>
                        <input type="text" name="visit_section_title" value="{{ $sectionTitle }}" class="form-input" required>
                    </div>
                </div>

                <div>
                    <label class="form-label">Section Subtitle / Description</label>
                    <textarea name="visit_section_subtitle" rows="3" class="form-input" required>{{ $sectionSubtitle }}</textarea>
                </div>
            </div>

            <!-- Places of Interest Cards Manager -->
            <div class="admin-card-section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 22px; border-bottom: 1.5px solid #e2e8f0; padding-bottom: 15px;">
                    <h3 style="margin: 0; font-size: 1.25rem; font-weight: 700; color: #0f172a; display: flex; align-items: center; gap: 10px;">
                        <i class="fa-solid fa-layer-group" style="color: #00A896;"></i> 2. Places of Interest List ({{ count($places ?? []) }} Places)
                    </h3>
                </div>

                <!-- List of existing places -->
                <div id="placesContainer" style="display: flex; flex-direction: column; gap: 16px; margin-bottom: 30px;">
                    @foreach($places ?? [] as $index => $place)
                        <div class="place-item-card" id="place_row_{{ $index }}">
                            <div>
                                <img src="{{ asset($place['image'] ?? 'images/marina_beach.jpg') }}" id="preview_place_img_{{ $index }}" style="width: 100%; height: 100px; object-fit: cover; border-radius: 8px; border: 1px solid #cbd5e1; margin-bottom: 8px; display: block;">
                                <input type="hidden" name="place_existing_images[{{ $index }}]" value="{{ $place['image'] ?? '' }}">
                                <label style="font-size: 0.75rem; color: #00A896; font-weight: 700; cursor: pointer; display: block; text-align: center;">
                                    <i class="fa-solid fa-camera"></i> Change Photo
                                    <input type="file" name="place_new_images[{{ $index }}]" accept="image/*" style="display: none;" onchange="previewImg(this, 'preview_place_img_{{ $index }}')">
                                </label>
                            </div>

                            <div style="display: flex; flex-direction: column; gap: 10px;">
                                <div>
                                    <label class="form-label" style="font-size: 0.82rem; margin-bottom: 4px;">Place Title</label>
                                    <input type="text" name="place_titles[{{ $index }}]" value="{{ $place['title'] }}" class="form-input" style="padding: 8px 12px; font-weight: 700;" required>
                                </div>
                                <div>
                                    <label class="form-label" style="font-size: 0.82rem; margin-bottom: 4px;">Description</label>
                                    <textarea name="place_descs[{{ $index }}]" rows="2" class="form-input" style="padding: 8px 12px; font-size: 0.88rem;">{{ $place['desc'] }}</textarea>
                                </div>
                            </div>

                            <div>
                                <button type="button" onclick="removePlaceRow({{ $index }})" style="background: #fee2e2; color: #b91c1c; border: 1px solid #fca5a5; width: 36px; height: 36px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center;" title="Remove this place">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Add New Place Form Box -->
                <div style="background: #f0fdf4; border: 2px dashed #86efac; border-radius: 14px; padding: 25px;">
                    <h4 style="margin: 0 0 15px 0; color: #166534; font-size: 1.05rem; font-weight: 800; display: flex; align-items: center; gap: 8px;">
                        <i class="fa-solid fa-circle-plus"></i> Add Another Place of Interest
                    </h4>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                        <div>
                            <label class="form-label">Place Name</label>
                            <input type="text" name="new_place_title" placeholder="e.g. Mahabalipuram Shore Temple" class="form-input">
                        </div>
                        <div>
                            <label class="form-label">Upload Photo</label>
                            <input type="file" name="new_place_image" accept="image/*" class="form-input" style="background: #ffffff;">
                        </div>
                    </div>
                    <div>
                        <label class="form-label">Description</label>
                        <textarea name="new_place_desc" rows="2" placeholder="Brief summary of significance and attractions..." class="form-input"></textarea>
                    </div>
                </div>

                <div style="margin-top: 30px; text-align: right;">
                    <button type="submit" class="btn" style="background: linear-gradient(135deg, #00A896, #028090); color: #ffffff; padding: 14px 34px; border-radius: 10px; font-weight: 800; font-size: 1.05rem; border: none; cursor: pointer; box-shadow: 0 4px 15px rgba(0, 168, 150, 0.35); display: inline-flex; align-items: center; gap: 10px;">
                        <i class="fa-solid fa-floppy-disk"></i> Save All Visit Page Changes
                    </button>
                </div>
            </div>

        </div>
    </form>

</div>

<script>
function previewImg(input, targetImgId) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById(targetImgId).src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function removePlaceRow(index) {
    if (confirm('Are you sure you want to remove this place from the list?')) {
        const row = document.getElementById('place_row_' + index);
        if (row) {
            row.remove();
        }
    }
}
</script>
@endsection
