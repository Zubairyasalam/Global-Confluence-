<!-- Programme Schedule Section -->
<section id="schedule" class="schedule-section" style="background: #ffffff; padding: 20px 0 70px; font-family: 'Inter', system-ui, -apple-system, sans-serif;">
    <div class="container" style="max-width: 1100px; margin: 0 auto; padding: 0 20px;">
        
        <!-- Section Header -->
        <div style="text-align: center; margin-bottom: 45px;">
            <h2 style="margin: 0 0 14px 0; color: #0f172a; font-size: 2.2rem; font-weight: 800; letter-spacing: -0.5px; text-transform: uppercase;">
                {{ $settings['sched_title'] ?? 'PROGRAMME SCHEDULE' }}
            </h2>
            <div style="width: 60px; height: 3px; background: #009688; margin: 0 auto 16px auto; border-radius: 2px;"></div>
            <p style="max-width: 600px; margin: 0 auto; color: #64748b; font-size: 1.05rem; line-height: 1.6;">
                {{ $settings['sched_sub'] ?? 'Complete schedule of sessions, guest lectures, and presentations for Day 1 and Day 2.' }}
            </p>
        </div>

        <!-- Professional Tab Navigation -->
        <div style="display: flex; justify-content: center; gap: 10px; margin-bottom: 40px; border-bottom: 2px solid #e2e8f0; padding-bottom: 0;">
            <button onclick="switchScheduleTab('day1')" id="tab-btn-day1" class="schedule-nav-tab active" style="padding: 14px 30px; border: none; border-bottom: 3px solid #009688; background: transparent; color: #009688; font-weight: 700; font-size: 1.05rem; cursor: pointer; transition: all 0.2s ease; margin-bottom: -2px;">
                <i class="fa-solid fa-calendar-day" style="margin-right: 8px;"></i> {{ $settings['sched_day1_title'] ?? 'DAY – I' }}
            </button>
            <button onclick="switchScheduleTab('day2')" id="tab-btn-day2" class="schedule-nav-tab" style="padding: 14px 30px; border: none; border-bottom: 3px solid transparent; background: transparent; color: #64748b; font-weight: 600; font-size: 1.05rem; cursor: pointer; transition: all 0.2s ease; margin-bottom: -2px;">
                <i class="fa-solid fa-calendar-days" style="margin-right: 8px;"></i> {{ $settings['sched_day2_title'] ?? 'DAY – II' }}
            </button>
            <button onclick="switchScheduleTab('tracks')" id="tab-btn-tracks" class="schedule-nav-tab" style="padding: 14px 30px; border: none; border-bottom: 3px solid transparent; background: transparent; color: #64748b; font-weight: 600; font-size: 1.05rem; cursor: pointer; transition: all 0.2s ease; margin-bottom: -2px;">
                <i class="fa-solid fa-layer-group" style="margin-right: 8px;"></i> Track-wise Schedule
            </button>
        </div>

        <!-- DAY 1 TAB PANEL -->
        <div id="schedule-content-day1" class="schedule-tab-panel" style="display: block;">
            <div style="border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden; background: #ffffff; box-shadow: 0 4px 20px rgba(0,0,0,0.03);">
                
                <!-- Table Header Bar -->
                <div style="background: #0f172a; padding: 18px 28px; color: #ffffff; display: flex; align-items: center; justify-content: space-between;">
                    <div style="font-weight: 700; font-size: 1.1rem; letter-spacing: 0.5px;">
                        <i class="fa-regular fa-clock" style="color: #009688; margin-right: 10px;"></i> {{ $settings['sched_day1_title'] ?? 'DAY – I SCHEDULE' }}
                    </div>
                    <span style="font-size: 0.85rem; color: #94a3b8; font-weight: 500;">{{ $settings['sched_day1_time'] ?? '9:30 AM – 6:00 PM' }}</span>
                </div>

                <!-- Schedule List Rows -->
                <div style="display: flex; flex-direction: column;">
                    @for($i = 1; $i <= 30; $i++)
                        @if(isset($settings['day1_' . $i . '_title']))
                            @php
                                $badge = $settings['day1_' . $i . '_badge'] ?? '';
                                $isBreak = in_array(strtolower($badge), ['break', 'refreshment']);
                                $icon = $settings['day1_' . $i . '_icon'] ?? ($isBreak ? 'fa-mug-hot' : 'fa-clock');
                            @endphp
                            <div class="sched-row" style="display: flex; padding: 18px 28px; border-bottom: 1px solid #f1f5f9; {{ $isBreak ? 'background: #f8fafc;' : '' }} align-items: center; transition: background 0.2s;">
                                <div style="width: 240px; flex-shrink: 0; font-weight: 700; color: {{ $isBreak ? '#64748b' : '#009688' }}; font-size: 1rem; display: flex; align-items: center; gap: 8px;">
                                    <i class="fa-solid {{ $icon }}" style="font-size: 0.9rem; color: {{ $isBreak ? '#009688' : '#94a3b8' }};"></i> {{ $settings['day1_' . $i . '_time'] }}
                                </div>
                                <div style="flex-grow: 1; color: #0f172a; font-weight: 600; font-size: 1.05rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px;">
                                    <span>{{ $settings['day1_' . $i . '_title'] }}</span>
                                    @if($badge)
                                        <span style="background: {{ $isBreak ? '#e2e8f0' : '#e6f4f1' }}; color: {{ $isBreak ? '#475569' : '#009688' }}; {{ $isBreak ? '' : 'border: 1px solid #b2dfdb;' }} padding: 3px 12px; border-radius: 12px; font-size: 0.8rem; font-weight: 600;">
                                            {{ $badge }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>
        </div>

        <!-- DAY 2 TAB PANEL -->
        <div id="schedule-content-day2" class="schedule-tab-panel" style="display: none;">
            <div style="border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden; background: #ffffff; box-shadow: 0 4px 20px rgba(0,0,0,0.03);">
                
                <!-- Table Header Bar -->
                <div style="background: #0f172a; padding: 18px 28px; color: #ffffff; display: flex; align-items: center; justify-content: space-between;">
                    <div style="font-weight: 700; font-size: 1.1rem; letter-spacing: 0.5px;">
                        <i class="fa-regular fa-clock" style="color: #009688; margin-right: 10px;"></i> {{ $settings['sched_day2_title'] ?? 'DAY – II SCHEDULE' }}
                    </div>
                    <span style="font-size: 0.85rem; color: #94a3b8; font-weight: 500;">{{ $settings['sched_day2_time'] ?? '9:30 AM – 5:30 PM' }}</span>
                </div>

                <!-- Schedule List Rows -->
                <div style="display: flex; flex-direction: column;">
                    @for($i = 1; $i <= 30; $i++)
                        @if(isset($settings['day2_' . $i . '_title']))
                            @php
                                $badge = $settings['day2_' . $i . '_badge'] ?? '';
                                $isBreak = in_array(strtolower($badge), ['break', 'refreshment']);
                                $icon = $settings['day2_' . $i . '_icon'] ?? ($isBreak ? 'fa-mug-hot' : 'fa-clock');
                            @endphp
                            <div class="sched-row" style="display: flex; padding: 18px 28px; border-bottom: 1px solid #f1f5f9; {{ $isBreak ? 'background: #f8fafc;' : '' }} align-items: center; transition: background 0.2s;">
                                <div style="width: 240px; flex-shrink: 0; font-weight: 700; color: {{ $isBreak ? '#64748b' : '#009688' }}; font-size: 1rem; display: flex; align-items: center; gap: 8px;">
                                    <i class="fa-solid {{ $icon }}" style="font-size: 0.9rem; color: {{ $isBreak ? '#009688' : '#94a3b8' }};"></i> {{ $settings['day2_' . $i . '_time'] }}
                                </div>
                                <div style="flex-grow: 1; color: #0f172a; font-weight: 600; font-size: 1.05rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px;">
                                    <span>{{ $settings['day2_' . $i . '_title'] }}</span>
                                    @if($badge)
                                        <span style="background: {{ $isBreak ? '#e2e8f0' : '#e6f4f1' }}; color: {{ $isBreak ? '#475569' : '#009688' }}; {{ $isBreak ? '' : 'border: 1px solid #b2dfdb;' }} padding: 3px 12px; border-radius: 12px; font-size: 0.8rem; font-weight: 600;">
                                            {{ $badge }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>
        </div>

        <!-- TRACK-WISE SCHEDULE TAB PANEL -->
        <div id="schedule-content-tracks" class="schedule-tab-panel" style="display: none;">
            <div style="border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden; background: #ffffff; padding: 30px; box-shadow: 0 4px 20px rgba(0,0,0,0.03);">
                <h3 style="color: #0f172a; font-size: 1.4rem; font-weight: 700; margin-top: 0; margin-bottom: 10px;">
                    {{ $settings['sched_tracks_title'] ?? 'Track-wise Parallel Technical Sessions' }}
                </h3>
                <p style="color: #64748b; margin-bottom: 25px;">
                    {{ $settings['sched_tracks_sub'] ?? 'Technical oral and poster sessions run concurrently across designated conference halls for Tracks I through VI.' }}
                </p>

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px;">
                    @for($i = 1; $i <= 20; $i++)
                        @if(isset($settings['track_' . $i . '_name']))
                            <div style="background: #f8fafc; border-left: 4px solid {{ $settings['track_' . $i . '_color'] ?? '#009688' }}; border-radius: 8px; padding: 20px;">
                                <h4 style="color: {{ $settings['track_' . $i . '_color'] ?? '#009688' }}; margin: 0 0 8px 0; font-weight: 700;">{{ $settings['track_' . $i . '_name'] }}</h4>
                                <p style="margin: 0; color: #1e293b; font-weight: 600;">{{ $settings['track_' . $i . '_topic'] }}</p>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>
        </div>

    </div>
</section>

<script>
function switchScheduleTab(tabId) {
    document.querySelectorAll('.schedule-tab-panel').forEach(function(panel) {
        panel.style.display = 'none';
    });
    document.querySelectorAll('.schedule-nav-tab').forEach(function(btn) {
        btn.classList.remove('active');
        btn.style.borderBottomColor = 'transparent';
        btn.style.color = '#64748b';
        btn.style.fontWeight = '600';
    });

    var selectedPanel = document.getElementById('schedule-content-' + tabId);
    var selectedBtn = document.getElementById('tab-btn-' + tabId);

    if (selectedPanel) selectedPanel.style.display = 'block';
    if (selectedBtn) {
        selectedBtn.classList.add('active');
        selectedBtn.style.borderBottomColor = '#009688';
        selectedBtn.style.color = '#009688';
        selectedBtn.style.fontWeight = '700';
    }
}
</script>
