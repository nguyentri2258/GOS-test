<div class="offcanvas offcanvas-start bg-white shadow"
     tabindex="-1"
     id="sidebar">

    <div class="offcanvas-header bg-primary text-white">
        <h5 class="fw-bold">Menu</h5>
        <button type="button" class="btn-close btn-close-white"
                data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body p-3">
        <ul class="nav nav-pills flex-column gap-2">

            <li>
                <a class="nav-link {{ request()->routeIs('students.group_a') ? 'active' : '' }}"
                   href="{{ route('students.group_a') }}">
                    📊 Dashboard
                </a>
            </li>

            <li>
                <a class="nav-link {{ request()->routeIs('scores.*') ? 'active' : '' }}"
                   href="{{ route('scores.index') }}">
                    🔍 Search Scores
                </a>
            </li>

            <li>
                <a class="nav-link {{ request()->routeIs('reports.*') ? 'active' : '' }}"
                   href="{{ route('reports.index') }}">
                    📈 Reports
                </a>
            </li>

            <li>
                <a class="nav-link text-muted" href="#">
                    ⚙ Settings
                </a>
            </li>

        </ul>
    </div>
</div>
<style>
    .nav-link {
        border-radius: 10px;
        transition: 0.2s;
    }

    .nav-link:hover {
        background: #e9f2ff;
    }

    .nav-link.active {
        background: #0d6efd;
        color: white !important;
    }

    .card {
        border-radius: 15px;
    }
</style>
