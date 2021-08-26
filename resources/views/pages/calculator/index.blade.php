@extends('index')

@section('head')
    <title>{{ $page->title }}</title>
    <meta name="keywords" content="{{ $page->keywords }}">
    <meta name="description" content="{{ $page->description }}">
    @if($page->image)
        <meta property="og:image" content="{{ url($page->image) }}"/>
        <link rel="image_src" href="{{ url($page->image) }}"/>
    @endif
    <meta name="twitter:card" content="summary_large_image">
    <meta name="og:title" content="{{ $page->title }}">
    <meta name="og:description" content="{{ $page->description }}">
@endsection

@section('content')
    <section id="calc-final-popup">
        <div class="calc-final-content">
            <div class="calc-final-close">
                <svg class="default-svg">
                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-cross') }}"
                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                </svg>
            </div>
            <div class="calc-final-icon">
                <svg>
                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-checkbox') }}"
                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                </svg>
            </div>
            <div class="thanks">Спасибо!</div>
            <p>Ваш запрос принят в обработку! Наш менеджер свяжется с Вами в ближайшее время</p>
            <div class="button-ok">Ок</div>
        </div>
    </section>
    <section id="calculator">
        <div class="popup-calculator-error modal-popup">
            <div class="popup-overlay-calculator-error"></div>
            <div class="popup-wrapper">
                <div class="error-block">
                    <svg class="popup-close">
                        <use xlink:href="img/svgdefs.svg#icon-cross" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                    <div class="callback-text">
                        <div class="check-box">
                            <svg>
                                <use xlink:href="img/svgdefs.svg#icon-balloon"
                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                            </svg>
                        </div>
                        <h2>Ничего не найдено</h2>
                        <p>Уточните параметры поиска, либо округлите значения. Если все данные Вы указали верно и Вам
                            нужен точный ответ по подбору станции очистки, свяжитесь с нами по телефону <a
                                    href="tel:+78123857383">+7 (812) 385 73 83</a></p>
                        <button class="button-submit" type="submit">Ок</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper">
            {{ Breadcrumbs::render('single.first_page', "Калькулятор стоимости", route('katalog.calculator')) }}
            <div class="title-box">
                <div class="title-content">
                    <h1 class="title">Калькулятор</h1>
                    <span>Рассчитать стоимость</span>
                </div>
                <span class="subtitle">Подбери себе станцию очистки за 2 минуты</span>
            </div>
            <div class="calculator-box">
                <div class="calc-step calc-step-active calc-step-1">
                    <div class="step-header">1. Информация об источниках водоснабжения в Вашем доме</div>
                    <div class="step-content">
                        <div class="input-block">
                            <div class="input-block-title">Количество жильцов в доме*</div>
                            <div class="input-block-content">
                                <svg class="input-icon">
                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-peoples') }}"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                                <div class="input-group">
                                    <input type="text" class="select-input" id="quantityPeople" data-required="true"
                                           required>
                                    <span class="bar"></span>
                                    <div class="select-field">
                                        <svg class="top-icon top-icon1">
                                        {{-- @todo folder dist and two slashes--}}
                                            <use xlink:href="{{ asset('/dist//img/svgdefs.svg#icon-arrow-two') }}"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                        </svg>
                                        <svg class="bottom-icon bottom-icon1">
                                        {{-- @todo folder dist and two slashes--}}
                                            <use xlink:href="{{ asset('/dist//img/svgdefs.svg#icon-arrow-two') }}"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                        </svg>
                                    </div>
                                    <span class="error-field">Поле обязательно для заполнения</span>
                                </div>
                            </div>
                        </div>

                        <div class="input-block">
                            <div class="input-block-title">Раковина на 15 литров</div>
                            <div class="input-block-content">
                                <svg class="input-icon">
                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-kran') }}"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                                <div class="input-group">
                                    <input type="text" class="select-input salvoDump" id="sink" required>
                                    <span class="bar"></span>
                                    <div class="select-field">
                                        <svg class="top-icon top-icon1">
                                        {{-- @todo folder dist and two slashes--}}
                                            <use xlink:href="{{ asset('/dist//img/svgdefs.svg#icon-arrow-two') }}"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                        </svg>
                                        <svg class="bottom-icon bottom-icon1">
                                        {{-- @todo folder dist and two slashes--}}
                                            <use xlink:href="{{ asset('/dist//img/svgdefs.svg#icon-arrow-two') }}"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                        </svg>
                                    </div>
                                    <span class="error-field">Ошибка</span>
                                </div>
                            </div>
                        </div>

                        <div class="input-block">
                            <div class="input-block-title">Унитаз на 12 литров</div>
                            <div class="input-block-content">
                                <svg class="input-icon">
                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-toilet') }}"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                                <div class="input-group">
                                    <input type="text" class="select-input salvoDump" id="toilet" value="0" required>
                                    <span class="bar"></span>
                                    <div class="select-field">
                                        <svg class="top-icon top-icon1">
                                        {{-- @todo folder dist and two slashes--}}
                                            <use xlink:href="{{ asset('/dist//img/svgdefs.svg#icon-arrow-two') }}"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                        </svg>
                                        <svg class="bottom-icon bottom-icon1">
                                        {{-- @todo folder dist and two slashes--}}
                                            <use xlink:href="{{ asset('/dist//img/svgdefs.svg#icon-arrow-two') }}"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                        </svg>
                                    </div>
                                    <span class="error-field">Ошибка</span>
                                </div>
                            </div>
                        </div>

                        <div class="input-block">
                            <div class="input-block-title">Ванна до 200 литров</div>
                            <div class="input-block-content">
                                <svg class="input-icon">
                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-vann2') }}"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                                <div class="input-group">
                                    <input type="text" class="select-input salvoDump" id="bathSmall" value="0" required>
                                    <span class="bar"></span>
                                    <div class="select-field">
                                        <svg class="top-icon top-icon1">
                                        {{-- @todo folder dist and two slashes--}}
                                            <use xlink:href="{{ asset('/dist//img/svgdefs.svg#icon-arrow-two') }}"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                        </svg>
                                        <svg class="bottom-icon bottom-icon1">
                                        {{-- @todo folder dist and two slashes--}}
                                            <use xlink:href="{{ asset('/dist//img/svgdefs.svg#icon-arrow-two') }}"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                        </svg>
                                    </div>
                                    <span class="error-field">Ошибка</span>
                                </div>
                            </div>
                        </div>

                        <div class="input-block">
                            <div class="input-block-title">Ванна более 200 литров</div>
                            <div class="input-block-content">
                                <svg class="input-icon">
                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-vann') }}"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                                <div class="input-group">
                                    <input type="text" class="select-input salvoDump" id="bathBig" value="0" required>
                                    <span class="bar"></span>
                                    <div class="select-field">
                                        <svg class="top-icon top-icon1">
                                        {{-- @todo folder dist and two slashes--}}
                                            <use xlink:href="{{ asset('/dist//img/svgdefs.svg#icon-arrow-two') }}"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                        </svg>
                                        <svg class="bottom-icon bottom-icon1">
                                        {{-- @todo folder dist and two slashes--}}
                                            <use xlink:href="{{ asset('/dist//img/svgdefs.svg#icon-arrow-two') }}"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                        </svg>
                                    </div>
                                    <span class="error-field">Ошибка</span>
                                </div>
                            </div>
                        </div>

                        <div class="input-block">
                            <div class="input-block-title">Душевая кабина</div>
                            <div class="input-block-content">
                                <svg class="input-icon">
                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-shower') }}"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                                <div class="input-group">
                                    <input type="text" class="select-input salvoDump" id="showerCabin" value="0"
                                           required>
                                    <span class="bar"></span>
                                    <div class="select-field">
                                        <svg class="top-icon top-icon1">
                                        {{-- @todo folder dist and two slashes--}}
                                            <use xlink:href="{{ asset('/dist//img/svgdefs.svg#icon-arrow-two') }}"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                        </svg>
                                        <svg class="bottom-icon bottom-icon1">
                                        {{-- @todo folder dist and two slashes--}}
                                            <use xlink:href="{{ asset('/dist//img/svgdefs.svg#icon-arrow-two') }}"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                        </svg>
                                    </div>
                                    <span class="error-field">Ошибка</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="step-footer">
                        <div class="step-footer-buttons">
                            <div class="button-prev button-disabled">
                                <svg class="default-svg">
                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                                <svg class="hover-svg">
                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                            </div>
                            <div class="button-next button-disabled">
                                <svg class="default-svg">
                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                                <svg class="hover-svg">
                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                            </div>
                            <!--
                            <div class="button-next button-error">
                                <svg class="default-svg">
                                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                                <svg class="hover-svg">
                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                            </div> -->
                        </div>
                        <div class="step-footer-progress">
                            <span class="current-step">1</span>
                            <span>/</span>
                            <span class="all-steps">3</span>
                        </div>
                    </div>
                </div>
                <div class="calc-step calc-step-2">
                    <div class="step-header">2. Основная информация</div>
                    <div class="step-content">
                        <div class="input-block">
                            <div class="input-block-title">Глубина выхода трубы*</div>
                            <div class="input-block-content">
                                <svg class="input-icon">
                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-peoples') }}"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                                <div class="input-group">
                                    <input type="text" class="select-input" id="pipeOutletDepth" data-required="true"
                                           data-prefix="см." required>
                                    <span class="bar"></span>
                                    <div class="select-field" data-step="10">
                                        <svg class="top-icon">
                                        {{-- @todo folder dist and two slashes--}}
                                            <use xlink:href="{{ asset('/dist//img/svgdefs.svg#icon-arrow-two') }}"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                        </svg>
                                        <svg class="bottom-icon">
                                        {{-- @todo folder dist and two slashes--}}
                                            <use xlink:href="{{ asset('/dist//img/svgdefs.svg#icon-arrow-two') }}"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                        </svg>
                                    </div>
                                    <span class="error-field">Поле обязательно для заполнения</span>
                                </div>
                            </div>
                        </div>

                        <div class="input-block">
                            <div class="input-block-title">Расстояние от дома до станции*</div>
                            <div class="input-block-content">
                                <svg class="input-icon">
                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-kran') }}"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                                <div class="input-group">
                                    <input type="text" class="select-input" id="distanceFromHomeToStation"
                                           data-required="true" data-prefix="м." required>
                                    <span class="bar"></span>
                                    <div class="select-field">
                                        <svg class="top-icon">
                                        {{-- @todo folder dist and two slashes--}}
                                            <use xlink:href="{{ asset('/dist//img/svgdefs.svg#icon-arrow-two') }}"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                        </svg>
                                        <svg class="bottom-icon">
                                        {{-- @todo folder dist and two slashes--}}
                                            <use xlink:href="{{ asset('/dist//img/svgdefs.svg#icon-arrow-two') }}"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                        </svg>
                                    </div>
                                    <span class="error-field">Поле обязательно для заполнения</span>
                                </div>
                            </div>
                        </div>

                        <div class="input-block input-block-full-width heightDifference">
                            <div class="input-block-title">Перепад высоты между отметкой у дома и станцией очистки</div>
                            <div class="input-block-content">
                                <svg class="input-icon">
                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-toilet') }}"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                                <div class="input-group">
                                    <input type="text" class="select-input" id="heightDifference" data-prefix="см."
                                           required>
                                    <span class="bar"></span>
                                    <div class="select-field" data-step="10">
                                        <svg class="top-icon top-icon1">
                                        {{-- @todo folder dist and two slashes--}}
                                            <use xlink:href="{{ asset('/dist//img/svgdefs.svg#icon-arrow-two') }}"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                        </svg>
                                        <svg class="bottom-icon bottom-icon1">
                                        {{-- @todo folder dist and two slashes--}}
                                            <use xlink:href="{{ asset('/dist//img/svgdefs.svg#icon-arrow-two') }}"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                        </svg>
                                    </div>
                                    <span class="error-field">Ошибка. Число должно быть кратно 10</span>
                                </div>
                            </div>
                        </div>

                        <div class="input-block input-block-radio input-block-full-width">
                            <div class="input-block-title">Способ отведения очищенной воды</div>
                            <div class="input-block-content">
                                <div class="radio1-input">
                                    <label class="type-button">
                                        <input type="radio" id="gravity" value="0" name="step-2">
                                        <div class="type-button-text">
                                            <div class="circle-outer">
                                                <div class="circle-inner"></div>
                                            </div>
                                            <p>Самотечный</p>
                                        </div>
                                    </label>
                                </div>
                                <div class="radio1-input">
                                    <label class="type-button">
                                        <input type="radio" id="forced" value="1" name="step-2">
                                        <div class="type-button-text">
                                            <div class="circle-outer">
                                                <div class="circle-inner"></div>
                                            </div>
                                            <p>Принудительный</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="step-footer">
                        <div class="step-footer-buttons">
                            <div class="button-prev">
                                <svg class="default-svg">
                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                                <svg class="hover-svg">
                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                            </div>
                            <!--
                            <div class="button-select-station button-select-station-disabled">
                                Подобрать станцию очистки
                            </div> -->
                            <div class="button-select-station button-select-station-disabled">
                                Подобрать станцию
                            </div>
                        </div>
                        <div class="step-footer-progress">
                            <span class="current-step">2</span>
                            <span>/</span>
                            <span class="all-steps">3</span>
                        </div>
                    </div>
                </div>
                <div class="calc-step calc-step-3">
                    <div class="step-header">3. Результат подбора</div>
                    <div class="step-content">
                        <div class="select-item-box" id="result">
                            {{--Results--}}
                        </div>
                        <div class="select-item-connect">
                            <h4>Связаться с нами</h4>
                            <p>Результаты подбора станции очистки приблизительные, чтобы получить более точный ответ,
                                заполните простую форму снизу, и наш менеджер свяжется с Вами в ближайшее время</p>
                            <div class="select-item-inputs">
                                <div class="input-group required">
                                    <input type="text" class="name-input" data-required="true" required
                                           id="name-input-feedback-calculator">
                                    <span class="bar"></span>
                                    <label>Имя</label>
                                    <div class="required-field">*</div>
                                    <span class="error-field" id="name-error-feedback-calculator"></span>
                                </div>
                                <div class="input-group required">
                                    <input type="tel" class="phone-input" data-required="true" required
                                           id="phone-input-feedback-calculator">
                                    <span class="bar"></span>
                                    <label>Телефон</label>
                                    <div class="required-field">*</div>
                                    <span class="error-field" id="phone-error-feedback-calculator"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="step-footer">
                        <div class="step-footer-buttons">
                            <div class="select-item-button-submit" id="button-submit-feedback-calculator">
                                Отправить
                            </div>
                        </div>
                        <div class="step-footer-progress">
                            <span class="current-step">3</span>
                            <span>/</span>
                            <span class="all-steps">3</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        // $(document).ready(function () {
        //     $('#menu_7').addClass('active');
        // });

        // document.body.style.overflow = 'visible';
    </script>
@endsection