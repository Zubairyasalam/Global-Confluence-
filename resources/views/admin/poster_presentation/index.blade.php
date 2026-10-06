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
</style>

<div class="event-admin-wrap">

    <!-- Top Action Bar -->
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
        <div>
            <h2 style="font-size: 1.7rem; font-weight: 800; color: #0a192f; margin: 0 0 4px 0;">
                <i class="fa-solid fa-image" style="color: #00A896; margin-right: 8px;"></i> Poster Presentation CMS
            </h2>
            <p style="color: #64748b; font-size: 0.95rem; margin: 0;">Customize poster dimensions, orientation rules, guidelines, and display schedules.</p>
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
                    <i class="fa-solid fa-list-check" style="color: #00A896;"></i> 2. Poster Specifications & Guidelines
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

                <div style="margin-bottom: 20px;">
                    <label class="form-label">Poster Structure & Formatting Guidelines (HTML Supported)</label>
                    <textarea name="poster_guidelines_content" rows="6" class="form-input">{{ $settings['poster_guidelines_content'] ?? '1. Poster title, author names, affiliations, and conflict of interest disclosure should be prominently displayed at top.\n2. Organize content logically: Background, Methods, Results, Discussion, Conclusion, and References.\n3. Use high-resolution charts, clear typography, and avoid long dense paragraphs.' }}</textarea>
                </div>

                <div style="text-align: right;">
                    <button type="submit" class="btn" style="background: linear-gradient(135deg, #00A896, #028090); color: #ffffff; padding: 13px 34px; border-radius: 10px; font-weight: 800; font-size: 1rem; border: none; cursor: pointer; box-shadow: 0 4px 15px rgba(0, 168, 150, 0.35); display: inline-flex; align-items: center; gap: 8px;">
                        <i class="fa-solid fa-floppy-disk"></i> Save Poster Presentation Content
                    </button>
                </div>
            </div>

        </div>
    </form>

</div>
@endsection
