@extends('layouts.default')

@section('content')

@if($errors->any())
    <div class='alert alert-danger'>
        <ul class='mb-0'>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container mt-5">
    <h4 class="mb-3">User Registration</h4>
    <form method="POST" action="{{ route('scores.check') }}" class="row g-3 mb-5">
        @csrf
        <div class="col-md-6">
            <label for="sbd" class="form-label">Registration Number</label>
            <input
                type="number"
                name="sbd"
                id="sbd"
                class="form-control"
                placeholder="Enter registration number"
                value="{{ old('sbd') }}"
                required
            >
        </div>
        <div class="col-md-2 align-self-end">
            <button type="submit" class="btn btn-dark w-100">Submit</button>
        </div>
    </form>
    <h4 class="mb-3">Detailed Scores</h4>
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>Math</th>
                    <th>Literature</th>
                    <th>English</th>
                    <th>Physics</th>
                    <th>Chemistry</th>
                    <th>Biology</th>
                    <th>History</th>
                    <th>Geography</th>
                    <th>Civic Education</th>
                </tr>
            </thead>
            <tbody>
                @isset($score)
                    <tr>
                        <td>{{ $score->toan }}</td>
                        <td>{{ $score->ngu_van }}</td>
                        <td>{{ $score->ngoai_ngu }}</td>
                        <td>{{ $score->vat_li }}</td>
                        <td>{{ $score->hoa_hoc }}</td>
                        <td>{{ $score->sinh_hoc }}</td>
                        <td>{{ $score->lich_su }}</td>
                        <td>{{ $score->dia_li }}</td>
                        <td>{{ $score->gdcd }}</td>
                    </tr>
                @else
                    <tr>
                        <td colspan="9">Not found scores</td>
                    </tr>
                @endisset
            </tbody>
        </table>
    </div>
</div>
<style>
    th, td {
        white-space: nowrap;
    }
</style>
@endsection
