@extends('admin.layout')

@push('css')
<style>
    p {
        margin-top: 0 !important;
        margin-bottom: 0 !important;
    }
    @media (max-width: 480px) {
      .mobile-vertical-gap{
        margin-top: 5px;
       }
    }
</style>
@endpush

@section('title')
Manage Services | All
@endsection

@section('page_title')
Services
@endsection

@section('content')

<div class="mb-3">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#"><i class="bi bi-globe2 small me-2"></i> Manage Services</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">All Services</li>
        </ol>
    </nav>
</div>

<a href="{{ route('admin.manage-service.create') }}" class="btn btn-primary btn-icon my-2 mb-4">
    <i class="bi bi-plus-circle"></i> Add Service
</a>

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
            setTimeout(() => alertBox.remove(), 500);
        }
    }, 5000); 
</script>
@endif


<div class="card" style="background-color: #efefef !important;">
    <div class="card-body">
        <div class="d-md-flex gap-4 align-items-center justify-content-between">
            <div class="fw-bold fs-4">Services</div>
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
    <table class="table table-custom table-lg mb-0" id="service-table">
        <thead>
            <tr>
                <th>ID#</th>
                <th>IMAGE</th>
                <th>NAME</th>
                <th class="text-end">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @forelse($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>
                    @if($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}"
                        alt="Service"
                        class="img-thumbnail"
                        style="width: 60px; min-width: 60px; object-fit: cover;">
                    @else
                    <img src="https://placehold.co/60x60"
                        alt="placeholder"
                        class="img-thumbnail"
                        style="width: 60px; min-width: 60px; object-fit: cover;">
                    @endif
                </td>
                <td>{{ $service->name }}</td>
                <td class="text-end">
                    <div class="d-flex justify-content-end gap-2 align-items-center">
                        <a href="{{ route('service.detail', $service->id) }}" class="btn btn-sm btn-danger" target="_blank">
                            <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i style="color: white;" class="bi bi-gear-fill"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('admin.manage-service.edit', $service->id) }}">Edit</a></li>
                                <li>
                                    <form action="{{ route('admin.manage-service.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item">Delete</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No services found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>


<div class="d-flex justify-content-center mt-3">
    {{ $services->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
</div>

@endsection

@push('js')

<script>
    $(document).ready(function() {
        // Update pagination and sort
        $('#recordsPerPage').on('change', updateUrl);
        $('#sortOrder').on('change', updateUrl);

        function updateUrl() {
            let recordsPerPage = $('#recordsPerPage').val();
            let sortOption = $('#sortOrder').val();
            window.location.href = "{{ route('admin.manage-service.index') }}?page=1&records=" + recordsPerPage + "&sort=" + sortOption;
        }

        // Search functionality
        $('#searchInput').on('input', function() {
            let searchText = $(this).val().toLowerCase();
            $('#service-table tbody tr').each(function() {
                let name = $(this).find('td:nth-child(3)').text().toLowerCase();
                let description = $(this).find('td:nth-child(4)').text().toLowerCase();
                $(this).toggle(name.includes(searchText) || description.includes(searchText));
            });
        });

    });
</script>
@endpush