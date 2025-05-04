<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/nav.css') }}">
</head>
<body>
    <div class="page-wrapper">
        <header>
            <nav class="navbar">
                <div class="navbar__logo">
                    <a href="dashboard"><img src="{{ asset('assets/img/logo1.png') }}" alt="Quiz App Logo"> Quiz App</a>
                </div>
                <div class="navbar__links">
                    <a href="dashboard" class="navbar__link">Dashboard</a>
                    <a href="categories" class="navbar__link">Categories</a>
                    <a href="quiz" class="navbar__link">Quiz</a>
                    <a href="welcome" class="navbar__link">Welcome</a>
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