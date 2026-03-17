@extends('layouts.default')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4">Top 10 Students - Group A (Math, Physics, Chemistry)</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th>Registration Number</th>
                    <th>Math</th>
                    <th>Physics</th>
                    <th>Chemistry</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->sbd }}</td>
                        <td>{{ $student->toan }}</td>
                        <td>{{ $student->vat_li }}</td>
                        <td>{{ $student->hoa_hoc }}</td>
                        <td><strong>{{ $student->total_score }}</strong></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection