<table class="table">
    <thead>
        <tr>
            <th>Текст ответа</th>
            <th>Ваш ответ</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($answers as $answer)
            <tr>
                <td>{{ $answer->answer_text }}</td>
                <td>
                    @if ($answer->id == $userAnswer)
                        @if ($answer->answer_true == 1)
                            <span class="badge rounded-pill badge-light-success me-1">Верный</span>
                        @else
                            <span class="badge rounded-pill badge-light-danger me-1">Неверный</span>
                        @endif
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
