<!-- Footer -->
<footer class="footer">
    <div class="footer-top">
        <div class="footer-contact-bar">
            <div class="fc-item">
                <div class="fc-icon-box">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <div class="fc-text">
                    <strong>Reach Us</strong>
                    <p style="font-size: 0.9rem; line-height: 1.3;">{!! nl2br(e($settings['contact_address'] ?? 'Madras Christian College\nTambaram East, Chennai 600 059')) !!}</p>
                </div>
            </div>
            <div class="fc-item">
                <div class="fc-icon-box">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="fc-text">
                    <strong>Email Us</strong>
                    <p>gohc2026@gmail.com</p>
                </div>
            </div>
            <div class="fc-item">
                <div class="fc-icon-box">
                    <i class="fa-solid fa-globe"></i>
                </div>
                <div class="fc-text">
                    <strong>Website</strong>
                    <p><a href="{{ $settings['footer_website'] ?? 'https://mcc.edu.in/' }}" target="_blank" style="color: inherit; text-decoration: none;">{{ $settings['footer_website'] ?? 'https://mcc.edu.in/' }}</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-main">
        <div class="footer-col brand-col">
            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px; flex-wrap: wrap;">
                @php
                    $partnerLogos = collect();
                    try {
                        if (\Illuminate\Support\Facades\Schema::hasTable('partner_logos')) {
                            $partnerLogos = \App\Models\PartnerLogo::where('is_active', true)->orderBy('sort_order')->get();
                        }
                    } catch (\Throwable $e) {
                        $partnerLogos = collect();
                    }
                @endphp
                @if($partnerLogos->count() > 0)
                    @foreach($partnerLogos as $logo)
                        <a href="{{ $logo->link_url ?? '/' }}" class="footer-logo" style="text-decoration: none; display: inline-flex; align-items: center; justify-content: center; background-color: #ffffff; padding: 6px 12px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.15); transition: transform 0.2s;" onmouseover="this.style.transform='translateY(-2px)'" onmouseout="this.style.transform='translateY(0)'" title="{{ $logo->name }}">
                            <img src="{{ asset($logo->logo_path) }}" alt="{{ $logo->name }}" style="max-height: 85px; max-width: 130px; width: auto; height: auto; object-fit: contain; border-radius: 6px;">
                        </a>
                    @endforeach
                @else
                    <a href="https://mcc.edu.in" target="_blank" class="footer-logo" style="text-decoration: none; display: inline-flex; align-items: center; justify-content: center; background-color: #ffffff; padding: 6px 12px; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
                        <img src="{{ asset('images/logo.png') }}" alt="MCC" style="max-height: 85px; max-width: 130px; object-fit: contain;">
                    </a>
                @endif
            </div>
            <p style="color: #94a3b8; line-height: 1.7; font-size: 0.95rem; text-align: justify; margin-top: 0;">{{ $settings['footer_bio'] ?? 'We bring together brilliant minds from around the world to create transformative platforms for knowledge exchange, collaboration, and innovation.' }}</p>
        </div>
        <div class="footer-col">
            <h3>Useful <span>Links</span></h3>
            <ul>
                @php
                    $usefulLinksStr = $settings['footer_useful_links'] ?? "Home | /\nSpeakers | #\nCommittee | #";
                    $usefulLinks = explode("\n", str_replace("\r", "", $usefulLinksStr));
                @endphp
                @foreach($usefulLinks as $link)
                    @php $parts = explode('|', $link); @endphp
                    @if(count($parts) >= 1 && trim($parts[0]) !== '')
                        <li><a href="{{ count($parts) > 1 ? trim($parts[1]) : '#' }}"><i class="fa-solid fa-circle-arrow-right"></i> {{ trim($parts[0]) }}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="footer-col">
            <h3>Quick <span>Links</span></h3>
            <ul>
                @php
                    $quickLinksStr = $settings['footer_quick_links'] ?? "Terms & Conditions | #\nPrivacy Policy | #\nCancellation Policy | #\nContact | #";
                    $quickLinks = explode("\n", str_replace("\r", "", $quickLinksStr));
                @endphp
                @foreach($quickLinks as $link)
                    @php $parts = explode('|', $link); @endphp
                    @if(count($parts) >= 1 && trim($parts[0]) !== '')
                        <li><a href="{{ count($parts) > 1 ? trim($parts[1]) : '#' }}"><i class="fa-solid fa-circle-arrow-right"></i> {{ trim($parts[0]) }}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>{{ $settings['footer_copyright'] ?? '©2026 GLOBAL ONE HEALTH CONFLUENCE Design and Developed by MCC-MRF Innovation Park' }}</p>
        <a href="#" class="back-to-top"><i class="fa-solid fa-angles-up"></i></a>
    </div>
</footer>
