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
            <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 15px;">
                <a href="/" class="footer-logo" style="text-decoration: none; display: inline-block;">
                    <img src="{{ asset('images/MMC-LOGO-2.jpg') }}" alt="MMC Logo" style="max-height: 180px; width: auto; filter: grayscale(1) invert(1) contrast(5); mix-blend-mode: screen; opacity: 0.9; transform: translateX(-15px);">
                </a>
                <a href="/" class="footer-logo" style="text-decoration: none; display: inline-block;">
                    <img src="{{ asset('images/nis-logo.png') }}" alt="NIS Logo" style="max-height: 110px; width: auto;">
                </a>
                <a href="/" class="footer-logo" style="text-decoration: none; display: inline-block; background-color: white; padding: 10px; border-radius: 10px;">
                    <img src="{{ asset('images/msmf_logo.png') }}" alt="MSMF Logo" style="max-height: 100px; width: auto;">
                </a>
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
