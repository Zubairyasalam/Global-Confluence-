@extends('layouts.admin_cms')

@section('header_title', 'Theme Settings')

@section('content')
<div class="card">
    <h3 style="margin-bottom: 20px; color: var(--admin-sidebar);">Theme Settings</h3>
    <p style="margin-bottom: 20px;">Manage colors and other theme properties here.</p>

    @if(session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.theme_settings.update') }}" method="POST">
        @csrf

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px;">
            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: 500;">Primary Color</label>
                <input type="color" name="theme_primary_color" value="{{ $settings->where('key', 'theme_primary_color')->first()->value ?? '#00A896' }}" style="padding: 0; width: 100px; height: 40px; border: 1px solid var(--admin-border); border-radius: 4px; cursor: pointer;">
            </div>

            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: 500;">Secondary Color</label>
                <input type="color" name="theme_secondary_color" value="{{ $settings->where('key', 'theme_secondary_color')->first()->value ?? '#112340' }}" style="padding: 0; width: 100px; height: 40px; border: 1px solid var(--admin-border); border-radius: 4px; cursor: pointer;">
            </div>

            <div>
                <label style="display: block; margin-bottom: 8px; font-weight: 500;">Accent Color</label>
                <input type="color" name="theme_accent_color" value="{{ $settings->where('key', 'theme_accent_color')->first()->value ?? '#F59E0B' }}" style="padding: 0; width: 100px; height: 40px; border: 1px solid var(--admin-border); border-radius: 4px; cursor: pointer;">
            </div>
            
            <div style="grid-column: 1 / -1; margin-top: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 500;">Font Family URL (Google Fonts)</label>
                <input type="url" name="theme_font_url" placeholder="https://fonts.googleapis.com/css2?family=..." value="{{ $settings->where('key', 'theme_font_url')->first()->value ?? '' }}" class="form-control" style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid var(--admin-border);">
            </div>
        </div>

        <button type="submit" class="btn" style="margin-top: 30px;">Save Settings</button>
    </form>
</div>
@endsection
