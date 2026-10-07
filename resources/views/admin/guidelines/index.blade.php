@extends('layouts.admin_cms')

@section('header_title', 'Publications & Guidelines CMS')

@section('content')
<style>
    .page-title {
        color: #0f172a;
        font-size: 1.7rem;
        font-weight: 800;
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 20px;
    }

    .success-alert {
        background-color: #d1fae5;
        color: #065f46;
        border: 1px solid #a7f3d0;
        border-radius: 12px;
        padding: 16px 20px;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 600;
    }

    .config-card {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        border: 1px solid #e2e8f0;
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
        flex-wrap: wrap;
        gap: 10px;
    }

    .card-title {
        color: #0f172a;
        font-size: 1.25rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .card-title i {
        color: #00A896;
    }

    .form-group {
        margin-bottom: 20px;
    }
    .form-label {
        display: block;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 8px;
        font-size: 0.92rem;
    }
    .form-control {
        width: 100%;
        padding: 11px 15px;
        border: 1.5px solid #cbd5e1;
        border-radius: 8px;
        font-family: inherit;
        font-size: 0.95rem;
        color: #0f172a;
        transition: all 0.2s;
        box-sizing: border-box;
    }
    .form-control:focus {
        border-color: #00A896;
        outline: none;
    }

    .btn-save {
        background: linear-gradient(135deg, #00A896, #028090);
        color: #ffffff;
        border: none;
        padding: 13px 34px;
        border-radius: 10px;
        font-weight: 800;
        font-size: 1.05rem;
        cursor: pointer;
        transition: background 0.3s, transform 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 15px rgba(0, 168, 150, 0.35);
    }
    .btn-save:hover {
        transform: translateY(-1px);
    }

    .btn-add {
        background: #f1f5f9;
        color: #0f172a;
        border: 1.5px dashed #94a3b8;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .btn-add:hover {
        background: #e6f7f5;
        border-color: #00A896;
        color: #00A896;
    }

    .btn-delete-item {
        background: #fee2e2;
        color: #dc2626;
        border: none;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 0.82rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s;
    }
    .btn-delete-item:hover {
        background: #dc2626;
        color: #ffffff;
    }

    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .card-box-item {
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        padding: 18px;
        margin-bottom: 12px;
        transition: all 0.2s;
    }
    .card-box-item:hover {
        border-color: #cbd5e1;
        background: #ffffff;
    }
    .badge-item {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #00A896;
        color: #ffffff;
        font-weight: 800;
        font-size: 0.82rem;
        padding: 3px 12px;
        border-radius: 20px;
        margin-bottom: 10px;
    }

    @media (max-width: 768px) {
        .grid-2 { grid-template-columns: 1fr; }
    }
</style>

@php
    $bannerTitle = $settings['banner_publications_title'] ?? 'PUBLICATIONS';
    $pubTag = $settings['pub_tag'] ?? 'SCIENTIFIC PUBLICATIONS';
    $pubTitle = $settings['pub_title'] ?? 'Scientific Publications';
    $pubAnnounceTitle = $settings['pub_announce_title'] ?? 'ANNOUNCEMENT';
    $pubNote = $settings['pub_note'] ?? 'Journal list will be updated soon';

    $hasPubItems = false;
    $customPubItems = [];
    for($i = 1; $i <= 20; $i++) {
        if(!empty($settings['pub_item_' . $i])) {
            $customPubItems[] = $settings['pub_item_' . $i];
            $hasPubItems = true;
        }
    }
    $defaultPubItems = [
        'All the Presentation will be published as a conference proceedings in ISBN indexed book',
        'Quality presentation will be peer reviewed and considered for further publication in selected Scopus/ WoS indexed journals'
    ];
    $displayPubItems = $hasPubItems ? $customPubItems : $defaultPubItems;
@endphp

<div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px; margin-bottom: 25px;">
    <div>
        <h2 style="font-size: 1.7rem; font-weight: 800; color: #0a192f; margin: 0 0 4px 0;">
            <i class="fa-solid fa-book-open" style="color: #00A896; margin-right: 8px;"></i> Publications &amp; Guidelines CMS
        </h2>
        <p style="color: #64748b; font-size: 0.95rem; margin: 0;">Customize the Publications page banner, checklist points, and announcement notice in real time.</p>
    </div>
    <div style="display: flex; gap: 12px; align-items: center;">
        <a href="/publications" target="_blank" style="background: #ffffff; color: #0f172a; border: 1.5px solid #cbd5e1; padding: 11px 20px; border-radius: 10px; font-weight: 700; font-size: 0.92rem; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
            <i class="fa-solid fa-arrow-up-right-from-square"></i> View Live Publications Page
        </a>
    </div>
</div>

@if(session('success'))
    <div class="success-alert">
        <i class="fa-solid fa-circle-check" style="font-size: 1.2rem;"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

<!-- 1. LIVE VISUAL PREVIEW -->
<div style="background: #f8fafc; border-radius: 20px; border: 2px solid #e2e8f0; overflow: hidden; box-shadow: 0 10px 35px rgba(15, 23, 42, 0.06); position: relative; margin-bottom: 30px;">
    <div style="position: absolute; top: 15px; right: 20px; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; color: #00A896; background: rgba(255, 255, 255, 0.95); padding: 5px 14px; border-radius: 20px; border: 1px solid #b2dfdb; z-index: 10;">
        <i class="fa-solid fa-eye"></i> Live Visual Preview
    </div>

    <!-- Banner Preview -->
    <div style="background: linear-gradient(135deg, #0a192f 0%, #0f172a 50%, #112240 100%); padding: 50px 20px 45px; text-align: center; color: #ffffff;">
        <h1 style="text-transform: uppercase; font-size: 1.8rem; font-weight: 800; letter-spacing: 1.5px; color: #ffffff; margin: 0;">
            {{ $bannerTitle }}
        </h1>
    </div>

    <!-- Card Preview Container -->
    <div style="padding: 35px 25px; max-width: 800px; margin: 0 auto; font-family: 'Poppins', sans-serif;">
        <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; border-top: 4px solid #00A896; border-bottom: 4px solid #00A896; padding: 35px 30px; box-shadow: 0 8px 25px rgba(15, 23, 42, 0.04);">
            <div style="display: inline-flex; align-items: center; gap: 6px; background: #e6f7f5; color: #00A896; padding: 5px 14px; border-radius: 50px; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.8px; margin-bottom: 15px;">
                <i class="fa-solid fa-book-open"></i> {{ $pubTag }}
            </div>

            <h2 style="font-size: 1.5rem; font-weight: 800; color: #0f172a; margin: 0 0 20px 0;">
                {{ $pubTitle }}
            </h2>

            <div style="display: flex; flex-direction: column; gap: 12px; margin-bottom: 22px;">
                @foreach($displayPubItems as $pItem)
                    <div style="display: flex; align-items: flex-start; gap: 12px;">
                        <i class="fa-solid fa-circle-check" style="color: #00A896; font-size: 1.15rem; margin-top: 2px;"></i>
                        <div style="font-size: 0.95rem; color: #334155; line-height: 1.6; font-weight: 500;">
                            {!! $pItem !!}
                        </div>
                    </div>
                @endforeach
            </div>

            <div style="background: #f0fdfa; border: 1.5px dashed #00A896; border-radius: 12px; padding: 14px 18px; display: flex; align-items: center; gap: 14px;">
                <div style="width: 36px; height: 36px; border-radius: 50%; background: #00A896; color: #ffffff; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 1rem;">
                    <i class="fa-solid fa-bell"></i>
                </div>
                <div>
                    <h5 style="margin: 0 0 2px 0; color: #00A896; font-weight: 800; font-size: 0.82rem; text-transform: uppercase; letter-spacing: 0.8px;">{{ $pubAnnounceTitle }}</h5>
                    <p style="margin: 0; color: #334155; font-size: 0.9rem; font-weight: 500;">{{ $pubNote }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 2. EDIT FORM -->
<form method="POST" action="{{ route('admin.guidelines.update') }}">
    @csrf

    <!-- SECTION 1: SCIENTIFIC PUBLICATIONS SETTINGS -->
    <div class="config-card">
        <div class="card-header">
            <div class="card-title">
                <i class="fa-solid fa-book-open"></i>
                1. Scientific Publications Content &amp; Points
            </div>
            <button type="button" class="btn-add" onclick="addPubItem()">
                <i class="fa-solid fa-plus"></i> Add Publication Point
            </button>
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Page Hero Banner Title</label>
                <input type="text" name="banner_publications_title" class="form-control" value="{{ $bannerTitle }}" required>
            </div>
            <div class="form-group">
                <label class="form-label">Card Top Badge Tag</label>
                <input type="text" name="pub_tag" class="form-control" value="{{ $pubTag }}" required>
            </div>
        </div>

        <div class="grid-2">
            <div class="form-group">
                <label class="form-label">Card Main Heading Title</label>
                <input type="text" name="pub_title" class="form-control" value="{{ $pubTitle }}" required>
            </div>
            <div class="form-group">
                <label class="form-label">Announcement Tag Title</label>
                <input type="text" name="pub_announce_title" class="form-control" value="{{ $pubAnnounceTitle }}" required>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Announcement Message Text (Notice Box)</label>
            <input type="text" name="pub_note" class="form-control" value="{{ $pubNote }}" required>
        </div>

        <h4 style="font-size: 1rem; color: #0f172a; margin: 25px 0 14px; font-weight: 800;">
            <i class="fa-solid fa-list-check" style="color: #00A896;"></i> Publication Points &amp; Instructions
        </h4>

        <div id="pub-items-wrapper">
            @foreach($displayPubItems as $idx => $pItem)
                <div class="card-box-item">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                        <div class="badge-item"><i class="fa-solid fa-circle-check"></i> Point #{{ $idx + 1 }}</div>
                        <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
                    </div>
                    <div class="form-group" style="margin-bottom: 0;">
                        <input type="text" name="pub_items[]" class="form-control" value="{{ $pItem }}" required>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Sticky Save Button -->
    <div style="position: sticky; bottom: 20px; z-index: 100; text-align: right; background: rgba(255,255,255,0.95); padding: 18px 25px; border-radius: 14px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); backdrop-filter: blur(8px); border: 1.5px solid #cbd5e1; display: flex; justify-content: space-between; align-items: center;">
        <span style="color: #64748b; font-size: 0.95rem; font-weight: 600;">
            <i class="fa-solid fa-circle-info" style="color: #00A896;"></i> Click Save to update live publications page instantly.
        </span>
        <button type="submit" class="btn-save">
            <i class="fa-solid fa-floppy-disk"></i> Save Publications Content
        </button>
    </div>
</form>

<script>
function addPubItem() {
    const container = document.getElementById('pub-items-wrapper');
    const count = container.querySelectorAll('.card-box-item').length + 1;
    const html = `
    <div class="card-box-item">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
            <div class="badge-item"><i class="fa-solid fa-circle-check"></i> Point #${count} (New)</div>
            <button type="button" class="btn-delete-item" onclick="this.closest('.card-box-item').remove()"><i class="fa-solid fa-trash"></i> Delete</button>
        </div>
        <div class="form-group" style="margin-bottom: 0;">
            <input type="text" name="pub_items[]" class="form-control" placeholder="Enter publication detail or instruction point..." required>
        </div>
    </div>`;
    container.insertAdjacentHTML('beforeend', html);
}
</script>
@endsection
