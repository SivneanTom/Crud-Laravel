@extends('layout.app')

@section('content')

<style>
    body {
        background: #f5f1ea;
    }

    .page-title {
        color: #5a3e2b;
        font-weight: 700;
    }

    .btn-brown {
        background: #8b5e3c;
        color: #fff;
        border: none;
    }

    .btn-brown:hover {
        background: #6e472c;
        color: #fff;
    }

    .table-brown {
        border-radius: 10px;
        overflow: hidden;
        background: #fff;
    }

    .table-brown thead {
        background: #6e472c;
        color: #fff;
    }

    .table-brown tbody tr:hover {
        background: #f3e7dc;
        transition: 0.3s;
    }

    .card-shadow {
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        border-radius: 12px;
        background: #fff;
        padding: 20px;
    }

    .img-course {
        object-fit: cover;
        border: 2px solid #8b5e3c;
    }

    .btn-edit {
        background: #c89b6a;
        color: #fff;
        border: none;
        transition: 0.3s;
    }

    .btn-edit:hover {
        background: #a77a4e;
        color: #fff;
        transform: translateY(-2px);
    }

    .btn-delete {
        background: #7a3e2b;
        color: #fff;
        border: none;
        transition: 0.3s;
    }

    .btn-delete:hover {
        background: #5a2c1f;
        color: #fff;
        transform: translateY(-2px);
    }

    .action-btn {
        min-width: 85px;
        border-radius: 8px;
        font-weight: 500;
    }

    .table td,
    .table th {
        vertical-align: middle;
    }
</style>

<div class="container mt-5">

    <div class="card-shadow">

        <div class="w-100 d-flex justify-content-between align-items-center mb-4">

            <h2 class="page-title">📚 Course List</h2>

            <a class="btn btn-brown px-4 py-2 rounded-2 text-decoration-none"
               href="{{ route('courses.create') }}">

                + Add New Course

            </a>

        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">

                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                </button>

            </div>
        @endif

        <div class="table-responsive">

            <table class="table table-bordered table-hover text-center align-middle table-brown">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Course Name</th>
                        <th>Path</th>
                        <th>Price ($)</th>
                        <th width="220">Actions</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($courses as $cs)

                        <tr>

                            <td>{{ $cs->id }}</td>

                            <td>
                                <img src="{{ asset('images/' . $cs->image) }}"
                                     width="60"
                                     height="60"
                                     class="rounded img-course">
                            </td>

                            <td class="fw-semibold text-dark">
                                {{ $cs->course_name }}
                            </td>

                            <td>
                                {{ $cs->path }}
                            </td>

                            <td class="fw-bold text-success">
                                ${{ $cs->price }}
                            </td>

                            <td>

                                <!-- Edit Button -->
                                <a href="{{ route('courses.edit', $cs->id) }}"
                                   class="btn btn-edit btn-sm px-3 py-2 action-btn me-2">

                                    Edit

                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('courses.destroy', $cs->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-delete btn-sm px-3 py-2 action-btn"
                                            onclick="return confirm('Are you sure?')">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-muted py-4">

                                No Courses Found

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection