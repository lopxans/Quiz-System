<link rel="stylesheet" href="{{ asset('assets/css/mcqs.css') }}">

<x-nav>
    <x-slot name="title">Current MCQs</x-slot>

    <x-slot name="main">
        <div class="table-container">
            <h2>All current Quiz's MCQs</h2>
            <a href="{{ url('quiz') }}">Back</a>
            <div class="table">
                <table>
                    <thead class="th-theme">
                        <tr>
                            <th>MCQ Id</th>
                            <th>Question</th>
                        </tr>
                    </thead>
                    <tbody class="td-theme">
                        @foreach ($mcqs as $mcq)
                            <tr>
                                <td>{{ $mcq->id }}</td>
                                <td>{{ $mcq->question }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-slot>
</x-nav>
