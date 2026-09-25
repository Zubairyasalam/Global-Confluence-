@extends('layouts.admin_cms')

@section('header_title', 'About the Organizers Configuration')

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

    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .highlight-box {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 18px;
        margin-bottom: 15px;
    }
    .highlight-box-title {
        font-weight: 700;
        color: #009688;
        font-size: 0.9rem;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
</style>

<div class="page-title">About the Organizers Settings</div>

@if(session('success'))
    <div class="success-alert">
        <i class="fa-solid fa-circle-check" style="font-size: 1.2rem;"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

<form method="POST" action="{{ route('admin.about_organizer.update') }}">
    @csrf

    <!-- Header Settings Card -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-heading"></i>
                Section Header Information
            </div>
        </div>
        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Section Subtitle</label>
                <input type="text" name="org_section_subtitle" class="form-control" value="{{ $settings['org_section_subtitle'] ?? 'About The Organizers' }}">
            </div>
            <div class="form-group">
                <label class="form-label">Section Main Title</label>
                <input type="text" name="org_section_title" class="form-control" value="{{ $settings['org_section_title'] ?? 'Host Institutions & Departments' }}">
            </div>
        </div>
    </div>

    <!-- Tab 1: Madras Christian College -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-landmark"></i>
                Tab 1: Madras Christian College (MCC)
            </div>
        </div>
        
        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Sidebar Tab Title</label>
                <input type="text" name="mcc_tab_title" class="form-control" value="{{ $settings['mcc_tab_title'] ?? 'Madras Christian College' }}">
            </div>
            <div class="form-group">
                <label class="form-label">Sidebar Tab Subtitle</label>
                <input type="text" name="mcc_tab_sub" class="form-control" value="{{ $settings['mcc_tab_sub'] ?? 'MCC • Chennai' }}">
            </div>
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Content Tagline</label>
                <input type="text" name="mcc_tag" class="form-control" value="{{ $settings['mcc_tag'] ?? 'Madras Christian College' }}">
            </div>
            <div class="form-group">
                <label class="form-label">Content Heading Title</label>
                <input type="text" name="mcc_title" class="form-control" value="{{ $settings['mcc_title'] ?? 'A Legacy of Academic Excellence' }}">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Paragraph 1</label>
            <textarea name="mcc_p1" class="form-control" rows="3">{{ $settings['mcc_p1'] ?? '' }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Paragraph 2</label>
            <textarea name="mcc_p2" class="form-control" rows="3">{{ $settings['mcc_p2'] ?? '' }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Paragraph 3</label>
            <textarea name="mcc_p3" class="form-control" rows="3">{{ $settings['mcc_p3'] ?? '' }}</textarea>
        </div>

        <!-- MCC Key Highlights -->
        <h4 style="font-weight: 700; color: #1e293b; margin: 25px 0 15px 0; border-top: 1px solid #f1f5f9; padding-top: 20px;">
            <i class="fa-solid fa-list-check" style="color: #009688; margin-right: 8px;"></i> Key Highlights (Right Side Cards)
        </h4>

        @for($i = 1; $i <= 5; $i++)
        <div class="highlight-box">
            <div class="highlight-box-title">
                <i class="fa-solid fa-star"></i> Highlight Card {{ $i }}
            </div>
            <div class="grid-2">
                <div class="form-group" style="margin-bottom: 10px;">
                    <label class="form-label">Highlight Title</label>
                    <input type="text" name="mcc_feat{{ $i }}_title" class="form-control" value="{{ $settings['mcc_feat' . $i . '_title'] ?? '' }}">
                </div>
                <div class="form-group" style="margin-bottom: 10px;">
                    <label class="form-label">FontAwesome Icon Class</label>
                    <input type="text" name="mcc_feat{{ $i }}_icon" class="form-control" value="{{ $settings['mcc_feat' . $i . '_icon'] ?? '' }}" placeholder="fa-solid fa-landmark">
                </div>
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Highlight Subtitle / Description</label>
                <input type="text" name="mcc_feat{{ $i }}_sub" class="form-control" value="{{ $settings['mcc_feat' . $i . '_sub'] ?? '' }}">
            </div>
        </div>
        @endfor
    </div>

    <!-- Tab 2: MCC-MRF Innovation Park (MMIP) -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-rocket"></i>
                Tab 2: MCC-MRF Innovation Park (MMIP)
            </div>
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Sidebar Tab Title</label>
                <input type="text" name="mmip_tab_title" class="form-control" value="{{ $settings['mmip_tab_title'] ?? 'MCC-MRF Innovation Park' }}">
            </div>
            <div class="form-group">
                <label class="form-label">Sidebar Tab Subtitle</label>
                <input type="text" name="mmip_tab_sub" class="form-control" value="{{ $settings['mmip_tab_sub'] ?? 'MMIP' }}">
            </div>
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Content Tagline</label>
                <input type="text" name="mmip_tag" class="form-control" value="{{ $settings['mmip_tag'] ?? 'MCC-MRF Innovation Park' }}">
            </div>
            <div class="form-group">
                <label class="form-label">Content Heading Title</label>
                <input type="text" name="mmip_title" class="form-control" value="{{ $settings['mmip_title'] ?? 'A Pioneering Innovation Ecosystem' }}">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Paragraph 1</label>
            <textarea name="mmip_p1" class="form-control" rows="4">{{ $settings['mmip_p1'] ?? '' }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Paragraph 2</label>
            <textarea name="mmip_p2" class="form-control" rows="4">{{ $settings['mmip_p2'] ?? '' }}</textarea>
        </div>
    </div>

    <!-- Tab 3: Department of Microbiology -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-vial"></i>
                Tab 3: Department of Microbiology
            </div>
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Sidebar Tab Title</label>
                <input type="text" name="micro_tab_title" class="form-control" value="{{ $settings['micro_tab_title'] ?? 'Dept. of Microbiology' }}">
            </div>
            <div class="form-group">
                <label class="form-label">Sidebar Tab Subtitle</label>
                <input type="text" name="micro_tab_sub" class="form-control" value="{{ $settings['micro_tab_sub'] ?? 'Est. 2002 • Research Unit' }}">
            </div>
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Content Tagline</label>
                <input type="text" name="micro_tag" class="form-control" value="{{ $settings['micro_tag'] ?? 'Madras Christian College' }}">
            </div>
            <div class="form-group">
                <label class="form-label">Content Heading Title</label>
                <input type="text" name="micro_title" class="form-control" value="{{ $settings['micro_title'] ?? 'Department of Microbiology' }}">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Department Description</label>
            <textarea name="about_dept" class="form-control" rows="6">{{ $settings['about_dept'] ?? '' }}</textarea>
        </div>
    </div>

    <!-- Tab 4: Department of Chemistry (SFS) -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-flask-vial"></i>
                Tab 4: Department of Chemistry (SFS)
            </div>
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Sidebar Tab Title</label>
                <input type="text" name="chem_tab_title" class="form-control" value="{{ $settings['chem_tab_title'] ?? 'Dept. of Chemistry (SFS)' }}">
            </div>
            <div class="form-group">
                <label class="form-label">Sidebar Tab Subtitle</label>
                <input type="text" name="chem_tab_sub" class="form-control" value="{{ $settings['chem_tab_sub'] ?? 'Est. 2003 • M.Sc. Program' }}">
            </div>
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Content Tagline</label>
                <input type="text" name="chem_tag" class="form-control" value="{{ $settings['chem_tag'] ?? 'Madras Christian College' }}">
            </div>
            <div class="form-group">
                <label class="form-label">Content Heading Title</label>
                <input type="text" name="chem_title" class="form-control" value="{{ $settings['chem_title'] ?? 'Department of Chemistry (SFS)' }}">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Department Description</label>
            <textarea name="about_chemistry" class="form-control" rows="6">{{ $settings['about_chemistry'] ?? '' }}</textarea>
        </div>
    </div>

    <!-- Submit Button -->
    <div style="position: sticky; bottom: 20px; z-index: 100; text-align: right; background: rgba(255,255,255,0.9); padding: 15px; border-radius: 12px; box-shadow: 0 5px 25px rgba(0,0,0,0.1); backdrop-filter: blur(8px); border: 1px solid #e2e8f0;">
        <button type="submit" class="btn-save">
            <i class="fa-solid fa-floppy-disk"></i> Save All Changes
        </button>
    </div>
</form>
@endsection
