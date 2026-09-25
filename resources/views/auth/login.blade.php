<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - BioMed Summit 2027</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --admin-bg: #F7F9FC;
            --admin-sidebar: #112340;
            --admin-primary: #00A896;
            --admin-text: #555555;
            --admin-white: #ffffff;
            --admin-border: #E2E8F0;
            --font-main: 'Poppins', sans-serif;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: var(--font-main); }
        body { background-color: var(--admin-bg); color: var(--admin-text); display: flex; align-items: center; justify-content: center; min-height: 100vh; }
        .btn-navy { background-color: var(--admin-sidebar); color: var(--admin-white); border: none; cursor: pointer; transition: background 0.3s; }
        .btn-navy:hover { background-color: #1A365D; }
    </style>
</head>
<body>

    <div style="width: 100%; max-width: 450px; padding: 20px;">
        <div style="background: var(--admin-white); padding: 40px; border-radius: 16px; box-shadow: 0 10px 25px rgba(17,35,64,0.08); border: 1px solid var(--admin-border);">
            
            <div style="text-align: center; margin-bottom: 30px;">
                <img src="{{ asset('images/MMC-LOGO-2.jpg') }}" alt="Admin Logo" style="max-height: 90px; margin-bottom: 15px; mix-blend-mode: multiply;">
                <h3 style="font-size: 1.8rem; color: var(--admin-sidebar);">Admin Portal</h3>
                <p style="color: var(--admin-text); margin-top: 5px;">Secure access for BioMed Summit</p>
            </div>

            @if ($errors->any())
                <div style="background: rgba(239, 68, 68, 0.1); border-left: 4px solid #ef4444; padding: 15px; margin-bottom: 25px; border-radius: 4px;">
                    <ul style="list-style: none; color: #b91c1c; font-size: 0.9rem;">
                        @foreach ($errors->all() as $error)
                            <li><i class="fa-solid fa-circle-exclamation" style="margin-right: 5px;"></i> {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                
                <div style="margin-bottom: 20px;">
                    <label for="email" style="display: block; font-weight: 600; color: var(--admin-sidebar); margin-bottom: 8px;">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                        style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-size: 1rem; color: var(--admin-text); outline: none;">
                </div>

                <div style="margin-bottom: 30px;">
                    <label for="password" style="display: block; font-weight: 600; color: var(--admin-sidebar); margin-bottom: 8px;">Password</label>
                    <input type="password" id="password" name="password" required
                        style="width: 100%; padding: 12px 15px; border: 1px solid var(--admin-border); border-radius: 8px; font-size: 1rem; color: var(--admin-text); outline: none;">
                </div>

                <button type="submit" class="btn-navy" style="width: 100%; padding: 14px; border-radius: 8px; font-size: 1.1rem; font-weight: 600; display: flex; justify-content: center; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-right-to-bracket"></i> Login
                </button>
            </form>
            
            <div style="text-align: center; margin-top: 25px;">
                <a href="/" style="color: var(--admin-text); text-decoration: none; font-size: 0.9rem; transition: color 0.3s;">
                    <i class="fa-solid fa-arrow-left" style="margin-right: 5px;"></i> Back to Main Website
                </a>
            </div>
        </div>
    </div>

</body>
</html>
