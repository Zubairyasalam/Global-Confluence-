<!-- Abstract Guidelines Section -->
<section class="abstract-section" style="position: relative; overflow: hidden; background: linear-gradient(135deg, #f8fbfa 0%, #e2edf2 100%); padding: 40px 0 80px;">
    <!-- Abstract decorative background elements -->
    <div style="position: absolute; top: -100px; left: -100px; width: 400px; height: 400px; background: radial-gradient(circle, rgba(0, 150, 136, 0.05) 0%, transparent 70%); border-radius: 50%; pointer-events: none;"></div>
    <div style="position: absolute; bottom: -150px; right: -50px; width: 500px; height: 500px; background: radial-gradient(circle, rgba(15, 23, 42, 0.03) 0%, transparent 70%); border-radius: 50%; pointer-events: none;"></div>
    
    <div class="container relative z-10" style="max-width: 95%; margin: 0 auto; padding: 0 20px;">
        
        <style>
            :root {
                --ag-primary: #009688;
                --ag-primary-glow: rgba(0, 150, 136, 0.2);
                --ag-dark: #0f172a;
                --ag-text: #475569;
                --ag-card-bg: rgba(255, 255, 255, 0.85);
            }
            .ag-header-pill {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                background: rgba(0, 150, 136, 0.1);
                color: var(--ag-primary);
                padding: 6px 16px;
                border-radius: 30px;
                font-size: 0.85rem;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 1.5px;
                margin-bottom: 20px;
            }
            .ag-card {
                background: var(--ag-card-bg);
                backdrop-filter: blur(16px);
                -webkit-backdrop-filter: blur(16px);
                border: 1px solid rgba(255, 255, 255, 0.6);
                border-radius: 24px;
                padding: 45px;
                box-shadow: 0 20px 40px rgba(15, 23, 42, 0.04), inset 0 0 0 1px rgba(255, 255, 255, 0.5);
                position: relative;
                overflow: hidden;
                transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                display: flex;
                flex-direction: column;
                height: 100%;
            }
            .ag-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 30px 60px rgba(15, 23, 42, 0.08), inset 0 0 0 1px rgba(255, 255, 255, 0.8);
            }
            .ag-card::before {
                content: '';
                position: absolute;
                top: 0; left: 0; width: 100%; height: 5px;
                background: linear-gradient(90deg, var(--ag-primary), #4fd1c5);
                opacity: 0;
                transition: opacity 0.3s ease;
            }
            .ag-card:hover::before {
                opacity: 1;
            }
            .ag-title {
                font-size: 1.5rem;
                color: var(--ag-dark);
                font-weight: 800;
                margin-bottom: 30px;
                display: flex;
                align-items: center;
                gap: 18px;
                letter-spacing: -0.5px;
            }
            .ag-icon-wrapper {
                background: linear-gradient(135deg, #ffffff, #f1f5f9);
                color: var(--ag-primary);
                width: 60px;
                height: 60px;
                border-radius: 16px;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
                font-size: 1.6rem;
                box-shadow: 0 8px 16px var(--ag-primary-glow), inset 0 2px 4px rgba(255, 255, 255, 1);
                position: relative;
            }
            .ag-icon-wrapper::after {
                content: '';
                position: absolute;
                inset: -2px;
                border-radius: 18px;
                background: linear-gradient(135deg, rgba(0, 150, 136, 0.4), transparent);
                z-index: -1;
                opacity: 0.5;
            }
            .ag-list {
                list-style: none;
                padding: 0;
                margin: 0;
                display: flex;
                flex-direction: column;
                gap: 18px;
                flex-grow: 1;
            }
            .ag-list li {
                display: flex;
                gap: 15px;
                font-size: 1.05rem;
                color: var(--ag-text);
                line-height: 1.6;
                align-items: flex-start;
                background: rgba(255, 255, 255, 0.4);
                padding: 12px 18px;
                border-radius: 12px;
                border: 1px solid rgba(255, 255, 255, 0.5);
                transition: background 0.3s ease;
            }
            .ag-list li:hover {
                background: rgba(255, 255, 255, 0.8);
            }
            .ag-list li i.fa-check-circle {
                color: var(--ag-primary);
                margin-top: 4px;
                font-size: 1.1rem;
                background: -webkit-linear-gradient(#009688, #4fd1c5);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
            .ag-list li strong {
                color: var(--ag-dark);
                font-weight: 700;
            }
            .ag-grid-main {
                margin-bottom: 40px;
            }
            .ag-grid-2 {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 40px;
                align-items: stretch;
            }
            .ag-submit-btn {
                display: inline-flex;
                align-items: center;
                gap: 10px;
                background: linear-gradient(135deg, var(--ag-primary), #00796b);
                color: #fff;
                padding: 16px 45px;
                border-radius: 50px;
                text-decoration: none;
                font-weight: 700;
                font-size: 1.1rem;
                box-shadow: 0 10px 25px var(--ag-primary-glow);
                transition: all 0.3s ease;
                border: 2px solid transparent;
            }
            .ag-submit-btn:hover {
                transform: translateY(-3px) scale(1.02);
                box-shadow: 0 15px 35px rgba(0, 150, 136, 0.3);
                background: linear-gradient(135deg, #00796b, #004d40);
            }
            .ag-submit-btn i {
                transition: transform 0.3s ease;
            }
            .ag-submit-btn:hover i {
                transform: translateX(4px);
            }
            .ag-highlight-box {
                background: linear-gradient(135deg, #f8fafc, #f1f5f9);
                border: 1px solid #e2e8f0;
                padding: 20px;
                border-radius: 16px;
                margin-top: auto;
                box-shadow: inset 0 2px 4px rgba(255, 255, 255, 0.8);
            }
            
            /* Scientific Publications */
            .ag-pub-section {
                margin-top: 60px;
                background: #ffffff;
                border-radius: 30px;
                padding: 60px;
                box-shadow: 0 25px 50px rgba(15, 23, 42, 0.05);
                border: 1px solid rgba(226, 232, 240, 0.8);
                position: relative;
                overflow: hidden;
            }
            .ag-pub-watermark {
                position: absolute;
                right: -20px;
                top: -20px;
                font-size: 15rem;
                color: rgba(15, 23, 42, 0.02);
                pointer-events: none;
                transform: rotate(-10deg);
            }
            .ag-pub-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 30px;
                margin-top: 45px;
                position: relative;
                z-index: 2;
            }
            .ag-pub-card {
                background: #ffffff;
                padding: 30px;
                border-radius: 20px;
                border: 1px solid #f1f5f9;
                box-shadow: 0 10px 30px rgba(15, 23, 42, 0.03);
                transition: all 0.3s ease;
                display: flex;
                flex-direction: column;
                gap: 15px;
            }
            .ag-pub-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 40px rgba(15, 23, 42, 0.06);
                border-color: var(--ag-primary);
            }
            
            @media (max-width: 991px) {
                .ag-grid-2 {
                    grid-template-columns: 1fr;
                }
                .ag-card {
                    padding: 30px;
                }
                .ag-pub-section {
                    padding: 40px 25px;
                }
            }
        </style>

        <!-- Main Submission Guidelines -->
        <div class="ag-grid-main">
            <div class="ag-card" style="border-bottom: 4px solid var(--ag-primary);">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 20px;">
                    <div>
                        <div class="ag-header-pill"><i class="fa-solid fa-star"></i> {{ $settings['abstract_tag'] ?? 'PRIMARY GUIDELINES' }}</div>
                        <h3 class="ag-title">
                            {{ $settings['abstract_title'] ?? 'Abstract Submission' }}
                        </h3>
                    </div>
                </div>
                
                <ul class="ag-list" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 15px;">
                    @for($i = 1; $i <= ($settings['abstract_count'] ?? 20); $i++)
                        @if(!empty($settings['abstract_item_' . $i]))
                            <li><i class="fa-solid fa-check-circle"></i> <span>{!! $settings['abstract_item_' . $i] !!}</span></li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        <!-- Oral & Poster Guidelines -->
        <div class="ag-grid-2">
            <!-- Oral Presentation -->
            <div class="ag-card">
                <h3 class="ag-title">
                    {{ $settings['oral_title'] ?? 'Oral Presentation' }}
                </h3>
                <ul class="ag-list">
                    @for($i = 1; $i <= ($settings['oral_count'] ?? 20); $i++)
                        @if(!empty($settings['oral_item_' . $i]))
                            <li><i class="fa-solid fa-check-circle"></i> <span>{!! $settings['oral_item_' . $i] !!}</span></li>
                        @endif
                    @endfor
                </ul>
            </div>

            <!-- Poster Presentation -->
            <div class="ag-card">
                <h3 class="ag-title">
                    {{ $settings['poster_title'] ?? 'Poster Presentation' }}
                </h3>
                <ul class="ag-list" style="margin-bottom: 25px;">
                    @for($i = 1; $i <= ($settings['poster_count'] ?? 20); $i++)
                        @if(!empty($settings['poster_item_' . $i]))
                            <li><i class="fa-solid fa-check-circle"></i> <span>{!! $settings['poster_item_' . $i] !!}</span></li>
                        @endif
                    @endfor
                </ul>
            </div>
        </div>

        <!-- Scientific Publications Block -->
        <div class="ag-pub-section">
            <i class="fa-solid fa-book-open ag-pub-watermark"></i>
            
            <div style="text-align: center; position: relative; z-index: 2;">
                <h3 style="font-size: 2.2rem; font-weight: 800; color: var(--ag-dark); margin-top: 10px; margin-bottom: 20px; letter-spacing: -0.5px;">{{ $settings['pub_title'] ?? 'Scientific Publications' }}</h3>
                <p style="font-size: 1.1rem; color: var(--ag-text); max-width: 800px; margin: 0 auto; line-height: 1.7;">
                    {{ $settings['pub_desc'] ?? 'Selected peer-reviewed manuscripts will be considered for publication in our partnering international journals and indexed proceedings, offering global visibility for your research.' }}
                </p>
            </div>

            <div class="ag-pub-grid">
                @for($i = 1; $i <= ($settings['pub_count'] ?? 20); $i++)
                    @if(!empty($settings['pub_' . $i . '_title']))
                        <div class="ag-pub-card">
                            <div>
                                <h4 style="font-size: 1.25rem; font-weight: 800; color: var(--ag-dark); margin: 0 0 10px 0;">{{ $settings['pub_' . $i . '_title'] }}</h4>
                                <p style="margin: 0; font-size: 1rem; color: var(--ag-text); line-height: 1.6;">{{ $settings['pub_' . $i . '_desc'] ?? '' }}</p>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>
        </div>

    </div>
</section>
