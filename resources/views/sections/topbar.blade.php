<!-- Topbar (Desktop Only) -->
<style>
    .topbar-desktop {
        padding: 8px 30px;
        display: flex;
        align-items: center;
        background-color: #0f233a;
        color: #ffffff;
        font-size: 0.85rem;
    }
    .topbar-left {
        flex-shrink: 0;
        padding-right: 25px;
        border-right: 1px solid rgba(255,255,255,0.25);
        display: flex;
        gap: 15px;
        align-items: center;
        white-space: nowrap;
        font-weight: 500;
        z-index: 2;
        background-color: #0f233a;
    }
    .marquee-container {
        flex-grow: 1;
        overflow: hidden;
        display: flex;
        align-items: center;
        padding-left: 25px;
        white-space: nowrap;
        position: relative;
        min-width: 0;
    }
    .marquee-content {
        display: flex;
        min-width: max-content;
        animation: marquee-scroll 25s linear infinite;
        will-change: transform;
    }
    .marquee-container:hover .marquee-content {
        animation-play-state: paused;
    }
    @keyframes marquee-scroll {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
</style>
<div class="topbar topbar-desktop">
    <div class="topbar-left">
        <span><i class="fa-solid fa-phone" style="margin-right: 5px; color: #00A896;"></i> {{ $settings['contact_phone'] ?? '+91 9789582404' }}</span>
        <span><i class="fa-solid fa-phone" style="margin-right: 5px; color: #00A896;"></i> {{ $settings['contact_phone_2'] ?? '+91 9025596984' }}</span>
        <span><i class="fa-solid fa-phone" style="margin-right: 5px; color: #00A896;"></i> {{ $settings['contact_phone_3'] ?? '+91 81480 18894' }}</span>
    </div>
    <div class="marquee-container">
        <div class="marquee-content">
            @if(isset($deadlines) && count($deadlines) > 0)
                @foreach($deadlines as $dl)
                    <span style="margin-right: 50px;">{{ $dl->title }}: {{ $dl->deadline_date }}</span>
                @endforeach
                @foreach($deadlines as $dl)
                    <span style="margin-right: 50px;">{{ $dl->title }}: {{ $dl->deadline_date }}</span>
                @endforeach
            @else
                <span style="margin-right: 50px;">Registration starts: {{ $settings['reg_start_date'] ?? '20th September 2026' }}</span>
                <span style="margin-right: 50px;">Pre-Conference: {{ $settings['pre_conf_date'] ?? '9th October 2026' }}</span>
                <span style="margin-right: 50px;">Submission of abstract: {{ $settings['abstract_sub_date'] ?? '15th October 2026' }}</span>
                <span style="margin-right: 50px;">Acceptance of abstract: {{ $settings['abstract_acc_date'] ?? '25th October 2026' }}</span>
                <span style="margin-right: 50px;">Full paper: {{ $settings['full_paper_date'] ?? '20th November 2026' }}</span>
            @endif
        </div>
    </div>
</div>
