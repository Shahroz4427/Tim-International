@extends('admin.layout')

@section('title', 'Dashboard | Home')

@section('content')
<div class="mb-4">
    <div class="container">
        <h1 class="mb-4 fw-bold fs-2">Hello, {{ auth()->user()->name }}</h1>

        {{-- Date Range Picker with Auto-Submit --}}
        <form method="GET" action="{{ route('admin.dashboard') }}" id="rangeForm" class="mb-4">
            <input type="text"
                   name="daterange"
                   id="daterange"
                   class="form-control"
                   placeholder="Select date range"
                   value="{{ request('daterange') }}"
                   autocomplete="off"
                   required>
        </form>

        @if(request('daterange'))
            <div class="mb-3 text-muted">
                Showing data for <strong>{{ request('daterange') }}</strong>
            </div>
        @endif

        {{-- Cards --}}
        <div class="row g-4">
            @foreach ([
                'Contact Us Submissions' => $contactUsCount ?? 0,
                'Car Inquiries' => $carInquiriesCount ?? 0,
                'Service Inquiries' => $serviceInquiriesCount ?? 0,
                'Get In Touch Inquiries' => $getInTouchCount ?? 0
            ] as $title => $count)
                <div class="col-md-6">
                    <div class="bg-body-tertiary rounded-4 overflow-hidden border" style="border-radius: 20px;">
                        <div class="bg-light p-3 border-bottom">
                            <h5 class="mb-0">{{ $title }}</h5>
                        </div>
                        <div class="p-4 bg-light">
                            <h2 class="fw-bold mb-0">{{ $count }}</h2>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_blue.css">
@endpush

@push('js')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#daterange", {
        mode: "range",
        dateFormat: "Y-m-d",
        defaultDate: @json(request('daterange') ? explode(' to ', request('daterange')) : [now()->subDays(7)->format('Y-m-d'), now()->format('Y-m-d')]),
        onClose: function(selectedDates, dateStr, instance) {
            if (selectedDates.length === 2) {
                document.getElementById('rangeForm').submit();
            }
        }
    });
</script>
@endpush
