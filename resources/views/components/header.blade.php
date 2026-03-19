<nav class="navbar navbar-dark px-3 py-3 shadow-sm custom-navbar">
    <button class="btn btn-menu"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#sidebar">
        ☰
    </button>

    <a class="navbar-brand mx-auto fw-bold fs-3 brand-logo"
        href="/">
        G-Scores
    </a>
</nav>
<style>
    .custom-navbar {
        background: linear-gradient(135deg, #0d6efd, #4dabf7);
    }

    .brand-logo {
        letter-spacing: 1px;
        transition: 0.2s;
    }

    .brand-logo:hover {
        opacity: 0.85;
    }

    .btn-menu {
        color: white;
        border: none;
        font-size: 1.3rem;
        padding: 6px 12px;
        border-radius: 8px;
        transition: 0.2s;
    }

    .btn-menu:hover {
        background: rgba(255,255,255,0.2);
    }

    .btn-menu:active {
        transform: scale(0.95);
    }
</style>
