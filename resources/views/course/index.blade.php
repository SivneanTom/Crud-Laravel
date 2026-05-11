<!-- resources/views/course/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f5f1ea] min-h-screen p-10">

    <div class="max-w-6xl mx-auto">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-[#5a3e2b]">
                📚 Course Management
            </h1>

            <a href="{{ route('courses.create') }}"
               class="bg-[#8b5e3c] hover:bg-[#6f472d] text-white px-5 py-2 rounded-xl shadow-md transition">
                + Add Course
            </a>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto bg-white shadow-lg rounded-2xl border border-[#e5d6c5]">

            <table class="w-full text-left">

                <!-- Table Head -->
                <thead class="bg-[#8b5e3c] text-white">
                    <tr>
                        <th class="p-4">ID</th>
                        <th class="p-4">Image</th>
                        <th class="p-4">Course Name</th>
                        <th class="p-4">Path</th>
                        <th class="p-4">Price</th>
                        <th class="p-4">Created</th>
                        <th class="p-4 text-center">Action</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody class="text-gray-700">

                    @foreach($courses as $course)
                    <tr class="border-b hover:bg-[#f3e9df] transition">

                        <td class="p-4 font-semibold">{{ $course->id }}</td>

                        <td class="p-4">
                            <img src="{{ asset('images/'.$course->image) }}"
                                 class="w-14 h-14 object-cover rounded-lg border">
                        </td>

                        <td class="p-4 font-medium text-[#5a3e2b]">
                            {{ $course->course_name }}
                        </td>

                        <td class="p-4">
                            <span class="bg-[#e8d7c3] text-[#5a3e2b] px-3 py-1 rounded-full text-sm">
                                {{ $course->path }}
                            </span>
                        </td>

                        <td class="p-4 font-semibold text-green-700">
                            ${{ $course->price }}
                        </td>

                        <td class="p-4 text-sm text-gray-500">
                            {{ $course->created_at->format('d M Y') }}
                        </td>

                        <!-- Actions -->
                        <td class="p-4 text-center space-x-2">

                            <a href="#"
                               class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg text-sm">
                                Edit
                            </a>

                            <a href="#"
                               class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm">
                                Delete
                            </a>

                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>

</body>
</html>