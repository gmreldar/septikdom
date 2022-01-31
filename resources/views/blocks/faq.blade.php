@isset($questions)
    <section id="card-six">
        <div class="wrapper">
            <div class="title-box">
                <div class="title-content">
                    <h2 class="title">FAQ</h2>
                    <span>Часто задаваемые вопросы</span>
                </div>
                <div class="subtitle">Здесь собраны самые популярные вопросы о септиках для загородного дома</div>
            </div>
            <ol class="questions">
                @foreach($questions as $question)
                    <li class="question">
                        <div class="question-content">
                            <div class="question-title">{{ $question->name }}</div>
                            <div class="question-icon">
                                <svg class="question-arrow-two">
                                    <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow-two') }}"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                                <svg class="question-arrow">
                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                            </div>
                        </div>
                        <div class="answer">{{ $question->text }}</div>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>
@endisset