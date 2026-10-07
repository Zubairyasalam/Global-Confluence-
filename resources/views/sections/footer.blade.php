<!-- Global Conference Footer -->
<footer class="conference-footer" style="background: linear-gradient(180deg, #09172a 0%, #050d18 100%); color: #cbd5e1; font-family: 'Inter', system-ui, -apple-system, sans-serif; position: relative; overflow: hidden; border-top: 3px solid #009688;">
    
    <!-- Top Glowing Accent Gradient Line -->
    <div style="position: absolute; top: 0; left: 0; right: 0; height: 3px; background: linear-gradient(90deg, #009688 0%, #00e676 50%, #009688 100%); box-shadow: 0 0 15px rgba(0, 150, 136, 0.5);"></div>

    <!-- Main Footer Content (Expanded Width & Large Clear Typography) -->
    <div class="footer-container" style="max-width: 1380px; width: 95%; margin: 0 auto; padding: 70px 20px 50px 20px;">
        <div style="display: grid; grid-template-columns: 1.5fr 1fr 1fr 1.3fr; gap: 45px;" class="footer-grid-layout">
            
            <!-- Column 1: Brand / About (Social Icons Removed) -->
            <div class="footer-brand-col">
                <div style="margin-bottom: 22px;">
                    <a href="{{ url('/') }}" style="display: inline-block; background: #ffffff; padding: 12px 20px; border-radius: 12px; box-shadow: 0 6px 22px rgba(0, 0, 0, 0.28); border: 1px solid rgba(255, 255, 255, 0.25); transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='translateY(0)'">
                        <img src="{{ asset($settings['footer_logo'] ?? 'images/MMC-LOGO-2.jpg') }}" 
                             alt="{{ $settings['site_title'] ?? 'Conference Logo' }}" 
                             style="max-height: 85px; max-width: 200px; width: auto; height: auto; object-fit: contain; display: block;">
                    </a>
                </div>
                <p style="color: #94a3b8; line-height: 1.85; font-size: 1.06rem; margin: 0; text-align: justify;">
                    {{ $settings['footer_bio'] ?? 'We bring together brilliant minds from around the world to create transformative platforms for knowledge exchange, collaboration, and innovation in One Health and biomedical frontiers.' }}
                </p>
            </div>

            <!-- Column 2: Useful Links (Expanded Font Size) -->
            <div class="footer-links-col">
                <h3 style="color: #ffffff; font-size: 1.4rem; font-weight: 800; margin: 0 0 14px 0; letter-spacing: -0.3px;">
                    Useful <span style="color: #00A896;">Links</span>
                </h3>
                <div style="width: 45px; height: 3.5px; background: linear-gradient(90deg, #00A896, #00e676); border-radius: 2px; margin-bottom: 24px;"></div>
                
                <ul style="list-style: none; padding: 0; margin: 0;">
                    @php
                        $usefulLinksStr = $settings['footer_useful_links'] ?? "Home | /\nTechnical Events | /tracks\nSpeakers | /speakers\nDistinguished Awards | /awards\nCommittee | /committee\nRegistrations | /#pricing";
                        $usefulLinks = explode("\n", str_replace("\r", "", $usefulLinksStr));
                    @endphp
                    @foreach($usefulLinks as $link)
                        @php $parts = explode('|', $link); @endphp
                        @if(count($parts) >= 1 && trim($parts[0]) !== '')
                            <li style="margin-bottom: 14px;">
                                <a href="{{ count($parts) > 1 ? trim($parts[1]) : '#' }}" class="footer-nav-link">
                                    <i class="fa-solid fa-circle-chevron-right" style="color: #00A896; font-size: 0.95rem; transition: transform 0.2s ease;"></i>
                                    <span>{{ trim($parts[0]) }}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <!-- Column 3: Quick Links (Expanded Font Size) -->
            <div class="footer-links-col">
                <h3 style="color: #ffffff; font-size: 1.4rem; font-weight: 800; margin: 0 0 14px 0; letter-spacing: -0.3px;">
                    Quick <span style="color: #00A896;">Links</span>
                </h3>
                <div style="width: 45px; height: 3.5px; background: linear-gradient(90deg, #00A896, #00e676); border-radius: 2px; margin-bottom: 24px;"></div>
                
                <ul style="list-style: none; padding: 0; margin: 0;">
                    @php
                        $quickLinksStr = $settings['footer_quick_links'] ?? "Terms & Conditions | #\nPrivacy Policy | #\nCancellation Policy | #\nPre-Conference | /pre-conference\nStall Booking | /stall-booking\nContact Us | /#contact";
                        $quickLinks = explode("\n", str_replace("\r", "", $quickLinksStr));
                    @endphp
                    @foreach($quickLinks as $link)
                        @php $parts = explode('|', $link); @endphp
                        @if(count($parts) >= 1 && trim($parts[0]) !== '')
                            <li style="margin-bottom: 14px;">
                                <a href="{{ count($parts) > 1 ? trim($parts[1]) : '#' }}" class="footer-nav-link">
                                    <i class="fa-solid fa-circle-chevron-right" style="color: #00A896; font-size: 0.95rem; transition: transform 0.2s ease;"></i>
                                    <span>{{ trim($parts[0]) }}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <!-- Column 4: Conference Venue & Secretariat (Expanded Font Size) -->
            <div class="footer-contact-col">
                <h3 style="color: #ffffff; font-size: 1.4rem; font-weight: 800; margin: 0 0 14px 0; letter-spacing: -0.3px;">
                    Conference <span style="color: #00A896;">Venue</span>
                </h3>
                <div style="width: 45px; height: 3.5px; background: linear-gradient(90deg, #00A896, #00e676); border-radius: 2px; margin-bottom: 24px;"></div>

                <div style="display: flex; flex-direction: column; gap: 18px;">
                    <div style="display: flex; align-items: flex-start; gap: 14px;">
                        <div style="width: 38px; height: 38px; border-radius: 10px; background: rgba(0, 150, 136, 0.18); display: flex; align-items: center; justify-content: center; flex-shrink: 0; color: #00e676; border: 1px solid rgba(0, 150, 136, 0.35);">
                            <i class="fa-solid fa-location-dot" style="font-size: 1.1rem;"></i>
                        </div>
                        <div style="color: #94a3b8; font-size: 1.02rem; line-height: 1.6;">
                            <strong style="color: #f8fafc; font-size: 1.08rem; display: block; margin-bottom: 3px;">Madras Christian College (Autonomous)</strong>
                            Tambaram, Chennai - 600 059, Tamil Nadu, India.
                        </div>
                    </div>

                    <div style="display: flex; align-items: center; gap: 14px;">
                        <div style="width: 38px; height: 38px; border-radius: 10px; background: rgba(0, 150, 136, 0.18); display: flex; align-items: center; justify-content: center; flex-shrink: 0; color: #00e676; border: 1px solid rgba(0, 150, 136, 0.35);">
                            <i class="fa-solid fa-envelope" style="font-size: 1.05rem;"></i>
                        </div>
                        <a href="mailto:{{ $settings['contact_email'] ?? 'gohc2026@mcc.edu.in' }}" style="color: #94a3b8; font-size: 1.04rem; font-weight: 500; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#00e676'" onmouseout="this.style.color='#94a3b8'">
                            {{ $settings['contact_email'] ?? 'gohc2026@mcc.edu.in' }}
                        </a>
                    </div>

                    <div style="display: flex; align-items: center; gap: 14px;">
                        <div style="width: 38px; height: 38px; border-radius: 10px; background: rgba(0, 150, 136, 0.18); display: flex; align-items: center; justify-content: center; flex-shrink: 0; color: #00e676; border: 1px solid rgba(0, 150, 136, 0.35);">
                            <i class="fa-solid fa-globe" style="font-size: 1.05rem;"></i>
                        </div>
                        <a href="https://mcc.edu.in" target="_blank" style="color: #94a3b8; font-size: 1.04rem; font-weight: 500; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#00e676'" onmouseout="this.style.color='#94a3b8'">
                            www.mcc.edu.in
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bottom Copyright Bar (Centered) -->
    <div class="footer-bottom-bar" style="background: #030810; border-top: 1px solid rgba(255, 255, 255, 0.08); padding: 22px 24px;">
        <div style="max-width: 1380px; width: 95%; margin: 0 auto; display: flex; justify-content: center; align-items: center; position: relative; min-height: 42px;">
            <p style="margin: 0; color: #94a3b8; font-size: 1rem; line-height: 1.6; font-weight: 500; text-align: center;">
                {{ $settings['footer_copyright'] ?? '©2026 GLOBAL ONE HEALTH CONFLUENCE Design and Developed by MCC-MRF Innovation Park' }}
            </p>
            <a href="#" class="btn-scroll-top" onclick="window.scrollTo({top: 0, behavior: 'smooth'}); return false;" title="Back to Top" style="position: absolute; right: 0;">
                <i class="fa-solid fa-chevron-up"></i>
            </a>
        </div>
    </div>
</footer>

<style>
    .footer-nav-link {
        color: #94a3b8;
        text-decoration: none;
        font-size: 1.05rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.2s ease;
    }
    .footer-nav-link:hover {
        color: #ffffff;
        transform: translateX(5px);
    }
    .footer-nav-link:hover i {
        color: #00e676 !important;
        transform: scale(1.2);
    }

    .btn-scroll-top {
        width: 42px;
        height: 42px;
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: #00A896;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    .btn-scroll-top:hover {
        background: #009688;
        border-color: #009688;
        color: #ffffff;
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(0, 150, 136, 0.4);
    }

    @media (max-width: 992px) {
        .footer-grid-layout {
            grid-template-columns: 1fr 1fr !important;
            gap: 40px !important;
        }
    }

    @media (max-width: 576px) {
        .footer-grid-layout {
            grid-template-columns: 1fr !important;
            gap: 35px !important;
        }
    }
</style>
