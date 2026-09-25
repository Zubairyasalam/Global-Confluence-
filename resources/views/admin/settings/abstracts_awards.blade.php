@extends('layouts.admin_cms')

@section('header_title', 'Abstracts & Awards')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
        <h2 style="color: var(--admin-sidebar); font-size: 1.5rem;">Abstracts & Awards Content</h2>
        <p style="color: #64748b; font-size: 0.9rem;">Manage the content for the Abstract Submission Guidelines and Awards & Recognitions sections.</p>
    </div>

    @if(session('success'))
        <div style="background: rgba(164, 198, 57, 0.15); border-left: 4px solid var(--admin-green); padding: 15px; margin-bottom: 25px; border-radius: 4px; color: #627722;">
            <i class="fa-solid fa-circle-check" style="margin-right: 5px;"></i> {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.abstracts_awards.update') }}" enctype="multipart/form-data">
        @csrf
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 30px;">
            
            @foreach(['abstract' => 'Abstract Submission Guidelines', 'awards' => 'Awards & Recognitions'] as $groupKey => $groupName)
                @if(isset($settings[$groupKey]))
                    <div class="card" style="margin-bottom: 0;">
                        <h3 style="color: var(--admin-sidebar); font-size: 1.2rem; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid var(--admin-border);">{{ $groupName }}</h3>
                        
                        @foreach($settings[$groupKey] as $setting)
                            <div style="margin-bottom: 20px;">
                                <label style="display: block; font-weight: 600; color: var(--admin-text); margin-bottom: 8px; font-size: 0.9rem;">{{ $setting->label ?? ucfirst(str_replace('_', ' ', $setting->key)) }}</label>
                                
                                @if($setting->type == 'textarea')
                                    <textarea name="{{ $setting->key }}" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-family: 'Poppins', sans-serif; font-size: 0.95rem;" rows="4">{{ old($setting->key, $setting->value) }}</textarea>
                                @elseif($setting->type == 'image' || str_contains($setting->key, '_icon'))
                                    @if($setting->value && str_starts_with($setting->value, 'fa-'))
                                        <div style="display: flex; align-items: center; gap: 15px;">
                                            <div style="width: 50px; height: 50px; border-radius: 8px; background: rgba(0, 150, 136, 0.1); display: flex; justify-content: center; align-items: center;">
                                                <i id="preview_{{ $setting->key }}" class="{{ old($setting->key, $setting->value) }}" style="font-size: 1.5rem; color: #009688;"></i>
                                            </div>
                                            <input type="text" id="input_{{ $setting->key }}" name="{{ $setting->key }}" value="{{ old($setting->key, $setting->value) }}" style="flex: 1; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-family: 'Poppins', sans-serif; font-size: 0.95rem;" oninput="document.getElementById('preview_{{ $setting->key }}').className = this.value;">
                                        </div>
                                        <small style="color: #64748b; display: block; margin-top: 5px;">Enter a FontAwesome class (e.g. fa-solid fa-trophy) or upload an image below to replace it.</small>
                                        <div id="preview_{{ $setting->key }}_container" style="display: none; margin-bottom: 10px; margin-top: 10px;">
                                            <img id="img_preview_{{ $setting->key }}" src="" style="max-width: 100%; max-height: 150px; border-radius: 8px; border: 1px solid var(--admin-border);">
                                        </div>
                                    @else
                                        <div id="preview_{{ $setting->key }}_container" style="margin-bottom: 10px; {{ $setting->value ? '' : 'display: none;' }}">
                                            <img id="img_preview_{{ $setting->key }}" src="{{ $setting->value ? (str_starts_with($setting->value, 'http') ? $setting->value : asset($setting->value)) : '' }}" style="max-width: 100%; max-height: 150px; border-radius: 8px; border: 1px solid var(--admin-border);">
                                        </div>
                                    @endif
                                    <input type="file" name="{{ $setting->key }}_file" accept="image/*" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-size: 0.95rem; margin-top: 10px;" onchange="previewImage(this, 'preview_{{ $setting->key }}_container', 'img_preview_{{ $setting->key }}')">
                                @else
                                    <input type="text" name="{{ $setting->key }}" value="{{ old($setting->key, $setting->value) }}" style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-family: 'Poppins', sans-serif; font-size: 0.95rem;">
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            @endforeach
            
        </div>

        <div style="margin-top: 30px; text-align: right;">
            <button type="submit" class="btn" style="padding: 12px 30px; font-size: 1.05rem;">
                <i class="fa-solid fa-save"></i> Save Content
            </button>
        </div>
    </form>
@endsection
