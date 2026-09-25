@extends('layouts.admin_cms')

@section('header_title', 'Key Expected Outcomes Settings')

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

<div class="page-title">Key Expected Outcomes Settings</div>

@if(session('success'))
    <div class="success-alert">
        <i class="fa-solid fa-circle-check" style="font-size: 1.2rem;"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

<form method="POST" action="{{ route('admin.outcomes.update') }}">
    @csrf

    <!-- Section Header Details -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-heading"></i>
                Section Header Information
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Section Heading Title</label>
            <input type="text" name="outcomes_title" class="form-control" value="{{ $settings['outcomes_title'] ?? 'Key Expected Outcomes' }}">
        </div>

        <div class="form-group">
            <label class="form-label">Section Subtitle / Description</label>
            <textarea name="outcomes_sub" class="form-control" rows="3">{{ $settings['outcomes_sub'] ?? 'Tangible impacts and key deliverables driving the Global One Health vision forward through innovation, policy, and education.' }}</textarea>
        </div>
    </div>

    <!-- 6 Outcome Cards -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-chart-line"></i>
                Expected Outcome Cards (01 to 06)
            </div>
        </div>

        @for($i = 1; $i <= 6; $i++)
        <div class="card-box-item">
            <div class="badge-item">
                <i class="fa-solid fa-star"></i> Outcome 0{{ $i }}
            </div>
            <div class="grid-3">
                <div class="form-group">
                    <label class="form-label">Category Tag (e.g. Collaboration)</label>
                    <input type="text" name="out_{{ $i }}_tag" class="form-control" value="{{ $settings['out_' . $i . '_tag'] ?? '' }}">
                </div>
                <div class="form-group">
                    <label class="form-label">FontAwesome Icon Class</label>
                    <input type="text" name="out_{{ $i }}_icon" class="form-control" value="{{ $settings['out_' . $i . '_icon'] ?? 'fa-solid fa-check' }}" placeholder="fa-solid fa-globe">
                </div>
                <div class="form-group" style="grid-column: span 3;">
                    <label class="form-label">Outcome Description / Title</label>
                    <input type="text" name="out_{{ $i }}_title" class="form-control" value="{{ $settings['out_' . $i . '_title'] ?? '' }}">
                </div>
            </div>
        </div>
        @endfor
    </div>

    <!-- Sticky Save Button -->
    <div style="position: sticky; bottom: 20px; z-index: 100; text-align: right; background: rgba(255,255,255,0.9); padding: 15px; border-radius: 12px; box-shadow: 0 5px 25px rgba(0,0,0,0.1); backdrop-filter: blur(8px); border: 1px solid #e2e8f0;">
        <button type="submit" class="btn-save">
            <i class="fa-solid fa-floppy-disk"></i> Save All Changes
        </button>
    </div>
</form>
@endsection
