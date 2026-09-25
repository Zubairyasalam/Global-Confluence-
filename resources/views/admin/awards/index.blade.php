@extends('layouts.admin_cms')

@section('header_title', 'Conference Awards CMS Settings')

@section('content')
<style>
    .page-title {
        color: #1a237e;
        font-size: 1.8rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
    }
    .page-title::before {
        content: '';
        display: block;
        width: 6px;
        height: 28px;
        background: linear-gradient(180deg, #009688 0%, #00796b 100%);
        border-radius: 10px;
    }

    .success-alert {
        background-color: #e8f5e9;
        color: #2e7d32;
        border: 1px solid #c8e6c9;
        border-radius: 8px;
        padding: 15px 20px;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 500;
    }

    .config-card {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        border: 1px solid #f1f5f9;
        padding: 30px;
        margin-bottom: 30px;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        border-bottom: 1px solid #f1f5f9;
        padding-bottom: 15px;
    }

    .card-title {
        color: #1e293b;
        font-size: 1.25rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .card-title i {
        color: #009688;
    }

    .form-group {
        margin-bottom: 20px;
    }
    .form-label {
        display: block;
        font-weight: 600;
        color: #475569;
        margin-bottom: 8px;
        font-size: 0.9rem;
    }
    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        font-family: inherit;
        font-size: 0.95rem;
        color: #334155;
        transition: all 0.3s;
        box-sizing: border-box;
    }
    .form-control:focus {
        border-color: #009688;
        outline: none;
        box-shadow: 0 0 0 3px rgba(0, 150, 136, 0.1);
    }

    .btn-save {
        background: #009688;
        color: #ffffff;
        border: none;
        padding: 12px 32px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 1.05rem;
        cursor: pointer;
        transition: background 0.3s, transform 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .btn-save:hover {
        background: #00796b;
        transform: translateY(-1px);
    }

    .btn-add {
        background: #f1f5f9;
        color: #0f172a;
        border: 1px dashed #cbd5e1;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .btn-add:hover {
        background: #e2e8f0;
        border-color: #009688;
        color: #009688;
    }

    .btn-delete-item {
        background: rgba(239, 68, 68, 0.1);
        color: #ef4444;
        border: 1px solid rgba(239, 68, 68, 0.2);
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 0.8rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
    }
    .btn-delete-item:hover {
        background: #ef4444;
        color: #ffffff;
    }

    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .grid-3 {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .card-box-item {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 15px;
    }
    .badge-item {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #009688;
        color: #ffffff;
        font-weight: 800;
        font-size: 0.85rem;
        padding: 4px 12px;
        border-radius: 20px;
        margin-bottom: 15px;
    }

    @media (max-width: 768px) {
        .grid-2, .grid-3 { grid-template-columns: 1fr; }
    }
</style>

<div class="page-title">Conference Awards Settings</div>

@if(session('success'))
    <div class="success-alert">
        <i class="fa-solid fa-circle-check" style="font-size: 1.2rem;"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

<form method="POST" action="{{ route('admin.awards.settings.update') }}">
    @csrf

    <!-- SECTION 1: HEADER TITLE & SUBTITLE -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-trophy"></i>
                1. Header Section Settings
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Section Heading Title</label>
            <input type="text" name="awards_section_title" class="form-control" value="{{ $settings['awards_section_title'] ?? 'CONFERENCE AWARDS' }}">
        </div>

        <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label">Section Subtitle / Description</label>
            <textarea name="awards_section_sub" class="form-control" rows="2">{{ $settings['awards_section_sub'] ?? 'Celebrating exceptional scholastic achievements, research excellence, and entrepreneurial vision with cash prizes and distiction.' }}</textarea>
        </div>
    </div>

    <!-- SECTION 2: AWARD ITEMS -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-award"></i>
                2. Conference Awards List
            </div>
            <button type="button" class="btn-add" onclick="addAwardCard()">
                <i class="fa-solid fa-plus"></i> Add Award Card
            </button>
        </div>

        <div id="awards-items-wrapper">
            @for($i = 1; $i <= 20; $i++)
                @if(isset($settings['award_' . $i . '_title']))
                <div class="card-box-item">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                        <div class="badge-item"><i class="fa-solid fa-medal"></i> Award Card</div>
                        <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
                    </div>
                    <div class="grid-3">
                        <div class="form-group" style="grid-column: span 2; margin-bottom: 0;">
                            <label class="form-label">Award Title (Supports line breaks)</label>
                            <textarea name="award_titles[]" class="form-control" rows="2">{{ $settings['award_' . $i . '_title'] }}</textarea>
                        </div>
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label">Cash Prize Amount</label>
                            <input type="text" name="award_amounts[]" class="form-control" value="{{ $settings['award_' . $i . '_amount'] ?? '₹ 25,000' }}">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top: 15px; margin-bottom: 0;">
                        <label class="form-label">FontAwesome Icon Class</label>
                        <input type="text" name="award_icons[]" class="form-control" value="{{ $settings['award_' . $i . '_icon'] ?? 'fa-solid fa-award' }}">
                    </div>
                </div>
                @endif
            @endfor
        </div>
    </div>

    <!-- SECTION 3: BOTTOM DARK BLUE BANNER -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-ribbon"></i>
                3. Bottom Blue Banner Note
            </div>
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Banner Icon Class</label>
                <input type="text" name="awards_footer_icon" class="form-control" value="{{ $settings['awards_footer_icon'] ?? 'fa-solid fa-medal' }}">
            </div>
            <div class="form-group">
                <label class="form-label">Banner Note Text (Supports line breaks)</label>
                <textarea name="awards_footer_note" class="form-control" rows="2">{{ $settings['awards_footer_note'] ?? "Prizes will be awarded for best Oral, Poster\nPresentations and Best Innovation Pitch" }}</textarea>
            </div>
        </div>
    </div>

    <!-- Sticky Save Button -->
    <div style="position: sticky; bottom: 20px; z-index: 100; text-align: right; background: rgba(255,255,255,0.9); padding: 15px; border-radius: 12px; box-shadow: 0 5px 25px rgba(0,0,0,0.1); backdrop-filter: blur(8px); border: 1px solid #e2e8f0;">
        <button type="submit" class="btn-save">
            <i class="fa-solid fa-floppy-disk"></i> Save Awards Settings
        </button>
    </div>
</form>

<script>
function addAwardCard() {
    const html = `
    <div class="card-box-item">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
            <div class="badge-item"><i class="fa-solid fa-medal"></i> New Award Card</div>
            <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
        </div>
        <div class="grid-3">
            <div class="form-group" style="grid-column: span 2; margin-bottom: 0;">
                <label class="form-label">Award Title</label>
                <textarea name="award_titles[]" class="form-control" rows="2" placeholder="Award Title"></textarea>
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Cash Prize Amount</label>
                <input type="text" name="award_amounts[]" class="form-control" value="₹ 25,000" placeholder="₹ 25,000">
            </div>
        </div>
        <div class="form-group" style="margin-top: 15px; margin-bottom: 0;">
            <label class="form-label">FontAwesome Icon Class</label>
            <input type="text" name="award_icons[]" class="form-control" value="fa-solid fa-award" placeholder="fa-solid fa-award">
        </div>
    </div>`;
    document.getElementById('awards-items-wrapper').insertAdjacentHTML('beforeend', html);
}
</script>
@endsection
