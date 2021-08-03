@extends('index')

@section('head')
<title>Карта сайта</title>
<style media="screen">
  h4,
  h4:visited,
  a h4,
  a h4:visited {
    color: black;
  }
</style>
@endsection

@section('content')
<div class="payment-shipping">
  <div class="wrapper">
    {{ Breadcrumbs::render('single.first_page', "Карта сайта", route("sitemap")) }}
    <div class="payment-shipping-title">
      <h1 class="payment-shipping-title-h1">Карта сайта</h1>
    </div>
  </div>
  <div class="payment-shipping-line"></div>
  <div class="wrapper">
    <div class="payment-shipping-title" style="padding: 52px 0;">
	  
	  <table>
	<tr>
	<td style="vertical-align: top;">
      <a href="{!! route('index') !!}">
        <h4>Главная</h4>
      </a><br />
      <a href="{!! route('about') !!}">
        <h4>О нас</h4>
      </a><br />
      <a href="{!! route('services') !!}" style="display: inline-block;">
        <h4>Услуги ({{ count($services) }})</h4>
      </a>
      <h4 style="display: inline-block; cursor: pointer;" onclick="$('.servicess').toggle();">+</h4>
      <br />
      <br />
      <div class="servicess" style="display: none; transition .3s ease all; margin-left: 20px;">
        @foreach ($services as $key => $product)
        <a href="{{ route('services.item', $product->link) }}">
          <h4>{{ $product->name }}</h4>
        </a><br>
        @endforeach
      </div>
     
      <a href="{!! route('blog') !!}" style="display: inline-block;">
        <h4>Блог ({{ $blog->count() }})</h4>
      </a>
      {{-- <h4 style="display: inline-block; cursor: pointer;" onclick="$('.blogg').toggle();">+</h4> --}}
      <br />
      <br />
      <div class="blogg" style="display: none; transition .3s ease all; margin-left: 20px;">
        @foreach ($blog as $key => $product)
        {{-- {{ dd($product) }} --}}
        <a href="{{ route('blog.article', [$product['category']['link'], $product->link]) }}">
          <h4>{{ $product->name }}</h4>
        </a><br>
        @endforeach
      </div>
      {{-- <a href="{!! route('catalog') !!}"><h4>Каталог ({{ $products->count() }})</h4></a><br /> --}}
      <a href="{!! route('price') !!}">
        <h4>Прайс-лист</h4>
      </a><br />
      <a href="{!! route('shipping') !!}">
        <h4>Доставка</h4>
      </a><br />
      <a href="{!! route('shipping') !!}">
        <h4>Оплата</h4>
      </a><br />
      <a href="{!! route('portfolio') !!}">
        <h4>Портфолио</h4>
      </a><br />
      <a href="{!! route('contacts') !!}">
        <h4>Контакты</h4>
      </a><br />
      {{-- <h1 class="payment-shipping-title-h1">Блог</h1>
            @foreach ($blog as $key => $product)
              <a href="{{ route('blog.article', [$product['category']['link'], $product->link]) }}"><h4>{{ $product->name }}</h4></a><br>
      @endforeach --}}
    </div>
	
	
		    </td>
	  <td style="vertical-align: top; padding-left:30%;">
      <a href="{{ route('catalog') }}" style="display: inline-block;">
        <h4>Каталог ({{ $products->count() }})</h4>
      </a>
     
      <br />
      <br />
      <div class="cataloog" style="transition .3s ease all; margin-left: 20px;">
        @foreach ($cats as $key => $cat)
        <a>
          <h4 style="display: inline-block;">{{ $cat->name }}</h4>
        </a>
        <h4 style="display: inline-block; cursor: pointer;" onclick="$('.cat_{{ $cat->id }}').toggle();">+</h4>
        <br>
        <br>
        @foreach ($products as $key => $product)
        @if($product->category->id == $cat->id)
          <div class="cat_{{ $product->category->id }}" style="display: none; transition .3s ease all; margin-left: 40px;">
            <a href="{{ route('catalog.product', [$product['category']['link'], $product->link]) }}">
              <h4>{{ $product->name }}</h4>
            </a><br>
          </div>
          @endif
          @endforeach
          @endforeach
       </div>
	  </td>
	  </tr>
	  </table>

    {{-- <div class="single-item-pay">
                <div class="pay-box">
                    <div class="pay-questions-box">
                        <div class="pay-questions">
                            <div class="pay-question-box">
                                <div class="pay-question">
                                    <h4>Когда ждать доставку?</h4>
                                    <p>Доставка осуществляется в течение 1-3х рабочих дней после оформления заказа, или в более поздние сроки по вашему желанию (приобретенное у нас оборудование может бесплатно храниться на нашем складе до 6-ти месяцев по договору ответственного хранения). Приобретайте выгодно оборудование зимой.</p>
                                </div>

                                <div class="pay-question">
                                    <h4>Возврат или обмен</h4>
                                    <p>Наступил гарантийный случай? Хотите оформить возврат или обмен? Обратитесь за помощью к нашему менеджеру мы незамедлительно все исправим: бесплатно доставим новое оборудование взамен бракованного или вернем вам деньги.</p>
                                </div>
                            </div>
                            <div class="pay-question-box">
                                <div class="pay-question stretch">
                                    <h4>Сколько стоит доставка?</h4>
                                    <p>Доставка товара в пределах 80 км от КАД осуществляется бесплатно в течение 3-х рабочих дней с момента заказа.</p>
                                    <p>Доставка товара дальше 80 км от КАД рассчитывается менеджером после оформления заказа и осуществляется также в сроки не более 3-х рабочих дней с момента звонка менеджера.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
  </div>
</div>
</div>
<style>
  .mm-page {
    position: initial !important;
  }
</style>
@endsection
