<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Golden Owl</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary px-3 py-3">
        <button class="btn btn-outline-light"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#sidebar"
                aria-controls="sidebar">
            ☰
        </button>
        <a class="navbar-brand mx-auto fw-bold fs-1" href="/">
            G-Scores
        </a>
    </nav>
    @yield('content')
    <div class="offcanvas offcanvas-start bg-light"
        tabindex="-1"
        id="sidebar"
        aria-labelledby="sidebarLabel">
        <div class="offcanvas-header bg-primary text-white">
            <h5 class="offcanvas-title fw-bold" id="sidebarLabel">
                Menu
            </h5>
            <button type="button" class="btn-close btn-close-white"
                    data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body p-3">
            <ul class="nav nav-pills flex-column gap-2">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2
                        {{ request()->routeIs('students.group_a') ? 'active' : '' }}"
                    href="{{ route('students.group_a') }}">
                        📊 Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2
                        {{ request()->routeIs('scores.*') ? 'active' : '' }}"
                    href="{{ route('scores.index') }}">
                        🔍 Search Scores
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2
                        {{ request()->routeIs('reports.*') ? 'active' : '' }}"
                    href="{{ route('reports.index') }}">
                        📈 Reports
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 text-muted"
                    href="#">
                        ⚙ Settings
                    </a>
                </li>
            </ul>
        </div>
    </div>
    @stack('scripts')
</body>
</html>
