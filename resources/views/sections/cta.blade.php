<!-- Call to action Banner -->
<section class="cta-banner" style="width: 100%;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; display: flex; flex-direction: column; align-items: center; text-align: center;">
        <div class="cta-content" style="display: flex; flex-direction: column; align-items: center;">
            <h2 style="text-align: center;">{{ strip_tags($settings['deadlines_banner_text'] ?? '25% Off Super Early Bird Registration – Valid Until September!') }}</h2>
            <p style="text-align: center;">{{ strip_tags($settings['deadlines_banner_sub'] ?? 'Secure your spot today and join global leaders in biomedical research at BioMed Summit 2027.') }}</p>
        </div>
        <a href="{{ url($settings['deadlines_banner_link'] ?? '/registration') }}" class="btn btn-white" style="margin-top: 15px; color: var(--teal-accent) !important;">{{ $settings['deadlines_banner_btn'] ?? 'Register Now' }}</a>
    </div>
</section>
