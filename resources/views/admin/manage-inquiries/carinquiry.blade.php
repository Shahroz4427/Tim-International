@extends('admin.layout')

@section('title')
Manage Car Inquiries
@endsection

@section('page_title')
Car Inquiries
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
                <a href="#">Car Inquiries</a>
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
            <div class="fw-bold fs-4">Car Inquiry Submissions</div>
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
    <table class="table table-custom table-lg mb-0" id="carinquiry-table">
        <thead>
            <tr>
                <th></th>
                <th>ID#</th>
                <th>Customer</th>
                <th>Title</th>
                <th>Date/Time</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($carInquiries as $inquiry)
            <tr class="inquiry-row" data-inquiry-id="{{ $inquiry->id }}">
                <td>
                    <button class="btn btn-sm toggle-btn" data-inquiry-id="{{ $inquiry->id }}">
                        <i class="bi bi-chevron-down"></i>
                    </button>
                </td>
                <td>{{ $inquiry->id }}</td>
                <td>
                    <div class="d-flex flex-column gap-1">
                        <span><i style="color: black !important;" class="bi bi-person-fill me-1 text-primary"></i>{{ $inquiry->name }}</span>
                        <span><i style="color: black !important;" class="bi bi-envelope-fill me-1 text-secondary"></i>{{ $inquiry->email }}</span>
                        <span><i style="color: black !important;" class="bi bi-telephone-fill me-1 text-success"></i>{{ $inquiry->phone }}</span>
                    </div>
                </td>
                @php
                // If title is stored but not the ID, lookup the car by title
                $car = \App\Models\Inventory::where('title', $inquiry->title)->first();
                @endphp

                <td>
                    @if($car)
                    <a href="{{ route('inventory.detail', $car->id) }}" target="_blank">
                        <span style="color:#c50a21">{{ $inquiry->title }}</span>
                    </a>
                    @else
                    <span style="color:gray">{{ $inquiry->title }}</span>
                    @endif
                </td>

                <td>{{ $inquiry->created_at->format('d M Y, h:i A') }}</td>
                <td class="text-end">
                    <form action="{{ route('admin.manage-carinquiry.destroy', $inquiry->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this inquiry?')" style="display: inline;">
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

<div class="d-flex justify-content-center mt-3">
    {{ $carInquiries->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
</div>

@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('#recordsPerPage').on('change', updateUrl);
        $('#sortOrder').on('change', updateUrl);

        function updateUrl() {
            let recordsPerPage = $('#recordsPerPage').val();
            let sortOption = $('#sortOrder').val();
            window.location.href = "{{ route('admin.manage-carinquiry.index') }}?page=1&records=" + recordsPerPage + "&sort=" + sortOption;
        }

        $('#searchInput').on('input', function() {
            let searchText = $(this).val().toLowerCase();

            $('#carinquiry-table tbody tr.inquiry-row').each(function() {
                let row = $(this);
                let inquiryId = row.data('inquiry-id');
                let messageRow = $('.message-row[data-inquiry-id="' + inquiryId + '"]');

                let rowText = row.find('td').text().toLowerCase();

                if (rowText.includes(searchText)) {
                    row.show();
                    messageRow.show();
                } else {
                    row.hide();
                    messageRow.hide();
                }
            });
        });

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