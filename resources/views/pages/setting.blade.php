@extends('layouts.default')

@section('content')
<div class="card p-4 shadow-sm">
    <h5 class="fw-bold mb-3">Font Size</h5>
    <div class="d-flex gap-2 mb-3">
        <button type="button" class="btn btn-outline-primary" onclick="setFont('small')">
            Small
        </button>
        <button type="button" class="btn btn-outline-primary" onclick="setFont('medium')">
            Medium
        </button>
        <button type="button" class="btn btn-outline-primary" onclick="setFont('large')">
            Large
        </button>
    </div>
    <div class="border rounded p-3 bg-light">
        <h6 class="fw-bold">Preview</h6>
        <p class="mb-1">
            This is a sample text to preview font size.
        </p>
        <p class="mb-0 text-muted">
            The quick brown fox jumps over the lazy dog.
        </p>
    </div>
</div>
@endsection
