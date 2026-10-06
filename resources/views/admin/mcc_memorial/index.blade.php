@extends('layouts.admin_cms')

@section('header_title', 'Glimpse of MCC CMS')

@section('content')
<style>
    .mcc-admin-wrap {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    .admin-card-section {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        padding: 30px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
    }

    .form-label {
        display: block;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 8px;
        font-size: 0.92rem;
    }

    .form-input {
        width: 100%;
        padding: 11px 15px;
        border: 1.5px solid #cbd5e1;
        border-radius: 8px;
        font-size: 0.95rem;
        color: #0f172a;
        font-family: inherit;
        transition: border-color 0.2s;
    }

    .form-input:focus {
        border-color: #00A896;
        outline: none;
    }
</style>

<div class="mcc-admin-wrap">

    <!-- Top Action Bar -->
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
        <div>
            <h2 style="font-size: 1.7rem; font-weight: 800; color: #0a192f; margin: 0 0 4px 0;">
                <i class="fa-solid fa-landmark" style="color: #00A896; margin-right: 8px;"></i> Glimpse of MCC CMS
            </h2>
            <p style="color: #64748b; font-size: 0.95rem; margin: 0;">Manage gallery photos, titles, and visual narrative displayed on the Glimpse of MCC page.</p>
        </div>
        <div style="display: flex; gap: 12px; align-items: center;">
            <a href="/mcc-memorial" target="_blank" style="background: #ffffff; color: #0f172a; border: 1.5px solid #cbd5e1; padding: 11px 20px; border-radius: 10px; font-weight: 700; font-size: 0.92rem; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> View Live Page
            </a>
        </div>
    </div>

    @if(session('success'))
        <div style="background-color: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; border-radius: 12px; padding: 16px 20px; display: flex; align-items: center; gap: 10px; font-weight: 600;">
            <i class="fa-solid fa-circle-check" style="font-size: 1.3rem;"></i> {{ session('success') }}
        </div>
    @endif

    @php
        $mccTitle = is_object($settings) ? ($settings->where('key', 'mcc_memorial_title')->first()->value ?? 'GLIMPSE OF MCC') : ($settings['mcc_memorial_title'] ?? 'GLIMPSE OF MCC');
        $mccSubtitle = is_object($settings) ? ($settings->where('key', 'mcc_memorial_subtitle')->first()->value ?? 'Experience a visual journey through the heritage, corridors, and legacy of the Madras Christian College.') : ($settings['mcc_memorial_subtitle'] ?? 'Experience a visual journey through the heritage, corridors, and legacy of the Madras Christian College.');
    @endphp

    <!-- 1. LIVE VISUAL PREVIEW (Exact match to Screenshot 3) -->
    <div style="background: #ffffff; border-radius: 20px; border: 2px solid #e2e8f0; overflow: hidden; box-shadow: 0 10px 35px rgba(15, 23, 42, 0.06); position: relative;">
        <div style="position: absolute; top: 15px; right: 20px; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; color: #00A896; background: rgba(255, 255, 255, 0.9); padding: 5px 14px; border-radius: 20px; border: 1px solid #b2dfdb; z-index: 10;">
            <i class="fa-solid fa-eye"></i> Live Visual Preview
        </div>

        <!-- Hero Banner Preview -->
        <div style="background: url('{{ asset('images/hero-bg.png') }}') center center/cover no-repeat; padding: 70px 20px 55px; position: relative; text-align: center;">
            <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(15, 23, 42, 0.88);"></div>
            <div style="position: relative; z-index: 1;">
                <h1 style="color: #ffffff; font-size: 2.3rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; margin: 0;">
                    {{ $mccTitle ?: 'GLIMPSE OF MCC' }}
                </h1>
            </div>
        </div>

        <!-- Subtitle and 3-column gallery preview -->
        <div style="padding: 40px 30px;">
            <p style="color: #64748b; font-size: 1.05rem; text-align: center; max-width: 800px; margin: 0 auto 35px auto; line-height: 1.6; font-weight: 500;">
                {{ $mccSubtitle ?: 'Experience a visual journey through the heritage, corridors, and legacy of the Madras Christian College.' }}
            </p>

            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px; max-width: 1000px; margin: 0 auto;">
                @php
                    $previewImages = array_slice($images ?? [], 0, 6);
                @endphp
                @forelse($previewImages as $img)
                    <div style="height: 180px; border-radius: 14px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
                        <img src="{{ is_array($img) ? $img['url'] : asset($img) }}" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                @empty
                    <div style="grid-column: span 3; text-align: center; padding: 30px; color: #94a3b8; font-style: italic;">
                        No gallery images uploaded yet.
                    </div>
                @endforelse
            </div>
            @if(count($images ?? []) > 6)
                <p style="text-align: center; color: #94a3b8; font-size: 0.88rem; margin-top: 15px; font-weight: 600;">
                    + {{ count($images) - 6 }} more photos in the full gallery
                </p>
            @endif
        </div>
    </div>

    <!-- 2. PAGE TEXT EDIT FORM -->
    <form action="{{ route('admin.mcc_memorial.update') }}" method="POST">
        @csrf
        <div class="admin-card-section">
            <h3 style="margin: 0 0 18px 0; font-size: 1.25rem; font-weight: 700; color: #0f172a; display: flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-pen-to-square" style="color: #00A896;"></i> 1. Banner & Subtitle Settings
            </h3>

            <div style="display: grid; grid-template-columns: 1fr; gap: 20px; margin-bottom: 22px;">
                <div>
                    <label class="form-label">Hero Banner Title</label>
                    <input type="text" name="mcc_memorial_title" value="{{ $mccTitle }}" class="form-input" required>
                </div>
                <div>
                    <label class="form-label">Subtitle Description</label>
                    <textarea name="mcc_memorial_subtitle" rows="3" class="form-input" required>{{ $mccSubtitle }}</textarea>
                </div>
            </div>

            <div style="text-align: right;">
                <button type="submit" class="btn" style="background: linear-gradient(135deg, #00A896, #028090); color: #ffffff; padding: 12px 28px; border-radius: 10px; font-weight: 800; font-size: 0.95rem; border: none; cursor: pointer; box-shadow: 0 4px 15px rgba(0, 168, 150, 0.35); display: inline-flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-floppy-disk"></i> Save Header Settings
                </button>
            </div>
        </div>
    </form>

    <!-- 3. DYNAMIC GALLERY MANAGEMENT -->
    <div class="admin-card-section">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 22px; border-bottom: 1.5px solid #e2e8f0; padding-bottom: 15px;">
            <h3 style="margin: 0; font-size: 1.25rem; font-weight: 700; color: #0f172a; display: flex; align-items: center; gap: 10px;">
                <i class="fa-solid fa-images" style="color: #00A896;"></i> 2. Gallery Photos Manager
                <span style="font-size: 0.82rem; font-weight: 800; background: #e6f7f5; color: #00A896; padding: 4px 12px; border-radius: 20px;">
                    {{ count($images ?? []) }} Active Photos
                </span>
            </h3>
        </div>

        <!-- Add New Image Upload Form -->
        <div style="background: #f8fafc; border: 2px dashed #00A896; border-radius: 14px; padding: 25px; margin-bottom: 30px;">
            <h4 style="margin: 0 0 10px 0; color: #1e293b; font-size: 1.05rem; font-weight: 700; display: flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-cloud-arrow-up" style="color: #00A896;"></i> Upload New Gallery Photo(s)
            </h4>
            <form action="{{ route('admin.mcc_memorial.upload_images') }}" method="POST" enctype="multipart/form-data" style="display: flex; gap: 15px; align-items: center; flex-wrap: wrap;">
                @csrf
                <input type="file" name="gallery_images[]" multiple accept="image/*" required class="form-input" style="flex: 1; min-width: 260px; background: #ffffff;">
                <button type="submit" class="btn" style="background: #00A896; color: white; padding: 12px 24px; border-radius: 8px; font-weight: 700; border: none; cursor: pointer; display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-plus"></i> Upload Photo(s)
                </button>
            </form>
            <p style="margin: 8px 0 0 0; font-size: 0.85rem; color: #64748b;">You can select multiple photos at once (JPG, PNG, WebP). They will automatically be sorted and displayed in the 3-column gallery.</p>
        </div>

        <!-- Gallery Thumbnails Grid with Delete Actions -->
        @if(isset($images) && count($images) > 0)
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 20px;">
                @foreach($images as $img)
                    @php
                        $imgUrl = is_array($img) ? $img['url'] : asset($img);
                        $imgName = is_array($img) ? $img['name'] : basename($img);
                    @endphp
                    <div style="background: white; border: 1.5px solid #e2e8f0; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.04); display: flex; flex-direction: column;">
                        <div style="height: 150px; overflow: hidden; background: #f1f5f9; position: relative;">
                            <img src="{{ $imgUrl }}" alt="{{ $imgName }}" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 12px; display: flex; flex-direction: column; gap: 8px; flex: 1; justify-content: space-between; background: #fff;">
                            <span style="font-size: 0.78rem; color: #64748b; font-weight: 600; word-break: break-all;">
                                {{ $imgName }}
                            </span>
                            <form action="{{ route('admin.mcc_memorial.delete_image') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete {{ $imgName }}?');" style="margin: 0;">
                                @csrf
                                <input type="hidden" name="filename" value="{{ $imgName }}">
                                <button type="submit" class="btn" style="width: 100%; background: #fee2e2; color: #b91c1c; padding: 7px 10px; border-radius: 6px; font-size: 0.82rem; font-weight: 700; border: 1px solid #fca5a5; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 6px;">
                                    <i class="fa-solid fa-trash-can"></i> Delete Photo
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div style="text-align: center; padding: 40px; color: #94a3b8; border: 2px dashed #e2e8f0; border-radius: 10px;">
                <i class="fa-solid fa-image" style="font-size: 2.5rem; margin-bottom: 10px; display: block; color: #cbd5e1;"></i>
                No gallery images found. Upload photos above to showcase MCC.
            </div>
        @endif
    </div>

</div>
@endsection
