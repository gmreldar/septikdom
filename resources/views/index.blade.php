<!doctype html>
<html lang="ru">
<head>
    @include('blocks.head_tags')
    @yield('head')
    @include('blocks.json_ld')
</head>
<body>
    @include('blocks.header')
    @include('blocks.popups')
    @yield('content')
    @include('elements.button_up')
    @include('blocks.footer')

    @if(Request::is('/'))
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        @yield('script')

        <script src="{{ asset('/js/common.js') }}"></script>

        <script src="{{ asset('/js/feedback.js') }}"></script>
        <script src="{{ asset('/js/goals.js') }}"></script>
        <script src="{{ asset('/libs/mmenu/jquery.mmenu.js') }}"></script>

        <script>

            $(window).on("load", function () {
                $("#mobile-menu-canvas").mmenu(), $("section").is(".error-page") && ($("#fiveteen").remove(), $("footer").remove()), setTimeout(function () {
                    $("#mobile-menu").hasClass("opened") || $(".fix-buttons").addClass("show")
                }, 2e3), "/" == window.location.pathname && $(".fix-buttons").addClass("fix-buttons-home"), $(".preloader").fadeOut("slow", function () {
                })
            })
            $(function() {
                $("div[id*='vipad']").hide();
            })();


            function toggle(objName) {
                var obj = $(objName),
                    blocks = $("div[id*='vipad']");

                if (obj.css("display") != "none") {
                    obj.animate({ height: 'hide' }, 500);
                } else {
                    var visibleBlocks = $("div[id*='vipad']:visible");

                    if (visibleBlocks.length < 1) {
                        obj.animate({ height: 'show' }, 500);
                    } else {
                        $(visibleBlocks).animate({ height: 'hide' }, 500, function() {
                            obj.animate({ height: 'show' }, 500);
                        });
                    }
                }
            }
        </script>
        <script>
            $(document).ready(function(){

                $('#ckick1').on('click', function(){
                    $('.mm-btn').click();
                });
                $('#ckick1').trigger('click');
            });
        </script>
        <!-- Yandex.Metrika counter -->
        <script defer type="text/javascript" >
            (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
                m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
            (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

            ym(52695148, "init", {
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true,
                webvisor:true
            });
        </script>
        <noscript><div><img class="lazy" data-src="https://mc.yandex.ru/watch/52695148" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
        <script defer src="https://www.googletagmanager.com/gtag/js?id=UA-135757392-1"></script>
        <script defer>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-135757392-1');
        </script>
        <!-- <script async type="text/javascript">!function(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src="https://vk.com/js/api/openapi.js?160",t.onload=function(){VK.Retargeting.Init("VK-RTRG-343087-8eJol"),VK.Retargeting.Hit()},document.head.appendChild(t)}();</script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-343087-8eJol" style="position:fixed; left:-999px;" alt=""/></noscript> -->
        <script src="{{ asset('/js/lazyload.min.js') }}"></script>
        <script src="{{ asset('/js/jquery.lazy.min.js') }}"></script>
        <script src="{{ asset('/js/jquery.lazy.iframe.min.js') }}"></script>
    @else
        <script src="{{ asset('/js/libs.min.js') }}"></script>
        <script src="{{ asset('/js/feedback.js') }}"></script>
        <script src="{{ asset('/js/goals.js') }}"></script>
        <script src="{{ asset('/libs/mmenu/jquery.mmenu.js') }}"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        @yield('script')
        <script>
            $(function() {
                $("div[id*='vipad']").hide();
            })();


            function toggle(objName) {
                var obj = $(objName),
                    blocks = $("div[id*='vipad']");

                if (obj.css("display") != "none") {
                    obj.animate({ height: 'hide' }, 500);
                } else {
                    var visibleBlocks = $("div[id*='vipad']:visible");

                    if (visibleBlocks.length < 1) {
                        obj.animate({ height: 'show' }, 500);
                    } else {
                        $(visibleBlocks).animate({ height: 'hide' }, 500, function() {
                            obj.animate({ height: 'show' }, 500);
                        });
                    }
                }
            }
        </script>
        <script>
            $(document).ready(function(){

                $('#ckick1').on('click', function(){
                    $('.mm-btn').click();
                });
                $('#ckick1').trigger('click');
            });
        </script>
        <!-- Yandex.Metrika counter -->
        <script defer type="text/javascript" >
            (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
                m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
            (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

            ym(52695148, "init", {
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true,
                webvisor:true
            });
        </script>
        <noscript><div><img class="lazy" data-src="https://mc.yandex.ru/watch/52695148" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
        <script defer src="https://www.googletagmanager.com/gtag/js?id=UA-135757392-1"></script>
        <script defer>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-135757392-1');
        </script>
        <!-- <script async type="text/javascript">!function(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src="https://vk.com/js/api/openapi.js?160",t.onload=function(){VK.Retargeting.Init("VK-RTRG-343087-8eJol"),VK.Retargeting.Hit()},document.head.appendChild(t)}();</script><noscript><img src="https://vk.com/rtrg?p=VK-RTRG-343087-8eJol" style="position:fixed; left:-999px;" alt=""/></noscript> -->
        <script src="{{ asset('/js/lazyload.min.js') }}"></script>
        <script src="{{ asset('/js/jquery.lazy.min.js') }}"></script>
        <script src="{{ asset('/js/jquery.lazy.iframe.min.js') }}"></script>
        <!-- Device -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/device.js/0.2.7/device.min.js" integrity="sha256-7/l5ueSGd9WLyoPL4cgw7QRrS9VnoqA9gDCYHGZUvy8=" crossorigin="anonymous"></script>
        <script>
            if(device.mobile()){
                $('.septic-item').click(function(e){
                    e.preventDefault();
                    var link = $(this).find('a').attr('href');
                    location.href = link;
                })
            }
        </script>
    @endif



{{--    <script src=src="{{ asset('/js/jquery.lazy.min.js') }}"></script>--}}
{{--    <script src=src="{{ asset('/js/jquery.lazy.iframe.min.js') }}"></script>--}}
    <!-- Device -->
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/device.js/0.2.7/device.min.js" integrity="sha256-7/l5ueSGd9WLyoPL4cgw7QRrS9VnoqA9gDCYHGZUvy8=" crossorigin="anonymous"></script>--}}
{{--    <script>--}}
{{--      if(device.mobile()){--}}
{{--        $('.septic-item').click(function(e){--}}
{{--          e.preventDefault();--}}
{{--          var link = $(this).find('a').attr('href');--}}
{{--          location.href = link;--}}
{{--        })--}}
{{--      }--}}
{{--    </script>--}}
</body>
</html>
