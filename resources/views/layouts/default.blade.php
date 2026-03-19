<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>G-Scores</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background: #f5f7fb;
        }

        .main-content {
            padding: 20px;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    @include('components.header')

    @include('components.sidebar')

    <main class="main-content flex-grow-1">
        <div class="container">
            @yield('content')
        </div>
    </main>

    @include('components.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function setFont(size) {
            document.body.classList.remove('font-small', 'font-medium', 'font-large');
            document.body.classList.add('font-' + size);

            localStorage.setItem('fontSize', size);

            document.getElementById('currentFont').innerText = size;
        }

        document.addEventListener('DOMContentLoaded', () => {
            const saved = localStorage.getItem('fontSize') || 'medium';
            document.body.classList.add('font-' + saved);

            const label = document.getElementById('currentFont');
            if (label) label.innerText = saved;
        });
    </script>
    @stack('scripts')
</body>
</html>
