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
@include('blocks.licenses_popups')
@include('blocks.video_popup')
    <section class="about">
        <div class="wrapper">
            {{ Breadcrumbs::render('single.first_page', "О нас", route("about")) }}
        </div>
        <div class="wrapper-text">
            <div class="title-box">
                <div class="title-content">
                    <h1 class="title">О нас</h1>
                    <span>Кто мы?</span>
                </div>
                <span class="subtitle">{!! $text1 !!}</span>
            </div>
        </div>
        <div class="about-view" style="background-image: url(/{{ $contact->about_image }});"></div>
        <div class="wrapper-text about-body">
            {!! $text2 !!}
        </div>
    </section>

    @include('blocks.services')

    <section id="five">
        @include('blocks.septicks')
    </section>

    <section id="twelve" class="twelve-about">
        @include('blocks.licenses')
    </section>

    <section id="fourteen" class="fourteen-about">
        @include('blocks.works')
    </section>

    

@endsection
