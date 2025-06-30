@extends('admin.layout')

@section('title')
Manage Inventory | Cars
@endsection

@section('page_title')
Add Car
@endsection

@section('content')

@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
<style>
    .dropzone {
        border: 2px dashed #6c757d;
        border-radius: 6px;
        padding: 20px;
        background: #f8f9fa;
    }

    .dropzone .dz-preview {
        width: 120px;
        height: 120px;
        margin: 8px;
    }

    .dropzone .dz-preview .dz-image {
        width: 100%;
        height: 100%;
        overflow: hidden;
        border-radius: 4px;
    }

    .dropzone .dz-preview .dz-image img {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    .dropzone .dz-preview .dz-remove {
        display: block;
        text-align: center;
        margin-top: 4px;
        font-size: 12px;
        color: #d9534f;
        text-decoration: none;
        cursor: pointer;
    }
</style>
@endpush


<div class="mb-4">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.manage-inventory.index') }}"><i class="bi bi-globe2 small me-2"></i> Manage Inventory</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.manage-inventory.index') }}">Cars</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
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
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.manage-inventory.store') }}" method="POST" enctype="multipart/form-data" id="inventoryForm">
            @csrf

            <!-- Title -->
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required value="{{ old('title') }}">
            </div>


            <div class="mb-3">
                <label class="form-label">Description</label>
                <div id="editor" style="height: 300px;">{!! old('description') !!}</div>
                <textarea name="description" id="description" hidden>{!! old('description') !!}</textarea>
            </div>

            <!-- Main Image Upload -->
            <div class="mb-3">
                <label for="main_image" class="form-label">Main Image</label>

                <!-- Preview Container (Initially Hidden) -->
                <div
                    id="preview_container"
                    class="border rounded-3 shadow-sm p-2 mb-2"
                    style="width: 100%; max-width: 300px; display: none;">
                    <img
                        id="main_image_preview"
                        src="#"
                        alt="Image Preview"
                        class="img-fluid rounded"
                        style="max-height: 200px; object-fit: contain; width: 100%;">
                </div>

                <!-- File Input -->
                <input
                    class="form-control"
                    type="file"
                    id="main_image"
                    name="main_image"
                    accept="image/*">
            </div>

            <!-- Dropzone for Images -->
            <div class="mb-3">
                <label class="form-label">Extra Images</label>
                <div class="dropzone" id="imageDropzone"></div>
            </div>

            <!-- Hidden input container for image paths -->
            <div id="uploadedImagesContainer"></div>

            <!-- Buttons -->
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary" id="inventorySubmitBtn">Create</button>
            </div>
        </form>
    </div>
</div>

@push('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.min.js"></script>
<script>
    Dropzone.autoDiscover = false;

    const submitBtn = document.getElementById("inventorySubmitBtn");
    submitBtn.disabled = false;

    const imageDropzone = new Dropzone("#imageDropzone", {
        url: "{{ route('admin.manage-inventory.upload-image') }}",
        paramName: "file",
        maxFilesize: 5, // MB
        maxFiles: 10,
        acceptedFiles: "image/*",
        addRemoveLinks: true,
        dictDefaultMessage: "Drag & drop images here or click to upload",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },

        init: function() {
            const dz = this;

            // Disable button on any new upload
            dz.on("addedfile", function() {
                submitBtn.disabled = true;
            });

            // Enable when all uploads are done
            dz.on("queuecomplete", function() {
                submitBtn.disabled = false;
            });

            // Also ensure it's disabled when processing begins
            dz.on("processing", function() {
                submitBtn.disabled = true;
            });
        },

        success: function(file, response) {
            if (response.filepath) {
                const container = document.getElementById("uploadedImagesContainer");

                const input = document.createElement("input");
                input.type = "hidden";
                input.name = "images[]";
                input.value = response.filepath;
                container.appendChild(input);

                file.uploadedPath = response.filepath;
            }
        },

        removedfile: function(file) {
            if (!file.uploadedPath) return;

            fetch("{{ route('admin.manage-inventory.delete-image') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        filePath: file.uploadedPath
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        const inputs = document.querySelectorAll("#uploadedImagesContainer input");
                        inputs.forEach(input => {
                            if (input.value === file.uploadedPath) input.remove();
                        });

                        if (file.previewElement) file.previewElement.remove();
                    } else {
                        alert("Failed to delete image.");
                    }
                })
                .catch(err => console.error("Delete error:", err));
        }
    });

    document.getElementById('main_image').addEventListener('change', function(event) {
        const preview = document.getElementById('main_image_preview');
        const container = document.getElementById('preview_container');
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

        // Sync hidden textarea with Quill content
        quill.on('text-change', function() {
            hiddenTextarea.value = quill.root.innerHTML;
        });

        // Set initial value (ensure it's synced)
        hiddenTextarea.value = quill.root.innerHTML;
    });
</script>

@endpush


@endsection