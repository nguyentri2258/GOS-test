@extends('layouts.default')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4">Score Report by Subject</h3>
    <div class="mb-3">
        <label class="form-label">Select Subject</label>
        <select id="subject" class="form-select">
            <option value="">-- Choose subject --</option>
            @foreach($subjects as $key => $label)
                <option value="{{ $key }}">{{ $label }}</option>
            @endforeach
        </select>
    </div>
    <canvas id="scoreChart" height="120"></canvas>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
<script>
let chart;

document.getElementById('subject').addEventListener('change', function () {
    const subject = this.value;
    if (!subject) return;

    fetch(`{{ route('reports.chart') }}?subject=${subject}`)
        .then(res => res.json())
        .then(data => {
            if (chart) {
                chart.destroy();
            }

            const ctx = document.getElementById('scoreChart');

            chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: 'Number of Students',
                        data: data.values,
                        backgroundColor: [
                            '#198754',
                            '#0d6efd',
                            '#ffc107',
                            '#dc3545'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        datalabels: {
                            anchor: 'end',
                            align: 'top',
                            color: '#000',
                            font: {
                                weight: 'bold'
                            },
                            formatter: Math.round
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
                plugins: [ChartDataLabels]
            });
        });
});
</script>
@endpush