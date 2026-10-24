<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>
    <h1>Add Student</h1>

    @if ($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name') }}">
        <br><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}">
        <br><br>

        <label>Course:</label>
        <select name="course_id">
            <option value="">Select Course</option>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}"
                    @selected(old('course_id') == $course->id)>
                    {{ $course->name }}
                </option>
            @endforeach
        </select>
        <br><br>

        <button type="submit">Save Student</button>
    </form>

    <a href="{{ route('students.index') }}">Back</a>
</body>
</html>