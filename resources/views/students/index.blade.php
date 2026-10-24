<!DOCTYPE html>
<html>
<head>
    <title>Student Manager</title>
</head>
<body>
    <h1>Student Manager - SITE</h1>

    <p>Logged in as: {{ auth()->user()->name }}</p>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <a href="{{ route('students.create') }}">Add Student</a>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->course->name }}</td>
                    <td>
                        <a href="{{ route('students.show', $student) }}">
                            View
                        </a>

                        @can('update', $student)
                            <a href="{{ route('students.edit', $student) }}">
                                Edit
                            </a>
                        @endcan

                        @can('delete', $student)
                            <form
                                action="{{ route('students.destroy', $student) }}"
                                method="POST"
                                style="display:inline"
                                onsubmit="return confirm('Delete this student?')"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No students found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>