<!-- Topbar (Desktop Only) -->
<style>
    .marquee-container {
        flex-grow: 1;
        overflow: hidden;
        display: flex;
        align-items: center;
        padding-left: 20px;
        white-space: nowrap;
    }
    .marquee-content {
        display: flex;
        min-width: max-content;
        animation: marquee-scroll 20s linear infinite;
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
    <div class="topbar-left" style="flex-shrink: 0; padding-right: 20px; border-right: 1px solid rgba(255,255,255,0.2); display: flex; gap: 15px; align-items: center;">
        <span><i class="fa-solid fa-phone" style="margin-right: 5px;"></i> {{ $settings['contact_phone'] ?? '+91 9789582404' }}</span>
        <span><i class="fa-solid fa-phone" style="margin-right: 5px;"></i> {{ $settings['contact_phone_2'] ?? '+91 9025596984' }}</span>
        <span><i class="fa-solid fa-phone" style="margin-right: 5px;"></i> {{ $settings['contact_phone_3'] ?? '+91 8148018994' }}</span>
    </div>
    <div class="marquee-container">
        <div class="marquee-content">
            <!-- Set 1 -->
            <span style="margin-right: 40px;">Registration starts: 20th September 2026</span>
            <span style="margin-right: 40px;">Submission of abstract: 15th October 2026</span>
            <span style="margin-right: 40px;">Acceptance of abstract: 25th October 2026</span>
            <span style="margin-right: 40px;">Full paper: 20th November 2026</span>
            <!-- Set 2 -->
            <span style="margin-right: 40px;">Registration starts: 20th September 2026</span>
            <span style="margin-right: 40px;">Submission of abstract: 15th October 2026</span>
            <span style="margin-right: 40px;">Acceptance of abstract: 25th October 2026</span>
            <span style="margin-right: 40px;">Full paper: 20th November 2026</span>
        </div>
    </div>
</div>
