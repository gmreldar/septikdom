@extends('index')

@section('head')
    <title>{{ $title ?? $page->title }}</title>
    <meta name="keywords" content="{{ $page->keywords }}">
    <meta name="description" content="География выполненных работ по установке септиков.">
    @if($page->image)
        <meta property="og:image" content="{{ url($page->image) }}"/>
        <link rel="image_src" href="{{ url($page->image) }}"/>
    @else
        {!! $defaultOGImage !!}
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
            {{ Breadcrumbs::render('single.first_page', "Карта", route("about")) }}
        </div>
        @include('blocks.map')
    </section>
@endsection
