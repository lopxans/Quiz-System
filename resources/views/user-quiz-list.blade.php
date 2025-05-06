<link rel="stylesheet" href="{{ asset('assets/css/user-quiz-list.css') }}">
<x-user-nav class="navbar">
    <x-slot name="title">Categories Page</x-slot>
    <x-slot name="main">
        <div class="table-container">
            <h2>Quiz List</h2>
            <div class="table">
                <table>
                    <thead class="th-theme">
                        <tr>
                            <th>MCQ Id</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="td-theme">
                        @foreach ($quizData as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <a href="/show-quiz/{{ $item->id }}/{{ $item->name }}">Attempt Quiz</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-slot>
</x-user-nav>
