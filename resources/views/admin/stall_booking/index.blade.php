@extends('layouts.admin_cms')

@section('header_title', 'Stall Booking & Merchandise CMS')

@section('content')
<style>
    .stall-admin-wrap {
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

<div class="stall-admin-wrap">

    <!-- Top Action Bar -->
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
        <div>
            <h2 style="font-size: 1.7rem; font-weight: 800; color: #0a192f; margin: 0 0 4px 0;">
                <i class="fa-solid fa-store" style="color: #00A896; margin-right: 8px;"></i> Stall Booking & Merchandise CMS
            </h2>
            <p style="color: #64748b; font-size: 0.95rem; margin: 0;">Customize the page banner, titles, packages, stall guidelines, and merchandise content in real time.</p>
        </div>
        <div style="display: flex; gap: 12px; align-items: center;">
            <a href="/page/stall-booking-and-merchandise" target="_blank" style="background: #ffffff; color: #0f172a; border: 1.5px solid #cbd5e1; padding: 11px 20px; border-radius: 10px; font-weight: 700; font-size: 0.92rem; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> View Live Page
            </a>
        </div>
    </div>

    @if(session('success'))
        <div style="background-color: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; border-radius: 12px; padding: 16px 20px; display: flex; align-items: center; gap: 10px; font-weight: 600;">
            <i class="fa-solid fa-circle-check" style="font-size: 1.3rem;"></i> {{ session('success') }}
        </div>
    @endif

    <!-- 1. LIVE VISUAL PREVIEW (Exact match to Screenshot 1) -->
    <div style="background: #f8fafc; border-radius: 20px; border: 2px solid #e2e8f0; overflow: hidden; box-shadow: 0 10px 35px rgba(15, 23, 42, 0.06); position: relative;">
        <div style="position: absolute; top: 15px; right: 20px; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; color: #00A896; background: rgba(255, 255, 255, 0.9); padding: 5px 14px; border-radius: 20px; border: 1px solid #b2dfdb; z-index: 10;">
            <i class="fa-solid fa-eye"></i> Live Visual Preview
        </div>

        <div style="background-color: #0f172a; padding: 55px 20px 50px; text-align: center; color: #ffffff;">
            <h1 style="text-transform: uppercase; font-size: 2rem; font-weight: 800; letter-spacing: 1px; color: #ffffff; margin: 0;">
                {{ $settings['page_stall_banner_title'] ?? 'STALL BOOKING AND MERCHANDISE' }}
            </h1>
        </div>

        <div style="padding: 40px 30px; max-width: 950px; margin: 0 auto;">
            <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04); padding: 40px; min-height: 250px;">
                <h2 style="font-size: 1.7rem; font-weight: 800; color: #0f172a; margin: 0 0 20px 0; border-bottom: 3px solid #00A896; padding-bottom: 10px; display: inline-block;">
                    {{ $settings['page_stall_card_title'] ?? 'Stall Booking And Merchandise' }}
                </h2>

                <div style="font-size: 1.05rem; line-height: 1.85; color: #475569; margin-top: 15px;">
                    {!! $settings['page_stall-booking-and-merchandise'] ?? 'Content for Stall Booking And Merchandise will be updated soon. Please check back later!' !!}
                </div>
            </div>
        </div>
    </div>

    <!-- 2. EDIT FORM -->
    <form method="POST" action="{{ route('admin.stall_booking.update') }}">
        @csrf

        <div class="admin-card-section">
            <h3 style="margin: 0 0 18px 0; font-size: 1.25rem; font-weight: 700; color: #0f172a; display: flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-pen-to-square" style="color: #00A896;"></i> Edit Page Content
            </h3>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 22px;">
                <div>
                    <label class="form-label">Banner Title</label>
                    <input type="text" name="page_stall_banner_title" value="{{ $settings['page_stall_banner_title'] ?? 'STALL BOOKING AND MERCHANDISE' }}" class="form-input" required>
                </div>
                <div>
                    <label class="form-label">Card Main Title</label>
                    <input type="text" name="page_stall_card_title" value="{{ $settings['page_stall_card_title'] ?? 'Stall Booking And Merchandise' }}" class="form-input" required>
                </div>
            </div>

            <div style="margin-bottom: 25px;">
                <label class="form-label">Page Content / Guidelines / Packages (HTML Supported)</label>
                <textarea name="page_stall-booking-and-merchandise" rows="10" class="form-input" style="font-family: inherit; font-size: 0.95rem; line-height: 1.7;" required>{{ $settings['page_stall-booking-and-merchandise'] ?? 'Content for Stall Booking And Merchandise will be updated soon. Please check back later!' }}</textarea>
                <small style="color: #64748b; margin-top: 6px; display: block;">You can write standard text or formatted HTML with headings, paragraphs, and list items.</small>
            </div>

            <div style="text-align: right;">
                <button type="submit" class="btn" style="background: linear-gradient(135deg, #00A896, #028090); color: #ffffff; padding: 13px 32px; border-radius: 10px; font-weight: 800; font-size: 1.05rem; border: none; cursor: pointer; box-shadow: 0 4px 15px rgba(0, 168, 150, 0.35); display: inline-flex; align-items: center; gap: 10px;">
                    <i class="fa-solid fa-floppy-disk"></i> Save Stall Booking Content
                </button>
            </div>
        </div>
    </form>

</div>
@endsection
