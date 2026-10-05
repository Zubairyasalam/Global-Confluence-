@extends('layouts.admin_cms')

@section('header_title', 'Poster Presentation Content Management')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 1px solid var(--admin-border); padding-bottom: 15px;">
        <div>
            <h3 style="color: var(--admin-sidebar); margin-bottom: 5px;">Poster Presentation Page Management</h3>
            <p style="font-size: 0.9rem; color: #64748b;">Edit all guidelines, dimensions, font requirements, and presenter instructions for the Poster Presentation page.</p>
        </div>
        <button type="submit" form="posterForm" class="btn" style="background-color: var(--admin-primary); padding: 10px 24px; font-size: 0.95rem;">
            <i class="fa-solid fa-floppy-disk" style="margin-right: 6px;"></i> Save Changes
        </button>
    </div>

    @if(session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 15px; border-radius: 8px; margin-bottom: 25px; border-left: 4px solid #10b981; font-weight: 500;">
            <i class="fa-solid fa-circle-check" style="margin-right: 8px;"></i> {{ session('success') }}
        </div>
    @endif

    <form id="posterForm" action="{{ route('admin.poster_presentation.update') }}" method="POST">
        @csrf

        <div style="display: flex; flex-direction: column; gap: 20px;">

            <div>
                <label style="display: block; font-weight: 600; margin-bottom: 8px;">Page Banner Title</label>
                <input type="text" name="poster_banner_title" value="{{ $settings['poster_banner_title'] ?? 'POSTER PRESENTATION' }}" class="form-control" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--admin-border);">
            </div>

            <div>
                <label style="display: block; font-weight: 600; margin-bottom: 8px;">Main Section Heading</label>
                <input type="text" name="poster_section_title" value="{{ $settings['poster_section_title'] ?? 'Poster Presentation Guidelines & Details' }}" class="form-control" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--admin-border);">
            </div>

            <div>
                <label style="display: block; font-weight: 600; margin-bottom: 8px;">Main Poster Guidelines Text</label>
                <textarea name="poster_main_content" rows="6" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid var(--admin-border); font-size: 0.95rem; line-height: 1.6;">{{ $settings['poster_main_content'] ?? 'Posters should be prepared in portrait orientation (A0 size, 841 × 1189 mm, unless the organisers specify otherwise) and displayed for the full poster session, with the presenter standing beside it during the assigned time to discuss the work with attendees. The poster should include the title, authors, affiliations, and a conflict-of-interest disclosure at the top, followed by a clear flow of Background, Methods, Results, Conclusions, and References, using concise text, a readable font (title 80 pt or larger, body text at least 24 pt), and clear graphs, tables, and images instead of long paragraphs. For Track 1 (Medical Practitioners). For Track 6 (Industry). Presenters should bring a printed poster, mount it before the session begins, and be ready to give a 2-3 minute summary to visitors.' }}</textarea>
            </div>

            <div style="border-top: 1px dashed var(--admin-border); padding-top: 20px;">
                <h4 style="margin-bottom: 15px; color: var(--admin-sidebar);">Specification Cards:</h4>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
                    <div>
                        <label style="display: block; font-weight: 600; margin-bottom: 6px;">Card 1: Dimensions Title</label>
                        <input type="text" name="poster_dim_title" value="{{ $settings['poster_dim_title'] ?? 'Dimensions & Layout' }}" style="width: 100%; padding: 8px; border-radius: 6px; border: 1px solid var(--admin-border); margin-bottom: 8px;">
                        <label style="display: block; font-weight: 600; margin-bottom: 6px;">Card 1: Description</label>
                        <input type="text" name="poster_dim_desc" value="{{ $settings['poster_dim_desc'] ?? 'Portrait orientation — A0 Size (841 × 1189 mm) unless specified otherwise.' }}" style="width: 100%; padding: 8px; border-radius: 6px; border: 1px solid var(--admin-border);">
                    </div>

                    <div>
                        <label style="display: block; font-weight: 600; margin-bottom: 6px;">Card 2: Font Specifications Title</label>
                        <input type="text" name="poster_font_title" value="{{ $settings['poster_font_title'] ?? 'Font Specifications' }}" style="width: 100%; padding: 8px; border-radius: 6px; border: 1px solid var(--admin-border); margin-bottom: 8px;">
                        <label style="display: block; font-weight: 600; margin-bottom: 6px;">Card 2: Description</label>
                        <input type="text" name="poster_font_desc" value="{{ $settings['poster_font_desc'] ?? 'Title: 80 pt or larger | Body Text: At least 24 pt (Concise & Readable)' }}" style="width: 100%; padding: 8px; border-radius: 6px; border: 1px solid var(--admin-border);">
                    </div>

                    <div>
                        <label style="display: block; font-weight: 600; margin-bottom: 6px;">Card 3: Verbal Summary Title</label>
                        <input type="text" name="poster_summary_title" value="{{ $settings['poster_summary_title'] ?? 'Verbal Summary' }}" style="width: 100%; padding: 8px; border-radius: 6px; border: 1px solid var(--admin-border); margin-bottom: 8px;">
                        <label style="display: block; font-weight: 600; margin-bottom: 6px;">Card 3: Description</label>
                        <input type="text" name="poster_summary_desc" value="{{ $settings['poster_summary_desc'] ?? 'Presenters should be ready to give a 2–3 minute summary to visitors and judges.' }}" style="width: 100%; padding: 8px; border-radius: 6px; border: 1px solid var(--admin-border);">
                    </div>
                </div>
            </div>

            <div style="margin-top: 20px; text-align: right;">
                <button type="submit" class="btn" style="padding: 12px 30px; font-size: 1rem;">
                    <i class="fa-solid fa-floppy-disk" style="margin-right: 8px;"></i> Save Poster Content
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
