<link rel="stylesheet" href="{{asset('assets/css/welcome.css')}}">
<x-user-nav>
    <x-slot name="title">Categories Page</x-slot>
    <x-slot name="main">
        <div>
            <h1>Check your skill</h1>
            <div class="search-bar">
                <input type="text" placeholder="Search quiz...">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="category-list">
                <ul class="category-header">
                    <li class="col-id">SN.</li>
                    <li class="col-name">Name</li>
                    <li class="col-name">Total Quiz</li>
                    <li class="col-action">Action</li>
                </ul>

                @foreach ($categories as $key=>$category)
                    <ul class="category-row">
                        <li class="col-id">{{ $key +1 }}</li>
                        <li class="col-name">{{ $category->name }}</li>
                        <li class="col-name">{{ $category->quizzes_count }}</li>
                        <li class="col-action">
                            <a href="user-quiz-list/{{ $category->id }}/{{ $category->name }}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </li>
                    </ul>
                @endforeach
            </div>
        </div>
    </x-slot>
</x-user-nav>
