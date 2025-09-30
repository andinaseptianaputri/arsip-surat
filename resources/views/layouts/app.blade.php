<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsip Surat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        /* === Sidebar Styling === */
        .sidebar {
            background-color: #1e3a8a; /* Biru tua */
            min-height: 100vh;
            padding: 20px;
            width: 250px;
        }

        .sidebar h4 {
            font-size: 24px;
            font-weight: bold;
            color: #e0f2fe; /* Biru muda */
            margin-bottom: 25px;
            text-align: center;
        }

        .sidebar .nav-link {
            font-size: 18px;
            color: #e0f2fe; /* Biru muda */
            padding: 10px 5px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .sidebar .nav-link:hover {
            background-color: #2563eb; /* Biru cerah saat hover */
            color: #facc15; /* Kuning emas saat hover */
            transform: translateX(6px); /* Efek geser ke kanan */
        }

        /* Konten utama */
        .content {
            flex-grow: 1;
            padding: 20px;
            background-color: #f1f5f9; /* Abu terang */
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <h4>Menu</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('surat.index') }}">📂 Arsip</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('kategori.index') }}">📑 Kategori Surat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">ℹ️ Tentang</a>
                </li>
            </ul>
        </div>

        <!-- Konten -->
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
</html>
