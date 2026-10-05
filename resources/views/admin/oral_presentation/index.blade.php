@extends('layouts.admin_cms')

@section('header_title', 'Oral Presentation Content Management')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 1px solid var(--admin-border); padding-bottom: 15px;">
        <div>
            <h3 style="color: var(--admin-sidebar); margin-bottom: 5px;">Oral Presentation & Abstract Submission Management</h3>
            <p style="font-size: 0.9rem; color: #64748b;">Edit all abstract submission guidelines, formatting rules, slide specifications, and presentation delivery conduct.</p>
        </div>
        <button type="submit" form="oralForm" class="btn" style="background-color: var(--admin-primary); padding: 10px 24px; font-size: 0.95rem;">
            <i class="fa-solid fa-floppy-disk" style="margin-right: 6px;"></i> Save Changes
        </button>
    </div>

    @if(session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 15px; border-radius: 8px; margin-bottom: 25px; border-left: 4px solid #10b981; font-weight: 500;">
            <i class="fa-solid fa-circle-check" style="margin-right: 8px;"></i> {{ session('success') }}
        </div>
    @endif

    <form id="oralForm" action="{{ route('admin.oral_presentation.update') }}" method="POST">
        @csrf

        <div style="display: flex; flex-direction: column; gap: 20px;">

            <div>
                <label style="display: block; font-weight: 600; margin-bottom: 8px;">Page Banner Title</label>
                <input type="text" name="oral_banner_title" value="{{ $settings['oral_banner_title'] ?? 'ORAL PRESENTATION' }}" class="form-control" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--admin-border);">
            </div>

            <div>
                <label style="display: block; font-weight: 600; margin-bottom: 8px;">Main Section Heading</label>
                <input type="text" name="oral_section_title" value="{{ $settings['oral_section_title'] ?? 'Abstract Submission & Oral Presentation Guidelines' }}" class="form-control" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--admin-border);">
            </div>

            <div>
                <label style="display: block; font-weight: 600; margin-bottom: 8px;">Abstract Submission Announcement Text</label>
                <textarea name="oral_announcement" rows="5" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid var(--admin-border); font-size: 0.95rem; line-height: 1.6;">{{ $settings['oral_announcement'] ?? 'We are delighted to announce the "International Conference on..." and invite abstract submissions from scientists, academicians, industry professionals, research scholars, and students working in the broader theme of One Health. This global gathering strives to provide a platform for dissemination of innovative research, and exchange of ideas and scientific discussions. Participants are encouraged to share their work through oral or poster presentations.' }}</textarea>
            </div>

            <div style="margin-top: 20px; text-align: right;">
                <button type="submit" class="btn" style="padding: 12px 30px; font-size: 1rem;">
                    <i class="fa-solid fa-floppy-disk" style="margin-right: 8px;"></i> Save Oral Presentation Content
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
