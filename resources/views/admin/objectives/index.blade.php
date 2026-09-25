@extends('layouts.admin_cms')

@section('header_title', 'Conference Objectives & Strategic Framework Settings')

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
        margin-bottom: 20px;
        position: relative;
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

<div class="page-title">Conference Objectives & Strategic Framework</div>

@if(session('success'))
    <div class="success-alert">
        <i class="fa-solid fa-circle-check" style="font-size: 1.2rem;"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

<form method="POST" action="{{ route('admin.objectives.update') }}">
    @csrf

    <!-- SECTION 1: CONFERENCE OBJECTIVES -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-bullseye"></i>
                1. Conference Objectives Cards
            </div>
            <button type="button" class="btn-add" onclick="addObjectiveItem()">
                <i class="fa-solid fa-plus"></i> Add Objective Card
            </button>
        </div>

        <div class="form-group">
            <label class="form-label">Section Heading Title</label>
            <input type="text" name="objectives_section_title" class="form-control" value="{{ $settings['objectives_section_title'] ?? 'Conference Objectives' }}">
        </div>

        <div id="objectives-wrapper">
            @php $count = 0; @endphp
            @for($i = 1; $i <= 20; $i++)
                @if(isset($settings['obj_' . $i . '_title']))
                @php $count++; @endphp
                <div class="card-box-item objective-item">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                        <div class="badge-item"><i class="fa-solid fa-star"></i> Objective Card</div>
                        <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
                    </div>
                    
                    <div class="grid-2">
                        <div class="form-group">
                            <label class="form-label">Objective Title</label>
                            <input type="text" name="obj_titles[]" class="form-control" value="{{ $settings['obj_' . $i . '_title'] }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">FontAwesome Icon Class</label>
                            <input type="text" name="obj_icons[]" class="form-control" value="{{ $settings['obj_' . $i . '_icon'] ?? 'fa-solid fa-check' }}">
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="form-label">Objective Description</label>
                        <textarea name="obj_descs[]" class="form-control" rows="2">{{ $settings['obj_' . $i . '_desc'] ?? '' }}</textarea>
                    </div>
                </div>
                @endif
            @endfor
        </div>
    </div>

    <!-- SECTION 2: WHO CAN ATTEND (PARTICIPANTS) -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-users"></i>
                2. Who Can Attend (Our Participants)
            </div>
            <button type="button" class="btn-add" onclick="addParticipantItem()">
                <i class="fa-solid fa-plus"></i> Add Category Card
            </button>
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Tagline (Top Text)</label>
                <input type="text" name="part_tag" class="form-control" value="{{ $settings['part_tag'] ?? 'WHO CAN ATTEND' }}">
            </div>
            <div class="form-group">
                <label class="form-label">Main Heading Title</label>
                <input type="text" name="part_title" class="form-control" value="{{ $settings['part_title'] ?? 'Our Participants' }}">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Section Subtitle / Description</label>
            <input type="text" name="part_sub" class="form-control" value="{{ $settings['part_sub'] ?? 'Join the confluence to bridge microbes, molecules & mankind for a sustainable future.' }}">
        </div>

        <div id="participants-wrapper">
            @for($i = 1; $i <= 20; $i++)
                @if(isset($settings['part_' . $i . '_label']))
                <div class="card-box-item participant-item">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                        <div class="badge-item"><i class="fa-solid fa-user"></i> Participant Category</div>
                        <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
                    </div>
                    <div class="grid-2">
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label">Category Name / Label</label>
                            <input type="text" name="part_labels[]" class="form-control" value="{{ $settings['part_' . $i . '_label'] }}">
                        </div>
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label">FontAwesome Icon Class</label>
                            <input type="text" name="part_icons[]" class="form-control" value="{{ $settings['part_' . $i . '_icon'] ?? 'fa-solid fa-user' }}">
                        </div>
                    </div>
                </div>
                @endif
            @endfor
        </div>
    </div>

    <!-- SECTION 3: KEY EXPECTED OUTCOMES -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-chart-line"></i>
                3. Key Expected Outcomes
            </div>
            <button type="button" class="btn-add" onclick="addOutcomeItem()">
                <i class="fa-solid fa-plus"></i> Add Outcome Card
            </button>
        </div>

        <div class="form-group">
            <label class="form-label">Section Heading Title</label>
            <input type="text" name="outcomes_title" class="form-control" value="{{ $settings['outcomes_title'] ?? 'Key Expected Outcomes' }}">
        </div>

        <div class="form-group">
            <label class="form-label">Section Subtitle / Description</label>
            <textarea name="outcomes_sub" class="form-control" rows="2">{{ $settings['outcomes_sub'] ?? 'Tangible impacts and key deliverables driving the Global One Health vision forward through innovation, policy, and education.' }}</textarea>
        </div>

        <div id="outcomes-wrapper">
            @for($i = 1; $i <= 20; $i++)
                @if(isset($settings['out_' . $i . '_title']))
                <div class="card-box-item outcome-item">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                        <div class="badge-item"><i class="fa-solid fa-star"></i> Outcome Card</div>
                        <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
                    </div>
                    <div class="grid-3">
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label">Category Tag (e.g. Collaboration)</label>
                            <input type="text" name="out_tags[]" class="form-control" value="{{ $settings['out_' . $i . '_tag'] ?? 'Outcome' }}">
                        </div>
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label">FontAwesome Icon Class</label>
                            <input type="text" name="out_icons[]" class="form-control" value="{{ $settings['out_' . $i . '_icon'] ?? 'fa-solid fa-check' }}">
                        </div>
                        <div class="form-group" style="margin-bottom: 0; grid-column: span 3;">
                            <label class="form-label">Outcome Description / Title</label>
                            <input type="text" name="out_titles[]" class="form-control" value="{{ $settings['out_' . $i . '_title'] }}">
                        </div>
                    </div>
                </div>
                @endif
            @endfor
        </div>
    </div>

    <!-- SECTION 4: OUR JOURNEY TO IMPACT -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-route"></i>
                4. Our Journey to Impact (4-Step Pathway)
            </div>
            <button type="button" class="btn-add" onclick="addJourneyItem()">
                <i class="fa-solid fa-plus"></i> Add Pathway Step
            </button>
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Section Heading Title</label>
                <input type="text" name="journey_title" class="form-control" value="{{ $settings['journey_title'] ?? 'Our Journey to Impact' }}">
            </div>
            <div class="form-group">
                <label class="form-label">Section Subtitle / Description</label>
                <input type="text" name="journey_sub" class="form-control" value="{{ $settings['journey_sub'] ?? 'A strategic 4-step pathway driving global collaboration into sustainable transformation.' }}">
            </div>
        </div>

        <div id="journey-wrapper">
            @for($i = 1; $i <= 20; $i++)
                @if(isset($settings['journey_' . $i . '_title']))
                <div class="card-box-item journey-item">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                        <div class="badge-item"><i class="fa-solid fa-route"></i> Step Card</div>
                        <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Step Title (e.g. CONNECT, SHARE, INNOVATE, IMPACT)</label>
                        <input type="text" name="journey_titles[]" class="form-control" value="{{ $settings['journey_' . $i . '_title'] }}">
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <label class="form-label">Step Description</label>
                        <textarea name="journey_descs[]" class="form-control" rows="2">{{ $settings['journey_' . $i . '_desc'] ?? '' }}</textarea>
                    </div>
                </div>
                @endif
            @endfor
        </div>
    </div>

    <!-- Sticky Save Button -->
    <div style="position: sticky; bottom: 20px; z-index: 100; text-align: right; background: rgba(255,255,255,0.9); padding: 15px; border-radius: 12px; box-shadow: 0 5px 25px rgba(0,0,0,0.1); backdrop-filter: blur(8px); border: 1px solid #e2e8f0;">
        <button type="submit" class="btn-save">
            <i class="fa-solid fa-floppy-disk"></i> Save All Changes
        </button>
    </div>
</form>

<script>
function addObjectiveItem() {
    const html = `
    <div class="card-box-item objective-item">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
            <div class="badge-item"><i class="fa-solid fa-star"></i> New Objective Card</div>
            <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
        </div>
        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Objective Title</label>
                <input type="text" name="obj_titles[]" class="form-control" placeholder="Objective Title">
            </div>
            <div class="form-group">
                <label class="form-label">FontAwesome Icon Class</label>
                <input type="text" name="obj_icons[]" class="form-control" value="fa-solid fa-check" placeholder="fa-solid fa-globe">
            </div>
        </div>
        <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label">Objective Description</label>
            <textarea name="obj_descs[]" class="form-control" rows="2" placeholder="Description"></textarea>
        </div>
    </div>`;
    document.getElementById('objectives-wrapper').insertAdjacentHTML('beforeend', html);
}

function addParticipantItem() {
    const html = `
    <div class="card-box-item participant-item">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
            <div class="badge-item"><i class="fa-solid fa-user"></i> New Participant Category</div>
            <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
        </div>
        <div class="grid-2">
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Category Name / Label</label>
                <input type="text" name="part_labels[]" class="form-control" placeholder="Category Name">
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">FontAwesome Icon Class</label>
                <input type="text" name="part_icons[]" class="form-control" value="fa-solid fa-user" placeholder="fa-solid fa-graduation-cap">
            </div>
        </div>
    </div>`;
    document.getElementById('participants-wrapper').insertAdjacentHTML('beforeend', html);
}

function addOutcomeItem() {
    const html = `
    <div class="card-box-item outcome-item">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
            <div class="badge-item"><i class="fa-solid fa-star"></i> New Outcome Card</div>
            <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
        </div>
        <div class="grid-3">
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Category Tag</label>
                <input type="text" name="out_tags[]" class="form-control" value="Outcome">
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">FontAwesome Icon Class</label>
                <input type="text" name="out_icons[]" class="form-control" value="fa-solid fa-check">
            </div>
            <div class="form-group" style="margin-bottom: 0; grid-column: span 3;">
                <label class="form-label">Outcome Description / Title</label>
                <input type="text" name="out_titles[]" class="form-control" placeholder="Outcome Title">
            </div>
        </div>
    </div>`;
    document.getElementById('outcomes-wrapper').insertAdjacentHTML('beforeend', html);
}

function addJourneyItem() {
    const html = `
    <div class="card-box-item journey-item">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
            <div class="badge-item"><i class="fa-solid fa-route"></i> New Pathway Step</div>
            <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
        </div>
        <div class="form-group">
            <label class="form-label">Step Title</label>
            <input type="text" name="journey_titles[]" class="form-control" placeholder="e.g. CONNECT">
        </div>
        <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label">Step Description</label>
            <textarea name="journey_descs[]" class="form-control" rows="2" placeholder="Description"></textarea>
        </div>
    </div>`;
    document.getElementById('journey-wrapper').insertAdjacentHTML('beforeend', html);
}
</script>
@endsection
