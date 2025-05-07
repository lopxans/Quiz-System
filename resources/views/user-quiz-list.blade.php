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
                            <th>Quiz Id</th>
                            <th>Name</th>
                            <th>Number of MCQs</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="td-theme">
                        @foreach ($quizData as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->mcq_count }}</td>
                                <td>
                                    <a href="/start-quiz/{{ $item->id }}/{{ $item->name }}">Attempt Quiz</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-slot>
</x-user-nav>
