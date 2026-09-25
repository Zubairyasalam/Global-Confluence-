@extends(isset($is_included) ? 'layouts.empty' : 'layouts.admin_cms')

@section('header_title', 'Programme Schedule CMS Settings')

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

<div class="page-title">Programme Schedule Settings</div>

@if(session('success'))
    <div class="success-alert">
        <i class="fa-solid fa-circle-check" style="font-size: 1.2rem;"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

<form method="POST" action="{{ route('admin.schedule.update') }}">
    @csrf

    <!-- SECTION 1: HEADER TITLE & SUBTITLE -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-calendar-days"></i>
                1. Header Section Settings
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Section Heading Title</label>
            <input type="text" name="sched_title" class="form-control" value="{{ $settings['sched_title'] ?? 'PROGRAMME SCHEDULE' }}">
        </div>

        <div class="form-group" style="margin-bottom: 0;">
            <label class="form-label">Section Subtitle / Description</label>
            <textarea name="sched_sub" class="form-control" rows="2">{{ $settings['sched_sub'] ?? 'Complete schedule of sessions, guest lectures, and presentations for Day 1 and Day 2.' }}</textarea>
        </div>
    </div>

    <!-- SECTION 2: DAY - I SCHEDULE -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-calendar-day"></i>
                2. Day – I Schedule
            </div>
            <button type="button" class="btn-add" onclick="addDay1Row()">
                <i class="fa-solid fa-plus"></i> Add Day 1 Session
            </button>
        </div>

        <div class="grid-2" style="margin-bottom: 20px;">
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Day 1 Header Title</label>
                <input type="text" name="sched_day1_title" class="form-control" value="{{ $settings['sched_day1_title'] ?? 'DAY – I SCHEDULE' }}">
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Day 1 Timing Summary</label>
                <input type="text" name="sched_day1_time" class="form-control" value="{{ $settings['sched_day1_time'] ?? '9:30 AM – 6:00 PM' }}">
            </div>
        </div>

        <div id="day1-items-wrapper">
            @for($i = 1; $i <= 30; $i++)
                @if(isset($settings['day1_' . $i . '_title']))
                <div class="card-box-item">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                        <div class="badge-item"><i class="fa-solid fa-clock"></i> Day 1 Session Row</div>
                        <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
                    </div>
                    <div class="grid-3">
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label">Time Interval (e.g. 9:30 AM – 11:30 AM)</label>
                            <input type="text" name="day1_times[]" class="form-control" value="{{ $settings['day1_' . $i . '_time'] ?? '' }}">
                        </div>
                        <div class="form-group" style="margin-bottom: 0; grid-column: span 2;">
                            <label class="form-label">Session / Event Title</label>
                            <input type="text" name="day1_titles[]" class="form-control" value="{{ $settings['day1_' . $i . '_title'] }}">
                        </div>
                    </div>
                    <div class="grid-2" style="margin-top: 15px;">
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label">Badge Tag (e.g. Refreshment, Parallel Session)</label>
                            <input type="text" name="day1_badges[]" class="form-control" value="{{ $settings['day1_' . $i . '_badge'] ?? '' }}" placeholder="Optional Badge">
                        </div>
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label">Icon Class (e.g. fa-clock, fa-mug-hot, fa-utensils)</label>
                            <input type="text" name="day1_icons[]" class="form-control" value="{{ $settings['day1_' . $i . '_icon'] ?? 'fa-clock' }}">
                        </div>
                    </div>
                </div>
                @endif
            @endfor
        </div>
    </div>

    <!-- SECTION 3: DAY - II SCHEDULE -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-calendar-days"></i>
                3. Day – II Schedule
            </div>
            <button type="button" class="btn-add" onclick="addDay2Row()">
                <i class="fa-solid fa-plus"></i> Add Day 2 Session
            </button>
        </div>

        <div class="grid-2" style="margin-bottom: 20px;">
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Day 2 Header Title</label>
                <input type="text" name="sched_day2_title" class="form-control" value="{{ $settings['sched_day2_title'] ?? 'DAY – II SCHEDULE' }}">
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Day 2 Timing Summary</label>
                <input type="text" name="sched_day2_time" class="form-control" value="{{ $settings['sched_day2_time'] ?? '9:30 AM – 5:30 PM' }}">
            </div>
        </div>

        <div id="day2-items-wrapper">
            @for($i = 1; $i <= 30; $i++)
                @if(isset($settings['day2_' . $i . '_title']))
                <div class="card-box-item">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                        <div class="badge-item"><i class="fa-solid fa-clock"></i> Day 2 Session Row</div>
                        <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
                    </div>
                    <div class="grid-3">
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label">Time Interval (e.g. 9:30 AM – 10:15 AM)</label>
                            <input type="text" name="day2_times[]" class="form-control" value="{{ $settings['day2_' . $i . '_time'] ?? '' }}">
                        </div>
                        <div class="form-group" style="margin-bottom: 0; grid-column: span 2;">
                            <label class="form-label">Session / Event Title</label>
                            <input type="text" name="day2_titles[]" class="form-control" value="{{ $settings['day2_' . $i . '_title'] }}">
                        </div>
                    </div>
                    <div class="grid-2" style="margin-top: 15px;">
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label">Badge Tag (e.g. Refreshment, Parallel Session)</label>
                            <input type="text" name="day2_badges[]" class="form-control" value="{{ $settings['day2_' . $i . '_badge'] ?? '' }}" placeholder="Optional Badge">
                        </div>
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label">Icon Class (e.g. fa-clock, fa-mug-hot, fa-utensils)</label>
                            <input type="text" name="day2_icons[]" class="form-control" value="{{ $settings['day2_' . $i . '_icon'] ?? 'fa-clock' }}">
                        </div>
                    </div>
                </div>
                @endif
            @endfor
        </div>
    </div>

    <!-- SECTION 4: TRACK-WISE SCHEDULE -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-layer-group"></i>
                4. Track-wise Parallel Technical Sessions
            </div>
            <button type="button" class="btn-add" onclick="addTrackRow()">
                <i class="fa-solid fa-plus"></i> Add Track
            </button>
        </div>

        <div class="grid-2" style="margin-bottom: 20px;">
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Track Section Title</label>
                <input type="text" name="sched_tracks_title" class="form-control" value="{{ $settings['sched_tracks_title'] ?? 'Track-wise Parallel Technical Sessions' }}">
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Track Section Subtitle / Description</label>
                <input type="text" name="sched_tracks_sub" class="form-control" value="{{ $settings['sched_tracks_sub'] ?? 'Technical oral and poster sessions run concurrently across designated conference halls for Tracks I through VI.' }}">
            </div>
        </div>

        <div id="track-items-wrapper">
            @for($i = 1; $i <= 20; $i++)
                @if(isset($settings['track_' . $i . '_name']))
                <div class="card-box-item">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                        <div class="badge-item"><i class="fa-solid fa-layer-group"></i> Track Item</div>
                        <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
                    </div>
                    <div class="grid-3">
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label">Track Name (e.g. Track I)</label>
                            <input type="text" name="track_names[]" class="form-control" value="{{ $settings['track_' . $i . '_name'] }}">
                        </div>
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label">Color Code (e.g. #009688)</label>
                            <input type="text" name="track_colors[]" class="form-control" value="{{ $settings['track_' . $i . '_color'] ?? '#009688' }}">
                        </div>
                        <div class="form-group" style="margin-bottom: 0;">
                            <label class="form-label">Topic / Description</label>
                            <input type="text" name="track_topics[]" class="form-control" value="{{ $settings['track_' . $i . '_topic'] ?? '' }}">
                        </div>
                    </div>
                </div>
                @endif
            @endfor
        </div>
    </div>

    <!-- Sticky Save Button -->
    <div style="position: sticky; bottom: 20px; z-index: 100; text-align: right; background: rgba(255,255,255,0.9); padding: 15px; border-radius: 12px; box-shadow: 0 5px 25px rgba(0,0,0,0.1); backdrop-filter: blur(8px); border: 1px solid #e2e8f0;">
        <button type="submit" class="btn-save">
            <i class="fa-solid fa-floppy-disk"></i> Save Schedule Settings
        </button>
    </div>
</form>

<script>
function addDay1Row() {
    const html = `
    <div class="card-box-item">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
            <div class="badge-item"><i class="fa-solid fa-clock"></i> New Day 1 Session Row</div>
            <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
        </div>
        <div class="grid-3">
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Time Interval</label>
                <input type="text" name="day1_times[]" class="form-control" placeholder="e.g. 9:30 AM – 11:30 AM">
            </div>
            <div class="form-group" style="margin-bottom: 0; grid-column: span 2;">
                <label class="form-label">Session / Event Title</label>
                <input type="text" name="day1_titles[]" class="form-control" placeholder="Session Title">
            </div>
        </div>
        <div class="grid-2" style="margin-top: 15px;">
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Badge Tag</label>
                <input type="text" name="day1_badges[]" class="form-control" placeholder="e.g. Refreshment, Parallel Session">
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Icon Class</label>
                <input type="text" name="day1_icons[]" class="form-control" value="fa-clock" placeholder="fa-clock">
            </div>
        </div>
    </div>`;
    document.getElementById('day1-items-wrapper').insertAdjacentHTML('beforeend', html);
}

function addDay2Row() {
    const html = `
    <div class="card-box-item">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
            <div class="badge-item"><i class="fa-solid fa-clock"></i> New Day 2 Session Row</div>
            <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
        </div>
        <div class="grid-3">
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Time Interval</label>
                <input type="text" name="day2_times[]" class="form-control" placeholder="e.g. 9:30 AM – 10:15 AM">
            </div>
            <div class="form-group" style="margin-bottom: 0; grid-column: span 2;">
                <label class="form-label">Session / Event Title</label>
                <input type="text" name="day2_titles[]" class="form-control" placeholder="Session Title">
            </div>
        </div>
        <div class="grid-2" style="margin-top: 15px;">
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Badge Tag</label>
                <input type="text" name="day2_badges[]" class="form-control" placeholder="e.g. Refreshment, Parallel Session">
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Icon Class</label>
                <input type="text" name="day2_icons[]" class="form-control" value="fa-clock" placeholder="fa-clock">
            </div>
        </div>
    </div>`;
    document.getElementById('day2-items-wrapper').insertAdjacentHTML('beforeend', html);
}

function addTrackRow() {
    const html = `
    <div class="card-box-item">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
            <div class="badge-item"><i class="fa-solid fa-layer-group"></i> New Track Item</div>
            <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
        </div>
        <div class="grid-3">
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Track Name</label>
                <input type="text" name="track_names[]" class="form-control" placeholder="e.g. Track I">
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Color Code</label>
                <input type="text" name="track_colors[]" class="form-control" value="#009688">
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label class="form-label">Topic / Description</label>
                <input type="text" name="track_topics[]" class="form-control" placeholder="Topic name">
            </div>
        </div>
    </div>`;
    document.getElementById('track-items-wrapper').insertAdjacentHTML('beforeend', html);
}
</script>
@endsection
