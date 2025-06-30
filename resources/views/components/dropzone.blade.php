@props([
'id' => 'dropzone',
'uploadUrl'=> '',
'deleteUrl' => '',
'maxFiles' => 10,
'inputName' => 'images[]',
'existingImages' => [],
'dictMessage' => 'Drag & drop or click to upload images',
'recordID'=>''
])

<label class="mb-2">Images</label>
<div id="{{ $id }}" class="dropzone border rounded p-3"></div>
<div id="{{ $id }}-hidden-inputs"></div>

@once
@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@5/dist/min/dropzone.min.css">
@endpush

@push('js')
<script src="https://cdn.jsdelivr.net/npm/dropzone@5/dist/min/dropzone.min.js"></script>
@endpush
@endonce

@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Dropzone.autoDiscover = false;

        const dzElement = document.getElementById("{{ $id }}");
        if (!dzElement) return;

        const dz = new Dropzone("#{{ $id }}", {
            url: "{{ $uploadUrl }}",
            paramName: "file",
            maxFiles: {
                {
                    $maxFiles
                }
            },
            maxFilesize: 5,
            acceptedFiles: "image/*",
            addRemoveLinks: true,
            dictDefaultMessage: "{{ $dictMessage }}",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(file, response) {
                if (response.success) {
                    const input = document.createElement("input");
                    input.type = "hidden";
                    input.name = "{{ $inputName }}";
                    input.value = response.file;
                    input.classList.add("dz-hidden-input");
                    document.getElementById("{{ $id }}-hidden-inputs").appendChild(input);
                    file.uploadedPath = response.file;
                }
            },
            removedfile: function(file) {
                const filePath = file.uploadedPath;
                const recordID = "{{ $recordID ?? '' }}"; 

                file.previewElement.remove();

                if (!filePath) return;

                fetch("{{ $deleteUrl }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            filePath: filePath,
                            record_id: recordID 
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            const hiddenInputs = document.querySelectorAll(`#{{ $id }}-hidden-inputs input[value="${filePath}"]`);
                            hiddenInputs.forEach(input => input.remove());
                        } else {
                            console.error("Image delete failed:", data.message);
                        }
                    });
            }
        });
        @foreach($existingImages as $image)
            let mockFile = {
                name: "{{ basename($image) }}",
                size: 12345,
                uploadedPath: "{{ $image }}"
            };
            dz.emit("addedfile", mockFile);
            dz.emit("thumbnail", mockFile, "{{ asset($image) }}");
            dz.emit("complete", mockFile);

            let input = document.createElement("input");
            input.type = "hidden";
            input.name = "{{ $inputName }}";
            input.value = "{{ $image }}";
            input.classList.add("dz-hidden-input");
            document.getElementById("{{ $id }}-hidden-inputs").appendChild(input);
        @endforeach
    });
    Dropzone.autoDiscover = false;
</script>
@endpush