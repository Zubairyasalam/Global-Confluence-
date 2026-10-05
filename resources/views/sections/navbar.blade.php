<!-- Navbar -->
<nav class="navbar">
    <a href="/" class="logo" style="display: flex; align-items: center; gap: 15px;">
        <div style="display: flex; justify-content: center; align-items: center; padding: 5px 0;">
            <img src="{{ asset('images/MMC-LOGO-2.jpg') }}" alt="MMC Logo" style="height: 120px; width: auto; mix-blend-mode: multiply;">
        </div>
    </a>
    
    <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle Navigation">
        <i class="fa-solid fa-bars"></i>
    </button>
    
    <div class="nav-links" id="navLinks">
        <!-- 1. Home -->
        @if(($settings['nav_home_show'] ?? '1') == '1')
            <a href="{{ $settings['nav_home_url'] ?? '/' }}">{{ $settings['nav_home_label'] ?? 'Home' }}</a>
        @endif

        <!-- 2. Technical Events Dropdown -->
        @if(($settings['nav_tech_events_show'] ?? '1') == '1')
            <div class="nav-dropdown">
                <a href="{{ $settings['nav_tech_events_url'] ?? '#' }}" style="display: flex; align-items: center;">
                    {{ $settings['nav_tech_events_label'] ?? 'Technical Events' }}
                    <i class="fa-solid fa-chevron-down nav-arrow" style="font-size: 0.75rem; margin-left: 4px; transition: transform 0.2s;"></i>
                </a>
                <div class="nav-dropdown-content" style="min-width: 230px;">
                    @if(($settings['nav_tracks_show'] ?? '1') == '1')
                        <a href="{{ $settings['nav_tracks_url'] ?? route('scientific-themes') }}">{{ $settings['nav_tracks_label'] ?? 'Tracks' }}</a>
                    @endif

                    @if(($settings['nav_event_list_show'] ?? '1') == '1')
                        <div style="background-color: #f8fafc; border-top: 1px solid var(--border-light); padding: 5px 0;">
                            <div style="padding: 8px 20px 4px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: #00A896; letter-spacing: 0.5px; text-align: left;">
                                {{ $settings['nav_event_list_label'] ?? 'Events' }}
                            </div>
                            @if(($settings['nav_oral_show'] ?? '1') == '1')
                                <a href="{{ $settings['nav_oral_url'] ?? route('events.oral_presentation') }}" style="padding: 8px 20px 8px 28px; font-size: 0.88rem; color: #475569; text-align: left;">{{ $settings['nav_oral_label'] ?? 'Oral Presentation' }}</a>
                            @endif
                            @if(($settings['nav_poster_show'] ?? '1') == '1')
                                <a href="{{ $settings['nav_poster_url'] ?? route('events.poster_presentation') }}" style="padding: 8px 20px 8px 28px; font-size: 0.88rem; color: #475569; text-align: left;">{{ $settings['nav_poster_label'] ?? 'Poster Presentation' }}</a>
                            @endif
                            @if(($settings['nav_innovation_show'] ?? '1') == '1')
                                <a href="{{ $settings['nav_innovation_url'] ?? route('events.innovation_pitch') }}" style="padding: 8px 20px 8px 28px; font-size: 0.88rem; color: #475569; text-align: left;">{{ $settings['nav_innovation_label'] ?? 'Innovation Pitch' }}</a>
                            @endif
                            @if(($settings['nav_hackathon_show'] ?? '1') == '1')
                                <a href="{{ $settings['nav_hackathon_url'] ?? route('events.hackathon') }}" style="padding: 8px 20px 8px 28px; font-size: 0.88rem; color: #475569; text-align: left;">{{ $settings['nav_hackathon_label'] ?? 'Hackathon' }}</a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        @endif

        <!-- 3. Registrations -->
        @if(($settings['nav_registrations_show'] ?? '1') == '1')
            <a href="{{ $settings['nav_registrations_url'] ?? route('registration') }}">{{ $settings['nav_registrations_label'] ?? 'Registrations' }}</a>
        @endif

        <!-- 4. Experts (Dropdown) -->
        @if(($settings['nav_experts_show'] ?? '1') == '1')
            <div class="nav-dropdown">
                <a href="{{ $settings['nav_experts_url'] ?? '#' }}" style="display: flex; align-items: center;">
                    {{ $settings['nav_experts_label'] ?? 'Experts' }}
                    <i class="fa-solid fa-chevron-down nav-arrow" style="font-size: 0.75rem; margin-left: 4px; transition: transform 0.2s;"></i>
                </a>
                <div class="nav-dropdown-content">
                    @if(($settings['nav_keynote_show'] ?? '1') == '1')
                        <a href="{{ $settings['nav_keynote_url'] ?? route('keynote-speakers') }}">{{ $settings['nav_keynote_label'] ?? 'Keynote Speakers' }}</a>
                    @endif
                    @if(($settings['nav_distinguished_show'] ?? '1') == '1')
                        <a href="{{ $settings['nav_distinguished_url'] ?? route('distinguished-speakers') }}">{{ $settings['nav_distinguished_label'] ?? 'Distinguished Speakers' }}</a>
                    @endif
                </div>
            </div>
        @endif

        <!-- 5. Distinguished Awards -->
        @if(($settings['nav_dist_awards_show'] ?? '1') == '1')
            <a href="{{ $settings['nav_dist_awards_url'] ?? route('awards') }}">{{ $settings['nav_dist_awards_label'] ?? 'Distinguished Awards' }}</a>
        @endif

        <!-- 6. Committee -->
        @if(($settings['nav_committee_show'] ?? '1') == '1')
            <a href="{{ $settings['nav_committee_url'] ?? route('committee') }}">{{ $settings['nav_committee_label'] ?? 'Committee' }}</a>
        @endif

        <!-- 7. Pre-Conference -->
        @if(($settings['nav_preconf_show'] ?? '1') == '1')
            <a href="{{ $settings['nav_preconf_url'] ?? route('pre-conference') }}">{{ $settings['nav_preconf_label'] ?? 'Pre-Conference' }}</a>
        @endif

        <!-- 8. Stall Booking and Merchandise -->
        @if(($settings['nav_stall_show'] ?? '1') == '1')
            <a href="{{ $settings['nav_stall_url'] ?? '/page/stall-booking-and-merchandise' }}">{{ $settings['nav_stall_label'] ?? 'Stall Booking and Merchandise' }}</a>
        @endif

        <!-- 9. Glimpse of MCC Dropdown -->
        @if(($settings['nav_mcc_show'] ?? '1') == '1')
            <div class="nav-dropdown">
                <a href="{{ $settings['nav_mcc_url'] ?? '#' }}" style="display: flex; align-items: center;">
                    {{ $settings['nav_mcc_label'] ?? 'Glimpse of MCC' }}
                    <i class="fa-solid fa-chevron-down nav-arrow" style="font-size: 0.75rem; margin-left: 4px; transition: transform 0.2s;"></i>
                </a>
                <div class="nav-dropdown-content" style="min-width: 220px;">
                    <a href="{{ route('mcc-memorial') }}" style="padding: 10px 20px; font-size: 0.88rem; color: #475569; text-align: left; display: flex; align-items: center; gap: 8px;">
                        <i class="fa-solid fa-landmark" style="color: #00A896; font-size: 0.85rem;"></i> {{ $settings['nav_mcc_gallery_label'] ?? 'MCC Gallery' }}
                    </a>
                    <a href="{{ route('venue') }}" style="padding: 10px 20px; font-size: 0.88rem; color: #475569; text-align: left; display: flex; align-items: center; gap: 8px;">
                        <i class="fa-solid fa-map-location-dot" style="color: #00A896; font-size: 0.85rem;"></i> {{ $settings['nav_visit_places_label'] ?? 'Places to Visit' }}
                    </a>
                </div>
            </div>
        @endif

        <!-- 10. Contact Us -->
        @if(($settings['nav_contact_show'] ?? '1') == '1')
            <a href="{{ $settings['nav_contact_url'] ?? '/page/contact-us' }}">{{ $settings['nav_contact_label'] ?? 'Contact Us' }}</a>
        @endif
    </div>
    
    <!-- Header Action Button (CTA) -->
    @if(($settings['nav_register_show'] ?? '1') == '1')
        <a href="{{ $settings['nav_register_url'] ?? route('registration') }}" class="btn btn-green btn-register-nav">{{ $settings['nav_register_label'] ?? 'REGISTER' }} <i class="fa-solid fa-arrow-right"></i></a>
    @endif
</nav>

<!-- Mobile Announcement Banner (below navbar on mobile only) -->
<div class="mobile-announcement" id="mobileAnnouncement">
    <div class="mobile-announcement-inner">
        <div class="mobile-announce-item active">
            <i class="fa-solid fa-headset"></i>
            <span>{{ $settings['contact_phone'] ?? '+91 9876543210' }}</span>
            <span class="ma-sep">·</span>
            <i class="fa-solid fa-video"></i>
            <span>{{ $settings['topbar_format'] ?? 'Online | In-person' }}</span>
        </div>
        <div class="mobile-announce-item">
            <i class="fa-regular fa-file-lines"></i>
            @if(isset($deadlines) && $deadlines->count() > 0)
                <span>{{ $deadlines[0]->title }}: {{ \Carbon\Carbon::parse($deadlines[0]->deadline_date)->format('M d, Y') }}</span>
            @else
                <span>Abstract Submission Deadline: Sep 10, 2026</span>
            @endif
        </div>
        <div class="mobile-announce-item">
            <i class="fa-solid fa-ticket"></i>
            @if(isset($deadlines) && $deadlines->count() > 1)
                <span>{{ $deadlines[1]->title }}: {{ \Carbon\Carbon::parse($deadlines[1]->deadline_date)->format('M d, Y') }}</span>
            @else
                <span>Early Bird Registration: Oct 15, 2026</span>
            @endif
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile nav toggle
        var mobileToggle = document.getElementById('mobileToggle');
        var navLinks = document.getElementById('navLinks');
        if (mobileToggle && navLinks) {
            mobileToggle.addEventListener('click', function() {
                navLinks.classList.toggle('active');
            });
        }

        // Announcement ticker (no dots)
        var announceItems = document.querySelectorAll('.mobile-announce-item');
        if (announceItems.length < 2) return;
        var announceCur = 0;

        function showAnnounce(idx) {
            announceItems[announceCur].classList.add('leaving');
            var prev = announceCur;
            setTimeout(function() {
                announceItems[prev].classList.remove('active', 'leaving');
                announceCur = idx;
                announceItems[announceCur].classList.add('active');
            }, 380);
        }

        setInterval(function() {
            showAnnounce((announceCur + 1) % announceItems.length);
        }, 2800);
    });
</script>
