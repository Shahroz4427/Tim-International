@extends('admin.layout')

@push('css')
<!-- Quill CSS -->
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
@endpush


@section('title')
Manage Services | Edit Service
@endsection

@section('page_title')
Edit Service
@endsection

@section('content')

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
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="mb-4">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.manage-service.index') }}"><i class="bi bi-globe2 small me-2"></i> Manage Services</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.manage-service.index') }}">Services</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.manage-service.update', $service->id) }}" method="POST" enctype="multipart/form-data" id="serviceForm">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Service Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $service->name) }}" required>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="editor" class="form-label">Description</label>
                <div id="editor" style="height: 300px;">{!! old('description', $service->description ?? '') !!}</div>
                <textarea name="description" id="description" hidden>{!! old('description', $service->description ?? '') !!}</textarea>
            </div>


            <!-- New Image Upload -->
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>

                <!-- Preview Container -->
                <div
                    id="image_preview_container"
                    class="border rounded-3 shadow-sm p-2 mb-2"
                    style="width: 100%; max-width: 300px; {{ $service->image ? '' : 'display: none;' }}">
                    <img
                        id="image_preview"
                        src="{{ $service->image ? asset('storage/' . $service->image) : '#' }}"
                        alt="Current Image"
                        class="img-fluid rounded"
                        style="max-height: 200px; object-fit: contain; width: 100%;">
                </div>

                <!-- File Input -->
                <input
                    type="file"
                    class="form-control"
                    id="image"
                    name="image"
                    accept="image/*">
                <small class="text-muted">Leave empty to keep current image.</small>
            </div>


            <!-- Buttons -->
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('admin.manage-service.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('js')

<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.min.js"></script>
<script>
    document.getElementById('image').addEventListener('change', function(event) {
        const preview = document.getElementById('image_preview');
        const container = document.getElementById('image_preview_container');
        const file = event.target.files[0];

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                container.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            container.style.display = 'none';
        }
    });
    document.addEventListener('DOMContentLoaded', function() {
        const quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'header': [1, 2, false]
                    }],
                    ['bold', 'italic', 'underline'],
                    ['blockquote', 'code-block'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    ['link'],
                    ['clean']
                ]
            }
        });

        const hiddenTextarea = document.getElementById('description');

        // Sync content on change
        quill.on('text-change', function() {
            hiddenTextarea.value = quill.root.innerHTML;
        });

        // Set initial value (already handled via Blade, but kept for safety)
        hiddenTextarea.value = quill.root.innerHTML;
    });
</script>

@endpush