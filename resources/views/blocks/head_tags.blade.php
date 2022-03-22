<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="yandex-verification" content="361580dba62fd52e" />
<meta name="og:type" content="website">
<meta name="og:url" content="{{ URL::current() }}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="Септикдом">
<meta property="og:locale" content="ru_RU">

<link rel="preload" href="{{ asset('/css/fonts.css') }}" as="style" onload="this.rel='stylesheet'">
<link rel="stylesheet" href="{{ asset('/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('/css/leaflet.css') }}"/>

<script src="{{ asset('/js/leaflet.js') }}"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>

<!-- Begin Talk-Me {literal} -->
<script async type='text/javascript'>
 (function(d, w, m) {
  window.supportAPIMethod = m;
  var s = d.createElement('script');
  s.type ='text/javascript'; s.id = 'supportScript'; s.charset = 'utf-8';
  s.async = true;
  var id = '8d5e1be2e9f3e75fe0fe1031047935ce';
  s.src = '//lcab.talk-me.ru/support/support.js?h='+id;
  var sc = d.getElementsByTagName('script')[0];
  w[m] = w[m] || function() { (w[m].q = w[m].q || []).push(arguments); };
  if (sc) sc.parentNode.insertBefore(s, sc);
  else d.documentElement.firstChild.appendChild(s);
 })(document, window, 'TalkMe');
</script>
@if( empty(Request::path()) || Request::path() === '/')
<link rel="canonical" href="{{ url('/') }}" />
@else
<link rel="canonical" href="{{ url('/') }}/{{ Request::path() }}" />
@endif