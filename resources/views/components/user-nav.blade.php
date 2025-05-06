<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/user-nav.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="page-wrapper">
        <header>
            <nav class="navbar">
                <div class="navbar__logo">
                    <a href="/"><img src="{{ asset('assets/img/logo1.png') }}" alt="Quiz App Logo"> Quiz App</a>
                </div>
                <div class="navbar__links">
                    <a href="/" class="navbar__link">Home</a>
                    <a href="#" class="navbar__link">Categories</a>
                    <a href="#" class="navbar__link">Login</a>
                    <a href="#" class="navbar__link">Blog</a>
                    <a href="#" class="navbar__link">Logout</a>
                </div>
            </nav>
        </header>

        <main class="main-content">
            {{$main}}
        </main>

        <footer class="footer">
            <p class="footer__text">&copy; 2025 Quiz App. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>