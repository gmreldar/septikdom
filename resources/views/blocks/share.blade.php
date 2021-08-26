<div class="share">
        <p>Поделиться:</p>
        <div class="social-links">
            <a class="fb" onclick="Share.facebook()">
                <svg>
                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-facebook') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                </svg>
            </a>
            <a class="vk" onclick="Share.vk()">
                <svg>
                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-vk') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                </svg>
            </a>
        </div>
    </div>
    <script src="{{ asset('/js/share.js') }}"></script>