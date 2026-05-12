@extends('layout.app')

@section('content')

<style>
    .page-wrapper {
        background: #f5f1ea;
        padding: 30px 0;
    }

    .card-modern {
        border: none;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    .card-header-modern {
        background: linear-gradient(135deg, #7c5732, #5a3e2b);
        padding: 18px;
    }

    .card-header-modern h4 {
        margin: 0;
        font-weight: 700;
        letter-spacing: 0.5px;
    }

    .form-label {
        font-weight: 600;
        color: #5a3e2b;
    }

    .form-control {
        border-radius: 10px;
        padding: 10px 12px;
        border: 1px solid #d6c2ad;
        transition: 0.3s;
    }

    .form-control:focus {
        border-color: #7c5732;
        box-shadow: 0 0 0 0.15rem rgba(124, 87, 50, 0.2);
    }

    .btn-brown {
        background: #7c5732;
        color: white;
        border-radius: 10px;
        padding: 10px 18px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-brown:hover {
        background: #5a3e2b;
        transform: translateY(-2px);
        color: #fff;
    }

    .btn-light-custom {
        border-radius: 10px;
        padding: 10px 18px;
        font-weight: 600;
    }

</style>

<div class="page-wrapper">

    <div class="container">

        <div class="card card-modern">

            <!-- Header -->
            <div class="card-header card-header-modern text-white">
                <h4>➕ Create New Course</h4>
            </div>

            <div class="card-body p-4">

                <form action="{{ route('courses.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <!-- Course Name -->
                    <div class="mb-3">
                        <label class="form-label">Course Name</label>

                        <input type="text"
                               name="course_name"
                               class="form-control"
                               value="{{ old('course_name') }}"
                               placeholder="Enter course name"
                               required>

                        @error('course_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Path -->
                    <div class="mb-3">
                        <label class="form-label">Course Path</label>

                        <input type="text"
                               name="path"
                               class="form-control"
                               value="{{ old('path') }}"
                               placeholder="e.g. web-development"
                               required>

                        @error('path')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <label class="form-label">Course Price ($)</label>

                        <input type="number"
                               name="price"
                               class="form-control"
                               step="0.01"
                               value="{{ old('price') }}"
                               placeholder="Enter price"
                               required>

                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Image -->
                    <div class="mb-4">
                        <label class="form-label">Course Image</label>

                        <input type="file"
                               name="image"
                               class="form-control">

                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-between">

                        <a href="{{ route('courses.index') }}"
                           class="btn btn-light btn-light-custom border">

                            ← Back

                        </a>

                        <button type="submit"
                                class="btn btn-brown">

                            Save Course

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection