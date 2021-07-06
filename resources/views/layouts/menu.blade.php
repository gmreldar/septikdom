<li class="{{ Request::is('orders*') ? 'active' : '' }}">
    <a href="{!! route('orders.index') !!}"><i class="fa fa-shopping-basket"></i><span>Заказы</span>
        @if(\App\Models\Order::newsCount() > 0)
            <span class="pull-right-container">
                <small class="label pull-right bg-green">{{ \App\Models\Order::newsCount() }}</small>
            </span>
        @endif
    </a>
</li>

<li class="{{ Request::is('reviews*') ? 'active' : '' }}">
    <a href="{!! route('reviews.index') !!}"><i class="fa fa-comment-o"></i><span>Отзывы на главной</span>
        @if(\App\Models\Review::newsCount() > 0)
            <span class="pull-right-container">
                <small class="label pull-right bg-green">{{ \App\Models\Review::newsCount() }}</small>
            </span>
        @endif
    </a>
</li>

<li class="{{ Request::is('afeedback*') ? 'active' : '' }}">
    <a href="{!! route('afeedback.index') !!}"><i class="fa fa-comments-o"></i><span>Обратная связь</span>
        @if(\App\Models\Feedback::newsCount() > 0)
            <span class="pull-right-container">
                <small class="label pull-right bg-green">{{ \App\Models\Feedback::newsCount() }}</small>
            </span>
        @endif
    </a>
</li>

<li class="{{ Request::is('comments*') ? 'active' : '' }}">
    <a href="{!! route('comments.index') !!}"><i class="fa fa-edit"></i><span>Комментарии</span>
        @if(\App\Models\Comment::newsCount() > 0)
            <span class="pull-right-container">
                <small class="label pull-right bg-green">{{ \App\Models\Comment::newsCount() }}</small>
            </span>
        @endif
    </a>
</li>

<li class="treeview
    @if(
        Request::is('productCategories*')
        || Request::is('products*')
        || Request::is('modifications*')
    )
        active
    @endif
        ">
    <a href="#">
        <i class="fa fa-shopping-basket"></i>
        <span>Продукты</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu"
        @if(
            Request::is('productCategories*')
            || Request::is('products*')
            || Request::is('modifications*')
        )
            style="display: block;"
        @else
            style="display: none;"
        @endif
    >
        <li class="{{ Request::is('productCategories/1') ? 'active' : '' }}">
            <a href="{!! route('productCategories.show', 1) !!}"><i class="fa {{ Request::is('productCategories/1') ? 'fa-square' : 'fa-square-o' }}"></i><span>Септики</span></a>
        </li>

        <li class="{{ Request::is('productCategories/2') ? 'active' : '' }}">
            <a href="{!! route('productCategories.show', 2) !!}"><i class="fa {{ Request::is('productCategories/2') ? 'fa-square' : 'fa-square-o' }}"></i><span>Комплектующие</span></a>
        </li>

        <li class="{{ Request::is('productCategories/3') ? 'active' : '' }}">
            <a href="{!! route('productCategories.show', 3) !!}"><i class="fa {{ Request::is('productCategories/3') ? 'fa-square' : 'fa-square-o' }}"></i><span>Погребы</span></a>
        </li>

        <li class="{{ Request::is('productCategories/4') ? 'active' : '' }}">
            <a href="{!! route('productCategories.show', 4) !!}"><i class="fa {{ Request::is('productCategories/4') ? 'fa-square' : 'fa-square-o' }}"></i><span>Кессоны</span></a>
        </li>
    </ul>
</li>

{{--<li class="treeview--}}

        {{--">--}}
    {{--<a href="#">--}}
        {{--<i class="fa fa-shopping-basket"></i>--}}
        {{--<span>Характеристики</span>--}}
        {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
        {{--</span>--}}
    {{--</a>--}}
    {{--<ul class="treeview-menu"--}}
    {{-->--}}
        {{--<li class="{{ Request::is('сharacteristicCategories&1') ? 'active' : '' }}">--}}
            {{--<a href="{!! route('сharacteristicCategories.show', 1) !!}"><i class="fa fa-square"></i><span>Монтажная схема</span></a>--}}
        {{--</li>--}}

        {{--<li class="{{ Request::is('сharacteristicCategories/2') ? 'active' : '' }}">--}}
            {{--<a href="{!! route('сharacteristicCategories.show', 2) !!}"><i class="fa fa-square-o"></i><span>Комплектующие</span></a>--}}
        {{--</li>--}}
    {{--</ul>--}}
{{--</li>--}}

<li class="treeview
    @if(
        Request::is('articles*')
        || Request::is('articleCategories*')
    )
        active
    @endif
        ">
    <a href="#">
        <i class="fa fa-files-o"></i>
        <span>Блог</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu"
        @if(
            Request::is('articles*')
            || Request::is('articleCategories*')
        )
        style="display: block;"
        @else
        style="display: none;"
            @endif
    >
        <li class="{{ Request::is('articleCategories*') ? 'active' : '' }}">
            <a href="{!! route('articleCategories.index') !!}"><i class="fa fa-list"></i><span>Категории</span></a>
        </li>
        <li class="{{ Request::is('articles*') ? 'active' : '' }}">
            <a href="{!! route('articles.index') !!}"><i class="fa fa-file-text-o"></i><span>Статьи</span></a>
        </li>
    </ul>
</li>

<li class="treeview
    @if(
        Request::is('documentation*')
    )
        active
    @endif
        ">
    <a href="#">
        <i class="fa fa-shopping-basket"></i>
        <span>Документация</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('documentation/1') ? 'active' : '' }}">
            <a href="{!! route('documentation.show', 1) !!}"><i class="fa {{ Request::is('documentation/1') ? 'fa-square' : 'fa-square-o' }}"></i><span>Монтажная схема</span></a>
        </li>

        <li class="{{ Request::is('documentation/2') ? 'active' : '' }}">
            <a href="{!! route('documentation.show', 2) !!}"><i class="fa {{ Request::is('documentation/2') ? 'fa-square' : 'fa-square-o' }}"></i><span>Инструкция по монтажу</span></a>
        </li>

        <li class="{{ Request::is('documentation/3') ? 'active' : '' }}">
            <a href="{!! route('documentation.show', 3) !!}"><i class="fa {{ Request::is('documentation/3') ? 'fa-square' : 'fa-square-o' }}"></i><span>Инструкция по шеф-монтажу</span></a>
        </li>

        <li class="{{ Request::is('documentation/4') ? 'active' : '' }}">
            <a href="{!! route('documentation.show', 4) !!}"><i class="fa {{ Request::is('documentation/4') ? 'fa-square' : 'fa-square-o' }}"></i><span>Технический паспорт</span></a>
        </li>
    </ul>
</li>

<li class="{{ Request::is('icons*') ? 'active' : '' }}">
    <a href="{!! route('icons.index') !!}"><i class="fa fa-life-ring"></i><span>Иконки</span></a>
</li>

<li class="{{ Request::is('categoriesText*') ? 'active' : '' }}">
    <a href="{!! route('categoriesText.index') !!}"><i class="fa fa-life-ring"></i><span>Описание категорий</span></a>
</li>

<li class="{{ Request::is('services*') ? 'active' : '' }}">
    <a href="{!! route('services.index') !!}"><i class="fa fa-life-ring"></i><span>Услуги</span></a>
</li>

<li class="treeview
    @if(
        Request::is('pages*')
    )
        active
    @endif
        ">
    <a href="#">
        <i class="fa fa-shopping-basket"></i>
        <span>Страницы</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('pages*') && !Request::is('pages/bestsellers*') ? 'active' : '' }}">
            <a href="{!! route('pages.index') !!}"><i class="fa {{ Request::is('pages*') ? 'active' : '' }}"></i><span>Страницы</span></a>
        </li>
        <li class="{{ Request::is('pages/bestsellers*') ? 'active' : '' }}">
            <a href="{!! route('pages.bestsellers') !!}"><i class="fa {{ Request::is('pages*') ? 'active' : '' }}"></i><span>Хиты продаж</span></a>
        </li>
    </ul>
</li>

<li class="{{ Request::is('texts*') ? 'active' : '' }}">
    <a href="{!! route('texts.index') !!}"><i class="fa fa-file-text-o"></i><span>Тексты</span></a>
</li>

<li class="{{ Request::is('works*') ? 'active' : '' }}">
    <a href="{!! route('works.index') !!}"><i class="fa fa-suitcase"></i><span>Работы</span></a>
</li>

<li class="{{ Request::is('admin/map*') ? 'active' : '' }}">
    <a href="{!! route('admin.map') !!}"><i class="fa fa-map"></i><span>Карта выполненных работ</span></a>
</li>

<li class="{{ Request::is('videos*') ? 'active' : '' }}">
    <a href="{!! route('videos.index') !!}"><i class="fa fa-file-video-o"></i><span>Видео отзывы</span></a>
</li>

<li class="{{ Request::is('licenses*') ? 'active' : '' }}">
    <a href="{!! route('licenses.index') !!}"><i class="fa fa-file-image-o"></i><span>Сертификаты</span></a>
</li>

<li class="{{ Request::is('headSlides*') ? 'active' : '' }}">
    <a href="{!! route('headSlides.index') !!}"><i class="fa fa fa-file-o"></i><span>Слайдер №1</span></a>
</li>

<li class="{{ Request::is('logoSlides*') ? 'active' : '' }}">
    <a href="{!! route('logoSlides.index') !!}"><i class="fa fa-file"></i><span>Слайдер №2</span></a>
</li>

<li class="{{ Request::is('questions*') ? 'active' : '' }}">
    <a href="{!! route('questions.index') !!}"><i class="fa fa-question-circle"></i><span>FAQ</span></a>
</li>

<li class="{{ Request::is('contacts*') ? 'active' : '' }}">
    <a href="{!! route('contacts.edit', 1) !!}"><i class="fa fa-cogs"></i><span>Настройки</span></a>
</li>
