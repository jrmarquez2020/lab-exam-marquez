<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
</head>
<body>
    <h1>Student Details</h1>

    <p>ID: {{ $student->id }}</p>
    <p>Name: {{ $student->name }}</p>
    <p>Email: {{ $student->email }}</p>
    <p>Course: {{ $student->course->name }}</p>

    @can('update', $student)
        <a href="{{ route('students.edit', $student) }}">Edit</a>
    @endcan

    <a href="{{ route('students.index') }}">Back to Students</a>
</body>
</html>