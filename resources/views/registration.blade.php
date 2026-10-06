@extends('layouts.app')

@section('content')

    @include('sections.topbar')
    @include('sections.navbar')

    @php
        $bannerTitle = \App\Models\SiteSetting::where('group', 'page_banners')->where('key', 'banner_registration_title')->value('value') ?? 'REGISTRATION';
        $bannerImage = \App\Models\SiteSetting::where('group', 'page_banners')->where('key', 'banner_registration_image')->value('value');
    @endphp
    <!-- Page Banner -->
    <div class="page-banner" style="{{ $bannerImage ? "background-image: linear-gradient(rgba(10, 25, 47, 0.7), rgba(10, 25, 47, 0.8)), url('" . asset($bannerImage) . "');" : '' }}">
        <div class="page-banner-content">
            <h1>{{ $bannerTitle }}</h1>
        </div>
    </div>

    <!-- Registration Section -->
    <section class="registration-section section-padding" style="background-color: #f8f9fa;">
        <div class="container registration-container">
            
            <!-- Instructions -->
            @if(session('success'))
            <div id="successPopupModal" class="success-modal-overlay">
                <div class="success-modal-card">
                    <div class="success-modal-icon">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <h2 class="success-modal-title">Registration Successful!</h2>
                    <p class="success-modal-message">{{ session('success') }}</p>
                    <p class="success-modal-submessage">Thank you for registering for GOHC 2026. A confirmation notification has been recorded.</p>
                    <button type="button" onclick="closeSuccessModal()" class="success-modal-btn">
                        OK, GOT IT
                    </button>
                </div>
            </div>

            <style>
                .success-modal-overlay {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(15, 23, 42, 0.75);
                    backdrop-filter: blur(6px);
                    z-index: 999999;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    padding: 20px;
                }
                .success-modal-card {
                    background: #ffffff;
                    border-radius: 24px;
                    padding: 45px 35px 35px;
                    text-align: center;
                    max-width: 480px;
                    width: 100%;
                    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.35);
                    animation: successPopIn 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                    position: relative;
                }
                .success-modal-icon {
                    background: linear-gradient(135deg, #00a896, #028090);
                    width: 80px;
                    height: 80px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin: 0 auto 25px;
                    color: #ffffff;
                    font-size: 2.5rem;
                    box-shadow: 0 10px 25px rgba(0, 168, 150, 0.4);
                }
                .success-modal-title {
                    font-size: 1.65rem;
                    font-weight: 800;
                    color: #0a192f;
                    margin: 0 0 12px 0;
                    letter-spacing: -0.5px;
                }
                .success-modal-message {
                    font-size: 1.05rem;
                    color: #00a896;
                    font-weight: 700;
                    margin: 0 0 8px 0;
                }
                .success-modal-submessage {
                    font-size: 0.95rem;
                    color: #64748b;
                    margin: 0 0 30px 0;
                    line-height: 1.5;
                }
                .success-modal-btn {
                    background: linear-gradient(135deg, #00a896, #028090);
                    color: #ffffff;
                    border: none;
                    padding: 15px 40px;
                    border-radius: 30px;
                    font-size: 1rem;
                    font-weight: 700;
                    letter-spacing: 1px;
                    cursor: pointer;
                    width: 100%;
                    transition: all 0.3s ease;
                    box-shadow: 0 8px 20px rgba(0, 168, 150, 0.3);
                }
                .success-modal-btn:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 12px 25px rgba(0, 168, 150, 0.45);
                }
                @keyframes successPopIn {
                    0% { opacity: 0; transform: scale(0.7); }
                    100% { opacity: 1; transform: scale(1); }
                }
            </style>

            <script>
                function closeSuccessModal() {
                    const modal = document.getElementById('successPopupModal');
                    if (modal) {
                        modal.style.opacity = '0';
                        modal.style.transition = 'opacity 0.3s ease';
                        setTimeout(() => modal.remove(), 300);
                    }
                }
            </script>
            @endif

            <!-- Registration Plans (Dark Section) -->
            <div style="background-color: #0b1528; padding: 45px 30px; border-radius: 20px; margin-bottom: 45px; color: #ffffff; text-align: center; box-shadow: 0 15px 35px rgba(0,0,0,0.2);">
                <h2 style="font-size: 2.4rem; font-weight: 800; color: #ffffff; margin-bottom: 8px;">Registration Plans</h2>
                <p style="color: #94a3b8; font-size: 1.05rem; margin-bottom: 35px; line-height: 1.6;">Choose the appropriate registration tier to access the conference.<br>Super early-bird rates are currently active.</p>

                <!-- Inner White Card: Registration Process -->
                <div class="reg-instructions" style="background: #ffffff; color: #1e3250; padding: 35px 40px; border-radius: 16px; margin-bottom: 40px; text-align: left; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                    <h3 style="text-align: center; color: #1e3250; margin-top: 0; font-size: 1.35rem; font-weight: 700; margin-bottom: 10px;">{{ $settings['reg_proc_title'] ?? 'Registration Process of GOHC - 2026' }}</h3>
                    <p style="text-align: center; font-size: 1.05rem; margin-bottom: 25px; color: #64748b;">{{ $settings['reg_proc_sub'] ?? 'Participation in GOHC 2026 is open only to registered delegates..' }}</p>
                    
                    <h4 style="text-align: center; color: #1e3250; font-size: 1.15rem; font-weight: 700; margin-bottom: 20px;">{{ $settings['reg_proc_heading'] ?? 'Steps for Conference Registration' }}</h4>
                    
                    <ul style="list-style-type: none; padding: 0; margin: 0;">
                        @for($i = 1; $i <= 5; $i++)
                            @if(!empty($settings['reg_step_' . $i]))
                            <li style="margin-bottom: 15px; font-size: 1.05rem; font-style: italic; display: flex; align-items: flex-start; line-height: 1.5; color: #1e3250;">
                                <span style="font-weight: bold; font-style: normal; margin-right: 8px;">*</span> 
                                <span>{{ $settings['reg_step_' . $i] }}</span>
                            </li>
                            @endif
                        @endfor
                    </ul>
                    <div style="margin-top: 30px; border-top: 1px solid #d1e5f0; padding-top: 20px;">
                        <p style="margin: 0; color: #475569; line-height: 1.6; text-align: center;">{!! $settings['reg_page_notice'] ?? '<strong>All fields are required.</strong> Payments (INR) are securely processed online. Confirmations are sent within 48 hours. For support: <a href="mailto:gohc2026@gmail.com" style="color: var(--teal-accent); font-weight: 600;">gohc2026@gmail.com</a>.' !!}</p>
                    </div>
                </div>

                <!-- Dynamic Pricing Tiers Grid -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; text-align: center;">
                    @foreach($registrationFees as $index => $fee)
                        @php
                            $isPopular = ($index == 2 || str_contains(strtolower($fee->category_name), 'faculty'));
                            $offlinePrice = $fee->price_inr ?? '1,000';
                            $onlinePrice = $fee->price_online ?? '1,500';
                        @endphp
                        <div style="background: #152238; border: {{ $isPopular ? '2px solid #00A896' : '1px solid #233554' }}; border-radius: 16px; padding: 30px 18px 25px; position: relative; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
                            @if($isPopular)
                                <div style="position: absolute; top: -13px; left: 50%; transform: translateX(-50%); background: #00A896; color: #ffffff; font-size: 0.72rem; font-weight: 800; padding: 3px 14px; border-radius: 20px; text-transform: uppercase; letter-spacing: 0.8px; white-space: nowrap;">
                                    MOST POPULAR
                                </div>
                            @endif

                            <div>
                                <h3 style="font-size: 1.25rem; font-weight: 700; color: #ffffff; margin-bottom: 15px; margin-top: 5px;">{{ $fee->category_name }}</h3>
                                <div style="font-size: 2.1rem; font-weight: 800; color: #ffffff; margin-bottom: 20px; display: flex; align-items: baseline; justify-content: center; gap: 4px;">
                                    ₹{{ $offlinePrice }} <span style="font-size: 0.8rem; color: #00A896; font-weight: 700;">INR</span>
                                </div>

                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px; margin-bottom: 20px;">
                                    <div style="background: #0d1726; padding: 6px 8px; border-radius: 6px; font-size: 0.78rem; color: #cbd5e1;">
                                        <span style="display: block; font-size: 0.62rem; color: #64748b; font-weight: 800; text-transform: uppercase;">OFFLINE</span>
                                        ₹{{ $offlinePrice }} / $
                                    </div>
                                    <div style="background: #0d1726; padding: 6px 8px; border-radius: 6px; font-size: 0.78rem; color: #20c997;">
                                        <span style="display: block; font-size: 0.62rem; color: #64748b; font-weight: 800; text-transform: uppercase;">ONLINE</span>
                                        ₹{{ $onlinePrice }} / $
                                    </div>
                                </div>
                            </div>

                            <div style="font-size: 0.85rem; color: #94a3b8; display: flex; align-items: flex-start; gap: 8px; text-align: left; line-height: 1.45; border-top: 1px solid #233554; padding-top: 15px;">
                                <i class="fa-solid fa-circle-check" style="color: #00A896; margin-top: 2px; flex-shrink: 0; font-size: 0.9rem;"></i>
                                <span>Registration includes conference kit, certificate, lunch and refreshment.</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <form id="registration-form" action="{{ url('/api/register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- Personal Info Grid -->
                <!-- Personal Info Grid -->
                <div class="reg-form-grid">
                    @php
                        $formFields = \App\Models\RegistrationField::where('name', '!=', 'interested_in')->orderBy('sort_order')->get();
                    @endphp
                    @foreach($formFields as $field)
                        <div class="form-group" style="grid-column: {{ $field->grid_column === 'span 12' ? '1 / -1' : $field->grid_column }};">
                            @if($field->type === 'select' || $field->type === 'dynamic_select')
                                <select name="fields[{{ $field->name }}]" class="form-control" {{ $field->is_required ? 'required' : '' }}>
                                    <option value="">{{ $field->placeholder ?? 'Select' }}</option>
                                    @if($field->type === 'dynamic_select' && $field->name === 'interested_in')
                                        @php
                                            $interestOptions = \App\Models\InterestOption::orderBy('sort_order')->get();
                                        @endphp
                                        @foreach($interestOptions as $option)
                                            <option value="{{ $option->name }}">{{ $option->name }}</option>
                                        @endforeach
                                    @elseif($field->options)
                                        @foreach($field->options as $option)
                                            <option value="{{ $option }}">{{ $option }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            @elseif($field->type === 'textarea')
                                <textarea name="fields[{{ $field->name }}]" class="form-control" placeholder="{{ $field->placeholder }}" {{ $field->is_required ? 'required' : '' }} rows="3"></textarea>
                            @else
                                <input type="{{ $field->type }}" name="fields[{{ $field->name }}]" class="form-control" placeholder="{{ $field->placeholder }}" {{ $field->is_required ? 'required' : '' }}>
                            @endif
                        </div>
                    @endforeach
                    
                    <div class="form-group" style="grid-column: 1 / -1; margin-top: 20px; background: #fff; padding: 25px; border-radius: 12px; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
                        <label style="font-weight: 700; color: var(--navy-dark); margin-bottom: 15px; display: block; font-size: 1.15rem;">Registration Type <span style="color: #ef4444;">*</span></label>
                        <div style="display: flex; gap: 20px; flex-wrap: wrap;">
                            <label class="reg-type-option" style="display: flex; align-items: center; gap: 12px; cursor: pointer; padding: 15px 25px; border: 2px solid #e2e8f0; border-radius: 10px; background: #fff; transition: all 0.3s; flex: 1; min-width: 200px;">
                                <input type="radio" name="fields[registration_type]" value="Participation" required style="accent-color: var(--teal-accent); width: 20px; height: 20px;" onchange="toggleAbstractUpload(this.value)">
                                <span style="font-weight: 700; color: var(--navy-dark); font-size: 1.1rem;">Participation</span>
                            </label>
                            <label class="reg-type-option" style="display: flex; align-items: center; gap: 12px; cursor: pointer; padding: 15px 25px; border: 2px solid #e2e8f0; border-radius: 10px; background: #fff; transition: all 0.3s; flex: 1; min-width: 200px;">
                                <input type="radio" name="fields[registration_type]" value="Presentation" required style="accent-color: var(--teal-accent); width: 20px; height: 20px;" onchange="toggleAbstractUpload(this.value)">
                                <span style="font-weight: 700; color: var(--navy-dark); font-size: 1.1rem;">Presentation</span>
                            </label>
                        </div>
                    </div>

                    <!-- Presentation Selection Flow (Appears only when 'Presentation' is selected) -->
                    <div id="presentation-details-section" style="grid-column: 1 / -1; display: none; background: #f8fafc; border: 1.5px solid #d1e5f0; border-radius: 14px; padding: 25px; margin-top: 5px;">
                        
                        <!-- Step 1: Event Type Selection -->
                        <div style="margin-bottom: 22px;">
                            <label style="font-weight: 700; color: var(--navy-dark); margin-bottom: 12px; display: block; font-size: 1.05rem;">
                                Select Presentation Type <span style="color: #ef4444;">*</span>
                            </label>
                            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 12px;">
                                <label class="pres-event-option" style="display: flex; align-items: center; gap: 10px; padding: 12px 16px; border: 2px solid #e2e8f0; border-radius: 8px; background: #ffffff; cursor: pointer; transition: all 0.2s;">
                                    <input type="radio" name="fields[presentation_event_type]" value="Oral Presentation" style="accent-color: var(--teal-accent); width: 18px; height: 18px;" onchange="updatePresentationOptionStyle()">
                                    <span style="font-weight: 600; color: #1e293b; font-size: 0.95rem;">Oral Presentation</span>
                                </label>
                                <label class="pres-event-option" style="display: flex; align-items: center; gap: 10px; padding: 12px 16px; border: 2px solid #e2e8f0; border-radius: 8px; background: #ffffff; cursor: pointer; transition: all 0.2s;">
                                    <input type="radio" name="fields[presentation_event_type]" value="Poster Presentation" style="accent-color: var(--teal-accent); width: 18px; height: 18px;" onchange="updatePresentationOptionStyle()">
                                    <span style="font-weight: 600; color: #1e293b; font-size: 0.95rem;">Poster Presentation</span>
                                </label>
                                <label class="pres-event-option" style="display: flex; align-items: center; gap: 10px; padding: 12px 16px; border: 2px solid #e2e8f0; border-radius: 8px; background: #ffffff; cursor: pointer; transition: all 0.2s;">
                                    <input type="radio" name="fields[presentation_event_type]" value="Hackathon" style="accent-color: var(--teal-accent); width: 18px; height: 18px;" onchange="updatePresentationOptionStyle()">
                                    <span style="font-weight: 600; color: #1e293b; font-size: 0.95rem;">Hackathon</span>
                                </label>
                                <label class="pres-event-option" style="display: flex; align-items: center; gap: 10px; padding: 12px 16px; border: 2px solid #e2e8f0; border-radius: 8px; background: #ffffff; cursor: pointer; transition: all 0.2s;">
                                    <input type="radio" name="fields[presentation_event_type]" value="Innovation Pitch" style="accent-color: var(--teal-accent); width: 18px; height: 18px;" onchange="updatePresentationOptionStyle()">
                                    <span style="font-weight: 600; color: #1e293b; font-size: 0.95rem;">Innovation Pitch</span>
                                </label>
                            </div>
                        </div>

                        <!-- Step 2: Track Selection -->
                        <div style="margin-bottom: 22px;">
                            <label style="font-weight: 700; color: var(--navy-dark); margin-bottom: 8px; display: block; font-size: 1.05rem;">
                                Select Conference Track <span style="color: #ef4444;">*</span>
                            </label>
                            @php
                                $tracksList = \App\Models\Track::orderBy('sort_order')->get();
                            @endphp
                            <select name="fields[presentation_track]" id="presentation_track" class="form-control" style="width: 100%; padding: 12px 15px; border: 1.5px solid #cbd5e1; border-radius: 8px; font-size: 0.95rem; background: #ffffff;">
                                <option value="">-- Choose Track --</option>
                                @if($tracksList->count() > 0)
                                    @foreach($tracksList as $track)
                                        <option value="{{ $track->title }}">{{ $track->title }}</option>
                                    @endforeach
                                @else
                                    <option value="Track 1: Infectious Diseases, Zoonoses & AMR (Human, Animal & Plant Health)">Track 1: Infectious Diseases, Zoonoses & AMR (Human, Animal & Plant Health)</option>
                                    <option value="Track 2: Genomics, AI, One Health Informatics and Omics Technologies">Track 2: Genomics, AI, One Health Informatics and Omics Technologies</option>
                                    <option value="Track 3: Integrating Environment and Climate change in One Health">Track 3: Integrating Environment and Climate change in One Health</option>
                                    <option value="Track 4: Translating Sustainable Chemistry and Future Technologies to One Health">Track 4: Translating Sustainable Chemistry and Future Technologies to One Health</option>
                                    <option value="Track 5: Ensuring health intervention through the Indian Knowledge System">Track 5: Ensuring health intervention through the Indian Knowledge System</option>
                                    <option value="Track 6: Regenerative Health: Redefining Industrial One Health Paradigms">Track 6: Regenerative Health: Redefining Industrial One Health Paradigms</option>
                                @endif
                            </select>
                        </div>

                        <!-- Step 3: Abstract Document Upload -->
                        <div class="form-group file-upload-group" id="abstract-upload-section" style="margin-bottom: 0;">
                            <label style="font-weight: 700; color: var(--navy-dark); margin-bottom: 8px; display: block; font-size: 1.05rem;">
                                Abstract Document <span style="color: #ef4444;">*</span>
                            </label>
                            <label for="abstract_file" class="file-upload-label" style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 35px 20px; border: 2px dashed var(--teal-accent); border-radius: 12px; background: #ffffff; cursor: pointer; transition: all 0.3s ease; text-align: center;">
                                <i class="fa-solid fa-cloud-arrow-up" style="font-size: 3rem; color: var(--teal-accent); margin-bottom: 12px;"></i>
                                <span style="font-weight: 700; font-size: 1.15rem; color: var(--navy-dark); margin-bottom: 6px;">Select & Upload Abstract Document</span>
                                <span style="font-size: 0.9rem; color: #64748b;">Supported formats: DOC, DOCX, PDF (Max size: 5MB)</span>
                                <span id="file-chosen" style="margin-top: 15px; font-weight: 700; color: var(--green-accent); font-size: 1.05rem; display: none; background: rgba(0, 168, 150, 0.1); padding: 8px 16px; border-radius: 8px;"></span>
                            </label>
                            <input type="file" name="abstract_file" id="abstract_file" accept=".doc,.docx,.pdf" style="display: none;">
                            <span id="file-error" style="color: #ef4444; font-size: 0.95rem; margin-top: 10px; font-weight: 600; display: none;"><i class="fa-solid fa-circle-exclamation"></i> Please select presentation type, choose track, and upload your abstract document before submitting.</span>
                        </div>
                    </div>

                    <!-- Proof of Eligibility Upload -->
                    <div class="form-group file-upload-group" style="grid-column: 1 / -1; margin-top: 15px;">
                        <label style="font-weight: 700; color: var(--navy-dark); margin-bottom: 8px; display: block; font-size: 1.05rem;">
                            Proof of Eligibility <span style="font-weight: normal; color: #64748b; font-size: 0.9rem;">(Upload your Institutional ID Card)</span> <span style="color: #ef4444;">*</span>
                        </label>
                        <label for="id_card_file" class="file-upload-label" style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 30px 20px; border: 2px dashed #cbd5e1; border-radius: 12px; background: #ffffff; cursor: pointer; transition: all 0.3s ease; text-align: center;" onmouseover="this.style.borderColor='var(--teal-accent)'" onmouseout="this.style.borderColor='#cbd5e1'">
                            <i class="fa-solid fa-id-card" style="font-size: 2.5rem; color: var(--teal-accent); margin-bottom: 10px;"></i>
                            <span style="font-weight: 700; font-size: 1.1rem; color: var(--navy-dark); margin-bottom: 4px;">Click to Upload ID Card</span>
                            <span style="font-size: 0.88rem; color: #64748b;">Supported formats: JPG, PNG, PDF (Max size: 5MB)</span>
                            <span id="id-file-chosen" style="margin-top: 12px; font-weight: 700; color: var(--teal-accent); font-size: 0.95rem; display: none; background: rgba(0, 168, 150, 0.1); padding: 6px 14px; border-radius: 6px;"></span>
                        </label>
                        <input type="file" name="id_card_file" id="id_card_file" accept=".jpg,.jpeg,.png,.pdf" required style="display: none;" onchange="document.getElementById('id-file-chosen').innerText = this.files[0] ? this.files[0].name : ''; document.getElementById('id-file-chosen').style.display = this.files[0] ? 'inline-block' : 'none';">
                    </div>
                </div>


                <div class="section-divider" style="margin: 40px 0;"></div>

                <input type="hidden" name="participation_mode" value="offline">

                <!-- Registration Category -->
                <div class="reg-section-title" style="margin-bottom: 25px;">
                    <h2 style="font-size: clamp(1.5rem, 6vw, 2rem); color: var(--navy-dark);">{{ $settings['reg_category_title'] ?? 'Select Category' }}</h2>
                    <p style="color: #64748b; font-size: clamp(0.95rem, 3vw, 1.05rem);">{{ $settings['reg_category_subtitle'] ?? 'Registration includes conference kit, certificate, lunch and refreshment.' }}</p>
                </div>


                <div class="category-selection" style="display: flex; flex-direction: column; gap: 15px; margin-bottom: 30px;">
                    @foreach($registrationFees as $index => $fee)
                        @php
                            $offlineVal = (int)str_replace(',', '', $fee->price_inr);
                            $onlineVal = $fee->price_online ? (int)str_replace(',', '', $fee->price_online) : null;
                        @endphp
                        <label class="payment-option category-option" style="display: flex; justify-content: space-between; align-items: center; padding: 20px; border: 2px solid #e2e8f0; border-radius: 12px; cursor: pointer; transition: all 0.3s; background: #fff;">
                            <div style="display: flex; align-items: center; gap: 15px;">
                                <input type="radio" name="reg_category" 
                                       value="{{ $offlineVal }}" 
                                       data-offline="{{ $offlineVal }}" 
                                       data-online="{{ $onlineVal ?? '' }}" 
                                       data-name="{{ $fee->category_name }}" 
                                       required style="width: 22px; height: 22px; accent-color: var(--teal-accent);">
                                <span style="font-weight: 700; font-size: 1.15rem; color: var(--navy-dark);">{{ $fee->category_name }}</span>
                            </div>
                            <strong class="cat-price-display" style="font-size: 1.3rem; color: var(--teal-accent); display: none;">{{ number_format($offlineVal) }} INR</strong>
                        </label>
                    @endforeach
                </div>

                <!-- Payment QR Section -->
                <div id="payment-qr-section" style="display: none; background: #0f172a; padding: 40px; border-radius: 12px; margin-bottom: 40px; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
                    <h4 style="color: #ffffff; font-size: 1.35rem; font-weight: 700; margin-top: 0; margin-bottom: 25px;">Scan to Pay</h4>
                    <div style="background: #ffffff; display: inline-block; padding: 20px; border-radius: 10px; margin-bottom: 25px;">
                        <img src="{{ asset('images/payment_qr_final.png') }}" alt="Payment QR Code" style="max-width: 280px; width: 100%; display: block;">
                    </div>
                    <div style="font-size: 1.05rem; font-weight: 600; color: #94a3b8; margin-bottom: 10px;">OR Pay via Link:</div>
                    <a href="https://u.payu.in/PAYUMN/IJZCzKXf5LTs" target="_blank" style="color: #20c997; font-weight: 700; font-size: 1.15rem; word-break: break-all; text-decoration: underline;">https://u.payu.in/PAYUMN/IJZCzKXf5LTs</a>
                </div>

                {{-- Add-On section removed --}}
                {{-- 
                <div class="reg-section-title" style="margin-bottom: 20px;">
                    <h2 style="font-size: clamp(1.4rem, 5vw, 1.8rem); color: var(--navy-dark);">{{ $settings['reg_addon_title'] ?? 'Add-Ons' }}</h2>
                </div>
                
                <div class="addon-selection" style="margin-bottom: 40px;">
                    @foreach($addons as $addon)
                        <label class="payment-option" style="display: flex; justify-content: space-between; align-items: center; padding: 20px; border: 2px solid #e2e8f0; border-radius: 12px; cursor: pointer; transition: all 0.3s; background: #fff; position: relative; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
                            <div style="display: flex; align-items: center; gap: 15px;">
                                <input type="checkbox" name="addons[]" value="{{ $addon->price }}" data-name="{{ $addon->title }}" class="addon-checkbox" style="width: 22px; height: 22px; accent-color: var(--teal-accent);">
                                <div>
                                    <span style="font-weight: 700; font-size: 1.15rem; color: var(--navy-dark); display: block;">{{ $addon->title }}</span>
                                    @if($addon->badge_text)
                                        <span style="font-size: 0.85rem; color: #e74c3c; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; background: rgba(231, 76, 60, 0.1); padding: 3px 8px; border-radius: 4px; display: inline-block; margin-top: 5px;">{{ $addon->badge_text }}</span>
                                    @endif
                                </div>
                            </div>
                            <strong style="font-size: 1.3rem; color: var(--teal-accent);">+ {{ $addon->price }} INR</strong>
                        </label>
                    @endforeach
                </div>
                --}}

                <!-- Summary Box -->
                <div style="display: none;">
                <div id="order-summary-section" class="reg-summary" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 35px; box-shadow: 0 15px 35px rgba(0,0,0,0.05); margin-bottom: 35px;">
                    <h3 style="margin-top: 0; margin-bottom: 25px; color: var(--navy-dark); border-bottom: 2px solid #f1f5f9; padding-bottom: 15px; font-size: clamp(1.2rem, 4vw, 1.5rem);">{{ $settings['reg_summary_title'] ?? 'Order Summary' }}</h3>
                    
                    <div class="summary-line" style="display: flex; justify-content: space-between; margin-bottom: 15px; color: #475569; font-size: 1.1rem;">
                        <span id="sum-cat-name">Select a Category</span>
                        <span id="sum-cat-price" style="font-weight: 600; color: var(--navy-dark);">0 INR</span>
                    </div>
                    <div id="dynamic-addons-summary"></div>
                    
                    <div class="summary-line summary-total" style="display: flex; justify-content: space-between; margin-top: 10px; padding-top: 15px; border-top: 2px dashed #cbd5e1; font-weight: 800; font-size: 1.5rem; color: var(--navy-dark);">
                        <span>{{ $settings['reg_total_text'] ?? 'Total Amount:' }}</span>
                        <span id="sum-total-price" style="color: var(--teal-accent);">0 INR</span>
                    </div>
                </div>
                </div>


                <div id="payment-details-section" style="display: none; background: #fff; padding: 30px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 35px; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
                    <h3 style="margin-top: 0; margin-bottom: 20px; color: var(--navy-dark); font-size: 1.25rem;">Payment Verification</h3>
                    <p style="color: #64748b; font-size: 0.95rem; margin-bottom: 20px;">Please complete the payment using the QR code or link above, and enter your Transaction / Reference ID here.</p>
                    <div class="form-group">
                        <label style="font-weight: 700; color: var(--navy-dark); margin-bottom: 10px; display: block;">Transaction ID / Reference Number <span style="color: #ef4444;">*</span></label>
                        <input type="text" name="fields[transaction_id]" id="transaction_id" class="form-control" placeholder="Enter your transaction ID" style="border: 2px solid #e2e8f0; padding: 12px 15px; border-radius: 8px; width: 100%;">
                    </div>
                </div>

                <div class="reg-consent" style="margin-bottom: 35px; background: #f8fafc; padding: 20px; border-radius: 10px; border: 1px solid #e2e8f0;">
                    <label style="display: flex; gap: 12px; align-items: flex-start; cursor: pointer; margin: 0;">
                        <input type="checkbox" name="consent" required style="margin-top: 4px; width: 18px; height: 18px; accent-color: var(--teal-accent);"> 
                        <span style="color: #475569; line-height: 1.6; font-size: 0.95rem;">{!! $settings['reg_consent_text'] ?? 'By clicking "Proceed", I agree to the <a href="#" style="color: var(--teal-accent); font-weight: 600;">Privacy Policy</a>, <a href="#" style="color: var(--teal-accent); font-weight: 600;">Terms & Conditions</a> and <a href="#" style="color: var(--teal-accent); font-weight: 600;">Cancellation Policy</a>.' !!}</span>
                    </label>
                </div>

                <div class="reg-actions" style="display: flex; justify-content: flex-end;">
                    <button type="submit" class="btn btn-teal" style="padding: 16px 40px; font-size: 1.2rem; border-radius: 10px; width: 100%; box-shadow: 0 10px 20px rgba(0, 168, 150, 0.2); display: flex; justify-content: center; align-items: center; gap: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;"><span id="submit-button-text">Submit Registration</span> <i class="fa-solid fa-paper-plane"></i></button>
                </div>
            </form>

            <!-- Please Note -->
            <div class="reg-notes" style="background-color: #f4f8fa; padding: 35px 40px; border-radius: 12px; margin-bottom: 40px; border: 1px solid #e1eef4;">
                <h4 style="text-align: center; color: var(--navy-dark); font-size: 1.35rem; font-weight: 700; margin-top: 0; margin-bottom: 25px;">Please Note :</h4>
                <ul style="padding-left: 20px; margin: 0; color: var(--navy-dark); font-size: 1.1rem; line-height: 1.8;">
                    <li style="margin-bottom: 15px;">Registration fee is non-refundable.</li>
                    <li style="margin-bottom: 15px;">The fee is per delegate and includes GST.</li>
                    <li style="margin-bottom: 15px;">Each delegate is entitled to attend all conference sessions.</li>
                    <li style="margin-bottom: 15px;">Accommodation and travel expenses are not included in the registration fee.</li>
                </ul>
            </div>

        </div>
    </section>

    @include('sections.footer')

    <!-- Registration Logic -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categoryRadios = document.querySelectorAll('input[name="reg_category"]');
            const paymentMethodRadios = document.querySelectorAll('input[name="payment_method"]');
            const addonCheckboxes = document.querySelectorAll('.addon-checkbox');
            
            const sumCatName = document.getElementById('sum-cat-name');
            const sumCatPrice = document.getElementById('sum-cat-price');
            const dynamicAddonsSummary = document.getElementById('dynamic-addons-summary');
            const sumTotalPrice = document.getElementById('sum-total-price');
            
            const paymentSection = document.getElementById('payment-section');
            const orderSummarySection = document.getElementById('order-summary-section');
            const submitButtonText = document.getElementById('submit-button-text');
            const defaultButtonText = "Submit Registration";

            function updateModePrices() {
                if (paymentSection) paymentSection.style.display = 'block';
                if (orderSummarySection) orderSummarySection.style.display = 'block';
                if (submitButtonText) submitButtonText.innerText = defaultButtonText;

                // Update category price radios
                categoryRadios.forEach(radio => {
                    const label = radio.closest('.category-option');
                    const displayTag = label.querySelector('.cat-price-display');
                    const offlineVal = parseInt(radio.getAttribute('data-offline')) || 0;

                    radio.value = offlineVal;
                    radio.disabled = false;
                    label.style.opacity = '1';
                    label.style.pointerEvents = 'auto';
                    displayTag.innerText = offlineVal.toLocaleString() + ' INR';
                });

                calculateTotal();
            }

            function updatePaymentStyle() {
                // Reset all
                document.querySelectorAll('.payment-option, .pay-method-option').forEach(el => {
                    if (el.style.opacity !== '0.5') {
                        el.style.borderColor = '#e2e8f0';
                        el.style.background = '#fff';
                    }
                    
                    // Reset icon background for payment methods
                    const iconBg = el.querySelector('div[style*="rgba"]');
                    if(iconBg && el.classList.contains('pay-method-option')) {
                        iconBg.style.background = 'rgba(10, 25, 47, 0.05)';
                        const icon = iconBg.querySelector('i');
                        if(icon) icon.style.color = 'var(--navy-dark)';
                    }
                });
                
                // Style selected category
                categoryRadios.forEach(radio => {
                    if (radio.checked && !radio.disabled) {
                        const label = radio.closest('.payment-option');
                        label.style.borderColor = 'var(--teal-accent)';
                        label.style.background = '#f0fdfa';
                    }
                });
                
                // Style selected payment method
                paymentMethodRadios.forEach(radio => {
                    if (radio.checked) {
                        const label = radio.closest('.pay-method-option');
                        label.style.borderColor = 'var(--teal-accent)';
                        label.style.background = '#f0fdfa';
                        
                        // Highlight icon background
                        const iconBg = label.querySelector('div[style*="rgba"]');
                        if(iconBg) {
                            iconBg.style.background = 'rgba(0, 168, 150, 0.1)';
                            const icon = iconBg.querySelector('i');
                            if(icon) icon.style.color = 'var(--teal-accent)';
                        }
                    }
                });
                
                // Style addons
                addonCheckboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        const label = checkbox.closest('.payment-option');
                        label.style.borderColor = 'var(--teal-accent)';
                        label.style.background = '#f0fdfa';
                    }
                });
            }

            function calculateTotal() {
                let total = 0;
                let catName = "";
                let catPrice = 0;
                let catSelected = false;
                
                categoryRadios.forEach(radio => {
                    if(radio.checked && !radio.disabled) {
                        catPrice = parseInt(radio.value) || 0;
                        catName = radio.getAttribute('data-name');
                        catSelected = true;
                    }
                });

                if (catSelected) {
                    sumCatName.innerText = catName + ' Registration';
                    sumCatPrice.innerText = catPrice.toLocaleString() + ' INR';
                    total += catPrice;
                    document.getElementById('payment-qr-section').style.display = 'block';
                    document.getElementById('payment-details-section').style.display = 'block';
                    document.getElementById('transaction_id').setAttribute('required', 'required');
                } else {
                    sumCatName.innerText = 'Select a Category';
                    sumCatPrice.innerText = '0 INR';
                    document.getElementById('payment-qr-section').style.display = 'none';
                    document.getElementById('payment-details-section').style.display = 'none';
                    document.getElementById('transaction_id').removeAttribute('required');
                }

                // Handle dynamic addons summary
                dynamicAddonsSummary.innerHTML = '';
                addonCheckboxes.forEach(checkbox => {
                    if(checkbox.checked) {
                        const price = parseInt(checkbox.value) || 0;
                        const name = checkbox.getAttribute('data-name');
                        total += price;
                        
                        const div = document.createElement('div');
                        div.className = 'summary-line';
                        div.style.cssText = 'display: flex; justify-content: space-between; margin-bottom: 15px; color: #475569; font-size: 1.1rem;';
                        div.innerHTML = `<span>${name}</span><span style="font-weight: 600; color: var(--navy-dark);">${price.toLocaleString()} INR</span>`;
                        dynamicAddonsSummary.appendChild(div);
                    }
                });

                sumTotalPrice.innerText = total.toLocaleString() + ' INR';
                updatePaymentStyle();
            }

            // Add event listeners
            categoryRadios.forEach(r => r.addEventListener('change', calculateTotal));
            paymentMethodRadios.forEach(r => r.addEventListener('change', updatePaymentStyle));
            addonCheckboxes.forEach(r => r.addEventListener('change', calculateTotal));
            
            // Initial call
            updateModePrices();
            calculateTotal();

            // Presentation sub-option styling helper
            window.updatePresentationOptionStyle = function() {
                const options = document.querySelectorAll('.pres-event-option');
                options.forEach(opt => {
                    const radio = opt.querySelector('input');
                    if (radio.checked) {
                        opt.style.borderColor = 'var(--teal-accent)';
                        opt.style.background = '#f0fdfa';
                        opt.style.color = 'var(--teal-accent)';
                    } else {
                        opt.style.borderColor = '#e2e8f0';
                        opt.style.background = '#ffffff';
                        opt.style.color = '#1e293b';
                    }
                });
            };

            // Abstract & Presentation Flow Logic
            window.toggleAbstractUpload = function(val) {
                const presentationSection = document.getElementById('presentation-details-section');
                const fileInput = document.getElementById('abstract_file');
                const trackSelect = document.getElementById('presentation_track');
                const options = document.querySelectorAll('.reg-type-option');
                
                // Style the Registration Type options
                options.forEach(opt => {
                    const radio = opt.querySelector('input');
                    if(radio.checked) {
                        opt.style.borderColor = 'var(--teal-accent)';
                        opt.style.background = '#f0fdfa';
                    } else {
                        opt.style.borderColor = '#e2e8f0';
                        opt.style.background = '#fff';
                    }
                });

                if(val === 'Presentation') {
                    presentationSection.style.display = 'block';
                    if (trackSelect) trackSelect.setAttribute('required', 'required');
                } else {
                    presentationSection.style.display = 'none';
                    if (trackSelect) {
                        trackSelect.removeAttribute('required');
                        trackSelect.value = '';
                    }
                    const presTypeRadios = document.querySelectorAll('input[name="fields[presentation_event_type]"]');
                    presTypeRadios.forEach(r => r.checked = false);
                    updatePresentationOptionStyle();
                    
                    if (fileInput) fileInput.value = ''; 
                    const fileChosen = document.getElementById('file-chosen');
                    if (fileChosen) fileChosen.style.display = 'none';
                    const fileErr = document.getElementById('file-error');
                    if (fileErr) fileErr.style.display = 'none';
                }
            };

            const presentationSection = document.getElementById('presentation-details-section');
            const abstractFileInput = document.getElementById('abstract_file');
            const fileChosenLabel = document.getElementById('file-chosen');
            const form = document.getElementById('registration-form');
            const fileError = document.getElementById('file-error');

            if (form) {
                form.addEventListener('submit', function(e) {
                    const regType = document.querySelector('input[name="fields[registration_type]"]:checked');
                    if (regType && regType.value === 'Presentation') {
                        const eventType = document.querySelector('input[name="fields[presentation_event_type]"]:checked');
                        const trackVal = document.getElementById('presentation_track') ? document.getElementById('presentation_track').value : '';
                        const hasFile = abstractFileInput && abstractFileInput.files && abstractFileInput.files.length > 0;

                        if (!eventType || !trackVal || !hasFile) {
                            e.preventDefault();
                            if (fileError) {
                                fileError.style.display = 'block';
                                if (!eventType) {
                                    fileError.innerHTML = '<i class="fa-solid fa-circle-exclamation"></i> Please select a Presentation Type (Oral, Poster, Hackathon, or Innovation Pitch).';
                                } else if (!trackVal) {
                                    fileError.innerHTML = '<i class="fa-solid fa-circle-exclamation"></i> Please select a Conference Track.';
                                } else {
                                    fileError.innerHTML = '<i class="fa-solid fa-circle-exclamation"></i> Please upload your abstract document before submitting.';
                                }
                            }
                            presentationSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                    }
                });

                if (abstractFileInput) {
                    abstractFileInput.addEventListener('change', function(e) {
                        if (this.files && this.files.length > 0) {
                            fileChosenLabel.style.display = 'inline-block';
                            fileChosenLabel.innerHTML = '<i class="fa-solid fa-file-check" style="margin-right: 5px;"></i> ' + this.files[0].name;
                            if (fileError) fileError.style.display = 'none';
                        } else {
                            fileChosenLabel.style.display = 'none';
                        }
                    });
                }
            }



            // Accordion Logic
            const headers = document.querySelectorAll('.accordion-header');
            headers.forEach(header => {
                header.addEventListener('click', () => {
                    const content = header.nextElementSibling;
                    const icon = header.querySelector('i');
                    const isOpen = content.style.display === 'block';
                    
                    // Close all others
                    document.querySelectorAll('.accordion-content').forEach(c => c.style.display = 'none');
                    document.querySelectorAll('.accordion-header').forEach(h => {
                        h.classList.remove('active');
                        h.style.background = '#f8f9fa';
                        const hIcon = h.querySelector('i');
                        if (hIcon) {
                            hIcon.classList.remove('fa-circle-arrow-up', 'fa-circle-chevron-up');
                            hIcon.classList.add('fa-circle-arrow-down');
                        }
                    });
                    
                    // Toggle current
                    if (!isOpen) {
                        content.style.display = 'block';
                        header.classList.add('active');
                        header.style.background = '#eaf8f6';
                        if (icon) {
                            icon.classList.remove('fa-circle-arrow-down', 'fa-circle-chevron-down');
                            icon.classList.add('fa-circle-arrow-up');
                        }
                    }
                });
            });
        });
    </script>
@endsection
