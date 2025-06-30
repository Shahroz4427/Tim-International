@extends('admin.layout')

@section('title')
Manage Gallery | Edit
@endsection

@section('page_title')
Edit Gallery
@endsection

@push('css')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" rel="stylesheet" />
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

@section('content')

<div class="mb-4">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="bi bi-image-fill small me-2"></i> Manage Gallery</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
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


<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.manage-gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" id="galleryForm">
            @csrf
            @method('PUT')

            <!-- Long Description -->
            <div class="mb-3">
                <label class="form-label">Top Description</label>
                <div id="editorLong" style="height: 200px;">{!! old('long_description', $gallery->long_description) !!}</div>
                <textarea name="long_description" id="long_description" hidden>{!! old('long_description', $gallery->long_description) !!}</textarea>
            </div>

            <!-- Short Description -->
            <div class="mb-3">
                <label class="form-label">Bottom Description</label>
                <div id="editorShort" style="height: 200px;">{!! old('short_description', $gallery->short_description) !!}</div>
                <textarea name="short_description" id="short_description" hidden>{!! old('short_description', $gallery->short_description) !!}</textarea>
            </div>

            <!-- Dropzone -->
            <div class="mb-3">
                <label class="form-label">Upload Images</label>
                <div class="dropzone" id="galleryDropzone"></div>
                <div id="uploadedImagesContainer"></div>
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ route('admin.manage-gallery.edit',1) }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary" id="updateGalleryButton">Update Gallery</button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.min.js"></script>
<script>
    Dropzone.autoDiscover = false;

    const updateButton = document.querySelector('.btn.btn-primary');
    updateButton.disabled = false; // ensure enabled initially

    const existingImages = @json(json_decode($gallery->images ?? '[]'));

    const dz = new Dropzone("#galleryDropzone", {
        url: "{{ route('admin.manage-gallery.upload-image') }}",
        paramName: "file",
        maxFiles: 20,
        maxFilesize: 5,
        acceptedFiles: "image/*",
        addRemoveLinks: true,
        dictDefaultMessage: "Drag & drop gallery images here or click to upload",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },

        init: function() {
            existingImages.forEach(function(path) {
                const mockFile = {
                    name: path.split('/').pop(),
                    size: 123456,
                    accepted: true,
                    uploadedPath: path
                };

                this.emit("addedfile", mockFile);
                this.emit("thumbnail", mockFile, "{{ asset('storage') }}/" + path.replaceAll('\\', '/'));
                this.emit("complete", mockFile);
                this.files.push(mockFile);

                const input = document.createElement("input");
                input.type = "hidden";
                input.name = "images[]";
                input.value = path;
                mockFile._input = input;
                document.getElementById("uploadedImagesContainer").appendChild(input);
            }.bind(this));

            // Disable button when processing starts
            this.on("processing", function() {
                updateButton.disabled = true;
            });

            // Enable button again when all uploads are done
            this.on("queuecomplete", function() {
                updateButton.disabled = false;
            });
        },

        success: function(file, response) {
            if (response.filepath) {
                const input = document.createElement("input");
                input.type = "hidden";
                input.name = "images[]";
                input.value = response.filepath;
                file.uploadedPath = response.filepath;
                file._input = input;
                document.getElementById("uploadedImagesContainer").appendChild(input);
            }
        },

        removedfile: function(file) {
            if (file._input) {
                file._input.remove();
            }

            if (file.uploadedPath) {
                fetch("{{ route('admin.manage-gallery.delete-image') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        filePath: file.uploadedPath
                    })
                });
            }

            if (file.previewElement) {
                file.previewElement.remove();
            }
        }
    });
</script>


<!-- Trumbowyg JS -->

<script>
document.addEventListener('DOMContentLoaded', function () {
    const longQuill = new Quill('#editorLong', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, false] }],
                ['bold', 'italic', 'underline'],
                ['blockquote', 'code-block'],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                ['link'],
                ['clean']
            ]
        }
    });

    const shortQuill = new Quill('#editorShort', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, false] }],
                ['bold', 'italic', 'underline'],
                ['blockquote', 'code-block'],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                ['link'],
                ['clean']
            ]
        }
    });

    const longTextarea = document.getElementById('long_description');
    const shortTextarea = document.getElementById('short_description');

    // Set initial value (redundant but safe)
    longTextarea.value = longQuill.root.innerHTML;
    shortTextarea.value = shortQuill.root.innerHTML;

    // Sync on change
    longQuill.on('text-change', function () {
        longTextarea.value = longQuill.root.innerHTML;
    });

    shortQuill.on('text-change', function () {
        shortTextarea.value = shortQuill.root.innerHTML;
    });
});
</script>


@endpush