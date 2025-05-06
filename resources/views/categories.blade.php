<link rel="stylesheet" href="{{ asset('assets/css/category.css') }}">

<x-nav>
    <x-slot name="title">Categories Page</x-slot>

    <x-slot name="main">
        <div class="category-page">
            <div class="category-container">
                <div class="heading">
                    @if (session('category'))
                        <div class="success-message">{{ session('category') }}</div>
                    @endif
                    <h2>Category Page</h2>
                </div>

                <form action="{{ url('add-category') }}" method="POST">
                    @csrf
                    <div class="input-wrapper">
                        <label for="category-name">Add Category</label>
                        <div class="error-message">
                            @error('category')
                                {{ $message }}
                            @enderror
                        </div>
                        <input type="text" id="category-name" name="category" placeholder="Enter category name">
                        <button type="submit">Add Category</button>                     
                    </div>
                </form>

                <div class="category-list">
                    <ul class="category-header">
                        <li class="col-id">ID</li>
                        <li class="col-name">Name</li>
                        <li class="col-creater">Creater</li>
                        <li class="col-action">Action</li>
                    </ul>

                    @foreach ($categories as $category)
                        <ul class="category-row">
                            <li class="col-id">{{ $category->id }}</li>
                            <li class="col-name">{{ $category->name }}</li>
                            <li class="col-creater">{{ $category->creater }}</li>
                            <li class="col-action"><a href="category/delete/{{$category->id}}"><i class="fa-solid fa-trash"></i></a> <a href="quiz-list/{{ $category->id }}/{{ $category->name }}"><i class="fa-solid fa-eye"></i></a></li>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </x-slot>
</x-nav>
