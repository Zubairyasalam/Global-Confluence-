@php
    $isStallBookingPage = request()->is('stall-booking*') || 
                          request()->is('page/stall-booking*') || 
                          request()->is('*stall-booking*') || 
                          (isset($slug) && in_array($slug, ['stall-booking-and-merchandise', 'stall-booking', 'stall-booking-merchandise']));
@endphp

@if($isStallBookingPage)
<!-- Floating QR Code Payment Widget (Exclusive to Stall Booking & Merchandise Page) -->
<div id="floatingQrWidget" class="floating-qr-widget">
    <button type="button" class="floating-qr-close" id="floatingQrClose" aria-label="Close QR Widget" onclick="toggleFloatingQr(false)">
        <i class="fa-solid fa-xmark"></i>
    </button>
    <div class="floating-qr-inner">
        <div class="floating-qr-img-box">
            <img src="{{ asset('images/payment_qr_final.png') }}" alt="Scan QR Code for Payment" class="floating-qr-img" onerror="this.src='{{ asset('images/stall_booking/payment_qr.png') }}'">
        </div>
        <div class="floating-qr-title">Scan for Payment</div>
        <div class="floating-qr-sub">Direct UPI / GPay / PhonePe</div>
        <a href="https://u.payu.in/PAYUMN/IJZcZKXf5LTs" target="_blank" rel="noopener noreferrer" class="floating-qr-btn">
            <span>Pay Online</span>
            <i class="fa-solid fa-arrow-up-right-from-square"></i>
        </a>
    </div>
</div>

<!-- Minimized Trigger Button (when closed) -->
<button type="button" id="floatingQrLauncher" class="floating-qr-launcher" onclick="toggleFloatingQr(true)" title="Open Payment QR Code">
    <i class="fa-solid fa-qrcode"></i>
    <span class="launcher-text">Pay QR</span>
</button>

<style>
    .floating-qr-widget {
        position: fixed;
        right: 24px;
        bottom: 110px;
        width: 220px;
        background: #ffffff;
        border-radius: 18px;
        box-shadow: 0 12px 35px rgba(15, 23, 42, 0.18), 0 2px 8px rgba(0, 168, 150, 0.12);
        border: 2px solid #e2e8f0;
        padding: 16px 14px 14px 14px;
        z-index: 999;
        text-align: center;
        transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        animation: floatQrEntrance 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) both;
    }

    .floating-qr-widget.is-hidden {
        transform: translateY(30px) scale(0.85);
        opacity: 0;
        pointer-events: none;
        display: none;
    }

    .floating-qr-close {
        position: absolute;
        top: -10px;
        right: -10px;
        width: 28px;
        height: 28px;
        background: #0f172a;
        color: #ffffff;
        border: 2px solid #ffffff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 3px 8px rgba(0,0,0,0.25);
        font-size: 13px;
        transition: transform 0.2s, background 0.2s;
        z-index: 10;
        padding: 0;
    }

    .floating-qr-close:hover {
        background: #ef4444;
        transform: scale(1.15) rotate(90deg);
    }

    .floating-qr-img-box {
        background: #f8fafc;
        border: 1px solid #cbd5e1;
        border-radius: 12px;
        padding: 8px;
        margin-bottom: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .floating-qr-img {
        width: 100%;
        max-width: 155px;
        height: auto;
        display: block;
        border-radius: 6px;
    }

    .floating-qr-title {
        font-size: 0.95rem;
        font-weight: 700;
        color: #0f172a;
        line-height: 1.25;
        margin-bottom: 2px;
    }

    .floating-qr-sub {
        font-size: 0.72rem;
        color: #64748b;
        font-weight: 500;
        margin-bottom: 10px;
    }

    .floating-qr-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        width: 100%;
        padding: 8px 12px;
        background: #1e3a8a;
        color: #ffffff !important;
        font-size: 0.82rem;
        font-weight: 600;
        border-radius: 30px;
        text-decoration: none;
        transition: all 0.25s ease;
        box-shadow: 0 4px 12px rgba(30, 58, 138, 0.25);
    }

    .floating-qr-btn:hover {
        background: #00A896;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(0, 168, 150, 0.35);
    }

    /* Minimized Trigger Launcher */
    .floating-qr-launcher {
        position: fixed;
        right: 24px;
        bottom: 110px;
        background: linear-gradient(135deg, #1e3a8a 0%, #00A896 100%);
        color: #ffffff;
        border: none;
        border-radius: 30px;
        padding: 10px 16px;
        display: none;
        align-items: center;
        gap: 8px;
        font-size: 0.85rem;
        font-weight: 700;
        cursor: pointer;
        box-shadow: 0 6px 20px rgba(0, 168, 150, 0.35);
        z-index: 998;
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        animation: pulseLauncher 2.5s infinite;
    }

    .floating-qr-launcher.is-visible {
        display: inline-flex;
    }

    .floating-qr-launcher:hover {
        transform: scale(1.08) translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 168, 150, 0.5);
    }

    @keyframes floatQrEntrance {
        from {
            transform: translateY(40px) scale(0.8);
            opacity: 0;
        }
        to {
            transform: translateY(0) scale(1);
            opacity: 1;
        }
    }

    @keyframes pulseLauncher {
        0%, 100% {
            box-shadow: 0 6px 20px rgba(0, 168, 150, 0.35);
        }
        50% {
            box-shadow: 0 6px 25px rgba(30, 58, 138, 0.6);
        }
    }

    @media (max-width: 640px) {
        .floating-qr-widget {
            right: 12px;
            bottom: 100px;
            width: 175px;
            padding: 12px 10px 10px 10px;
        }
        .floating-qr-title {
            font-size: 0.82rem;
        }
        .floating-qr-sub {
            font-size: 0.65rem;
        }
        .floating-qr-btn {
            font-size: 0.75rem;
            padding: 6px 10px;
        }
        .floating-qr-launcher {
            right: 12px;
            bottom: 100px;
            padding: 8px 12px;
            font-size: 0.78rem;
        }
    }
</style>

<script>
    function toggleFloatingQr(show) {
        const widget = document.getElementById('floatingQrWidget');
        const launcher = document.getElementById('floatingQrLauncher');
        if (!widget || !launcher) return;

        if (show) {
            widget.classList.remove('is-hidden');
            widget.style.display = 'block';
            launcher.classList.remove('is-visible');
            sessionStorage.removeItem('floatingQrDismissed');
        } else {
            widget.classList.add('is-hidden');
            launcher.classList.add('is-visible');
            sessionStorage.setItem('floatingQrDismissed', 'true');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        if (sessionStorage.getItem('floatingQrDismissed') === 'true') {
            const widget = document.getElementById('floatingQrWidget');
            const launcher = document.getElementById('floatingQrLauncher');
            if (widget && launcher) {
                widget.classList.add('is-hidden');
                launcher.classList.add('is-visible');
            }
        }
    });
</script>
@endif
