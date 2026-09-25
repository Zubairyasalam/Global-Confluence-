<!-- Registration Details Section (Professional Dark Theme) -->
<section id="registration-plans" class="registration-section" style="background-color: #0f172a; padding: 40px 0; position: relative; overflow: hidden;">
    <!-- Abstract background elements -->
    <div style="position: absolute; top: -100px; left: -100px; width: 400px; height: 400px; background: radial-gradient(circle, rgba(0, 150, 136, 0.15) 0%, rgba(15, 23, 42, 0) 70%); border-radius: 50%;"></div>
    <div style="position: absolute; bottom: -100px; right: -100px; width: 500px; height: 500px; background: radial-gradient(circle, rgba(38, 166, 154, 0.1) 0%, rgba(15, 23, 42, 0) 70%); border-radius: 50%;"></div>

    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px; position: relative; z-index: 1;">
        
        <!-- Centered Header -->
        <div class="section-header-center" style="text-align: center; margin-bottom: 30px;">
            <h2 class="section-title" style="margin-top: 0; margin-bottom: 12px; color: #ffffff; font-weight: 800; line-height: 1.2; white-space: nowrap;">{{ $settings['reg_section_title'] ?? 'Registration Plans' }}</h2>
            <div class="header-line" style="width: 60px; height: 4px; background-color: #4fd1c5; margin: 0 auto 15px auto;"></div>
            <p class="participants-desc" style="max-width: 700px; margin: 0 auto; color: #94a3b8 !important;">
                {{ $settings['reg_section_sub'] ?? 'Choose the appropriate registration tier to access the conference. Super early-bird rates are currently active.' }}
            </p>
        </div>

        <!-- Registration Process -->
        <div class="registration-process" style="background-color: #f0f7fa; color: #1e3250; padding: 35px 40px; border-radius: 12px; margin-bottom: 50px; max-width: 900px; margin-left: auto; margin-right: auto; box-shadow: 0 10px 30px rgba(0,0,0,0.15); position: relative; z-index: 2;">
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

        <!-- 4-Column Pricing Grid -->
        <div class="pricing-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 25px; margin-bottom: 60px; max-width: 1200px; margin: 0 auto; padding-top: 15px;">
            @if(isset($registrationFees) && count($registrationFees) > 0)
                @foreach($registrationFees as $fee)
                    @if($fee->is_highlighted)
                        <!-- Highlighted Card -->
                        <div class="pricing-card highlighted" style="background: linear-gradient(145deg, #0f172a, #1e293b); border: 2px solid #4fd1c5; border-radius: 20px; padding: 35px 30px 30px; display: flex; flex-direction: column; position: relative; transform: scale(1.04); box-shadow: 0 20px 40px rgba(0, 150, 136, 0.2); z-index: 2; transition: transform 0.3s ease; overflow: visible !important;" onmouseover="this.style.transform='scale(1.04) translateY(-5px)'" onmouseout="this.style.transform='scale(1.04) translateY(0)'">
                            <div class="popular-badge" style="position: absolute; top: 0; left: 50%; transform: translateX(-50%); background: linear-gradient(90deg, #009688, #4fd1c5); color: #ffffff; padding: 6px 20px; border-radius: 0 0 12px 12px; font-weight: 800; font-size: 0.75rem; letter-spacing: 1.2px; text-transform: uppercase; white-space: nowrap; box-shadow: 0 4px 12px rgba(0,150,136,0.3); z-index: 10;">Most Popular</div>
                            
                            <h3 class="pricing-category" style="margin: 10px 0 10px 0; color: #4fd1c5; font-size: 1.25rem; font-weight: 700;">{{ $fee->category_name }}</h3>
                            <div class="pricing-amount" style="margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid rgba(79, 209, 197, 0.2);">
                                <div style="display: flex; align-items: baseline; gap: 6px; justify-content: center; margin-bottom: 10px;">
                                    <span class="price-value" style="font-size: 2.2rem; font-weight: 800; color: #ffffff;">₹{{ number_format((int)$fee->price_inr) }}</span>
                                    <span class="price-currency" style="font-size: 0.95rem; color: #4fd1c5; font-weight: 700;">INR</span>
                                </div>
                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 6px; background: rgba(15, 23, 42, 0.6); padding: 8px; border-radius: 10px; border: 1px solid rgba(255,255,255,0.06); text-align: center;">
                                    <div>
                                        <div style="font-size: 0.65rem; font-weight: 700; color: #4fd1c5; text-transform: uppercase;">Offline</div>
                                        <div style="font-size: 0.88rem; font-weight: 700; color: #ffffff;">₹{{ number_format((int)$fee->price_inr) }} / ${{ $fee->price_usd }}</div>
                                    </div>
                                    <div style="border-left: 1px solid rgba(255,255,255,0.08);">
                                        <div style="font-size: 0.65rem; font-weight: 700; color: #38bdf8; text-transform: uppercase;">Online</div>
                                        <div style="font-size: 0.88rem; font-weight: 700; color: #ffffff;">₹{{ number_format((int)$fee->price_online) }} / ${{ $fee->price_usd_online }}</div>
                                    </div>
                                </div>
                            </div>
                            
                            <ul class="pricing-features" style="list-style: none; padding: 0; margin: 0 0 30px 0; display: flex; flex-direction: column; gap: 12px; flex-grow: 1;">
                                @php $features = json_decode($fee->features, true) ?? []; @endphp
                                @foreach($features as $feature)
                                    <li style="display: flex; gap: 10px; color: #cbd5e1; font-size: 0.95rem;"><i class="fa-solid fa-circle-check" style="color: #4fd1c5; margin-top: 4px;"></i> {{ $feature }}</li>
                                @endforeach
                            </ul>
                            <a class="pricing-btn" href="/registration" style="display: block; text-align: center; background: linear-gradient(90deg, #009688, #4fd1c5); color: #ffffff; padding: 12px 0; border-radius: 10px; text-decoration: none; font-weight: bold; font-size: 1rem; box-shadow: 0 10px 20px rgba(0, 150, 136, 0.2); transition: all 0.3s ease;" onmouseover="this.style.boxShadow='0 15px 25px rgba(0, 150, 136, 0.4)'" onmouseout="this.style.boxShadow='0 10px 20px rgba(0, 150, 136, 0.2)'">Register Now</a>
                        </div>
                    @else
                        <!-- Standard Card -->
                        <div class="pricing-card" style="background-color: #1e293b; border: 1px solid #334155; border-radius: 20px; padding: 30px; display: flex; flex-direction: column; transition: transform 0.3s ease, border-color 0.3s ease; box-shadow: 0 15px 30px rgba(0,0,0,0.2);" onmouseover="this.style.transform='translateY(-8px)'; this.style.borderColor='#4fd1c5';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='#334155';">
                            <h3 class="pricing-category" style="margin: 0 0 10px 0; color: #f8fafc; font-size: 1.25rem; font-weight: 700;">{{ $fee->category_name }}</h3>
                            <div class="pricing-amount" style="margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #334155;">
                                <div style="display: flex; align-items: baseline; gap: 6px; justify-content: center; margin-bottom: 10px;">
                                    <span class="price-value" style="font-size: 2.2rem; font-weight: 800; color: #ffffff;">₹{{ number_format((int)$fee->price_inr) }}</span>
                                    <span class="price-currency" style="font-size: 0.95rem; color: #94a3b8; font-weight: 600;">INR</span>
                                </div>
                                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 6px; background: rgba(15, 23, 42, 0.6); padding: 8px; border-radius: 10px; border: 1px solid rgba(255,255,255,0.06); text-align: center;">
                                    <div>
                                        <div style="font-size: 0.65rem; font-weight: 700; color: #4fd1c5; text-transform: uppercase;">Offline</div>
                                        <div style="font-size: 0.88rem; font-weight: 700; color: #ffffff;">₹{{ number_format((int)$fee->price_inr) }} / ${{ $fee->price_usd }}</div>
                                    </div>
                                    <div style="border-left: 1px solid rgba(255,255,255,0.08);">
                                        <div style="font-size: 0.65rem; font-weight: 700; color: #38bdf8; text-transform: uppercase;">Online</div>
                                        <div style="font-size: 0.88rem; font-weight: 700; color: #ffffff;">₹{{ number_format((int)$fee->price_online) }} / ${{ $fee->price_usd_online }}</div>
                                    </div>
                                </div>
                            </div>
                            
                            <ul class="pricing-features" style="list-style: none; padding: 0; margin: 0 0 30px 0; display: flex; flex-direction: column; gap: 12px; flex-grow: 1;">
                                @php $features = json_decode($fee->features, true) ?? []; @endphp
                                @foreach($features as $feature)
                                    <li style="display: flex; gap: 10px; color: #cbd5e1; font-size: 0.95rem;"><i class="fa-solid fa-circle-check" style="color: #4fd1c5; margin-top: 4px;"></i> {{ $feature }}</li>
                                @endforeach
                            </ul>
                            <a class="pricing-btn" href="/registration" style="display: block; text-align: center; background: rgba(79, 209, 197, 0.1); color: #4fd1c5; padding: 12px 0; border-radius: 10px; text-decoration: none; font-weight: bold; font-size: 1rem; border: 1px solid rgba(79, 209, 197, 0.2); transition: all 0.3s ease;" onmouseover="this.style.background='#4fd1c5'; this.style.color='#0f172a'" onmouseout="this.style.background='rgba(79, 209, 197, 0.1)'; this.style.color='#4fd1c5'">Register Now</a>
                        </div>
                    @endif
                @endforeach
            @else
                <!-- Fallback if database is empty -->
                <div style="grid-column: 1 / -1; text-align: center; color: #94a3b8; padding: 40px;">
                    <i class="fa-solid fa-tags" style="font-size: 3rem; margin-bottom: 15px; color: #334155;"></i>
                    <p>Registration plans are currently being updated. Please check back soon.</p>
                </div>
            @endif

        </div>

        <!-- Add-on Workshop Alert Mobile Styles -->
        <style>
            @media (max-width: 768px) {
                .addon-card {
                    flex-direction: column !important;
                    align-items: flex-start !important;
                    padding: 25px 20px !important;
                    gap: 25px !important;
                    margin-top: 30px !important;
                }
                .addon-top-row {
                    flex-direction: column !important;
                    align-items: flex-start !important;
                    gap: 15px !important;
                    min-width: 100% !important;
                }
                .addon-bottom-row {
                    width: 100% !important;
                    flex-direction: column !important;
                    align-items: flex-start !important;
                    gap: 20px !important;
                }
                .addon-price-col {
                    align-items: flex-start !important;
                }
                .addon-btn {
                    width: 100% !important;
                    text-align: center !important;
                }
            }
        </style>
        {{-- 
        <div class="addon-card" style="background: rgba(30, 41, 59, 0.8); backdrop-filter: blur(10px); border: 1px solid rgba(79, 209, 197, 0.3); border-radius: 16px; padding: 25px 40px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 20px; max-width: 1200px; width: 100%; margin: 40px auto 0 auto; box-shadow: 0 15px 30px rgba(0,0,0,0.2);">
            <div class="addon-top-row" style="display: flex; align-items: center; gap: 20px; flex: 1; min-width: 300px;">
                <div class="addon-icon-wrapper" style="width: 50px; height: 50px; border-radius: 12px; background: rgba(79, 209, 197, 0.15); display: flex; justify-content: center; align-items: center; flex-shrink: 0;">
                    <i class="fa-solid fa-laptop-medical" style="font-size: 1.8rem; color: #4fd1c5;"></i>
                </div>
                <div>
                    <h4 class="addon-title" style="margin: 0 0 5px 0; color: #f8fafc; font-size: 1.3rem;">Pre-Conference Metagenomics Workshop</h4>
                    <p style="margin: 0; color: #94a3b8; font-size: 1rem;">Intensive one-day hands-on training. Must be added to your registration.</p>
                </div>
            </div>
            <div class="addon-bottom-row" style="display: flex; align-items: center; gap: 20px; flex-shrink: 0;">
                <div class="addon-price-col" style="display: flex; flex-direction: column; align-items: flex-end;">
                    <div class="addon-price" style="color: #4fd1c5; font-size: 1.8rem; font-weight: 800; display: flex; align-items: baseline; gap: 5px; line-height: 1;">
                        500 <span style="font-size: 1.1rem;">INR</span>
                    </div>
                    <div class="addon-seats-badge" style="color: #ef4444; font-size: 0.8rem; font-weight: bold; text-transform: uppercase; letter-spacing: 1px; margin-top: 5px;">Limited Seats</div>
                </div>
                <a class="addon-btn" href="/registration" style="background: transparent; color: #f8fafc; border: 2px solid #334155; padding: 12px 25px; border-radius: 30px; text-decoration: none; font-weight: bold; transition: all 0.3s ease; white-space: nowrap;" onmouseover="this.style.borderColor='#4fd1c5'; this.style.color='#4fd1c5'" onmouseout="this.style.borderColor='#334155'; this.style.color='#f8fafc'">Add to Ticket</a>
            </div>
        </div>
        --}}

    </div>
</section>
