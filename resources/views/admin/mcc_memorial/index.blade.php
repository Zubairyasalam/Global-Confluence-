@extends('layouts.admin_cms')

@section('header_title', 'MCC Memorial Settings')

@section('content')
<div style="display: flex; flex-direction: column; gap: 30px;">
    @if(session('success'))
        <div style="background: #d1fae5; color: #065f46; padding: 15px; border-radius: 8px; font-weight: 500; display: flex; align-items: center; gap: 10px;">
            <i class="fa-solid fa-circle-check" style="font-size: 1.2rem;"></i>
            {{ session('success') }}
        </div>
    @endif

    <!-- 1. Page Content Settings -->
    <div class="card">
        <h3 style="margin-bottom: 20px; color: var(--admin-sidebar); display: flex; align-items: center; gap: 10px;">
            <i class="fa-solid fa-pen-to-square" style="color: #2563eb;"></i> MCC Memorial Page Content
        </h3>

        <form action="{{ route('admin.mcc_memorial.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600;">Page Title</label>
                <input type="text" name="mcc_memorial_title" value="{{ $settings->where('key', 'mcc_memorial_title')->first()->value ?? '' }}" class="form-control" style="width: 100%; padding: 10px 14px; border-radius: 6px; border: 1px solid var(--admin-border);">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600;">Description</label>
                <textarea name="mcc_memorial_content" rows="6" class="form-control" style="width: 100%; padding: 10px 14px; border-radius: 6px; border: 1px solid var(--admin-border);">{{ $settings->where('key', 'mcc_memorial_content')->first()->value ?? '' }}</textarea>
            </div>

            @php
                $mainImgSetting = $settings->where('key', 'mcc_memorial_image')->first();
            @endphp
            <div style="margin-bottom: 25px;">
                <label style="display: block; margin-bottom: 8px; font-weight: 600;">Header / Main Banner Image</label>
                @if($mainImgSetting && !empty($mainImgSetting->value))
                    <div style="margin-bottom: 12px; display: inline-block; position: relative; border: 1px solid #e2e8f0; border-radius: 8px; padding: 6px; background: #f8fafc;">
                        <img src="{{ asset($mainImgSetting->value) }}" style="max-width: 240px; height: auto; border-radius: 6px; display: block;">
                        <form action="{{ route('admin.mcc_memorial.delete_image') }}" method="POST" style="margin-top: 8px;" onsubmit="return confirm('Are you sure you want to remove the main banner image?');">
                            @csrf
                            <input type="hidden" name="setting_key" value="mcc_memorial_image">
                            <input type="hidden" name="filename" value="{{ basename($mainImgSetting->value) }}">
                            <button type="submit" class="btn" style="background: #ef4444; color: #fff; border: none; padding: 6px 12px; font-size: 0.85rem; border-radius: 4px; cursor: pointer;">
                                <i class="fa-solid fa-trash"></i> Remove Image
                            </button>
                        </form>
                    </div>
                @endif
                <input type="file" name="mcc_memorial_image" accept="image/*" class="form-control" style="width: 100%; max-width: 450px;">
            </div>

            <button type="submit" class="btn" style="background: var(--admin-primary); color: white; padding: 10px 24px; font-weight: 600; border-radius: 6px;">
                <i class="fa-solid fa-save"></i> Save Page Settings
            </button>
        </form>
    </div>

    <!-- 2. Gallery Images Management (Upload & Delete Dynamically) -->
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 2px solid var(--admin-border); padding-bottom: 15px;">
            <h3 style="color: var(--admin-sidebar); margin: 0; display: flex; align-items: center; gap: 10px;">
                <i class="fa-solid fa-images" style="color: #059669;"></i> Memorial Gallery Images
                <span style="font-size: 0.9rem; font-weight: 500; background: #e0e7ff; color: #3730a3; padding: 3px 10px; border-radius: 12px; margin-left: 10px;">
                    {{ count($images ?? []) }} Total Images
                </span>
            </h3>
        </div>

        <!-- Add New Image Upload Form -->
        <div style="background: #f8fafc; border: 2px dashed #cbd5e1; border-radius: 10px; padding: 25px; margin-bottom: 30px;">
            <h4 style="margin-top: 0; margin-bottom: 12px; color: #1e293b; font-size: 1.05rem;">
                <i class="fa-solid fa-cloud-arrow-up" style="color: #2563eb;"></i> Add New Gallery Image(s)
            </h4>
            <form action="{{ route('admin.mcc_memorial.upload_images') }}" method="POST" enctype="multipart/form-data" style="display: flex; gap: 15px; align-items: center; flex-wrap: wrap;">
                @csrf
                <input type="file" name="gallery_images[]" multiple accept="image/*" required class="form-control" style="flex: 1; min-width: 260px; padding: 10px; background: white; border: 1px solid #cbd5e1; border-radius: 6px;">
                <button type="submit" class="btn" style="background: #059669; color: white; padding: 11px 22px; border-radius: 6px; font-weight: 600; display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-plus"></i> Upload Image(s)
                </button>
            </form>
            <p style="margin: 8px 0 0 0; font-size: 0.85rem; color: #64748b;">You can select one or multiple images at once (JPEG, PNG, WEBP).</p>
        </div>

        <!-- Gallery Thumbnails Grid with Delete Actions -->
        @if(isset($images) && count($images) > 0)
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 20px;">
                @foreach($images as $img)
                    <div style="background: white; border: 1px solid #e2e8f0; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.05); display: flex; flex-direction: column;">
                        <div style="height: 140px; overflow: hidden; background: #f1f5f9; position: relative;">
                            <img src="{{ $img['url'] }}" alt="{{ $img['name'] }}" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 12px; display: flex; flex-direction: column; gap: 8px; flex: 1; justify-content: space-between; background: #fff;">
                            <span style="font-size: 0.78rem; color: #64748b; font-weight: 500; word-break: break-all; line-height: 1.2;">
                                {{ $img['name'] }}
                            </span>
                            <form action="{{ route('admin.mcc_memorial.delete_image') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete {{ $img['name'] }}?');" style="margin: 0;">
                                @csrf
                                <input type="hidden" name="filename" value="{{ $img['name'] }}">
                                <button type="submit" class="btn" style="width: 100%; background: #ef4444; color: white; padding: 6px 10px; border-radius: 6px; font-size: 0.82rem; font-weight: 600; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 6px;">
                                    <i class="fa-solid fa-trash-can"></i> Delete Image
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div style="text-align: center; padding: 40px; color: #94a3b8; border: 2px dashed #e2e8f0; border-radius: 10px; font-style: italic;">
                <i class="fa-solid fa-image" style="font-size: 2.5rem; margin-bottom: 10px; display: block; color: #cbd5e1;"></i>
                No gallery images found. Upload new images above to feature them on the MCC Memorial page.
            </div>
        @endif
    </div>
</div>
@endsection
