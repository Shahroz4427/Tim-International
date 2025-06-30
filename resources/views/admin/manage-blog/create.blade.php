@extends('admin.layout')

@push('css')
<!-- Quill CSS -->
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
@endpush

@section('title')
Manage Blog | Add Blog
@endsection

@section('page_title')
Add Blog
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
            <li class="breadcrumb-item"><a href="{{ route('admin.manage-blog.index') }}"><i class="bi bi-globe2 small me-2"></i> Manage Blog</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.manage-blog.index') }}">Blog</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.manage-blog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Title -->
            <div class="mb-3">
                <label for="title" class="form-label">Blog Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            </div>

            <!-- Description Field (Quill) -->
            <div class="mb-3">
                <label class="form-label">Description</label>
                <div id="editor" style="height: 300px;">{!! old('description') !!}</div>
                <textarea name="description" id="description" hidden>{!! old('description') !!}</textarea>
            </div>

            <!-- Blog Image Upload -->
            <div class="mb-3">
                <label for="image" class="form-label">Blog Image</label>

                <!-- Preview Container (initially hidden) -->
                <div
                    id="blog_image_preview_container"
                    class="border rounded-3 shadow-sm p-2 mb-2"
                    style="width: 100%; max-width: 300px; display: none;">
                    <img
                        id="blog_image_preview"
                        src="#"
                        alt="Blog Image Preview"
                        class="img-fluid rounded"
                        style="max-height: 200px; object-fit: contain; width: 100%;">
                </div>

                <!-- File Input -->
                <input
                    class="form-control"
                    type="file"
                    id="image"
                    name="image"
                    accept="image/*"
                    required>
            </div>


            <!-- Buttons -->
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('admin.manage-blog.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Create Blog</button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('js')
<!-- Quill JS -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.min.js"></script>

<script>
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

        // Sync hidden textarea with Quill content
        quill.on('text-change', function() {
            hiddenTextarea.value = quill.root.innerHTML;
        });

        // Set initial value (ensure it's synced)
        hiddenTextarea.value = quill.root.innerHTML;
    });
    document.getElementById('image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('blog_image_preview');
        const container = document.getElementById('blog_image_preview_container');

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                container.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            container.style.display = 'none';
        }
    });
</script>
@endpush