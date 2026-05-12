<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Course Management System</title>

    <!-- Bootstrap ONLY ONCE -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="w-100 vh-100">

    <!-- Header -->
    <h1 style="background-color:#5a3e2b;"
        class="w-100 py-3 text-center text-white shadow">

        Course Management System

    </h1>

    <div class="container mt-4">

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">

                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                </button>

            </div>
        @endif

        <!-- Page Content -->
        @yield('content')

    </div>

    <!-- Bootstrap JS (IMPORTANT for buttons, alerts) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>