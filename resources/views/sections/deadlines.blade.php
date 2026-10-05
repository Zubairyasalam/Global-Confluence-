<!-- Important Deadlines Section -->
<section id="deadlines" class="deadlines-modern-section" style="padding: 30px 0 65px; background: #ffffff; position: relative; font-family: 'Inter', system-ui, -apple-system, sans-serif;">
    <div class="container" style="max-width: 1280px; margin: 0 auto; padding: 0 20px;">
        
        <!-- Section Header -->
        <div style="text-align: center; margin-bottom: 40px;">
            <span style="display: inline-flex; align-items: center; gap: 8px; background: #e6f7f5; color: #009688; border: 1px solid #b2dfdb; padding: 7px 22px; border-radius: 50px; font-weight: 800; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1.2px; margin-bottom: 14px;">
                <i class="fa-regular fa-calendar-check"></i> Event Timeline
            </span>
            <h2 style="font-size: clamp(2.2rem, 4vw, 2.9rem); font-weight: 800; color: #0f172a; margin: 0 0 12px 0; letter-spacing: -0.5px;">
                {!! $settings['deadlines_title'] ?? 'Important <span style="color: #009688;">Deadlines</span>' !!}
            </h2>
            <div style="width: 70px; height: 4px; background: linear-gradient(90deg, #009688, #84cc16); margin: 0 auto 16px auto; border-radius: 4px;"></div>
            <p style="max-width: 680px; margin: 0 auto; color: #64748b; font-size: 1.15rem; line-height: 1.6; font-weight: 500;">
                {{ $settings['deadlines_subtitle'] ?? 'Key dates to mark in your calendar for submissions and notifications' }}
            </p>
        </div>

        <!-- Timeline Deadlines Grid (Larger & More Prominent) -->
        <div class="deadlines-card-grid">
            
            <!-- Card 1: Abstract Submission -->
            <div class="dl-pro-card dl-theme-teal">
                <div class="dl-top-accent"></div>
                <div class="dl-card-header">
                    <span class="dl-phase-badge">Phase 01</span>
                    <div class="dl-icon-box">
                        <i class="fa-solid fa-file-arrow-up"></i>
                    </div>
                </div>
                <div class="dl-date-container">
                    <i class="fa-regular fa-calendar-days"></i>
                    <span class="dl-date-text">{{ $settings['deadline_1_date'] ?? 'Oct 07, 2026' }}</span>
                </div>
                <h3 class="dl-card-title">{{ $settings['deadline_1_label'] ?? 'Submission of Abstract' }}</h3>
                <p class="dl-card-desc">Online submission portal open for structured scientific abstracts across all conference tracks.</p>
                <div class="dl-card-footer">
                    <span class="dl-pill-status pill-open">
                        <i class="fa-solid fa-circle-dot"></i> Call for Abstracts
                    </span>
                </div>
            </div>

            <!-- Card 2: Acceptance Notification -->
            <div class="dl-pro-card dl-theme-navy">
                <div class="dl-top-accent"></div>
                <div class="dl-card-header">
                    <span class="dl-phase-badge">Phase 02</span>
                    <div class="dl-icon-box">
                        <i class="fa-solid fa-envelope-open-text"></i>
                    </div>
                </div>
                <div class="dl-date-container">
                    <i class="fa-regular fa-calendar-days"></i>
                    <span class="dl-date-text">{{ $settings['deadline_2_date'] ?? 'Oct 15, 2026' }}</span>
                </div>
                <h3 class="dl-card-title">{{ $settings['deadline_2_label'] ?? 'Acceptance of Abstract' }}</h3>
                <p class="dl-card-desc">Formal notification sent to authors regarding peer review outcome and presentation mode.</p>
                <div class="dl-card-footer">
                    <span class="dl-pill-status pill-review">
                        <i class="fa-regular fa-clock"></i> Review &amp; Intimation
                    </span>
                </div>
            </div>

            <!-- Card 3: Full Paper -->
            <div class="dl-pro-card dl-theme-lime">
                <div class="dl-top-accent"></div>
                <div class="dl-card-header">
                    <span class="dl-phase-badge">Phase 03</span>
                    <div class="dl-icon-box">
                        <i class="fa-solid fa-book-journal-whills"></i>
                    </div>
                </div>
                <div class="dl-date-container">
                    <i class="fa-regular fa-calendar-days"></i>
                    <span class="dl-date-text">{{ $settings['deadline_3_date'] ?? 'Nov 15, 2026' }}</span>
                </div>
                <h3 class="dl-card-title">{{ $settings['deadline_3_label'] ?? 'Full Paper Submission' }}</h3>
                <p class="dl-card-desc">Camera-ready manuscript submission for publication in indexed conference proceedings.</p>
                <div class="dl-card-footer">
                    <span class="dl-pill-status pill-final">
                        <i class="fa-solid fa-award"></i> Final Proceedings
                    </span>
                </div>
            </div>

        </div>

    </div>
</section>

<style>
    .deadlines-card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 32px;
        width: 100%;
        margin: 0 auto;
    }

    .dl-pro-card {
        background: #ffffff;
        border: 1.5px solid #e2e8f0;
        border-radius: 20px;
        padding: 38px 34px 32px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
        transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        display: flex;
        flex-direction: column;
    }

    .dl-top-accent {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        transition: height 0.3s ease;
    }

    /* Teal Theme (Card 1) */
    .dl-theme-teal .dl-top-accent {
        background: linear-gradient(90deg, #009688, #26a69a);
    }
    .dl-theme-teal .dl-icon-box {
        background: #e6f7f5;
        color: #009688;
        border: 1.5px solid #b2dfdb;
    }
    .dl-theme-teal .dl-date-container i {
        color: #009688;
    }
    .dl-theme-teal:hover {
        border-color: #80cbc4;
        transform: translateY(-8px);
        box-shadow: 0 20px 45px rgba(0, 150, 136, 0.16);
    }

    /* Navy Theme (Card 2) */
    .dl-theme-navy .dl-top-accent {
        background: linear-gradient(90deg, #0f172a, #334155);
    }
    .dl-theme-navy .dl-icon-box {
        background: #f1f5f9;
        color: #0f172a;
        border: 1.5px solid #cbd5e1;
    }
    .dl-theme-navy .dl-date-container i {
        color: #0f172a;
    }
    .dl-theme-navy:hover {
        border-color: #94a3b8;
        transform: translateY(-8px);
        box-shadow: 0 20px 45px rgba(15, 23, 42, 0.16);
    }

    /* Lime Theme (Card 3) */
    .dl-theme-lime .dl-top-accent {
        background: linear-gradient(90deg, #84cc16, #65a30d);
    }
    .dl-theme-lime .dl-icon-box {
        background: #f7fee7;
        color: #65a30d;
        border: 1.5px solid #d9f99d;
    }
    .dl-theme-lime .dl-date-container i {
        color: #65a30d;
    }
    .dl-theme-lime:hover {
        border-color: #bef264;
        transform: translateY(-8px);
        box-shadow: 0 20px 45px rgba(132, 204, 22, 0.18);
    }

    .dl-pro-card:hover .dl-top-accent {
        height: 7px;
    }

    .dl-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 24px;
    }

    .dl-phase-badge {
        font-size: 0.85rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        color: #475569;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        padding: 5px 14px;
        border-radius: 50px;
    }

    .dl-icon-box {
        width: 54px;
        height: 54px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.45rem;
        transition: transform 0.3s ease;
    }

    .dl-pro-card:hover .dl-icon-box {
        transform: scale(1.12) rotate(5deg);
    }

    .dl-date-container {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 14px;
    }

    .dl-date-container i {
        font-size: 1.6rem;
    }

    .dl-date-text {
        font-size: clamp(1.8rem, 2.3vw, 2.15rem);
        font-weight: 800;
        color: #0f172a;
        letter-spacing: -0.5px;
        line-height: 1.2;
    }

    .dl-card-title {
        font-size: 1.28rem;
        font-weight: 800;
        color: #1e293b;
        margin: 0 0 12px 0;
        line-height: 1.35;
    }

    .dl-card-desc {
        font-size: 1.02rem;
        color: #64748b;
        line-height: 1.65;
        margin: 0 0 26px 0;
        flex-grow: 1;
    }

    .dl-card-footer {
        padding-top: 20px;
        border-top: 1px dashed #e2e8f0;
        display: flex;
        align-items: center;
    }

    .dl-pill-status {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 0.88rem;
        font-weight: 700;
        padding: 6px 15px;
        border-radius: 8px;
    }

    .pill-open {
        background: #ecfdf5;
        color: #059669;
        border: 1px solid #a7f3d0;
    }

    .pill-review {
        background: #f8fafc;
        color: #334155;
        border: 1px solid #cbd5e1;
    }

    .pill-final {
        background: #f7fee7;
        color: #4d7c0f;
        border: 1px solid #d9f99d;
    }

    @media (max-width: 768px) {
        .deadlines-card-grid {
            grid-template-columns: 1fr;
        }
        .dl-pro-card {
            padding: 28px 22px;
        }
    }
</style>
