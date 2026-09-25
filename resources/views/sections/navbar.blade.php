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
        <a href="/">Home</a>
        <a href="{{ route('committee') }}">Committee</a>
        <div class="nav-dropdown">
            <a href="#">Experts</a>
            <div class="nav-dropdown-content">
                <a href="{{ route('keynote-speakers') }}">Keynote Speakers</a>
                <a href="{{ route('distinguished-speakers') }}">Distinguished Speakers</a>
            </div>
        </div>

        <a href="{{ route('scientific-themes') }}">Tracks</a>
        <a href="{{ route('schedule') }}">Schedule</a>
        <a href="{{ route('awards') }}">Awards</a>
        <a href="{{ route('pre-conference') }}">Pre-Conference</a>
        <a href="{{ route('mcc-memorial') }}">MCC Memorial</a>
        <a href="{{ route('venue') }}">Visit</a>
    </div>
    
    <a href="{{ route('registration') }}" class="btn btn-green btn-register-nav">REGISTER <i class="fa-solid fa-arrow-right"></i></a>
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
