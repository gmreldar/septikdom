<div class="title-box">
<div class="title-content">
    <h2 class="header-bigtitle">Наши сертификаты и лицензии</h2>
</div>
</div>
<div class="slider-docs-box">
    <div class="custom-prev-arrow slider3">
        <svg class="default-arrow">
            <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow-two') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
        </svg>
        <svg class="hover-arrow">
            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
        </svg>
    </div>

    <div class="slider-docs">
        @isset($licenses)
        @foreach($licenses as $license)
            <img data-src="{{ asset('/min/' . $license->image ) }}" data-full-img="{{ asset($license->image) }}" alt="{{ $license->alt }}" class="lazy-img">
        @endforeach
        @endisset
    </div>

    <div class="custom-next-arrow slider3">
        <svg class="default-arrow">
            <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow-two') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
        </svg>
        <svg class="hover-arrow">
            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
        </svg>
    </div>
    <div class="custom-dots slider3"></div>
</div>