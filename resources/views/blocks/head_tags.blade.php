<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta name="yandex-verification" content="361580dba62fd52e" />
<meta name="og:type" content="website">
<meta name="og:url" content="https://septikdom.com/">
<link rel="preload" href="/css/fonts.css" as="style" onload="this.rel='stylesheet'">
<link rel="stylesheet" href="/css/main.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
      integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
      crossorigin=""/>
!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
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
<!-- {/literal} End Talk-Me -->
{{--<!-- Marquiz script start -->--}}
{{--<script src="https://script.marquiz.ru/v1.js" type="application/javascript"></script>--}}
{{--<script>--}}
{{-- document.addEventListener("DOMContentLoaded", function() {--}}
{{--  Marquiz.init({--}}
{{--   id: '5e6745b750f9440044fc767b',--}}
{{--   autoOpen: false,--}}
{{--   autoOpenFreq: 'once',--}}
{{--   openOnExit: false--}}
{{--  });--}}
{{-- });--}}
{{--</script>--}}
{{--<!-- Marquiz script end -->--}}
@if( empty(Request::path()) || Request::path() === '/')
    <link rel="canonical" href="{{ url('/') }}">
@else
    <link rel="canonical" href="{{ url('/') }}/{{ Request::path() }}">
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