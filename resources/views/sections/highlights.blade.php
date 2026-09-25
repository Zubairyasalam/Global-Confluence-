@php
    $highlightsSettings = \App\Models\SiteSetting::where('group', 'highlights')->pluck('value', 'key')->toArray();
    $dbHighlights = \App\Models\Highlight::orderBy('sort_order')->get()->groupBy('column_number');

    // Default highlights matching requested list
    $defaultCol1 = [
        ['title' => 'Plenary Sessions', 'icon' => 'fa-solid fa-users-viewfinder'],
        ['title' => 'Invited Talks', 'icon' => 'fa-solid fa-comments'],
        ['title' => 'Oral & Poster presentations', 'icon' => 'fa-solid fa-chalkboard-user'],
        ['title' => 'Separate tracks for Medical Practitioners & Industry', 'icon' => 'fa-solid fa-user-doctor'],
    ];

    $defaultCol2 = [
        ['title' => 'Hackathon', 'icon' => 'fa-solid fa-rocket'],
        ['title' => 'Innovator Pitch', 'icon' => 'fa-solid fa-lightbulb'],
        ['title' => 'Industry Connect', 'icon' => 'fa-solid fa-handshake'],
        ['title' => 'Pre-Conference Consultation', 'icon' => 'fa-solid fa-comments'],
    ];

    $defaultCol3 = [
        ['title' => 'Conference proceedings as Publications in Scopus / WoS Journals', 'icon' => 'fa-solid fa-book-journal-whills'],
        ['title' => 'Panel Discussions', 'icon' => 'fa-solid fa-users-rectangle'],
        ['title' => 'Policy Roundtable Discussions', 'icon' => 'fa-solid fa-people-group'],
        ['title' => 'Distinguished Awards and Prizes', 'icon' => 'fa-solid fa-award'],
    ];

    // Helper map for icons
    $iconMap = [
        'Plenary Sessions' => 'fa-solid fa-users-viewfinder',
        'Invited Talks' => 'fa-solid fa-comments',
        'Oral & Poster presentations' => 'fa-solid fa-chalkboard-user',
        'Separate tracks for Medical Practitioners & Industry' => 'fa-solid fa-user-doctor',
        'Hackathon' => 'fa-solid fa-rocket',
        'Innovator Pitch' => 'fa-solid fa-lightbulb',
        'Industry Connect' => 'fa-solid fa-handshake',
        'Pre-Conference Consultation' => 'fa-solid fa-comments',
        'Conference proceedings as Publications in Scopus / WoS Journals' => 'fa-solid fa-book-journal-whills',
        'Panel Discussions' => 'fa-solid fa-users-rectangle',
        'Policy Roundtable Discussions' => 'fa-solid fa-people-group',
        'Distinguished Awards and Prizes' => 'fa-solid fa-award',
    ];

    $col1 = (isset($dbHighlights[1]) && count($dbHighlights[1]) > 0) ? $dbHighlights[1]->map(fn($item) => ['title' => $item->title, 'icon' => $iconMap[$item->title] ?? 'fa-solid fa-circle-check'])->toArray() : $defaultCol1;
    $col2 = (isset($dbHighlights[2]) && count($dbHighlights[2]) > 0) ? $dbHighlights[2]->map(fn($item) => ['title' => $item->title, 'icon' => $iconMap[$item->title] ?? 'fa-solid fa-circle-check'])->toArray() : $defaultCol2;
    $col3 = (isset($dbHighlights[3]) && count($dbHighlights[3]) > 0) ? $dbHighlights[3]->map(fn($item) => ['title' => $item->title, 'icon' => $iconMap[$item->title] ?? 'fa-solid fa-circle-check'])->toArray() : $defaultCol3;

    $allCols = [1 => $col1, 2 => $col2, 3 => $col3];
@endphp

<!-- Key Highlights Section -->
<section class="highlights-section" style="background: linear-gradient(135deg, #f8fcfa 0%, #f0f7f6 100%); padding: 0px 0 60px 0; font-family: 'Inter', sans-serif; position: relative; overflow: hidden;">
    
    <!-- Decorative background elements -->
    <div style="position: absolute; top: -100px; left: -100px; width: 300px; height: 300px; background: radial-gradient(circle, rgba(0,150,136,0.05) 0%, rgba(255,255,255,0) 70%); border-radius: 50%; pointer-events: none;"></div>
    <div style="position: absolute; bottom: 50px; right: -50px; width: 400px; height: 400px; background: radial-gradient(circle, rgba(0,150,136,0.03) 0%, rgba(255,255,255,0) 70%); border-radius: 50%; pointer-events: none;"></div>

    <div style="max-width: 95%; margin: 0 auto; padding: 0 20px; position: relative; z-index: 1;">

        <!-- Header -->
        <div style="text-align: center; margin-bottom: 60px;">
            <span style="display: inline-block; padding: 6px 16px; background: rgba(0,150,136,0.1); color: #009688; border-radius: 30px; font-weight: 700; font-size: 0.85rem; letter-spacing: 1.2px; text-transform: uppercase; margin-bottom: 16px;">
                Event Features
            </span>
            <h2 style="font-size: clamp(2.5rem, 5vw, 3.5rem); font-weight: 800; color: #0f172a; margin: 0 0 20px 0; letter-spacing: -1px; line-height: 1.2;">
                Conference <span style="background: linear-gradient(120deg, #009688, #00c6b1); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Highlights</span>
            </h2>
            <p style="font-size: 1.15rem; color: #64748b; max-width: 750px; margin: 0 auto; line-height: 1.7; font-weight: 400;">
                {{ $highlightsSettings['highlights_subtitle'] ?? 'Key features and interactive forums scheduled for the Global One Health Confluence 2026' }}
            </p>
        </div>

        <!-- 3 Columns Layout -->
        <div style="display: flex; flex-wrap: wrap; gap: 30px; justify-content: center; align-items: stretch;">
            @foreach($allCols as $colIndex => $colItems)
            <div style="flex: 1; min-width: 300px; max-width: 420px; background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.8); border-radius: 24px; padding: 32px 28px; box-shadow: 0 20px 40px rgba(0,0,0,0.02), inset 0 0 0 1px rgba(255,255,255,0.5); display: flex; flex-direction: column; gap: 18px; transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1); transform: translateY(0);"
                 onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 30px 60px rgba(0,150,136,0.08), inset 0 0 0 1px rgba(255,255,255,1)';"
                 onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.02), inset 0 0 0 1px rgba(255,255,255,0.5)';">

                @foreach($colItems as $item)
                <div style="display: flex; align-items: center; gap: 18px; padding: 16px 20px; border-radius: 16px; background: #ffffff; border: 1px solid #f1f5f9; box-shadow: 0 4px 6px rgba(0,0,0,0.01); transition: all 0.3s ease; cursor: default; position: relative; overflow: hidden;"
                     onmouseover="this.style.borderColor='#009688'; this.style.boxShadow='0 10px 20px rgba(0,150,136,0.08)'; this.style.transform='scale(1.02)';"
                     onmouseout="this.style.borderColor='#f1f5f9'; this.style.boxShadow='0 4px 6px rgba(0,0,0,0.01)'; this.style.transform='scale(1)';">
                    
                    <div style="position: absolute; left: 0; top: 0; bottom: 0; width: 4px; background: #009688; border-radius: 4px 0 0 4px; opacity: 0; transition: opacity 0.3s ease;" class="hover-indicator"></div>

                    <div style="width: 46px; height: 46px; border-radius: 14px; background: linear-gradient(135deg, rgba(0,150,136,0.1), rgba(0,150,136,0.05)); display: flex; align-items: center; justify-content: center; flex-shrink: 0; color: #009688; transition: all 0.3s ease;">
                        <i class="{{ $item['icon'] }}" style="font-size: 1.25rem;"></i>
                    </div>

                    <span style="font-size: 1.05rem; font-weight: 600; color: #1e293b; line-height: 1.4; transition: color 0.3s ease;">
                        {{ $item['title'] }}
                    </span>
                </div>
                @endforeach

            </div>
            @endforeach
        </div>

        <!-- Scientific Publications -->
        <div style="margin-top: 80px; position: relative;">
            <div style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); border-radius: 30px; padding: 50px 40px; display: flex; flex-direction: column; align-items: center; text-align: center; box-shadow: 0 25px 50px -12px rgba(15,23,42,0.25); position: relative; overflow: hidden;">
                
                <!-- Abstract dark background shapes -->
                <div style="position: absolute; top: -50px; left: -20px; width: 200px; height: 200px; background: rgba(0,150,136,0.2); filter: blur(60px); border-radius: 50%;"></div>
                <div style="position: absolute; bottom: -50px; right: -20px; width: 250px; height: 250px; background: rgba(56,189,248,0.15); filter: blur(60px); border-radius: 50%;"></div>

                <div style="position: relative; z-index: 1; max-width: 900px; margin: 0 auto;">
                    <div style="display: inline-flex; align-items: center; justify-content: center; width: 64px; height: 64px; border-radius: 20px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); margin-bottom: 24px; backdrop-filter: blur(10px);">
                        <i class="fa-solid fa-scroll" style="font-size: 1.8rem; color: #38bdf8;"></i>
                    </div>
                    
                    <h3 style="font-size: 2.2rem; font-weight: 800; color: #ffffff; margin: 0 0 16px 0; letter-spacing: -0.5px;">
                        {{ $highlightsSettings['pub_title'] ?? 'Scientific Publications' }}
                    </h3>
                    <p style="font-size: 1.15rem; color: #94a3b8; margin: 0 0 35px 0; max-width: 750px; line-height: 1.7;">
                        {{ $highlightsSettings['pub_subtitle'] ?? 'Selected peer-reviewed manuscripts will be considered for publication in:' }}
                    </p>
                    
                    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px;">
                        <div style="background: rgba(255,255,255,0.03); backdrop-filter: blur(10px); padding: 18px 26px; border-radius: 16px; border: 1px solid rgba(255,255,255,0.1); font-weight: 600; color: #f8fafc; display: flex; align-items: center; gap: 14px; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(0,0,0,0.1);"
                             onmouseover="this.style.background='rgba(255,255,255,0.08)'; this.style.borderColor='rgba(56,189,248,0.5)'; this.style.transform='translateY(-4px)';"
                             onmouseout="this.style.background='rgba(255,255,255,0.03)'; this.style.borderColor='rgba(255,255,255,0.1)'; this.style.transform='translateY(0)';">
                            <i class="fa-solid fa-book-journal-whills" style="color: #38bdf8; font-size: 1.3rem;"></i>
                            <span style="letter-spacing: 0.3px;">{{ $highlightsSettings['pub_item_1'] ?? 'Scopus-indexed journals' }}</span>
                        </div>

                        <div style="background: rgba(255,255,255,0.03); backdrop-filter: blur(10px); padding: 18px 26px; border-radius: 16px; border: 1px solid rgba(255,255,255,0.1); font-weight: 600; color: #f8fafc; display: flex; align-items: center; gap: 14px; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(0,0,0,0.1);"
                             onmouseover="this.style.background='rgba(255,255,255,0.08)'; this.style.borderColor='rgba(56,189,248,0.5)'; this.style.transform='translateY(-4px)';"
                             onmouseout="this.style.background='rgba(255,255,255,0.03)'; this.style.borderColor='rgba(255,255,255,0.1)'; this.style.transform='translateY(0)';">
                            <i class="fa-solid fa-book" style="color: #38bdf8; font-size: 1.3rem;"></i>
                            <span style="letter-spacing: 0.3px;">{{ $highlightsSettings['pub_item_2'] ?? 'Edited ISBN conference proceedings' }}</span>
                        </div>

                        <div style="background: rgba(255,255,255,0.03); backdrop-filter: blur(10px); padding: 18px 26px; border-radius: 16px; border: 1px solid rgba(255,255,255,0.1); font-weight: 600; color: #f8fafc; display: flex; align-items: center; gap: 14px; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(0,0,0,0.1);"
                             onmouseover="this.style.background='rgba(255,255,255,0.08)'; this.style.borderColor='rgba(56,189,248,0.5)'; this.style.transform='translateY(-4px)';"
                             onmouseout="this.style.background='rgba(255,255,255,0.03)'; this.style.borderColor='rgba(255,255,255,0.1)'; this.style.transform='translateY(0)';">
                            <i class="fa-solid fa-globe" style="color: #38bdf8; font-size: 1.3rem;"></i>
                            <span style="letter-spacing: 0.3px;">{{ $highlightsSettings['pub_item_3'] ?? 'Special issues with partnering international journals (subject to peer review)' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
