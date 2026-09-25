@extends('layouts.admin_cms')

@section('header_title', 'Committee Page Settings')

@section('content')
<style>
    .nav-tabs {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 20px;
        border-bottom: 2px solid #e2e8f0;
        padding-bottom: 10px;
    }
    .nav-tab {
        padding: 8px 16px;
        text-decoration: none;
        color: #64748b;
        font-weight: 600;
        border-radius: 6px;
    }
    .nav-tab.active {
        background: var(--admin-primary);
        color: white;
    }
    .config-card {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        border: 1px solid #f1f5f9;
        padding: 30px;
        margin-bottom: 30px;
    }
    .form-group { margin-bottom: 20px; }
    .form-label { display: block; font-weight: 600; color: #475569; margin-bottom: 8px; font-size: 0.9rem; }
    .form-control { width: 100%; padding: 12px 15px; border: 1px solid #cbd5e1; border-radius: 8px; font-family: inherit; font-size: 0.95rem; color: #334155; transition: all 0.3s; box-sizing: border-box; }
    .btn-save { background: #009688; color: #ffffff; border: none; padding: 12px 32px; border-radius: 8px; font-weight: 600; font-size: 1.05rem; cursor: pointer; transition: background 0.3s, transform 0.2s; display: inline-flex; align-items: center; gap: 8px; }
    .btn-save:hover { background: #00796b; }
</style>

<div class="nav-tabs">
    <a href="{{ route('admin.committee', ['category' => 'leadership']) }}" class="nav-tab {{ $category == 'leadership' ? 'active' : '' }}">Leadership</a>
    <a href="{{ route('admin.committee', ['category' => 'organizing_committee']) }}" class="nav-tab {{ $category == 'organizing_committee' ? 'active' : '' }}">Organizing Committee</a>
    <a href="{{ route('admin.committee', ['category' => 'advisory_committee']) }}" class="nav-tab {{ $category == 'advisory_committee' ? 'active' : '' }}">Advisory Committee</a>
    <a href="{{ route('admin.committee', ['category' => 'settings']) }}" class="nav-tab {{ $category == 'settings' ? 'active' : '' }}">Page Settings</a>
</div>

@if(session('success'))
    <div style="background-color: #e8f5e9; color: #2e7d32; padding: 15px 20px; border-radius: 8px; margin-bottom: 25px; border: 1px solid #c8e6c9;">
        <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
    </div>
@endif

<form method="POST" action="{{ route('admin.committee.settings.update') }}">
    @csrf

    <div class="config-card">
        <h3 style="font-size: 1.25rem; font-weight: 700; color: #1e293b; margin-bottom: 20px; border-bottom: 1px solid #f1f5f9; padding-bottom: 10px;">Advisory Board Section</h3>
        <div class="form-group">
            <label class="form-label">Advisory Board Introductory Text</label>
            <textarea name="advisory_text" class="form-control" rows="3">{{ $settings['advisory_text'] ?? 'The conference will be supported by an esteemed Advisory Board comprising experts from academia, research institutions, healthcare, industry and allied fields.' }}</textarea>
        </div>
        <div class="form-group">
            <label class="form-label">Fallback Text (If no members are added)</label>
            <input type="text" name="advisory_fallback" class="form-control" value="{{ $settings['advisory_fallback'] ?? '(Names and details to be announced soon.)' }}">
        </div>
    </div>

    <div class="config-card">
        <h3 style="font-size: 1.25rem; font-weight: 700; color: #1e293b; margin-bottom: 20px; border-bottom: 1px solid #f1f5f9; padding-bottom: 10px;">College / Venue Banner (Bottom)</h3>
        <div class="form-group">
            <label class="form-label">College Name / Title</label>
            <input type="text" name="banner_title" class="form-control" value="{{ $settings['banner_title'] ?? 'Madras Christian College' }}">
        </div>
        <div class="form-group">
            <label class="form-label">Address / Details</label>
            <input type="text" name="banner_desc" class="form-control" value="{{ $settings['banner_desc'] ?? 'Tambaram East, Chennai 600 059, Tamil Nadu, India' }}">
        </div>
        <div class="form-group">
            <label class="form-label">Button Link URL</label>
            <input type="text" name="banner_link" class="form-control" value="{{ $settings['banner_link'] ?? 'https://mcc.edu.in' }}">
        </div>
    </div>

    <button type="submit" class="btn-save">
        <i class="fa-solid fa-floppy-disk"></i> Save Settings
    </button>
</form>
@endsection
