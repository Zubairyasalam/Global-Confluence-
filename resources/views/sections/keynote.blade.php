<!-- Keynote Visionaries Section -->
<section class="keynote-section" style="padding: 70px 0; background: #ffffff; font-family: 'Inter', system-ui, -apple-system, sans-serif;">
    <div class="container" style="max-width: 1140px; margin: 0 auto; padding: 0 20px;">
        
        <!-- Header matching Image 1 Design -->
        <div style="text-align: center; margin-bottom: 45px;">
            <h2 style="font-size: 2.3rem; font-weight: 800; color: #0f172a; margin: 0 0 12px 0; text-transform: uppercase; letter-spacing: -0.5px;">
                Keynote <span style="color: #009688;">Speakers</span>
            </h2>
            <div style="width: 70px; height: 4px; background: #84cc16; margin: 0 auto 16px auto; border-radius: 2px;"></div>
            <p style="font-size: 1.05rem; color: #64748b; max-width: 700px; margin: 0 auto; line-height: 1.6;">
                The Minds Behind the Momentum
            </p>
        </div>

        <!-- Speakers Grid matching Image 1 Design -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px; justify-content: center;">
            
            @php
                $keynoteSpeakers = \App\Models\Speaker::where('type', 'keynote')->orderBy('sort_order')->get();
            @endphp

            @foreach($keynoteSpeakers as $speaker)
            <div style="background: #ffffff; border-radius: 16px; border: 1px solid #e2e8f0; box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04); padding: 28px; display: flex; gap: 22px; align-items: flex-start; transition: transform 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 20px 40px rgba(15, 23, 42, 0.08)'" onmouseout="this.style.transform='none'; this.style.boxShadow='0 10px 30px rgba(15, 23, 42, 0.04)'">
                
                <!-- Left Photo -->
                <div style="width: 130px; height: 130px; flex-shrink: 0; border-radius: 14px; overflow: hidden; background: #f1f5f9; border: 1px solid #e2e8f0;">
                    <img src="{{ asset($speaker->image_path) }}" alt="{{ $speaker->name }}" style="width: 100%; height: 100%; object-fit: cover; display: block;" onerror="this.src='https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=400&h=400&fit=crop'">
                </div>

                <!-- Right Details -->
                <div style="flex-grow: 1; display: flex; flex-direction: column;">
                    <h3 style="margin: 0 0 6px 0; color: #0f172a; font-size: 1.3rem; font-weight: 800; line-height: 1.3;">{{ $speaker->name }}</h3>
                    
                    <p style="margin: 0 0 4px 0; color: #475569; font-size: 0.9rem; font-weight: 600; line-height: 1.4;">{!! nl2br(e($speaker->title ?? $speaker->university)) !!}</p>
                    
                    @if($speaker->current_role && $speaker->current_role !== $speaker->title && $speaker->current_role !== '-')
                        <p style="margin: 0 0 10px 0; color: #64748b; font-size: 0.84rem; line-height: 1.4;">{{ $speaker->current_role }}</p>
                    @elseif($speaker->country && $speaker->country !== '-')
                        <p style="margin: 0 0 10px 0; color: #64748b; font-size: 0.84rem;">{{ $speaker->university }} • {{ $speaker->country }}</p>
                    @endif

                    <div style="border-top: 1px dotted #cbd5e1; margin: 10px 0 12px 0;"></div>

                    @if($speaker->field)
                    <div style="margin-bottom: 8px;">
                        <span style="font-size: 0.72rem; font-weight: 800; color: #009688; text-transform: uppercase; letter-spacing: 0.8px; display: block; margin-bottom: 2px;">Field / Specialization</span>
                        <p style="margin: 0; font-size: 0.86rem; color: #1e293b; font-weight: 600;">{{ $speaker->field }}</p>
                    </div>
                    @elseif($speaker->h_index)
                    <div style="margin-bottom: 8px;">
                        <span style="font-size: 0.72rem; font-weight: 800; color: #009688; text-transform: uppercase; letter-spacing: 0.8px; display: block; margin-bottom: 2px;">H-Index</span>
                        <p style="margin: 0; font-size: 0.86rem; color: #1e293b; font-weight: 600;">{{ $speaker->h_index }}</p>
                    </div>
                    @endif

                    <!-- Hidden details for Modal -->
                    <div id="keynote-speaker-data-{{ $speaker->id }}" style="display: none;">
                        <div class="modal-speaker-name">{{ $speaker->name }}</div>
                        <div class="modal-speaker-title">{{ $speaker->title }}</div>
                        <div class="modal-speaker-role">{{ $speaker->current_role }}</div>
                        <div class="modal-speaker-field">{{ $speaker->field }}</div>
                        <div class="modal-speaker-edu">{{ $speaker->education }}</div>
                        <div class="modal-speaker-honours">{{ $speaker->honours }}</div>
                        <div class="modal-speaker-bio">{!! nl2br(e($speaker->biography)) !!}</div>
                        <div class="modal-speaker-achievements">{!! nl2br(e($speaker->key_achievements)) !!}</div>
                        <div class="modal-speaker-relevance">{!! nl2br(e($speaker->relevance)) !!}</div>
                        <div class="modal-speaker-img">{{ asset($speaker->image_path) }}</div>
                    </div>

                    <button type="button" onclick="openKeynoteSectionModal({{ $speaker->id }})" style="margin-top: 10px; align-self: flex-start; background: #f8fafc; border: 1px solid #cbd5e1; color: #009688; padding: 6px 16px; border-radius: 6px; font-size: 0.8rem; font-weight: 700; cursor: pointer; display: inline-flex; align-items: center; gap: 6px; transition: all 0.2s;" onmouseover="this.style.background='#009688'; this.style.color='#ffffff'; this.style.borderColor='#009688';" onmouseout="this.style.background='#f8fafc'; this.style.color='#009688'; this.style.borderColor='#cbd5e1';">
                        View Full Details <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>

            </div>
            @endforeach

        </div>

    </div>
</section>

<!-- True 100% Full Screen Keynote Speaker Modal -->
@if(!defined('KEYNOTE_MODAL_RENDERED'))
@php define('KEYNOTE_MODAL_RENDERED', true); @endphp
<div id="keynoteSectionModal" style="display: none; position: fixed; z-index: 999999; top: 0; left: 0; width: 100vw; height: 100vh; background: #ffffff;">
    <div style="background: #ffffff; width: 100vw; height: 100vh; max-width: 100vw; max-height: 100vh; display: flex; flex-direction: column; position: relative; overflow: hidden; border: none; margin: 0; padding: 0;">
        
        <!-- Fullscreen Edge-to-Edge Modal Header -->
        <div style="background: #0f172a; color: #ffffff; padding: 20px 40px; display: flex; align-items: center; justify-content: space-between; flex-shrink: 0; border-bottom: 3px solid #009688;">
            <div style="font-weight: 800; font-size: 1.4rem; letter-spacing: 0.3px;">
                Keynote Speaker Profile & Biography
            </div>
            <button onclick="closeKeynoteSectionModal()" style="background: #ef4444; border: none; color: #ffffff; padding: 8px 22px; border-radius: 8px; cursor: pointer; font-size: 1rem; font-weight: 700; display: flex; align-items: center; gap: 8px; transition: background 0.2s;" onmouseover="this.style.background='#dc2626'" onmouseout="this.style.background='#ef4444'">
                <span>Close</span> &times;
            </button>
        </div>

        <!-- Fullscreen Scrollable Body Content -->
        <div style="flex-grow: 1; overflow-y: auto; background: #ffffff;">
            <div style="max-width: 1300px; margin: 0 auto; padding: 40px 50px;">
                
                <!-- Top Hero Banner Card -->
                <div style="display: flex; gap: 35px; margin-bottom: 40px; align-items: center; background: #f8fafc; padding: 35px 40px; border-radius: 16px; border: 1px solid #e2e8f0; flex-wrap: wrap;">
                    <img id="km-sec-img" src="" alt="" style="width: 180px; height: 180px; border-radius: 16px; object-fit: cover; border: 4px solid #009688; box-shadow: 0 10px 25px rgba(0,0,0,0.1); flex-shrink: 0;">
                    <div style="flex-grow: 1;">
                        <h2 id="km-sec-name" style="margin: 0 0 10px 0; color: #0f172a; font-size: 2.2rem; font-weight: 900; line-height: 1.2;"></h2>
                        <p id="km-sec-title" style="margin: 0 0 8px 0; color: #009688; font-weight: 700; font-size: 1.15rem; line-height: 1.4;"></p>
                        <p id="km-sec-role" style="margin: 0; color: #475569; font-size: 1.02rem; line-height: 1.5; font-weight: 500;"></p>
                    </div>
                </div>

                <!-- Details Stack -->
                <div style="display: flex; flex-direction: column; gap: 30px; font-size: 1.05rem; color: #334155; line-height: 1.75;">
                    
                    <div id="km-sec-field-wrap" style="background: #f0fdf4; padding: 20px 25px; border-radius: 12px; border: 1px solid #bbf7d0;">
                        <div style="font-weight: 800; color: #166534; margin-bottom: 4px; font-size: 0.88rem; text-transform: uppercase; letter-spacing: 0.8px;">Field of Specialization</div>
                        <div id="km-sec-field" style="color: #0f766e; font-weight: 700; font-size: 1.1rem;"></div>
                    </div>

                    <div id="km-sec-edu-wrap" style="display: none;">
                        <h3 style="margin: 0 0 12px 0; color: #0f172a; font-weight: 800; font-size: 1.25rem;">
                            Education & Qualifications
                        </h3>
                        <p id="km-sec-edu" style="margin: 0; background: #f8fafc; border-left: 4px solid #009688; padding: 16px 22px; border-radius: 6px; color: #1e293b; font-weight: 500;"></p>
                    </div>

                    <div id="km-sec-bio-wrap" style="display: none;">
                        <h3 style="margin: 0 0 12px 0; color: #0f172a; font-weight: 800; font-size: 1.25rem;">
                            Biography
                        </h3>
                        <div id="km-sec-bio" style="color: #475569; text-align: justify; font-size: 1.05rem; background: #ffffff; padding: 5px 0;"></div>
                    </div>

                    <div id="km-sec-achievements-wrap" style="display: none;">
                        <h3 style="margin: 0 0 12px 0; color: #0f172a; font-weight: 800; font-size: 1.25rem;">
                            Key Achievements & Contributions
                        </h3>
                        <div id="km-sec-achievements" style="background: #f0fdf4; border: 1px solid #bbf7d0; padding: 22px 28px; border-radius: 12px; color: #166534; font-size: 1.02rem; line-height: 1.75;"></div>
                    </div>

                    <div id="km-sec-relevance-wrap" style="display: none;">
                        <h3 style="margin: 0 0 12px 0; color: #0f172a; font-weight: 800; font-size: 1.25rem;">
                            Relevance as a Keynote Speaker
                        </h3>
                        <div id="km-sec-relevance" style="background: #f0f9ff; border: 1px solid #bae6fd; padding: 22px 28px; border-radius: 12px; color: #0369a1; font-size: 1.02rem; line-height: 1.75;"></div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Fullscreen Modal Footer -->
        <div style="padding: 18px 50px; background: #f8fafc; border-top: 1px solid #e2e8f0; text-align: right; flex-shrink: 0;">
            <button onclick="closeKeynoteSectionModal()" style="padding: 11px 32px; background: #0f172a; color: #ffffff; border: none; border-radius: 8px; font-weight: 700; cursor: pointer; font-size: 1rem; transition: background 0.2s;" onmouseover="this.style.background='#009688'" onmouseout="this.style.background='#0f172a'">
                Close Profile
            </button>
        </div>

    </div>
</div>

<script>
    function openKeynoteSectionModal(id) {
        var data = document.getElementById('keynote-speaker-data-' + id);
        if (!data) return;

        document.getElementById('km-sec-name').innerText = data.querySelector('.modal-speaker-name').innerText;
        document.getElementById('km-sec-title').innerText = data.querySelector('.modal-speaker-title').innerText;
        document.getElementById('km-sec-role').innerText = data.querySelector('.modal-speaker-role').innerText;
        document.getElementById('km-sec-img').src = data.querySelector('.modal-speaker-img').innerText;

        var field = data.querySelector('.modal-speaker-field').innerText;
        document.getElementById('km-sec-field').innerText = field;

        var edu = data.querySelector('.modal-speaker-edu').innerText;
        var eduWrap = document.getElementById('km-sec-edu-wrap');
        if (edu && edu.trim() !== '') {
            document.getElementById('km-sec-edu').innerText = edu;
            eduWrap.style.display = 'block';
        } else {
            eduWrap.style.display = 'none';
        }

        var bio = data.querySelector('.modal-speaker-bio').innerHTML;
        var bioWrap = document.getElementById('km-sec-bio-wrap');
        if (bio && bio.trim() !== '') {
            document.getElementById('km-sec-bio').innerHTML = bio;
            bioWrap.style.display = 'block';
        } else {
            bioWrap.style.display = 'none';
        }

        var achievements = data.querySelector('.modal-speaker-achievements').innerHTML;
        var achievementsWrap = document.getElementById('km-sec-achievements-wrap');
        if (achievements && achievements.trim() !== '') {
            document.getElementById('km-sec-achievements').innerHTML = achievements;
            achievementsWrap.style.display = 'block';
        } else {
            achievementsWrap.style.display = 'none';
        }

        var relevance = data.querySelector('.modal-speaker-relevance').innerHTML;
        var relevanceWrap = document.getElementById('km-sec-relevance-wrap');
        if (relevance && relevance.trim() !== '') {
            document.getElementById('km-sec-relevance').innerHTML = relevance;
            relevanceWrap.style.display = 'block';
        } else {
            relevanceWrap.style.display = 'none';
        }

        document.getElementById('keynoteSectionModal').style.display = 'block';
        document.body.style.overflow = 'hidden';
    }

    function closeKeynoteSectionModal() {
        document.getElementById('keynoteSectionModal').style.display = 'none';
        document.body.style.overflow = 'auto';
    }
</script>
@endif
