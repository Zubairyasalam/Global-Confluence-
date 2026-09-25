<?php

$file = 'c:\scrach\biomed-app\resources\views\sections\deadlines.blade.php';

$html = <<<'HTML'
<!-- Important Deadlines Section -->
<style>
    .deadlines-section-new {
        background-color: #ffffff;
        padding: 80px 20px;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }
    
    .dl-header-block {
        text-align: center;
        margin-bottom: 50px;
    }

    .dl-main-title {
        font-size: 3rem;
        font-weight: 800;
        color: #1e293b;
        margin: 0 0 15px 0;
    }

    .dl-main-title span {
        color: #00a896;
    }

    .dl-header-line {
        width: 50px;
        height: 3px;
        background: #84cc16;
        margin: 0 auto 20px auto;
    }

    .dl-subtitle-text {
        font-size: 1.1rem;
        color: #64748b;
        font-weight: 500;
    }

    .dl-cards-wrapper {
        max-width: 1000px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
    }

    .dl-card-new {
        position: relative;
        border-radius: 16px;
        padding: 50px 30px;
        text-align: center;
        overflow: hidden;
        color: #ffffff;
        box-shadow: 0 15px 35px rgba(0,0,0,0.05);
        transition: transform 0.3s ease;
    }

    .dl-card-new:hover {
        transform: translateY(-5px);
    }

    /* Top right subtle circle overlay */
    .dl-card-new::after {
        content: '';
        position: absolute;
        top: -40px;
        right: -40px;
        width: 130px;
        height: 130px;
        background: rgba(255, 255, 255, 0.06);
        border-radius: 50%;
        pointer-events: none;
    }

    .dl-bg-1 { background-color: #1e3250; }
    .dl-bg-2 { background-color: #009688; }
    .dl-bg-3 { background-color: #8bc34a; }

    .dl-icon-ring {
        width: 70px;
        height: 70px;
        margin: 0 auto 25px auto;
        border-radius: 50%;
        border: 1px solid rgba(255,255,255,0.4);
        background: rgba(255,255,255,0.15);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .dl-date-text {
        font-size: 1.9rem;
        font-weight: 800;
        margin-bottom: 12px;
        letter-spacing: -0.5px;
    }

    .dl-label-text {
        font-size: 0.9rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: rgba(255,255,255,0.9);
    }
</style>

<section class="deadlines-section-new">
    
    <div class="dl-header-block">
        <h2 class="dl-main-title">Important <span>Deadlines</span></h2>
        <div class="dl-header-line"></div>
        <p class="dl-subtitle-text">Key Dates To Mark In Your Calendar</p>
    </div>

    <div class="dl-cards-wrapper">
        
        <!-- Card 1 -->
        <div class="dl-card-new dl-bg-1">
            <div class="dl-icon-ring">
                <i class="fa-solid fa-file-arrow-up"></i>
            </div>
            <div class="dl-date-text">Oct 07, 2026</div>
            <div class="dl-label-text">SUBMISSION OF ABSTRACT</div>
        </div>

        <!-- Card 2 -->
        <div class="dl-card-new dl-bg-2">
            <div class="dl-icon-ring">
                <i class="fa-solid fa-envelope-open-text"></i>
            </div>
            <div class="dl-date-text">Oct 15, 2026</div>
            <div class="dl-label-text">ACCEPTANCE OF ABSTRACT</div>
        </div>

        <!-- Card 3 -->
        <div class="dl-card-new dl-bg-3">
            <div class="dl-icon-ring">
                <i class="fa-solid fa-book"></i>
            </div>
            <div class="dl-date-text">Nov 15, 2026</div>
            <div class="dl-label-text">FULL PAPER</div>
        </div>

    </div>

</section>
HTML;

file_put_contents($file, $html);
echo "Successfully updated deadlines.blade.php\n";
