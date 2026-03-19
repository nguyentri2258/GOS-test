@extends('layouts.default')

@section('content')
<div class="container mt-5">
    @php
        $labels = [
            'toan' => 'Math',
            'ngu_van' => 'Literature',
            'ngoai_ngu' => 'English',
            'vat_li' => 'Physics',
            'hoa_hoc' => 'Chemistry',
            'sinh_hoc' => 'Biology',
            'lich_su' => 'History',
            'dia_li' => 'Geography',
            'gdcd' => 'Civic Education',
        ];
    @endphp
    <form method="GET" class="mb-3">
        <select name="group" class="form-select w-auto" onchange="this.form.submit()">
            <option value="A00" {{ $group == 'A00' ? 'selected' : '' }}>Group A00</option>
            <option value="A01" {{ $group == 'A01' ? 'selected' : '' }}>Group A01</option>
            <option value="B00" {{ $group == 'B00' ? 'selected' : '' }}>Group B00</option>
            <option value="C00" {{ $group == 'C00' ? 'selected' : '' }}>Group C00</option>
            <option value="D01" {{ $group == 'D01' ? 'selected' : '' }}>Group D01</option>
        </select>
    </form>
    <h3 class="mb-4">
        Top 10 Students - Group {{ $group }}
    </h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th>Registration Number</th>
                    @foreach($subjects as $subject)
                        <th>{{ $labels[$subject] }}</th>
                    @endforeach
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->sbd }}</td>
                    @foreach($subjects as $subject)
                        <td>{{ $student->$subject }}</td>
                    @endforeach
                    <td><strong>{{ $student->total_score }}</strong></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
