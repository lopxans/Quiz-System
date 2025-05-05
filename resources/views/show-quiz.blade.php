
<x-nav>
    <x-slot name="title">Current MCQs</x-slot>

    <x-slot name="main">
        <div class="category-page">
            <div class="category-container">
                <div class="heading">
                <div class="category-list">
                    <ul class="category-header">
                        <li class="col-id">ID</li>
                        <li class="col-name">Name</li>
                        <li class="col-creater">Creater</li>
                        <li class="col-action">Action</li>
                    </ul>

                    {{-- @foreach ($categories as $category)
                        <ul class="category-row">
                            <li class="col-id">{{ $category->id }}</li>
                            <li class="col-name">{{ $category->name }}</li>
                            <li class="col-creater">{{ $category->creater }}</li>
                            <li class="col-action"><a href="category/delete/{{$category->id}}"><i class="fa-solid fa-trash"></i></a></li>
                        </ul> --}}
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
    </x-slot>
</x-nav>

