<!DOCTYPE html>
<html>
<head>
    <title>Student Manager Login</title>
</head>
<body>
    <h1>Student Manager Login</h1>

    @if ($errors->any())
        <ul style="color:red">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        <br><br>

        <label>Password:</label>
        <input type="password" name="password" required>
        <br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>