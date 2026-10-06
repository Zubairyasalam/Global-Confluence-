@extends('layouts.admin_cms')

@section('header_title', 'Poster Presentation CMS')

@section('content')
<style>
    .event-admin-wrap {
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

    .dynamic-item-row {
        display: flex;
        align-items: center;
        gap: 12px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 12px 16px;
        margin-bottom: 10px;
        transition: all 0.2s ease;
    }

    .dynamic-item-row:hover {
        border-color: #00A896;
        background: #ffffff;
    }
</style>

<div class="event-admin-wrap">

    <!-- Top Action Bar -->
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
        <div>
            <h2 style="font-size: 1.7rem; font-weight: 800; color: #0a192f; margin: 0 0 4px 0;">
                <i class="fa-solid fa-image" style="color: #00A896; margin-right: 8px;"></i> Poster Presentation CMS
            </h2>
            <p style="color: #64748b; font-size: 0.95rem; margin: 0;">Customize poster dimensions, orientation rules, guidelines, and display schedules with full Add/Edit/Delete.</p>
        </div>
        <div style="display: flex; gap: 12px; align-items: center;">
            <a href="/events/poster-presentation" target="_blank" style="background: #ffffff; color: #0f172a; border: 1.5px solid #cbd5e1; padding: 11px 20px; border-radius: 10px; font-weight: 700; font-size: 0.92rem; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
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
        $bannerTitle = $settings['poster_banner_title'] ?? 'POSTER PRESENTATION';
        $sectionTitle = $settings['poster_section_title'] ?? 'Poster Presentation Guidelines & Details';
        $mainContent = $settings['poster_main_content'] ?? 'Posters should be prepared in portrait orientation (A0 size, 841 × 1189 mm) and displayed for the full poster session, with the presenter standing beside it during assigned adjudication rounds.';

        $defaultGuidelines = [
            'Top Section: Include Title, Authors, Affiliations, and Conflict-of-Interest disclosure at the top of the poster.',
            'Content Structure: Ensure a clear flow of Background, Methods, Results, Conclusions, and References.',
            'Visual Elements: Use clear graphs, tables, and high-resolution images instead of long paragraphs.',
            'Applicable Tracks: Dedicated guidelines for Track 1 (Medical Practitioners) and Track 6 (Industry).',
            'On-Site Requirement: Presenters must bring a printed poster, mount it before the session begins, and remain beside it during the assigned time.'
        ];

        $guidelineList = !empty($guidelines) ? $guidelines : $defaultGuidelines;
    @endphp

    <!-- 1. LIVE VISUAL PREVIEW -->
    <div style="background: #f8fafc; border-radius: 20px; border: 2px solid #e2e8f0; overflow: hidden; box-shadow: 0 10px 35px rgba(15, 23, 42, 0.06); position: relative;">
        <div style="position: absolute; top: 15px; right: 20px; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; color: #00A896; background: rgba(255, 255, 255, 0.95); padding: 5px 14px; border-radius: 20px; border: 1px solid #b2dfdb; z-index: 10;">
            <i class="fa-solid fa-eye"></i> Live Visual Preview
        </div>

        <div style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); padding: 55px 20px 45px; text-align: center; color: #fff;">
            <h1 style="text-transform: uppercase; font-size: 2rem; font-weight: 800; letter-spacing: 1.5px; color: #ffffff; margin: 0;">
                {{ $bannerTitle }}
            </h1>
        </div>

        <div style="padding: 40px 30px; max-width: 950px; margin: 0 auto; font-family: 'Poppins', sans-serif;">
            <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; padding: 35px 30px; box-shadow: 0 6px 20px rgba(0,0,0,0.03);">
                <h2 style="font-size: 1.5rem; font-weight: 800; color: #0f172a; margin: 0 0 18px 0; border-bottom: 3px solid #00A896; padding-bottom: 10px; display: inline-block;">
                    {{ $sectionTitle }}
                </h2>

                <div style="background: #f0fdf4; border-left: 4px solid #10b981; border-radius: 10px; padding: 18px 22px; margin-bottom: 25px; color: #334155; line-height: 1.7; font-size: 0.95rem;">
                    {{ $mainContent }}
                </div>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 15px; margin-bottom: 25px;">
                    <div style="background: #f8fafc; border-left: 4px solid #00A896; border-radius: 8px; padding: 15px;">
                        <h4 style="color: #0f172a; font-size: 0.95rem; font-weight: 700; margin: 0 0 4px 0;"><i class="fa-solid fa-ruler-combined" style="color: #00A896;"></i> Dimensions</h4>
                        <p style="color: #475569; font-size: 0.85rem; margin: 0;">{{ $settings['poster_spec_size'] ?? 'A0 Size (841 mm × 1189 mm)' }}</p>
                    </div>
                    <div style="background: #f8fafc; border-left: 4px solid #00A896; border-radius: 8px; padding: 15px;">
                        <h4 style="color: #0f172a; font-size: 0.95rem; font-weight: 700; margin: 0 0 4px 0;"><i class="fa-solid fa-arrows-up-down" style="color: #00A896;"></i> Orientation</h4>
                        <p style="color: #475569; font-size: 0.85rem; margin: 0;">{{ $settings['poster_spec_orientation'] ?? 'Vertical / Portrait Mode Only' }}</p>
                    </div>
                    <div style="background: #f8fafc; border-left: 4px solid #00A896; border-radius: 8px; padding: 15px;">
                        <h4 style="color: #0f172a; font-size: 0.95rem; font-weight: 700; margin: 0 0 4px 0;"><i class="fa-solid fa-medal" style="color: #00A896;"></i> Awards</h4>
                        <p style="color: #475569; font-size: 0.85rem; margin: 0;">{{ $settings['poster_spec_award'] ?? 'Best Poster Awards across all 6 Tracks' }}</p>
                    </div>
                </div>

                <!-- Guidelines Preview -->
                <h4 style="color: #0f172a; font-size: 1.1rem; font-weight: 700; margin-bottom: 12px;"><i class="fa-solid fa-circle-check" style="color: #00A896;"></i> Poster Presentation Rules</h4>
                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px;">
                    @foreach($guidelineList as $g)
                        <li style="display: flex; align-items: flex-start; gap: 10px; color: #334155; font-size: 0.92rem; line-height: 1.6;">
                            <i class="fa-solid fa-check" style="color: #00A896; margin-top: 3px;"></i>
                            <span>{{ $g }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- 2. EDIT FORM -->
    <form action="{{ route('admin.poster_presentation.update') }}" method="POST">
        @csrf

        <div style="display: flex; flex-direction: column; gap: 30px;">
            
            <div class="admin-card-section">
                <h3 style="margin: 0 0 18px 0; font-size: 1.25rem; font-weight: 700; color: #0f172a; display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-pen-to-square" style="color: #00A896;"></i> 1. Page Header & Main Content
                </h3>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label class="form-label">Hero Banner Title</label>
                        <input type="text" name="poster_banner_title" value="{{ $bannerTitle }}" class="form-input" required>
                    </div>
                    <div>
                        <label class="form-label">Main Section Heading</label>
                        <input type="text" name="poster_section_title" value="{{ $sectionTitle }}" class="form-input" required>
                    </div>
                </div>

                <div style="margin-bottom: 20px;">
                    <label class="form-label">Main Description Paragraph</label>
                    <textarea name="poster_main_content" rows="4" class="form-input" required>{{ $mainContent }}</textarea>
                </div>
            </div>

            <div class="admin-card-section">
                <h3 style="margin: 0 0 18px 0; font-size: 1.25rem; font-weight: 700; color: #0f172a; display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-list-check" style="color: #00A896;"></i> 2. Poster Specifications
                </h3>

                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label class="form-label">Dimensions</label>
                        <input type="text" name="poster_spec_size" value="{{ $settings['poster_spec_size'] ?? 'A0 Size (841 mm × 1189 mm)' }}" class="form-input">
                    </div>
                    <div>
                        <label class="form-label">Orientation</label>
                        <input type="text" name="poster_spec_orientation" value="{{ $settings['poster_spec_orientation'] ?? 'Vertical / Portrait Mode Only' }}" class="form-input">
                    </div>
                    <div>
                        <label class="form-label">Awards & Recognition</label>
                        <input type="text" name="poster_spec_award" value="{{ $settings['poster_spec_award'] ?? 'Best Poster Awards across all 6 Tracks' }}" class="form-input">
                    </div>
                </div>
            </div>

            <!-- Dynamic Guidelines Items (Add / Edit / Delete) -->
            <div class="admin-card-section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px; flex-wrap: wrap; gap: 10px;">
                    <div>
                        <h3 style="margin: 0 0 4px 0; font-size: 1.25rem; font-weight: 700; color: #0f172a; display: flex; align-items: center; gap: 8px;">
                            <i class="fa-solid fa-list-ol" style="color: #00A896;"></i> 3. Dynamic Poster Instructions & Guidelines
                        </h3>
                        <p style="color: #64748b; font-size: 0.9rem; margin: 0;">Add, edit in place, or delete poster instructions.</p>
                    </div>
                    <button type="button" onclick="addPosterGuidelineRow()" style="background: #e6fffa; color: #0d9488; border: 1.5px solid #99f6e4; padding: 9px 18px; border-radius: 8px; font-weight: 700; font-size: 0.88rem; cursor: pointer; display: inline-flex; align-items: center; gap: 6px;">
                        <i class="fa-solid fa-plus"></i> Add Instruction
                    </button>
                </div>

                <div id="poster-guidelines-container" style="display: flex; flex-direction: column; gap: 10px;">
                    @foreach($guidelineList as $idx => $item)
                        <div class="dynamic-item-row">
                            <i class="fa-solid fa-circle-check" style="color: #00A896; font-size: 1.15rem;"></i>
                            <input type="text" name="poster_guideline_items[]" value="{{ $item }}" class="form-input" style="flex: 1; padding: 10px 14px;" required placeholder="Enter poster instruction...">
                            <button type="button" onclick="this.closest('.dynamic-item-row').remove()" style="background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; width: 38px; height: 38px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center; flex-shrink: 0;" title="Delete item">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    @endforeach
                </div>

                <div style="text-align: right; margin-top: 25px;">
                    <button type="submit" class="btn" style="background: linear-gradient(135deg, #00A896, #028090); color: #ffffff; padding: 13px 34px; border-radius: 10px; font-weight: 800; font-size: 1rem; border: none; cursor: pointer; box-shadow: 0 4px 15px rgba(0, 168, 150, 0.35); display: inline-flex; align-items: center; gap: 8px;">
                        <i class="fa-solid fa-floppy-disk"></i> Save Poster Presentation Content
                    </button>
                </div>
            </div>

        </div>
    </form>

</div>

<script>
    function addPosterGuidelineRow() {
        const container = document.getElementById('poster-guidelines-container');
        const div = document.createElement('div');
        div.className = 'dynamic-item-row';
        div.innerHTML = `
            <i class="fa-solid fa-circle-check" style="color: #00A896; font-size: 1.15rem;"></i>
            <input type="text" name="poster_guideline_items[]" value="" class="form-input" style="flex: 1; padding: 10px 14px;" required placeholder="Enter new poster instruction...">
            <button type="button" onclick="this.closest('.dynamic-item-row').remove()" style="background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; width: 38px; height: 38px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center; flex-shrink: 0;" title="Delete item">
                <i class="fa-solid fa-trash-can"></i>
            </button>
        `;
        container.appendChild(div);
        div.querySelector('input').focus();
    }
</script>
@endsection
