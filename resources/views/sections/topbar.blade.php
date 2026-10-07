<!-- Topbar (Desktop Only) -->
@php
    $topbarBg = $settings['topbar_bg_color'] ?? '#0f233a';
    $topbarText = $settings['topbar_text_color'] ?? '#ffffff';
    $topbarSpeed = $settings['topbar_speed'] ?? '55';

    $tickerMode = $settings['topbar_ticker_mode'] ?? 'custom';
    $customItems = [];
    for ($t = 1; $t <= 20; $t++) {
        if (!empty($settings['topbar_ticker_' . $t])) {
            $customItems[] = $settings['topbar_ticker_' . $t];
        }
    }
    if (empty($customItems)) {
        $customItems = [
            'All the Presentation will be published as a conference proceedings in ISBN indexed book',
            'Quality presentation will be peer reviewed and considered for further publication in selected Scopus/ WoS indexed journals'
        ];
    }
@endphp

<style>
    .topbar-desktop {
        padding: 9px 20px;
        display: flex;
        align-items: center;
        background-color: {{ $topbarBg }};
        color: {{ $topbarText }};
        font-size: 0.88rem;
        overflow: hidden;
    }
    .marquee-container {
        flex-grow: 1;
        overflow: hidden;
        display: flex;
        align-items: center;
        white-space: nowrap;
        position: relative;
        width: 100%;
    }
    .marquee-content {
        display: flex;
        min-width: max-content;
        animation: marquee-scroll {{ $topbarSpeed }}s linear infinite;
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
    <div class="marquee-container">
        <div class="marquee-content">
            @if($tickerMode === 'custom' || count($customItems) > 0)
                @for($r = 0; $r < 4; $r++)
                    @foreach($customItems as $item)
                        <span style="margin-right: 45px; display: inline-flex; align-items: center; gap: 8px;">
                            <i class="fa-solid fa-circle" style="color: #00A896; font-size: 0.45rem;"></i>
                            <span>{{ $item }}</span>
                            <span style="color: rgba(255,255,255,0.25); margin-left: 20px;">|</span>
                        </span>
                    @endforeach
                @endfor
            @elseif(isset($deadlines) && count($deadlines) > 0)
                @foreach($deadlines as $dl)
                    <span style="margin-right: 50px;">{{ $dl->title }}: {{ $dl->deadline_date }}</span>
                @endforeach
                @foreach($deadlines as $dl)
                    <span style="margin-right: 50px;">{{ $dl->title }}: {{ $dl->deadline_date }}</span>
                @endforeach
            @else
                <span style="margin-right: 50px;">All the Presentation will be published as a conference proceedings in ISBN indexed book</span>
                <span style="margin-right: 50px;">Quality presentation will be peer reviewed and considered for further publication in selected Scopus/ WoS indexed journals</span>
            @endif
        </div>
    </div>
</div>
