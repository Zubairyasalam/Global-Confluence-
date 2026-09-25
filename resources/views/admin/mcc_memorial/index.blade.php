@extends('layouts.admin_cms')

@section('header_title', 'MCC Memorial Settings')

@section('content')
<div class="card">
    <h3 style="margin-bottom: 20px; color: var(--admin-sidebar);">MCC Memorial Page Settings</h3>

    @if(session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.mcc_memorial.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: 500;">Page Title</label>
            <input type="text" name="mcc_memorial_title" value="{{ $settings->where('key', 'mcc_memorial_title')->first()->value ?? '' }}" class="form-control" style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid var(--admin-border);">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: 500;">Description</label>
            <textarea name="mcc_memorial_content" rows="6" class="form-control" style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid var(--admin-border);">{{ $settings->where('key', 'mcc_memorial_content')->first()->value ?? '' }}</textarea>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 8px; font-weight: 500;">Memorial Image</label>
            @if($settings->where('key', 'mcc_memorial_image')->first())
                <div style="margin-bottom: 10px;">
                    <img src="{{ asset($settings->where('key', 'mcc_memorial_image')->first()->value) }}" style="max-width: 200px; border-radius: 8px;">
                </div>
            @endif
            <input type="file" name="mcc_memorial_image" accept="image/*" class="form-control">
        </div>

        <button type="submit" class="btn">Save Settings</button>
    </form>
</div>
@endsection
