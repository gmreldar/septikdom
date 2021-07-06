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
  <section id="fourteen">
		<div class="wrapper">
			{{ Breadcrumbs::render('single.first_page', "Портфолио", route("portfolio")) }}
    <div class="title-box">
        <div class="title-content">
            <h1 class="title"><a href="{{route('portfolio')}}">Портфолио</a></h1>
            <span>Примеры наших работ</span>
        </div>
    </div>
    <div class="work-items">
        @isset($works)
        @foreach($works as $work)
					<div class="work-item">
							<a href="{{route('portfolio.item', $work->link)}}">
									<div class="work-img"><img class="lazy" data-src="/min/{{ $work->image }}" alt=""></div>
									<div class="work-footer">
											<div class="work-footer-text">
													<p>{{ $work->name }}</p>
													<span>{{ $work->annotation }}</span>
											</div>
											<div class="icon">
													<svg class="default-svg">
															<use xlink:href="/dist/img/svgdefs.svg#icon-arrow"
																		xmlns:xlink="http://www.w3.org/1999/xlink"></use>
													</svg>
													<svg class="hover-svg">
															<use xlink:href="/dist/img/svgdefs.svg#icon-arrow-two"
																		xmlns:xlink="http://www.w3.org/1999/xlink"></use>
													</svg>
											</div>
									</div>
							</a>
					</div>
        @endforeach
        @endisset
    </div>
		<div class="pagination">
				{{ $works->links() }}
		</div>
	</div>
	</section>
	
	<style>
		#fourteen { margin-top: 104px;}
		#fourteen .title-box .title a { pointer-events: none;}
		@media (max-width: 1129px) {
			#fourteen { margin-top: 52px;}
		}
	</style>
@endsection

@section('script')
    <script>
        //$(document).ready(function () {
        //     $('#menu_7').addClass('active');
				// });
    </script>
@endsection