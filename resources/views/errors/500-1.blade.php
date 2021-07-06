@extends('index')

@section('head')

@endsection

@section('content')

<section class="error-page">
    <div class="wrapper">
        <div class="title-box">
            <div class="title-content">
                <h1 class="title">500</h1>
                <span>Ошибка сервера</span>
            </div>
            <span class="subtitle">При обработке запроса произошла ошибка. Пожалуйста, повторите позже операцию</span>
        </div>
        <div class="wrap">
            <a href="/" class="button button-transparent">
                <div class="button-content">
                    <span>Вернуться на главную</span>
                    <div class="button-svg">
                        <svg class="button-svg-default">
                            <use xlink:href="img/svgdefs.svg#icon-arrow" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                        </svg>
                        <svg class="button-svg-hover">
                            <use xlink:href="img/svgdefs.svg#icon-arrow-two"
                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                        </svg>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>

@endsection

@section('script')
    <script>
        // $(document).ready(function () {
        //     $('#menu_7').addClass('active');
				// });
				document.body.style.overflow = 'visible';
    </script>
@endsection