<li>{{ $question->content }}</li>
@if ($question->questions)
    <ul>
        @foreach ($question->questions as $childQuestion)
            @include('question', ['question' => $childQuestion])
        @endforeach
    </ul>
@endif