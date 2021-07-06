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
<section class="contact">
    <div class="wrapper">
        <div class="thankyou-block-home order-thankyou-block" style="max-width: 1000px;">
          <div class="callback-answer">
              <h2>Заказать обратный звонок</h2>
              <p>После обработки запроса, наш менеджер свяжется с Вами</p>
              <div class="form">
                  <div class="input-group">
                      <input type="text" class="name-input" id="name-input-feedback" required>
                      <span class="bar"></span>
                      <label>Имя*</label>
                      <span class="error-field" id="name-error-feedback"></span>
                  </div>
                  <div class="input-group">
                      <input type="tel" class="phone-input" id="phone-input-feedback" required>
                      <span class="bar"></span>
                      <label>Телефон*</label>
                      <span class="error-field" id="phone-error-feedback"></span>
                  </div>
                  <div class="input-group">
                      <textarea name="message" placeholder="Сообщение" class="message-input message-input-feedback" id="textarea-scroll"></textarea>
                      <span class="bar"></span>
                      <span class="error-field" id="message-error-feedback"></span>
                  </div>
                  <button class="button-submit" type="submit" id="button-submit-feedback">Заказать обратный звонок</button>
              </div>
          </div>
        </div>
    </div>
</section>
@endsection
