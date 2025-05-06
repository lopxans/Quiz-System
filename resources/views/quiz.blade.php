<link rel="stylesheet" href="{{asset('assets/css/quiz.css')}}">
<x-nav>
    <x-slot name="title">Quiz Page</x-slot>

    <x-slot name="main">
        <div class="quiz-page">
            <h2 class="page-title">Quizzes Page</h2>

            <div class="form-section">
                @if (!session('QuizDetails'))
                    {{-- Add Quiz Form --}}
                    <form action="quiz" method="GET" class="quiz-form">
                        @csrf
                        <div class="form-group">
                            <label for="quiz-name" class="form-label">Quiz Name:</label>
                            <input type="text" id="quiz-name" name="quiz" class="form-control" placeholder="Enter Quiz Name" required>
                        </div>

                        <div class="form-group">
                            <label for="category" class="form-label">Category:</label>
                            <select name="category_id" id="category" class="form-control" required>
                                <option value="">-- Select Category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add Quiz</button>
                        </div>
                    </form>
                @else
                    {{-- Add MCQs Form --}}
                    <h3 class="quiz-name">Quiz:{{session('QuizDetails')->name}}</h3>
                    <div class="quiz-info">
                        <h4 class="section-title">Add MCQs</h4>
                    </div>
                    <div class="show-quiz">
                        <p>
                            Total Quiz: {{$total_mcq}}
                            @if ($total_mcq > 0)
                                <a href="show-quiz/{{session('QuizDetails')->id}}">View Quiz list</a>
                            @endif
                        </p>
                    </div>
                    <form action="add-mcqs" method="POST" class="mcq-form">
                        @csrf
                        <div class="form-group">
                            <label for="question" class="form-label">Question:</label>
                            <div style="color: red;">
                                @error('question')
                                    {{$message}}
                                @enderror
                            </div>
                            <textarea name="question" id="question" class="form-control" placeholder="Enter the question"></textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Options:</label>
                            <div style="color: red;">
                                @error('a')
                                    {{$message}}
                                @enderror
                            </div>
                            <input type="text" name="a" class="form-control" placeholder="Option A">
                            <div style="color: red;">
                                @error('b')
                                    {{$message}}
                                @enderror
                            </div>
                            <input type="text" name="b" class="form-control" placeholder="Option B">
                            <div style="color: red;">
                                @error('c')
                                    {{$message}}
                                @enderror
                            </div>
                            <input type="text" name="c" class="form-control" placeholder="Option C">
                            <div style="color: red;">
                                @error('d')
                                    {{$message}}
                                @enderror
                            </div>
                            <input type="text" name="d" class="form-control" placeholder="Option D">
                        </div>

                        <div class="form-group">
                            <label for="right_ans" class="form-label">Correct Answer:</label>
                            <div style="color: red;">
                                @error('correct_ans')
                                    {{$message}}
                                @enderror
                            </div>
                            <select name="correct_ans" id="right_ans" class="form-control">
                                <option value="">-- Select correct answer --</option>
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="c">C</option>
                                <option value="d">D</option>
                            </select>
                        </div>

                        <div class="form-actions">
                            <button type="submit" name="action" value="add_more" class="btn btn-secondary">Add More</button>
                            <button type="submit" name="submit" value="submit_all" class="btn btn-success">Add and Submit</button>
                            <a href="end-quiz">leave</a>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </x-slot>
</x-nav>
