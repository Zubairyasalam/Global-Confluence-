{{-- Objectives + Participants + Strategic Framework — Stacked Header & Full-Width Cards Layout --}}
<section style="background: #ffffff; padding: 70px 0 20px;">
    <div style="max-width: 90%; margin: 0 auto; padding: 0 20px;">



        {{-- ── WHO CAN PARTICIPATE ── --}}
        <div style="margin-bottom: 80px;">

            {{-- Centered Header Block --}}
            <div style="text-align: center; max-width: 750px; margin: 0 auto 45px;">
                <div style="font-size: 0.85rem; font-weight: 800; color: #009688; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 8px;">
                    {{ $settings['part_tag'] ?? 'WHO CAN ATTEND' }}
                </div>
                <h2 style="font-size: clamp(2.2rem, 4.5vw, 3rem); font-weight: 900; color: #112340; line-height: 1.15; letter-spacing: -0.6px; margin: 0 0 12px 0;">
                    {{ $settings['part_title'] ?? 'Our Participants' }}
                </h2>
                <div style="width: 50px; height: 4px; background: #009688; margin: 0 auto 18px; border-radius: 2px;"></div>
                <p style="font-size: 1.05rem; color: #64748b; line-height: 1.7; margin: 0;">
                    {{ $settings['part_sub'] ?? 'Join the confluence to bridge microbes, molecules & mankind for a sustainable future.' }}
                </p>
            </div>

            {{-- 5 Vertical Cards Row --}}
            <div class="participant-cards-row" style="display: flex; gap: 20px; flex-wrap: wrap; justify-content: center;">
                @for($i = 1; $i <= ($settings['participants_count'] ?? 20); $i++)
                    @if(!empty($settings['part_' . $i . '_label']))
                    <div class="participant-v-card"
                         style="flex: 1; min-width: 190px; background: #ffffff; padding: 38px 20px; border-radius: 16px; text-align: center; border: 1px solid #f0f4f8; box-shadow: 0 10px 30px rgba(0,0,0,0.04); transition: all 0.35s ease; cursor: pointer; display: flex; flex-direction: column; align-items: center; justify-content: flex-start;">
                        
                        <div class="p-icon-circle" style="width: 68px; height: 68px; border-radius: 50%; background: rgba(0,150,136,0.12); display: flex; justify-content: center; align-items: center; margin-bottom: 22px; transition: all 0.35s ease;">
                            <i class="{{ $settings['part_' . $i . '_icon'] ?? 'fa-solid fa-user' }} p-icon-fa" style="font-size: 1.6rem; color: #009688; transition: all 0.35s ease;"></i>
                        </div>

                        <h4 style="margin: 0; font-size: 1rem; color: #112340; line-height: 1.4; font-weight: 700;">
                            {!! nl2br(e($settings['part_' . $i . '_label'])) !!}
                        </h4>
                    </div>
                    @endif
                @endfor
            </div>

        </div>

        <style>
            .participant-v-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 16px 40px rgba(0, 150, 136, 0.15) !important;
                border-color: rgba(0, 150, 136, 0.25) !important;
            }
            .participant-v-card:hover .p-icon-circle {
                background: #009688 !important;
            }
            .participant-v-card:hover .p-icon-fa {
                color: #ffffff !important;
            }
        </style>







         {{-- ── OUR JOURNEY TO IMPACT ── --}}
        <div class="jz-section" style="position: relative; border-radius: 32px; overflow: hidden; padding: 70px 60px 80px;">

            {{-- Dark background --}}
            <div class="jz-bg"></div>
            <div class="jz-orb jz-orb-l"></div>
            <div class="jz-orb jz-orb-r"></div>

            {{-- Header --}}
            <div style="text-align: center; max-width: 680px; margin: 0 auto 35px; position: relative; z-index: 2;">
                <h3 class="jz-heading">{{ $settings['journey_title'] ?? 'Our Journey to Impact' }}</h3>
                <div class="jz-bar"></div>
                <p class="jz-subtext">{{ $settings['journey_sub'] ?? 'A strategic 4-step pathway driving global collaboration into sustainable transformation.' }}</p>
            </div>

            {{-- Zigzag Timeline --}}
            <div class="jz-timeline" style="position: relative; z-index: 2;">

                {{-- Central vertical spine --}}
                <div class="jz-spine">
                    <div class="jz-spine-glow"></div>
                </div>

                @for($i = 1; $i <= ($settings['journey_count'] ?? 20); $i++)
                @if(!empty($settings['journey_' . $i . '_title']))
                @php $isLeft = (($i - 1) % 2 === 0); @endphp

                <div class="jz-row jz-row-delay-{{ $i - 1 }} {{ $isLeft ? 'jz-row-left' : 'jz-row-right' }}">

                    {{-- Content panel --}}
                    <div class="jz-panel">
                        <div class="jz-panel-inner">
                            <div class="jz-panel-icon-row">
                                <span class="jz-panel-num-label">STEP 0{{ $i }}</span>
                            </div>
                            <h4 class="jz-panel-title">{{ $settings['journey_' . $i . '_title'] }}</h4>
                            <p class="jz-panel-desc">{{ $settings['journey_' . $i . '_desc'] ?? '' }}</p>
                        </div>
                        <div class="jz-panel-shine"></div>
                    </div>

                    {{-- Central node --}}
                    <div class="jz-node">
                        <div class="jz-node-ring"></div>
                        <span class="jz-node-num">0{{ $i }}</span>
                    </div>

                    {{-- Spacer for opposite side --}}
                    <div class="jz-spacer"></div>

                </div>
                @endif
                @endfor

            </div>
        </div>     </div>
        </div>

        <style>
            /* ── Section ── */
            .jz-section {
                background: linear-gradient(150deg, #060e1a 0%, #071c2b 45%, #071c18 100%);
            }
            .jz-bg {
                position: absolute; inset: 0;
                background-image:
                    radial-gradient(ellipse 70% 50% at 50% 0%, rgba(0,150,136,0.07), transparent),
                    radial-gradient(ellipse 50% 40% at 50% 100%, rgba(0,188,212,0.05), transparent);
                pointer-events: none;
            }
            .jz-orb {
                position: absolute; border-radius: 50%;
                filter: blur(100px); opacity: 0.12; pointer-events: none;
            }
            .jz-orb-l { width: 380px; height: 380px; top: -80px; left: -60px; background: radial-gradient(circle, #009688, transparent); }
            .jz-orb-r { width: 320px; height: 320px; bottom: -50px; right: -50px; background: radial-gradient(circle, #00bcd4, transparent); }

            /* ── Header ── */
            .jz-eyebrow {
                display: inline-block; font-size: 0.73rem; font-weight: 800;
                color: #1de9b6; text-transform: uppercase; letter-spacing: 3px;
                background: rgba(29,233,182,0.08); border: 1px solid rgba(29,233,182,0.2);
                padding: 5px 16px; border-radius: 50px; margin-bottom: 16px;
            }
            .jz-heading { font-size: clamp(1.9rem, 3.5vw, 2.7rem); font-weight: 900; color: #fff; margin: 0 0 14px; letter-spacing: -0.5px; line-height: 1.2; }
            .jz-accent { background: linear-gradient(135deg, #1de9b6, #00bcd4); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
            .jz-bar { width: 52px; height: 4px; background: linear-gradient(90deg, #009688, #1de9b6); border-radius: 2px; margin: 0 auto 16px; }
            .jz-subtext { font-size: 1rem; color: rgba(255,255,255,0.5); line-height: 1.7; margin: 0; }

            /* ── Timeline container ── */
            .jz-timeline { position: relative; max-width: 860px; margin: 0 auto; }

            /* ── Vertical spine ── */
            .jz-spine {
                position: absolute;
                left: 50%; transform: translateX(-50%);
                top: 0; bottom: 0;
                width: 2px;
                background: rgba(0,150,136,0.18);
                border-radius: 2px;
                overflow: hidden;
            }
            .jz-spine-glow {
                position: absolute; inset: 0;
                background: linear-gradient(180deg, transparent 0%, #1de9b6 30%, #009688 60%, #1de9b6 80%, transparent 100%);
                animation: jzSpineFlow 2.5s linear infinite;
                opacity: 0.8;
            }
            @keyframes jzSpineFlow {
                0%   { transform: translateY(-100%); }
                100% { transform: translateY(100%); }
            }

            /* ── Each Row ── */
            .jz-row {
                display: flex;
                align-items: center;
                margin-bottom: 40px;
                animation: jzRowIn 0.65s ease both;
                gap: 0;
            }
            .jz-row:last-child { margin-bottom: 0; }
            .jz-row-delay-0 { animation-delay: 0.05s; }
            .jz-row-delay-1 { animation-delay: 0.15s; }
            .jz-row-delay-2 { animation-delay: 0.25s; }
            .jz-row-delay-3 { animation-delay: 0.35s; }
            @keyframes jzRowIn {
                from { opacity: 0; transform: translateY(20px); }
                to   { opacity: 1; transform: translateY(0); }
            }

            /* Left row: panel | node | spacer */
            .jz-row-left { flex-direction: row; }
            /* Right row: spacer | node | panel (reversed) */
            .jz-row-right { flex-direction: row-reverse; }

            /* ── Panel ── */
            .jz-panel {
                flex: 1;
                position: relative;
                overflow: hidden;
                border-radius: 20px;
                border: 1px solid rgba(255,255,255,0.07);
                background: rgba(255,255,255,0.04);
                backdrop-filter: blur(14px);
                -webkit-backdrop-filter: blur(14px);
                transition: transform 0.4s cubic-bezier(0.34,1.56,0.64,1),
                            border-color 0.3s ease, box-shadow 0.3s ease;
            }
            .jz-panel-inner { padding: 28px 30px 26px; }
            .jz-panel:hover {
                transform: scale(1.03);
                border-color: rgba(0,150,136,0.45);
                box-shadow: 0 24px 60px rgba(0,0,0,0.35), 0 0 0 1px rgba(0,150,136,0.25);
            }
            .jz-panel:hover .jz-panel-icon-wrap {
                background: linear-gradient(135deg, #009688, #1de9b6);
                box-shadow: 0 10px 28px rgba(0,150,136,0.4);
                transform: rotate(-6deg) scale(1.1);
            }
            .jz-panel:hover .jz-panel-icon-fa { color: #ffffff; }
            .jz-panel:hover .jz-panel-shine { opacity: 1; }

            /* Shine sweep */
            .jz-panel-shine {
                position: absolute; inset: 0;
                background: linear-gradient(120deg, transparent 30%, rgba(255,255,255,0.04) 50%, transparent 70%);
                opacity: 0; transition: opacity 0.35s ease;
                pointer-events: none;
            }

            /* Icon row */
            .jz-panel-icon-row { display: flex; align-items: center; gap: 14px; margin-bottom: 16px; }
            .jz-panel-icon-wrap {
                width: 52px; height: 52px; border-radius: 16px;
                background: rgba(0,150,136,0.12);
                border: 1px solid rgba(0,150,136,0.2);
                display: flex; align-items: center; justify-content: center;
                flex-shrink: 0;
                transition: all 0.4s cubic-bezier(0.34,1.56,0.64,1);
            }
            .jz-panel-icon-fa { font-size: 1.3rem; color: #1de9b6; transition: color 0.3s ease; }
            .jz-panel-num-label {
                font-size: 0.65rem; font-weight: 900;
                color: rgba(29,233,182,0.6); letter-spacing: 3px; text-transform: uppercase;
            }
            .jz-panel-title {
                font-size: 1.25rem; font-weight: 900; color: #ffffff;
                margin: 0 0 10px; letter-spacing: 2px; text-transform: uppercase;
            }
            .jz-panel-desc {
                font-size: 0.9rem; color: rgba(255,255,255,0.5); line-height: 1.65; margin: 0;
            }

            /* ── Central Node ── */
            .jz-node {
                flex: 0 0 80px;
                display: flex; align-items: center; justify-content: center;
                position: relative; z-index: 3;
            }
            .jz-node-ring {
                position: absolute;
                width: 48px; height: 48px;
                border-radius: 50%;
                border: 2px solid rgba(0,150,136,0.35);
                animation: jzNodePulse 2s ease-in-out infinite;
            }
            @keyframes jzNodePulse {
                0%, 100% { transform: scale(1); opacity: 0.4; }
                50% { transform: scale(1.25); opacity: 0; }
            }
            .jz-node-num {
                width: 38px; height: 38px;
                border-radius: 50%;
                background: linear-gradient(135deg, #009688, #1de9b6);
                display: flex; align-items: center; justify-content: center;
                font-size: 0.85rem; font-weight: 900; color: #ffffff;
                box-shadow: 0 6px 20px rgba(0,150,136,0.5);
                position: relative; z-index: 1;
                letter-spacing: 0;
            }

            /* ── Spacer ── */
            .jz-spacer { flex: 1; }

            /* ── Responsive ── */
            @media (max-width: 700px) {
                .jz-timeline { max-width: 100%; }
                .jz-row { flex-direction: column !important; align-items: flex-start; gap: 12px; }
                .jz-node { flex: 0; }
                .jz-spacer { display: none; }
                .jz-spine { display: none; }
                .jz-section { padding: 48px 24px 60px; }
            }
        </style>






    </div>
</section>


