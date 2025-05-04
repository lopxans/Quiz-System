<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/admin-login.css') }}">
</head>
<body>
    <div class="login-container">
        <div class="heading">
            <h2>Admin Login</h2>
            <div style="color: red;">
                @error('admin')
                    {{$message}}
                @enderror
            </div>
        </div>
        <form action="admin-login" method="post">
            @csrf
            <div class="input-wrapper">
                <label for="admin-name">Admin Name</label>
                <div style="color: red;">
                    @error('name')
                        {{$message}}
                    @enderror
                </div>
                <input type="text" id="admin-name" name="name" placeholder="Enter name">
            </div>
            <div class="input-wrapper">
                <label for="password">Password</label>
                <div style="color: red;">
                    @error('password')
                        {{$message}}
                    @enderror
                </div>
                <input type="password" id="password" name="password" placeholder="Enter password">
            </div>
            <div class="btn">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>

