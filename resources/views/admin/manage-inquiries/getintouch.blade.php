@extends('admin.layout')

@push('css')
<style>
    .interest-badges {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .badge-color {
        background-color: #c50a21;
        color: #fff;
    }

    @media (max-width: 480px) {
        .mobile-vertical-gap{
         margin-top: 5px;
        }
    }
</style>
@endpush

@section('title')
Manage Get In Touch | Inquiries
@endsection

@section('page_title')
Get In Touch
@endsection

@section('content')

<div class="mb-3">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Get in touch Inquiries</a>
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
            <div class="fw-bold fs-4">Get In Touch Submissions</div>
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
    <table class="table table-custom table-lg mb-0" id="getintouch-table">
        <thead>
            <tr>
                <th>ID#</th>
                <th>Customer</th>
                <th>Interest</th>
                <th>Date/Time</th>
                <th class="text-end">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($getInTouches as $entry)
            <tr>
                <td>{{ $entry->id }}</td>
                <td>
                    <div class="d-flex flex-column gap-1">
                        <span><i style="color: black !important;" class="bi bi-person-fill me-1 text-primary"></i>{{ $entry->first_name }} {{ $entry->last_name }}</span>
                        <span><i style="color: black !important;" class="bi bi-envelope-fill me-1 text-secondary"></i>{{ $entry->email }}</span>
                    </div>
                </td>
                <td>
                    @php
                    $interests = is_string($entry->interest) ? json_decode($entry->interest, true) : $entry->interest;
                    @endphp

                    @if(is_array($interests))
                    @foreach($interests as $interest)
                    <span class="badge badge-color me-1">{{ $interest }}</span>
                    @endforeach
                    @else
                    <span class="badge badge-color">{{ $entry->interest }}</span>
                    @endif
                </td>

                <td>{{ $entry->created_at->format('d M Y, h:i A') }}</td>
                <td class="text-end">
                    <form action="{{ route('admin.manage-getintouch.destroy', $entry->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this contact?')" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">No Inquiries Found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center mt-3">
    {{ $getInTouches->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
</div>

@endsection

@push('js')
<script>
    $(document).ready(function() {
        // Handle sort and pagination dropdowns
        $('#recordsPerPage').on('change', updateUrl);
        $('#sortOrder').on('change', updateUrl);

        function updateUrl() {
            let recordsPerPage = $('#recordsPerPage').val();
            let sortOption = $('#sortOrder').val();
            window.location.href = "{{ route('admin.manage-getintouch.index') }}?page=1&records=" + recordsPerPage + "&sort=" + sortOption;
        }

        // Search across all columns
        $('#searchInput').on('input', function() {
            let searchText = $(this).val().toLowerCase();

            $('#getintouch-table tbody tr').each(function() {
                let rowText = $(this).text().toLowerCase();
                $(this).toggle(rowText.includes(searchText));
            });
        });
    });
</script>
@endpush