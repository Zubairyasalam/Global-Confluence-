<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BioMed Summit 2027 | European Scientific Summit</title>
    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="{{ asset('images/MMC-LOGO-2.jpg') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
    <style>
        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            left: 40px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 32px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .whatsapp-float:hover {
            transform: scale(1.1);
            color: #FFF;
            box-shadow: 0 6px 14px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    @yield('content')
    <!-- Floating WhatsApp Button -->
    @if(isset($settings['contact_whatsapp_link']) && !empty($settings['contact_whatsapp_link']))
    <a href="{{ $settings['contact_whatsapp_link'] }}" class="whatsapp-float" target="_blank" rel="noopener noreferrer" title="Chat with us on WhatsApp">
        <i class="fa-brands fa-whatsapp"></i>
    </a>
    @endif

    @yield('scripts')
</body>
</html>
