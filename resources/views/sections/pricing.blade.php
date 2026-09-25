<!-- Registration Plans Section -->
<section class="pricing-section" style="background-color: #0f1524; padding: 60px 0;">
    <div class="container" style="max-width: 1100px; margin: 0 auto; padding: 0 20px;">
        
        <div class="section-header-center" style="text-align: center; margin-bottom: 40px;">
            <h2 class="section-title" style="margin-top: 0; margin-bottom: 12px; color: #ffffff; font-weight: 800; line-height: 1.2; white-space: nowrap;">{{ $settings['reg_section_title'] ?? 'Registration Plans' }}</h2>
            <div class="header-line" style="width: 60px; height: 4px; background-color: #009688; margin: 0 auto 15px auto;"></div>
            <p class="participants-desc" style="max-width: 800px; margin: 0 auto; color: #94a3b8 !important;">
                {{ $settings['reg_section_sub'] ?? 'Choose the appropriate registration tier to access the conference. Super early-bird rates are currently active.' }}
            </p>
        </div>

        <div class="registration-process" style="background-color: #f0f7fa; color: #1e3250; padding: 35px 40px; border-radius: 12px; margin-bottom: 50px; max-width: 900px; margin-left: auto; margin-right: auto; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
            <h3 style="text-align: center; color: #1e3250; margin-top: 0; font-size: 1.35rem; font-weight: 700; margin-bottom: 10px;">{{ $settings['reg_proc_title'] ?? 'Registration Process of GOHC - 2026' }}</h3>
            <p style="text-align: center; font-size: 1.05rem; margin-bottom: 25px; color: #1e3250;">{{ $settings['reg_proc_sub'] ?? 'Participation in GOHC 2026 is open only to registered delegates..' }}</p>
            
            <h4 style="text-align: center; color: #1e3250; font-size: 1.15rem; font-weight: 700; margin-bottom: 20px;">{{ $settings['reg_proc_heading'] ?? 'Steps for Conference Registration' }}</h4>
            
            <ul style="list-style-type: none; padding: 0; margin: 0;">
                @for($i = 1; $i <= 5; $i++)
                    @if(!empty($settings['reg_step_' . $i]))
                    <li style="margin-bottom: 15px; font-size: 1.05rem; font-style: italic; display: flex; align-items: flex-start; line-height: 1.5;">
                        <span style="color: #1e3250; font-weight: bold; font-style: normal; margin-right: 8px;">*</span> 
                        <span>{{ $settings['reg_step_' . $i] }}</span>
                    </li>
                    @endif
                @endfor
            </ul>
        </div>

        <div class="pricing-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; align-items: stretch;">            
            @foreach($registrationFees as $fee)
                @php
                    $features = json_decode($fee->features, true) ?? [];
                    $highlighted = $fee->is_highlighted;
                @endphp
                <div class="pricing-card {{ $highlighted ? 'pricing-card-hl' : '' }}"
                     style="background-color: {{ $highlighted ? '#112240' : '#1a2236' }}; padding: 0; border-radius: 16px; display: flex; flex-direction: column; position: relative; border: {{ $highlighted ? '2px solid #009688' : '1px solid rgba(255,255,255,0.06)' }}; box-shadow: {{ $highlighted ? '0 24px 50px rgba(0,150,136,0.18)' : '0 4px 20px rgba(0,0,0,0.2)' }}; overflow: hidden;">
                    
                    @if($highlighted)
                        <div style="position: absolute; top: -1px; left: 50%; transform: translateX(-50%); background: linear-gradient(90deg,#009688,#1de9b6); color: #fff; padding: 5px 18px; border-radius: 0 0 12px 12px; font-size: 0.72rem; font-weight: 900; text-transform: uppercase; letter-spacing: 1.5px; white-space: nowrap;">
                            Most Popular
                        </div>
                    @endif

                    {{-- Card header --}}
                    <div style="padding: {{ $highlighted ? '36px 24px 20px' : '28px 24px 20px' }}; border-bottom: 1px solid rgba(255,255,255,0.06);">
                        <h3 style="margin: 0 0 20px; color: #ffffff; font-size: 1.1rem; font-weight: 800; letter-spacing: 0.3px;">{{ $fee->category_name }}</h3>

                        {{-- Price Block --}}
                        <div style="background: rgba(0,150,136,0.1); border: 1px solid rgba(0,150,136,0.2); border-radius: 12px; padding: 12px 10px; text-align: center;">
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 6px;">
                                <div style="background: rgba(15, 23, 42, 0.6); padding: 8px 4px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.06);">
                                    <div style="font-size: 0.65rem; font-weight: 700; color: #1de9b6; text-transform: uppercase;">Offline</div>
                                    <div style="font-size: 0.95rem; font-weight: 800; color: #ffffff;">₹{{ number_format((int)$fee->price_inr) }}</div>
                                    <div style="font-size: 0.78rem; color: #94a3b8; font-weight: 600;">${{ $fee->price_usd }} USD</div>
                                </div>
                                <div style="background: rgba(15, 23, 42, 0.6); padding: 8px 4px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.06);">
                                    <div style="font-size: 0.65rem; font-weight: 700; color: #38bdf8; text-transform: uppercase;">Online</div>
                                    <div style="font-size: 0.95rem; font-weight: 800; color: #ffffff;">₹{{ number_format((int)$fee->price_online) }}</div>
                                    <div style="font-size: 0.78rem; color: #94a3b8; font-weight: 600;">${{ $fee->price_usd_online }} USD</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Features --}}
                    <div style="padding: 20px 24px; flex-grow: 1;">
                        <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px;">
                            @foreach($features as $feature)
                                <li style="display: flex; gap: 10px; font-size: 0.88rem; color: #cbd5e1; line-height: 1.5;">
                                    <i class="fa-solid fa-circle-check" style="color: #009688; margin-top: 3px; font-size: 0.85rem; flex-shrink: 0;"></i>
                                    {{ $feature }}
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- CTA --}}
                    <div style="padding: 0 24px 24px;">
                        <a href="{{ route('registration') }}"
                           style="display: block; width: 100%; text-align: center; background: {{ $highlighted ? 'linear-gradient(135deg,#009688,#1de9b6)' : 'rgba(255,255,255,0.06)' }}; color: {{ $highlighted ? '#ffffff' : '#38bdf8' }}; padding: 13px 0; border-radius: 10px; text-decoration: none; font-weight: 800; font-size: 0.95rem; letter-spacing: 0.3px; transition: all 0.3s ease; border: {{ $highlighted ? 'none' : '1px solid rgba(56,189,248,0.2)' }};">
                            Register Now
                        </a>
                    </div>

                </div>
            @endforeach

        </div>

        @if(isset($addons) && $addons->count() > 0)
            <div style="margin-top: 40px; display: flex; justify-content: center;">
                @foreach($addons as $addon)
                    <div class="addon-card" style="background-color: #1e293b; padding: 25px; border-radius: 12px; border: 1px solid rgba(0, 150, 136, 0.3); max-width: 800px; width: 100%; display: flex; flex-direction: column; gap: 20px;">
                        
                        <!-- Top Row: Icon, Title, Desc -->
                        <div class="addon-top-row" style="display: flex; align-items: flex-start; gap: 15px;">
                            <div class="addon-icon-wrapper" style="width: 50px; height: 50px; border-radius: 10px; background-color: rgba(0, 150, 136, 0.15); display: flex; justify-content: center; align-items: center; flex-shrink: 0;">
                                <i class="fa-solid fa-laptop-medical" style="font-size: 1.5rem; color: #26a69a;"></i>
                            </div>
                            <div>
                                <h4 class="addon-title" style="margin: 0 0 5px 0; color: #ffffff; font-size: 1.2rem; font-weight: 700;">{{ $addon->title }}</h4>
                                <p style="margin: 0; color: #94a3b8; font-size: 0.95rem;">{{ $addon->description ?? 'Intensive one-day hands-on training. Must be added to your registration.' }}</p>
                            </div>
                        </div>

                        <!-- Bottom Row: Price, Badge, Button -->
                        <div class="addon-bottom-row" style="display: flex; align-items: center; gap: 25px; justify-content: space-between;">
                            <div class="addon-price-col" style="display: flex; flex-direction: column;">
                                <div class="addon-price" style="font-size: 1.6rem; font-weight: 800; color: #26a69a; display: flex; align-items: baseline; gap: 5px;">
                                    {{ $addon->price }} <span style="font-size: 1.1rem;">INR</span>
                                </div>
                                @if($addon->badge_text)
                                    <div style="color: #ef4444; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; margin-top: 2px;">
                                        {{ $addon->badge_text }}
                                    </div>
                                @endif
                            </div>
                            
                            <a class="addon-btn" href="{{ route('registration') }}" style="background-color: transparent; border: 1px solid rgba(255,255,255,0.1); color: #ffffff; padding: 8px 20px; border-radius: 20px; text-decoration: none; font-size: 0.9rem; font-weight: 600; transition: all 0.3s ease; text-align: center; white-space: nowrap;">
                                Add to Ticket
                            </a>
                        </div>

                    </div>
                @endforeach
            </div>
        @endif

    </div>
</section>
