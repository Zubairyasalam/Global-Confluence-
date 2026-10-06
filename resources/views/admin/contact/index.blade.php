@extends('layouts.admin_cms')

@section('header_title', 'Contact Us CMS Settings')

@section('content')
<style>
    .contact-admin-wrap {
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

    .person-item-row {
        display: grid;
        grid-template-columns: 1.2fr 1fr auto;
        gap: 12px;
        align-items: center;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 14px 16px;
        margin-bottom: 10px;
        transition: all 0.2s ease;
    }

    .person-item-row:hover {
        border-color: #00A896;
        background: #ffffff;
    }
</style>

<div class="contact-admin-wrap">

    <!-- Top Action Bar -->
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
        <div>
            <h2 style="font-size: 1.7rem; font-weight: 800; color: #0a192f; margin: 0 0 4px 0;">
                <i class="fa-solid fa-phone" style="color: #00A896; margin-right: 8px;"></i> Contact Us Page CMS
            </h2>
            <p style="color: #64748b; font-size: 0.95rem; margin: 0;">Manage official emails, website links, and contact persons displayed on the Contact Us page.</p>
        </div>
        <div style="display: flex; gap: 12px; align-items: center;">
            <a href="/page/contact-us" target="_blank" style="background: #ffffff; color: #0f172a; border: 1.5px solid #cbd5e1; padding: 11px 20px; border-radius: 10px; font-weight: 700; font-size: 0.92rem; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> View Live Page
            </a>
        </div>
    </div>

    @if(session('success'))
        <div style="background-color: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; border-radius: 12px; padding: 16px 20px; display: flex; align-items: center; gap: 10px; font-weight: 600;">
            <i class="fa-solid fa-circle-check" style="font-size: 1.3rem;"></i> {{ session('success') }}
        </div>
    @endif

    <!-- 1. LIVE VISUAL PREVIEW (Exact match to Screenshot 2) -->
    <div style="background: #f8fafc; border-radius: 20px; border: 2px solid #e2e8f0; overflow: hidden; box-shadow: 0 10px 35px rgba(15, 23, 42, 0.06); position: relative;">
        <div style="position: absolute; top: 15px; right: 20px; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; color: #00A896; background: rgba(255, 255, 255, 0.9); padding: 5px 14px; border-radius: 20px; border: 1px solid #b2dfdb; z-index: 10;">
            <i class="fa-solid fa-eye"></i> Live Visual Preview
        </div>

        <div style="background-color: #0f172a; padding: 50px 20px 45px; text-align: center; color: #ffffff;">
            <h1 style="text-transform: uppercase; font-size: 2rem; font-weight: 800; letter-spacing: 1px; color: #ffffff; margin: 0;">
                {{ $settings['contact_hero_title'] ?? 'CONTACT US' }}
            </h1>
        </div>

        <div style="padding: 40px 30px; max-width: 950px; margin: 0 auto;">
            <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04); padding: 35px 32px;">
                <h2 style="font-size: 1.6rem; font-weight: 800; color: #0f172a; margin: 0 0 24px 0; border-bottom: 3px solid #00A896; padding-bottom: 10px; display: inline-block;">
                    {{ $settings['contact_page_title'] ?? 'Contact Us' }}
                </h2>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 18px; margin-bottom: 30px;">
                    <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; display: flex; align-items: center; gap: 14px;">
                        <div style="width: 42px; height: 42px; background: #e6f7f5; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #00A896; font-size: 1.2rem; flex-shrink: 0;">
                            <i class="fa-solid fa-globe"></i>
                        </div>
                        <div>
                            <strong style="display: block; color: #1e293b; font-size: 0.92rem;">Official Website</strong>
                            <span style="color: #00A896; font-weight: 600; font-size: 0.88rem;">{{ $settings['contact_website'] ?? 'https://biomed.mccmrfip.in/' }}</span>
                        </div>
                    </div>

                    <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; display: flex; align-items: center; gap: 14px;">
                        <div style="width: 42px; height: 42px; background: #e6f7f5; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #00A896; font-size: 1.2rem; flex-shrink: 0;">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <strong style="display: block; color: #1e293b; font-size: 0.92rem;">Official Email</strong>
                            <span style="color: #00A896; font-weight: 600; font-size: 0.88rem;">{{ $settings['contact_email'] ?? 'gohc2026@gmail.com' }}</span>
                        </div>
                    </div>
                </div>

                <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px;">
                    <h3 style="font-size: 1.15rem; font-weight: 800; color: #0f172a; margin: 0 0 18px 0; display: flex; align-items: center; gap: 8px;">
                        <i class="fa-solid fa-id-badge" style="color: #00A896;"></i> Contact Persons
                    </h3>

                    @php
                        $previewPersons = [];
                        for ($i = 1; $i <= 10; $i++) {
                            if (!empty($settings['contact_person_' . $i . '_title']) || !empty($settings['contact_person_' . $i . '_phone'])) {
                                $previewPersons[] = [
                                    'title' => $settings['contact_person_' . $i . '_title'] ?? '',
                                    'phone' => $settings['contact_person_' . $i . '_phone'] ?? ''
                                ];
                            }
                        }
                        if (empty($previewPersons)) {
                            $previewPersons = [
                                ['title' => 'ORGANIZING SECRETARY 1', 'phone' => '+91 73975 39543'],
                                ['title' => 'ORGANIZING SECRETARY 2', 'phone' => '+91 81480 18894'],
                                ['title' => 'STUDENT CHAIRMAN', 'phone' => '+91 90255 96984'],
                                ['title' => 'STUDENT COORDINATOR', 'phone' => '+91 97895 82404'],
                            ];
                        }
                    @endphp

                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 15px;">
                        @foreach($previewPersons as $p)
                            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-left: 4px solid #00A896; border-radius: 8px; padding: 14px 16px;">
                                <span style="display: block; font-size: 0.72rem; font-weight: 800; text-transform: uppercase; color: #64748b; margin-bottom: 5px;">{{ $p['title'] }}</span>
                                <span style="color: #0f172a; font-weight: 800; font-size: 1rem; display: flex; align-items: center; gap: 6px;">
                                    <i class="fa-solid fa-phone" style="color: #00A896; font-size: 0.85rem;"></i> {{ $p['phone'] }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. EDIT FORM -->
    <form method="POST" action="{{ route('admin.contact.update') }}">
        @csrf

        <div style="display: flex; flex-direction: column; gap: 30px;">

            <!-- Header & Official Info -->
            <div class="admin-card-section">
                <h3 style="margin: 0 0 18px 0; font-size: 1.25rem; font-weight: 700; color: #0f172a; display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-globe" style="color: #00A896;"></i> 1. Official Website & Email
                </h3>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label class="form-label">Banner Title</label>
                        <input type="text" name="contact_hero_title" value="{{ $settings['contact_hero_title'] ?? 'CONTACT US' }}" class="form-input" required>
                    </div>
                    <div>
                        <label class="form-label">Card Main Title</label>
                        <input type="text" name="contact_page_title" value="{{ $settings['contact_page_title'] ?? 'Contact Us' }}" class="form-input" required>
                    </div>
                    <div>
                        <label class="form-label">Official Website URL</label>
                        <input type="text" name="contact_website" value="{{ $settings['contact_website'] ?? 'https://biomed.mccmrfip.in/' }}" class="form-input" required>
                    </div>
                    <div>
                        <label class="form-label">Official Email Address</label>
                        <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? 'gohc2026@gmail.com' }}" class="form-input" required>
                    </div>
                </div>
            </div>

            <!-- Contact Persons List -->
            <div class="admin-card-section">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px; flex-wrap: wrap; gap: 10px;">
                    <div>
                        <h3 style="margin: 0 0 4px 0; font-size: 1.25rem; font-weight: 700; color: #0f172a; display: flex; align-items: center; gap: 8px;">
                            <i class="fa-solid fa-address-book" style="color: #00A896;"></i> 2. Contact Persons List
                        </h3>
                        <p style="color: #64748b; font-size: 0.9rem; margin: 0;">Add, edit, or remove specific contact designations and phone numbers.</p>
                    </div>
                    <button type="button" onclick="addNewPersonRow()" style="background: #e6f7f5; color: #00796b; border: 1.5px solid #b2dfdb; padding: 9px 18px; border-radius: 8px; font-weight: 700; font-size: 0.88rem; cursor: pointer; display: inline-flex; align-items: center; gap: 6px;">
                        <i class="fa-solid fa-plus"></i> Add Person
                    </button>
                </div>

                <div id="persons-container" style="display: flex; flex-direction: column; gap: 12px;">
                    @foreach($previewPersons as $idx => $p)
                        <div class="person-item-row">
                            <input type="text" name="person_titles[]" value="{{ $p['title'] }}" class="form-input" placeholder="e.g. ORGANIZING SECRETARY 1" required>
                            <input type="text" name="person_phones[]" value="{{ $p['phone'] }}" class="form-input" placeholder="e.g. +91 73975 39543" required>
                            <button type="button" onclick="this.closest('.person-item-row').remove()" style="background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; width: 38px; height: 38px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center;" title="Remove Person">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- SUBMIT BUTTON -->
            <div style="text-align: right; margin-bottom: 30px;">
                <button type="submit" class="btn" style="background: linear-gradient(135deg, #00A896, #028090); color: #ffffff; padding: 14px 34px; border-radius: 10px; font-weight: 800; font-size: 1.05rem; border: none; cursor: pointer; box-shadow: 0 4px 15px rgba(0, 168, 150, 0.35); display: inline-flex; align-items: center; gap: 10px;">
                    <i class="fa-solid fa-floppy-disk"></i> Save Contact Settings
                </button>
            </div>

        </div>
    </form>

</div>

<script>
    function addNewPersonRow() {
        const container = document.getElementById('persons-container');
        const div = document.createElement('div');
        div.className = 'person-item-row';
        div.innerHTML = `
            <input type="text" name="person_titles[]" value="" class="form-input" placeholder="e.g. CO-CONVENOR" required>
            <input type="text" name="person_phones[]" value="" class="form-input" placeholder="e.g. +91 98765 43210" required>
            <button type="button" onclick="this.closest('.person-item-row').remove()" style="background: #fee2e2; color: #dc2626; border: 1px solid #fecaca; width: 38px; height: 38px; border-radius: 8px; cursor: pointer; display: flex; align-items: center; justify-content: center;" title="Remove Person">
                <i class="fa-solid fa-trash-can"></i>
            </button>
        `;
        container.appendChild(div);
        div.querySelector('input').focus();
    }
</script>
@endsection
