@extends('admin.layout')

@section('title')
Manage Service Inquiries
@endsection

@section('page_title')
Service Inquiries
@endsection

@push('css')
<style>
    .toggle-btn {
        border: none;
        background: transparent;
        color: black;
    }

    .toggle-btn:focus {
        outline: none;
        box-shadow: none;
    }

    .message-row td {
        padding: 10px;
        white-space: normal; /* ensures text wraps */
        word-break: break-word; /* breaks long words if needed */
    }

    @media (max-width: 480px) {
        .mobile-vertical-gap {
            margin-top: 5px;
        }
    }
</style>
@endpush

@section('content')

<div class="mb-3">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Services Inquiries</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">All Inquiries</li>
        </ol>
    </nav>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('success'))
<div class="alert alert-success" id="success-alert">
    {{ session('success') }}
</div>

<script>
    setTimeout(function () {
        const alertBox = document.getElementById('success-alert');
        if (alertBox) {
            alertBox.style.transition = 'opacity 0.5s ease';
            alertBox.style.opacity = 0;
            setTimeout(() => alertBox.remove(), 500); // Remove from DOM after fade
        }
    }, 5000); // 5000ms = 5 seconds
</script>
@endif


<div class="card" style="background-color: #efefef !important;">
    <div class="card-body">
        <div class="d-md-flex gap-4 align-items-center justify-content-between">
            <div class="fw-bold fs-4">Service Inquiry Submissions</div>
            <div class="d-md-flex gap-3 align-items-center">
                <div class="col-md-3 mobile-vertical-gap">
                    <select class="form-select" id="sortOrder">
                        <option value="desc" @if(request('sort')=='desc' ) selected @endif>Desc</option>
                        <option value="asc" @if(request('sort')=='asc' ) selected @endif>Asc</option>
                    </select>
                </div>
                <div class="col-md-3 mobile-vertical-gap">
                    <select class="form-select" id="recordsPerPage">
                        <option value="5" @if(request('records')==5) selected @endif>5</option>
                        <option value="10" @if(request('records')==10) selected @endif>10</option>
                        <option value="20" @if(request('records')==20) selected @endif>20</option>
                        <option value="30" @if(request('records')==30) selected @endif>30</option>
                        <option value="40" @if(request('records')==40) selected @endif>40</option>
                    </select>
                </div>
                <div class="col-md-6 mobile-vertical-gap">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" id="searchInput">
                        <button class="btn btn-outline-light" type="button">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive mt-3">
    <table class="table table-custom table-lg mb-0" id="serviceinquiry-table">
        <thead>
            <tr>
                <th></th> <!-- Toggle Button -->
                <th>ID#</th>
                <th>Customer</th>
                <th>Service</th>
                <th>Date/Time</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($serviceInquiries as $inquiry)
            <tr class="inquiry-row" data-inquiry-id="{{ $inquiry->id }}">
                <td>
                    <button class="btn btn-sm toggle-btn" data-inquiry-id="{{ $inquiry->id }}">
                        <i class="bi bi-chevron-down"></i>
                    </button>
                </td>
                <td>{{ $inquiry->id }}</td>
                <td>
                    <div class="d-flex flex-column gap-1">
                        <span><i class="bi bi-person-fill me-1 text-primary" style="color: black !important;"></i>{{ $inquiry->name }}</span>
                        <span><i class="bi bi-envelope-fill me-1 text-secondary" style="color: black !important;"></i>{{ $inquiry->email }}</span>
                        <span><i class="bi bi-telephone-fill me-1 text-success" style="color: black !important;"></i>{{ $inquiry->phone }}</span>
                    </div>
                </td>
                @php
                $serviceRecord = \App\Models\Service::where('name', $inquiry->service)->first();
                @endphp

                <td>
                    @if($serviceRecord)
                    <a href="{{ route('service.detail', $serviceRecord->id) }}" target="_blank">
                        <span style="color: #c50a21;">{{ $inquiry->service }}</span>
                    </a>
                    @else
                    <span style="color: gray;">{{ $inquiry->service }}</span>
                    @endif
                </td>

                <td>{{ $inquiry->created_at->format('d M Y, h:i A') }}</td>
                <td class="text-end">
                    <form action="{{ route('admin.manage-serviceinquiry.destroy', $inquiry->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this inquiry?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </td>
            </tr>
            <tr class="message-row d-none" data-inquiry-id="{{ $inquiry->id }}">
                <td colspan="6" class="bg-light">
                    <strong>Message:</strong> {{ $inquiry->message }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No Inquiries Found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection

@push('js')
<script>
    $(document).ready(function() {
        // Handle sort and pagination change
        $('#recordsPerPage').on('change', updateUrl);
        $('#sortOrder').on('change', updateUrl);

        function updateUrl() {
            let recordsPerPage = $('#recordsPerPage').val();
            let sortOption = $('#sortOrder').val();
            window.location.href = "{{ route('admin.manage-serviceinquiry.index') }}?page=1&records=" + recordsPerPage + "&sort=" + sortOption;
        }

        // Search across all relevant text including hidden message
        $('#searchInput').on('input', function() {
            let searchText = $(this).val().toLowerCase();

            $('#serviceinquiry-table tbody tr.inquiry-row').each(function() {
                let row = $(this);
                let inquiryId = row.data('inquiry-id');
                let messageRow = $(`.message-row[data-inquiry-id="${inquiryId}"]`);

                let rowText = row.text().toLowerCase();
                let messageText = messageRow.text().toLowerCase();

                let combinedText = rowText + ' ' + messageText;

                if (combinedText.includes(searchText)) {
                    row.show();
                    messageRow.show();
                } else {
                    row.hide();
                    messageRow.hide();
                }
            });
        });

        // Toggle message row visibility
        $(document).on('click', '.toggle-btn', function() {
            const inquiryId = $(this).data('inquiry-id');
            const messageRow = $(`.message-row[data-inquiry-id="${inquiryId}"]`);
            const icon = $(this).find('i');

            messageRow.toggleClass('d-none');
            icon.toggleClass('bi-chevron-down bi-chevron-up');
        });
    });
</script>
@endpush