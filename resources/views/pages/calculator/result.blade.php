<div class="result-items-container">
    <table>
        @foreach($modifications as $modification)
            <tr class="result-item">
                <td class="result-item-name">
                    <a href="{{route('catalog.product', [$modification->product->category->link, $modification->product->link])}}?glubina={{$modification->glubina}}&destination={{$modification->destination}}">{{ $modification->modtitle }}</a>
                </td>
                <td class="result-item-price">
                    @if($modification->discount)
                        <span>{{ number_format($modification->price * ((100 - $modification->discount) / 100), 0, '.', ' ') }} руб.</span> / <strike>{{ number_format($modification->price, 0, '.', ' ') }} руб.</strike>
                    @else
                        <p>{{ number_format($modification->price, 0, '.', ' ') }} руб.</p>
                    @endif
                </td>
                <td class="result-item-button">
                    <a href="{{route('catalog.product', [$modification->product->category->link, $modification->product->link])}}?glubina={{$modification->glubina}}&destination={{$modification->destination}}#install-price">Расчитать монтаж</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>


<script>

    function attachDragger() {
        var attachment = false, lastPosition, position, difference;
        $('.result-items-container').on('mousedown mouseup mousemove', function (e) {
            if (e.type == 'mousedown') attachment = true, lastPosition = [e.clientX, e.clientY];
            if (e.type == 'mouseup') attachment = false;
            if (e.type == 'mousemove' && attachment == true) {
                position = [e.clientX, e.clientY];
                difference = [(position[0] - lastPosition[0]), (position[1] - lastPosition[1])];
                $(this).scrollLeft($(this).scrollLeft() - difference[0]);
                $(this).scrollTop($(this).scrollTop() - difference[1]);
                lastPosition = [e.clientX, e.clientY];
            }
        });
        $(window).on('mouseup', function () {
            attachment = false;
        });
    }

    $(document).ready(function () {
        attachDragger();
    });
</script>