<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>

    @if ($errors->any())
        <ul style="color:red">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('students.update', $student) }}"
          method="POST">
        @csrf
        @method('PUT')

        <label>Name:</label>
        <input type="text" name="name"
               value="{{ old('name', $student->name) }}">
        <br><br>

        <label>Email:</label>
        <input type="email" name="email"
               value="{{ old('email', $student->email) }}">
        <br><br>

        <label>Course:</label>
        <select name="course_id">
            @foreach ($courses as $course)
                <option value="{{ $course->id }}"
                    @selected(old('course_id', $student->course_id) == $course->id)>
                    {{ $course->name }}
                </option>
            @endforeach
        </select>
        <br><br>

        <button type="submit">Update Student</button>
    </form>

    <a href="{{ route('students.index') }}">Back</a>
</body>
</html>