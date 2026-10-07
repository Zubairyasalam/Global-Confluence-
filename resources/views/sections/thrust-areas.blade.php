<!-- Thrust Areas Section -->
<section class="thrust-areas-section" style="background-color: #ffffff; padding: 10px 0 40px 0;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
        
        @php
            $sectionBadge = $settings['tracks_section_badge'] ?? 'Conference Themes';
            $sectionTitle = $settings['tracks_section_title'] ?? 'Thrust Areas';
            $sectionDesc = $settings['tracks_section_desc'] ?? 'Explore the core conference tracks, thrust topics, and focus areas driving our collaborative approach to global One Health.';
            $referencesTitle = $settings['tracks_references_title'] ?? 'References';

            $referencesJson = $settings['tracks_references_json'] ?? null;
            if ($referencesJson) {
                $referencesList = is_array($referencesJson) ? $referencesJson : (json_decode($referencesJson, true) ?: []);
            } else {
                $referencesList = [
                    'Qasim, S., Khan, A. U., & Raza, A. (2024). Zoonotic diseases and antimicrobial resistance: a dual threat at the human–animal interface.',
                    'Bett, B., Fèvre, E. M., Ha Thi Thanh Nguyen, Sinh Dang-Xuan, Obuta, A., Mateo-Sagasta, J., & Patel, E. (2024). Enhancing public health: Five key takeaways on zoonotic disease and antimicrobial resistance surveillance. One Health Knowledge Brief. Nairobi, Kenya: ILRI.',
                    'Constructing a One Health governance architecture: a systematic review and analysis of governance mechanisms for One Health. (2024). PMC11631453.',
                    'Analyzing One Health governance and implementation challenges. (2025). BMJ Open, 16(7), e115471.',
                    'Zielinski, C., et al. (2023). Time to treat the climate and nature crisis as one indivisible global health emergency. BMC Global and Public Health, 1:29.',
                    'One Health: Change our Paradigm, Change our Lives. (2023). Universidade de Évora.',
                    'Editorial: Advances in nanotechnology for the removal and detection of emerging contaminants from water. (2025). Frontiers in Chemistry.',
                    'Call for papers: Next-generation green remediation technologies for emerging contaminants. (2025). Bentham Science.',
                    'Traditional medicine and intellectual property rights among Indian Indigenous communities: a review. (2023). University of Lapland research repository.',
                    'Indian Journal of Traditional Knowledge. National Institute of Science Communication and Policy Research (CSIR).',
                    'ESG in pharma: How CDMOs drive sustainable supply chains. (2025). Neuland Labs.',
                    'Sustainability in Pharma Industry [white paper]. (2025). Indian Pharmaceutical Alliance.'
                ];
            }
        @endphp

        <!-- Centered Header -->
        <div class="section-header-center" style="text-align: center; margin-bottom: 35px;">
            @if(!empty($sectionBadge))
                <div class="section-subtitle" style="margin-bottom: 8px; font-weight: 800; color: #00A896; text-transform: uppercase; letter-spacing: 2px; font-size: 0.95rem;">
                    {{ $sectionBadge }}
                </div>
            @endif

            <h2 class="section-title" style="margin-top: 0; margin-bottom: 12px; color: #0f172a; font-weight: 800; font-size: 2.2rem;">
                @if(str_contains(strtolower($sectionTitle), 'areas'))
                    {!! preg_replace('/(areas)/i', '<span style="color: #00A896;">$1</span>', e($sectionTitle)) !!}
                @else
                    {{ $sectionTitle }}
                @endif
            </h2>

            <div class="header-line" style="width: 60px; height: 4px; background-color: #00A896; margin: 0 auto 15px auto; border-radius: 2px;"></div>

            @if(!empty($sectionDesc))
                <p class="participants-desc" style="margin: 0 auto; max-width: 800px; color: #64748b; font-size: 1.05rem; line-height: 1.6;">
                    {{ $sectionDesc }}
                </p>
            @endif
        </div>

        <style>
            .thrust-stack {
                display: flex;
                flex-direction: column;
                gap: 30px;
            }
            .premium-topic-card-horizontal {
                background: #ffffff;
                padding: 40px;
                border-radius: 20px;
                box-shadow: 0 10px 40px rgba(15, 23, 42, 0.04);
                border: 1px solid rgba(0, 168, 150, 0.15);
                position: relative;
                overflow: hidden;
                transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }
            .premium-topic-card-horizontal:hover {
                transform: translateY(-3px);
                box-shadow: 0 20px 50px rgba(0, 168, 150, 0.12);
                border-color: rgba(0, 168, 150, 0.35);
            }
            .premium-topic-card-horizontal::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 5px;
                background: linear-gradient(90deg, #00A896, #84cc16);
                opacity: 0;
                transition: opacity 0.3s ease;
            }
            .premium-topic-card-horizontal:hover::before {
                opacity: 1;
            }
            .premium-topic-title-horizontal {
                margin-top: 0;
                margin-bottom: 25px;
                font-size: 1.35rem;
                color: #0f172a;
                font-weight: 800;
                line-height: 1.45;
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                gap: 10px;
            }

            .track-highlight-pill {
                display: inline-flex;
                align-items: center;
                font-weight: 800;
                font-size: 0.88rem;
                padding: 4px 14px;
                border-radius: 8px;
                letter-spacing: 0.2px;
                text-transform: none;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
            }

            .pill-medical {
                background: #e0f2fe;
                color: #0369a1;
                border: 1.5px solid #7dd3fc;
            }

            .pill-industry {
                background: #fef3c7;
                color: #b45309;
                border: 1.5px solid #fcd34d;
            }

            .premium-topic-list-columns {
                list-style: none;
                padding: 0;
                margin: 0;
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                column-gap: 40px;
                row-gap: 15px;
            }
            .premium-topic-list-columns li {
                display: flex;
                gap: 12px;
                font-size: 1.02rem;
                color: #475569;
                line-height: 1.5;
                align-items: flex-start;
                font-weight: 500;
                padding: 8px 0;
                border-bottom: 1px dashed rgba(0,0,0,0.06);
            }
            .premium-topic-list-columns li i {
                color: #84cc16; /* Vibrant lime green for checkmarks */
                margin-top: 4px;
                font-size: 0.95rem;
            }
        </style>
        
        <div class="thrust-stack">
            @forelse($tracks as $index => $track)
                <div class="premium-topic-card-horizontal">
                    <h3 class="premium-topic-title-horizontal">
                        @php
                            $titleFormatted = e($track->title);
                            $badgeHtml = '';
                            if (!empty($track->badge)) {
                                $isMed = str_contains(strtolower($track->badge), 'medical');
                                $badgeClass = $isMed ? 'pill-medical' : 'pill-industry';
                                $badgeHtml = '<span class="track-highlight-pill ' . $badgeClass . '">' . e($track->badge) . '</span>';
                            } else {
                                $titleFormatted = preg_replace(
                                    '/\((for medical practitioners?)\)/i',
                                    '<span class="track-highlight-pill pill-medical">(for medical practitioners)</span>',
                                    $titleFormatted
                                );
                                $titleFormatted = preg_replace(
                                    '/\((for industry(?: track)?)\)/i',
                                    '<span class="track-highlight-pill pill-industry">(for industry track)</span>',
                                    $titleFormatted
                                );
                            }
                        @endphp
                        {!! $titleFormatted !!} {!! $badgeHtml !!}
                    </h3>
                    
                    @if(!empty($track->description))
                    <div class="track-desc-wrapper" style="margin-bottom: 25px; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                        <div id="track{{$track->id ?? $index}}-desc-content" style="max-height: 80px; overflow: hidden; position: relative; transition: max-height 0.4s ease-in-out;">
                            <p style="color: #475569; line-height: 1.7; font-size: 1.02rem; text-align: justify; margin: 0;">
                                {{ $track->description }}
                            </p>
                            <div id="track{{$track->id ?? $index}}-desc-fade" style="position: absolute; bottom: 0; left: 0; width: 100%; height: 50px; background: linear-gradient(transparent, #ffffff); pointer-events: none;"></div>
                        </div>
                        <button id="track{{$track->id ?? $index}}-readmore-btn" onclick="toggleTrackDesc('{{$track->id ?? $index}}')" style="background: none; border: none; color: #00A896; font-weight: 700; cursor: pointer; padding: 12px 0 0 0; display: flex; align-items: center; gap: 8px; font-size: 0.95rem; outline: none;">
                            <span>Read More</span> <i class="fa-solid fa-chevron-down"></i>
                        </button>
                    </div>
                    @endif

                    @if($track->bullet_points && count($track->bullet_points) > 0)
                    <ul class="premium-topic-list-columns">
                        @foreach($track->bullet_points as $point)
                        <li><i class="fa-solid fa-check"></i> <span>{{ $point }}</span></li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            @empty
                <div style="text-align: center; color: #64748b; font-style: italic; padding: 40px;">
                    Thrust Areas and Tracks will be announced soon.
                </div>
            @endforelse

            <!-- Dynamic References Section -->
            @if(!empty($referencesList) && count($referencesList) > 0)
            <div class="premium-topic-card-horizontal" style="margin-top: 10px;">
                <h3 class="premium-topic-title-horizontal" style="font-size: 1.4rem; margin-bottom: 25px; color: #00A896; display: flex; align-items: center; gap: 10px;">
                    <i class="fa-solid fa-book-bookmark" style="font-size: 1.2rem;"></i> {{ $referencesTitle }}
                </h3>
                <ul class="premium-topic-list-columns" style="display: flex; flex-direction: column; gap: 15px; grid-template-columns: 1fr;">
                    @foreach($referencesList as $ref)
                    <li style="border-bottom: 1px solid #f1f5f9; padding-bottom: 10px;">
                        <i class="fa-solid fa-bookmark" style="color: #84cc16; font-size: 0.95rem; margin-top: 5px;"></i> 
                        <span style="font-size: 1rem; line-height: 1.6; color: #334155;">{{ $ref }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

        </div>
    </div>
</section>

<script>
    function toggleTrackDesc(trackId) {
        var content = document.getElementById('track' + trackId + '-desc-content');
        var fade = document.getElementById('track' + trackId + '-desc-fade');
        var btn = document.getElementById('track' + trackId + '-readmore-btn');
        if (!content || !btn) return;
        var btnText = btn.querySelector('span');
        var btnIcon = btn.querySelector('i');
        
        if (content.style.maxHeight === '80px' || !content.style.maxHeight) {
            content.style.maxHeight = '2500px';
            if (fade) fade.style.opacity = '0';
            btnText.innerText = 'Read Less';
            btnIcon.classList.remove('fa-chevron-down');
            btnIcon.classList.add('fa-chevron-up');
        } else {
            content.style.maxHeight = '80px';
            if (fade) fade.style.opacity = '1';
            btnText.innerText = 'Read More';
            btnIcon.classList.remove('fa-chevron-up');
            btnIcon.classList.add('fa-chevron-down');
        }
    }
</script>
