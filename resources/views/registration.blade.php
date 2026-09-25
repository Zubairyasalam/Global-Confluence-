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
            <div class="reg-instructions" style="margin-bottom: 40px; background: #f0f7fa; padding: 35px 40px; border-radius: 12px; border: 1px solid #d1e5f0; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                <h3 style="text-align: center; color: #1e3250; margin-top: 0; font-size: 1.35rem; font-weight: 700; margin-bottom: 10px;">{{ $settings['reg_proc_title'] ?? 'Registration Process of GOHC - 2026' }}</h3>
                <p style="text-align: center; font-size: 1.05rem; margin-bottom: 25px; color: #1e3250;">{{ $settings['reg_proc_sub'] ?? 'Participation in GOHC 2026 is open only to registered delegates..' }}</p>
                
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

            <form id="registration-form" action="{{ url('/api/register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- Personal Info Grid -->
                <!-- Personal Info Grid -->
                <div class="reg-form-grid">
                    @php
                        $formFields = \App\Models\RegistrationField::orderBy('sort_order')->get();
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

                    <div class="form-group file-upload-group" id="abstract-upload-section" style="grid-column: 1 / -1; margin-top: 10px; display: none;">
                        <label for="abstract_file" class="file-upload-label" style="display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 50px 20px; border: 2px dashed var(--teal-accent); border-radius: 12px; background: #f8fafc; cursor: pointer; transition: all 0.3s ease; text-align: center;">
                            <i class="fa-solid fa-cloud-arrow-up" style="font-size: 3.5rem; color: var(--teal-accent); margin-bottom: 15px;"></i>
                            <span style="font-weight: 700; font-size: 1.3rem; color: var(--navy-dark); margin-bottom: 8px;">Upload Abstract Document</span>
                            <span style="font-size: 0.95rem; color: #64748b;">Supported formats: DOC, DOCX, PDF (Max size: 5MB)</span>
                            <span id="file-chosen" style="margin-top: 20px; font-weight: 700; color: var(--green-accent); font-size: 1.1rem; display: none; background: rgba(0, 168, 150, 0.1); padding: 8px 16px; border-radius: 8px;"></span>
                        </label>
                        <input type="file" name="abstract_file" id="abstract_file" accept=".doc,.docx,.pdf" style="display: none;">
                        <span id="file-error" style="color: #ef4444; font-size: 0.95rem; margin-top: 10px; font-weight: 600; display: none;"><i class="fa-solid fa-circle-exclamation"></i> Please upload your abstract document before submitting.</span>
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

            // Abstract Upload Logic
            window.toggleAbstractUpload = function(val) {
                const uploadSection = document.getElementById('abstract-upload-section');
                const fileInput = document.getElementById('abstract_file');
                const options = document.querySelectorAll('.reg-type-option');
                
                // Style the options
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
                    uploadSection.style.display = 'block';
                } else {
                    uploadSection.style.display = 'none';
                    fileInput.value = ''; 
                    document.getElementById('file-chosen').style.display = 'none';
                    document.getElementById('file-error').style.display = 'none';
                }
            };

            const abstractUploadSection = document.getElementById('abstract-upload-section');
            const abstractFileInput = document.getElementById('abstract_file');
            const fileChosenLabel = document.getElementById('file-chosen');
            const form = document.getElementById('registration-form');
            const fileError = document.getElementById('file-error');

            if (abstractFileInput) {
                form.addEventListener('submit', function(e) {
                    const regType = document.querySelector('input[name="fields[registration_type]"]:checked');
                    if (regType && regType.value === 'Presentation') {
                        if (!abstractFileInput.files || abstractFileInput.files.length === 0) {
                            e.preventDefault(); 
                            fileError.style.display = 'block';
                            abstractUploadSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        }
                    }
                });

                abstractFileInput.addEventListener('change', function(e) {
                    if (this.files && this.files.length > 0) {
                        fileChosenLabel.style.display = 'inline-block';
                        fileChosenLabel.innerHTML = '<i class="fa-solid fa-file-check" style="margin-right: 5px;"></i> ' + this.files[0].name;
                        fileError.style.display = 'none';
                    } else {
                        fileChosenLabel.style.display = 'none';
                    }
                });
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
