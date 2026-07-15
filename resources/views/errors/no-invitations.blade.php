<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Pernikahan — Belum Tersedia</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #121212;
            --card-bg: rgba(255, 255, 255, 0.03);
            --primary-gold: #D4AF37;
            --accent-gold: #F3E5AB;
            --text-main: #E0E0E0;
            --text-muted: #A0A0A0;
            --border-color: rgba(212, 175, 55, 0.2);
        }

        body {
            margin: 0;
            padding: 0;
            background-color: var(--bg-color);
            color: var(--text-main);
            font-family: 'Montserrat', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            overflow-x: hidden;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(212, 175, 55, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(212, 175, 55, 0.05) 0%, transparent 40%);
        }

        .container {
            max-width: 600px;
            width: 90%;
            text-align: center;
            padding: 40px 20px;
        }

        .card {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--border-color);
            border-radius: 16px;
            padding: 40px 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            position: relative;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 10px;
            left: 10px;
            right: 10px;
            bottom: 10px;
            border: 1px dashed rgba(212, 175, 55, 0.1);
            border-radius: 12px;
            pointer-events: none;
        }

        h1 {
            font-family: 'Cinzel', serif;
            color: var(--primary-gold);
            font-size: 2.2rem;
            margin-top: 0;
            margin-bottom: 20px;
            letter-spacing: 2px;
        }

        p {
            font-size: 1rem;
            line-height: 1.6;
            color: var(--text-muted);
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            background: linear-gradient(135deg, var(--primary-gold), #AA7C11);
            color: #000;
            text-decoration: none;
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.9rem;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(212, 175, 55, 0.5);
            background: linear-gradient(135deg, var(--accent-gold), var(--primary-gold));
        }

        .error-details {
            margin-top: 30px;
            background: rgba(255, 0, 0, 0.05);
            border: 1px solid rgba(255, 0, 0, 0.1);
            border-radius: 8px;
            padding: 15px;
            text-align: left;
            font-family: monospace;
            font-size: 0.85rem;
            color: #ff8888;
            overflow-x: auto;
        }

        .logo {
            font-family: 'Cinzel', serif;
            font-size: 4rem;
            color: var(--primary-gold);
            margin-bottom: 10px;
            opacity: 0.85;
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <span class="logo">W</span>
            <h1>Undangan Pernikahan</h1>
            <p>
                Selamat datang di platform undangan pernikahan kami. Saat ini, sistem belum memiliki data undangan yang terdaftar di dalam database atau terjadi kendala koneksi database.
            </p>
            
            <a href="/admin" class="btn">Masuk Admin Panel</a>

            @if(isset($error))
                <div class="error-details">
                    <strong>Pesan Error:</strong><br>
                    {{ $error }}
                </div>
            @endif
        </div>
    </div>
</body>
</html>
