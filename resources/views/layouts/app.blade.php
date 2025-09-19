<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsip Surat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="d-flex">
        <div class="bg-light vh-100 p-3" style="width: 250px;">
            <h4>Menu</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('surat.index') }}">⭐ Arsip</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('kategori.index') }}">⚙️ Kategori Surat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('about') }}">ⓘ About</a>
                </li>
            </ul>
        </div>
        <div class="flex-grow-1 p-4">
            @yield('content')
        </div>
    </div>
</body>
</html>