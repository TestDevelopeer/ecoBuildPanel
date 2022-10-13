<div class="card">
    <div class="card-header">
        <h4 class="card-title text-primary" id="question_counter">Вопрос {{ $currentQuestion + 1 }}/{{ $count }}
        </h4>
    </div>
    <div class="card-body">
        <div class="row mb-1">
            @if ($question->question_type != 'text')
                <div class="mb-2" id="question_attach">
                    @if ($question->question_type == 'image')
                        <img height="400" class="card-img-top" src="/app-assets/images/slider/04.jpg"
                            alt="Card image cap">
                    @elseif ($question->question_type == 'video')
                        <div class="video-player" id="plyr-video-player">
                            <iframe src="https://www.youtube.com/embed/bTqVqk7FSmY" allowfullscreen=""
                                allow="autoplay"></iframe>
                        </div>
                    @endif
                </div>
            @endif
            <blockquote class="blockquote">
                <p id="question_text">{{ $question->question_text }}</p>
                <footer class="blockquote-footer">
                    Выберите ответ
                </footer>
            </blockquote>
        </div>
        <div class="row custom-options-checkable g-1">
            <form id="question_answers">
                @foreach ($question->question_answers as $answer)
                    <div class="col-12 mb-1">
                        <input class="custom-option-item-check answer_check" type="radio" name="answer_id"
                            id="answer_{{ $answer->id }}" value="{{ $answer->id }}">
                        <label class="custom-option-item p-1" for="answer_{{ $answer->id }}">
                            <span class="d-flex justify-content-between flex-wrap mb-50">
                                <span class="fw-bolder">{{ $answer->answer_text }}</span>
                                <span class="fw-bolder"><i class="fa-light fa-block-question"></i></span>
                            </span>
                        </label>
                    </div>
                @endforeach
                <div class="answer_buttons mt-2">
                    <button disabled id="next_question" type="button"
                        class="btn btn-success float-right waves-effect waves-float waves-light">
                        <span>Далее</span>
                        <i class="fa-light fa-arrow-right"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
