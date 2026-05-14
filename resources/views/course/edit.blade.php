@extends('layout.app')

@section('content')

<div class="container py-4 d-flex justify-content-center">

    <div class="card border-0 shadow-lg rounded-4"
         style="width: 700px; overflow: hidden;">

        <!-- Header -->
        <div class="px-4 py-3 text-white"
             style="background: linear-gradient(135deg, #7c5732, #5e3f22);">

            <h4 class="mb-0 fw-bold">Edit Course</h4>
            <small class="opacity-75">Update your course information</small>

        </div>

        <!-- Body -->
        <div class="card-body p-4">

            {{-- Error Message --}}
            @if ($errors->any())
                <div class="alert alert-danger rounded-3">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('courses.update', $course->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <!-- Row 1 -->
                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold text-secondary">Course Name</label>
                        <input type="text"
                               name="course_name"
                               class="form-control shadow-sm border-0 rounded-3"
                               value="{{ $course->course_name }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold text-secondary">Path</label>
                        <input type="text"
                               name="path"
                               class="form-control shadow-sm border-0 rounded-3"
                               value="{{ $course->path }}">
                    </div>

                </div>

                <!-- Row 2 -->
                <div class="row align-items-center">

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold text-secondary">Price</label>
                        <input type="number"
                               name="price"
                               class="form-control shadow-sm border-0 rounded-3"
                               value="{{ $course->price }}">
                    </div>

                    <!-- Image -->
                    <div class="col-md-6 mb-3 text-center">

                        <label class="form-label fw-semibold text-secondary d-block mb-2">
                            Course Image
                        </label>

                        <input type="file"
                               name="image"
                               id="imageUpload"
                               class="d-none"
                               onchange="previewImage(event)">

                        <label for="imageUpload" style="cursor:pointer;">
                            <img id="preview"
                                 src="{{ asset('images/' . $course->image) }}"
                                 class="rounded-4 shadow-sm border"
                                 style="width: 180px; height: 120px; object-fit: cover;">
                        </label>

                        <small class="text-muted d-block mt-1">
                            Click image to change
                        </small>

                    </div>

                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-between mt-4">

                    <!-- Back -->
                    <a href="{{ route('courses.index') }}"
                       class="btn btn-outline-secondary rounded-pill px-4">

                        ← Back
                    </a>

                    <!-- Update -->
                    <button type="submit"
                            class="btn text-white rounded-pill px-5 shadow-sm"
                            style="background: linear-gradient(135deg, #7c5732, #5e3f22);">

                        Update Course
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<!-- Image Preview -->
<script>
function previewImage(event) {
    const image = document.getElementById('preview');
    image.src = URL.createObjectURL(event.target.files[0]);
}
</script>

@endsection