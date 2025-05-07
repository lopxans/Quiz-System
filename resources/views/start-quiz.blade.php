<link rel="stylesheet" href="{{ asset('assets/css/start-quiz.css') }}">
<x-user-nav class="navbar">
    <x-slot name="title">{{$quizName}}</x-slot>
    <x-slot name="main">
        <div class="table-container">
            <h1>{{$quizName}}</h1>
            <h2>This Quiz continer {{$quizCount}} Questions and no limit to attempt this Quiz</h2>
            <h1>Good Luck</h1>

            @if (session('user'))
                <a href="">Start Quiz</a>
            @else
                <a href="/user-signup-quiz">Login/SignUp for Start Quiz</a>
            @endif
        </div>
    </x-slot>
</x-user-nav>

