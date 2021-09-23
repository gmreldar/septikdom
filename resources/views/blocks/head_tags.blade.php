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
!-- Make sure you put this AFTER Leaflet's CSS -->
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
<!-- Facebook Pixel Code -->
<script>
 !function(f,b,e,v,n,t,s)
 {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
         n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
         'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '530383637660972');
 fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=530383637660972&ev=PageView&noscript=1"/></noscript>
<!-- End Facebook Pixel Code -->