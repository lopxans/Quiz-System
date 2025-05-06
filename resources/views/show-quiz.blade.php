<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz MCQs</title>
    <link rel="stylesheet" href="{{ asset('assets/css/mcqs.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div class="table-container">
        <h2>Quiz name: {{$quizName}}</h2>
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

</body>
</html>
