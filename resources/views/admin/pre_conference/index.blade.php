@extends('layouts.admin_cms')

@section('header_title', 'Pre-Conference CMS Settings')

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

<div class="page-title">Pre-Conference Settings</div>

@if(session('success'))
    <div class="success-alert">
        <i class="fa-solid fa-circle-check" style="font-size: 1.2rem;"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

<form method="POST" action="{{ route('admin.pre_conference.update') }}" enctype="multipart/form-data">
    @csrf

    <!-- SECTION 1: PREAMBLE -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-book-open"></i>
                1. Preamble
            </div>
        </div>
        <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label">Preamble Text</label>
            <textarea name="pre_conf_preamble" class="form-control" rows="6">{{ $settings['pre_conf_preamble'] ?? '' }}</textarea>
        </div>
    </div>

    <!-- SECTION 2: OBJECTIVES -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-bullseye" style="color: #f59e0b;"></i>
                2. Key Objectives
            </div>
            <button type="button" class="btn-add" onclick="addObjectiveRow()">
                <i class="fa-solid fa-plus"></i> Add Objective
            </button>
        </div>

        <div id="objectives-wrapper">
            @for($i = 1; $i <= 20; $i++)
                @if(isset($settings['pre_conf_obj_' . $i]))
                <div class="card-box-item" style="display: flex; gap: 15px; align-items: center;">
                    <div style="flex-grow: 1;">
                        <input type="text" name="pre_conf_obj[]" class="form-control" value="{{ $settings['pre_conf_obj_' . $i] }}">
                    </div>
                    <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i></button>
                </div>
                @endif
            @endfor
        </div>
    </div>

    <!-- SECTION 3: SCHEDULE -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-regular fa-calendar-days" style="color: #3b82f6;"></i>
                3. Schedule for the Pre-Conference
            </div>
        </div>
        
        <div class="form-group">
            <label class="form-label">Schedule Note (Date, Venue, Mode)</label>
            <input type="text" name="pre_conf_schedule_note" class="form-control" value="{{ $settings['pre_conf_schedule_note'] ?? 'Proposed date: 25th September 2026 | Venue: Blue-whale auditorium, MMIP | Mode: Hybrid' }}">
        </div>
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin: 30px 0 15px 0;">
            <h3 style="margin: 0; font-size: 1.1rem; color: #1e293b;">Resource Persons</h3>
            <button type="button" class="btn-add" onclick="addSpeakerRow()">
                <i class="fa-solid fa-plus"></i> Add Resource Person
            </button>
        </div>

        <div id="speakers-wrapper">
            @for($i = 1; $i <= 30; $i++)
                @if(isset($settings['pre_conf_speaker_' . $i . '_name']))
                <div class="card-box-item">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                        <div class="badge-item"><i class="fa-solid fa-user"></i> Resource Person {{ $i }}</div>
                        <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
                    </div>
                    <div class="grid-2">
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <input type="text" name="speaker_names[]" class="form-control" value="{{ $settings['pre_conf_speaker_' . $i . '_name'] }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Image</label>
                            <div style="display: flex; gap: 10px; align-items: center;">
                                @if(!empty($settings['pre_conf_speaker_' . $i . '_image']))
                                    <img src="{{ asset($settings['pre_conf_speaker_' . $i . '_image']) }}" style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px;">
                                @endif
                                <input type="file" name="speaker_images[]" class="form-control" style="padding: 9px 15px;">
                                <input type="hidden" name="old_speaker_images[]" value="{{ $settings['pre_conf_speaker_' . $i . '_image'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="grid-2">
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label">Affiliation</label>
                            <textarea name="speaker_affiliations[]" class="form-control" rows="2">{{ $settings['pre_conf_speaker_' . $i . '_affiliation'] ?? '' }}</textarea>
                        </div>
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label">Expertise</label>
                            <textarea name="speaker_expertises[]" class="form-control" rows="2">{{ $settings['pre_conf_speaker_' . $i . '_expertise'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
                @endif
            @endfor
        </div>
        
        <div class="form-group" style="margin-top: 30px;">
            <label class="form-label">Final Row Note (e.g. Panel Discussion)</label>
            <input type="text" name="pre_conf_panel" class="form-control" value="{{ $settings['pre_conf_panel'] ?? 'Panel discussion with Doctors and health care experts (Tentative)' }}">
        </div>
    </div>

    <!-- Sticky Save Button -->
    <div style="position: sticky; bottom: 20px; z-index: 100; text-align: right; background: rgba(255,255,255,0.9); padding: 15px; border-radius: 12px; box-shadow: 0 5px 25px rgba(0,0,0,0.1); backdrop-filter: blur(8px); border: 1px solid #e2e8f0;">
        <button type="submit" class="btn-save">
            <i class="fa-solid fa-floppy-disk"></i> Save Pre-Conference Settings
        </button>
    </div>
</form>

<script>
function addObjectiveRow() {
    const html = `
    <div class="card-box-item" style="display: flex; gap: 15px; align-items: center;">
        <div style="flex-grow: 1;">
            <input type="text" name="pre_conf_obj[]" class="form-control" placeholder="Enter objective...">
        </div>
        <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i></button>
    </div>`;
    document.getElementById('objectives-wrapper').insertAdjacentHTML('beforeend', html);
}

function addSpeakerRow() {
    const html = `
    <div class="card-box-item">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
            <div class="badge-item"><i class="fa-solid fa-user"></i> New Resource Person</div>
            <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
        </div>
        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Name</label>
                <input type="text" name="speaker_names[]" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <label class="form-label">Image</label>
                <div style="display: flex; gap: 10px; align-items: center;">
                    <input type="file" name="speaker_images[]" class="form-control" style="padding: 9px 15px;">
                    <input type="hidden" name="old_speaker_images[]" value="">
                </div>
            </div>
        </div>
        <div class="grid-2">
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Affiliation</label>
                <textarea name="speaker_affiliations[]" class="form-control" rows="2"></textarea>
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Expertise</label>
                <textarea name="speaker_expertises[]" class="form-control" rows="2"></textarea>
            </div>
        </div>
    </div>`;
    document.getElementById('speakers-wrapper').insertAdjacentHTML('beforeend', html);
}
</script>
@endsection
