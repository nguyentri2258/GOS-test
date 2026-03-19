@extends('layouts.default')

@section('content')

<div class="container py-4">
    <div class="text-center mb-5">
        <h2 class="fw-bold">🎓 G-Scores System</h2>
        <p class="text-muted">
            High School Exam Score Lookup & Analysis System (2024)
        </p>
    </div>

    <div class="row g-4">

        <div class="col-md-4">
            <a href="{{ route('scores.index') }}" class="text-decoration-none">
                <div class="card shadow-sm border-0 p-4 text-center h-100 hover-card">
                    <h1>🔍</h1>
                    <h5 class="fw-bold">Score Lookup</h5>
                    <p class="text-muted">Search by registration number</p>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('reports.index') }}" class="text-decoration-none">
                <div class="card shadow-sm border-0 p-4 text-center h-100 hover-card">
                    <h1>📈</h1>
                    <h5 class="fw-bold">Reports</h5>
                    <p class="text-muted">View charts and analysis</p>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('students.index') }}" class="text-decoration-none">
                <div class="card shadow-sm border-0 p-4 text-center h-100 hover-card">
                    <h1>🏆</h1>
                    <h5 class="fw-bold">Top Students</h5>
                    <p class="text-muted">Group A ranking</p>
                </div>
            </a>
        </div>

    </div>
</div>

<style>
    .hover-card {
        transition: 0.2s;
        border-radius: 15px;
    }

    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
</style>

@endsection
