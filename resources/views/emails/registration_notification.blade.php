<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f3f4f6; margin: 0; padding: 40px 20px; color: #334155; line-height: 1.6; }
        .email-wrapper { max-width: 650px; margin: 0 auto; background: #fff; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
        .header { background: linear-gradient(135deg, #0a192f 0%, #112240 100%); padding: 40px 30px; text-align: center; border-bottom: 4px solid #00A896; }
        .header img { max-width: 200px; height: auto; margin-bottom: 15px; filter: brightness(0) invert(1); }
        .header h1 { color: #fff; margin: 0; font-size: 22px; font-weight: 600; }
        .content { padding: 35px 30px; }
        .badge { display: inline-block; background: rgba(0,168,150,0.12); color: #00A896; padding: 5px 14px; border-radius: 20px; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 20px; }
        .details-card { background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 25px; margin-bottom: 25px; }
        .section-title { font-size: 12px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 16px; }
        .detail-row { display: table; width: 100%; margin-bottom: 13px; }
        .detail-row:last-child { margin-bottom: 0; }
        .detail-label { display: table-cell; width: 35%; font-size: 13px; color: #64748b; font-weight: 600; text-transform: uppercase; letter-spacing: 0.4px; vertical-align: top; }
        .detail-value { display: table-cell; width: 65%; font-size: 15px; color: #0f172a; font-weight: 500; vertical-align: top; }
        .highlight-value { color: #00A896; font-weight: 700; }
        .footer { background: #f8fafc; border-top: 1px solid #e2e8f0; padding: 22px 30px; text-align: center; color: #94a3b8; font-size: 13px; }
        .footer p { margin: 0 0 6px; }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="header">
            @if(file_exists(public_path('images/logo.png')))
                <img src="{{ $message->embed(public_path('images/logo.png')) }}" alt="BioMed Summit 2027">
            @else
                <div style="color:#00A896;font-size:22px;font-weight:800;margin-bottom:10px;">BioMed Summit 2027</div>
            @endif
            <h1>New Registration Received</h1>
        </div>

        <div class="content">
            <span class="badge">🔔 New Registration</span>
            <p style="color:#475569;font-size:15px;margin:0 0 25px;">A new delegate has registered for BioMed Summit 2027. Here are the complete details:</p>

            <!-- Personal Info -->
            <div class="details-card">
                <div class="section-title">👤 Registrant Details</div>
                <div class="detail-row">
                    <span class="detail-label">Name</span>
                    <span class="detail-value">{{ $registration->name }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Email</span>
                    <span class="detail-value"><a href="mailto:{{ $registration->email }}" style="color:#00A896;text-decoration:none;">{{ $registration->email }}</a></span>
                </div>
                @if($registration->phone)
                <div class="detail-row">
                    <span class="detail-label">Phone</span>
                    <span class="detail-value">{{ $registration->phone }}</span>
                </div>
                @endif
                @if($registration->organization)
                <div class="detail-row">
                    <span class="detail-label">Organization</span>
                    <span class="detail-value">{{ $registration->organization }}</span>
                </div>
                @endif
                @if($registration->interested_in)
                <div class="detail-row">
                    <span class="detail-label">Interested In</span>
                    <span class="detail-value">{{ $registration->interested_in }}</span>
                </div>
                @endif
            </div>

            <!-- Registration Info -->
            <div class="details-card">
                <div class="section-title">💳 Registration & Payment</div>
                <div class="detail-row">
                    <span class="detail-label">Category</span>
                    <span class="detail-value highlight-value">{{ $registration->category_name }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Payment Method</span>
                    <span class="detail-value">{{ $registration->payment_method }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Total Amount</span>
                    <span class="detail-value" style="color:#0f172a;font-weight:800;font-size:16px;">₹ {{ number_format($registration->total_amount, 0) }} INR</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Status</span>
                    <span class="detail-value"><span style="background:rgba(0,168,150,0.12);color:#00A896;padding:3px 10px;border-radius:20px;font-size:12px;font-weight:700;text-transform:uppercase;">{{ $registration->payment_status }}</span></span>
                </div>
                @if($registration->addons && count($registration->addons) > 0)
                <div class="detail-row">
                    <span class="detail-label">Add-Ons</span>
                    <span class="detail-value">
                        @foreach($registration->addons as $addon => $price)
                            <div>{{ $addon }}: ₹{{ number_format($price, 0) }}</div>
                        @endforeach
                    </span>
                </div>
                @endif
            </div>
        </div>

        <div class="footer">
            <p>This is an automated notification from the BioMed Summit 2027 Portal.</p>
            <p>&copy; {{ date('Y') }} BioMed Summit. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
