<table class="table table-responsive" id="products-table">
    <thead>
        <tr>
        <th>Название</th>
        <th>Ссылка</th>
        <th>Песок</th>
        <th>Суглинок</th>
        <th>Глина</th>
        <th>Плывун</th>
        <th>Цена</th>
        <th>Отображение</th>
            <th colspan="3">Действие</th>
        </tr>
    </thead>
    <tbody>
    @foreach($productCategory->adminProducts as $product)
        <tr data-id="{{$product->id}}">
            <td>
                <span class="handle ui-sortable-handle">
                    <i class="fa fa-ellipsis-v"></i>
                    <i class="fa fa-ellipsis-v"></i>
                </span>
                <a href="{!! route('products.edit', [$product->id]) !!}">{!! $product->name !!}</a>
            </td>
            <td>{!! $product->link !!}</td>
            <td>{!! $product->pesok !!}</td>
            <td>{!! $product->suglinok !!}</td>
            <td>{!! $product->glina !!}</td>
            <td>{!! $product->plyvun !!}</td>
            <td>{!! $product->price() !!}</td>
            <td>
                <input data-id="{{ $product->id }}" id="check-{{ $product->id }}" class="checkbox" type="checkbox" @if($product->is_active) checked @endif>
                <label for="check-{{ $product->id }}">
                    <svg>
                        <use xlink:href="/img/svgdefs.svg#icon-check" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                </label>
            </td>
            <td>
                {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('products.edit', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Вы уверены?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@section('scripts')
    <script src="/js/orderable.js"></script>
    <script>
        var model = '{{ isset($product) ? quotemeta(get_class($product)) : '' }}';
        var orderableBlock = 'tbody';
        $('.checkbox').change(function () {
            var value = 0;
            if($(this).is(':checked'))
                value = 1;
            $.ajax({
                url: '/update/value',
                data: {
                    model: model,
                    id: $(this).attr('data-id'),
                    column: 'is_active',
                    value: value
                },
                type: 'post'
            })
        });
    </script>
@endsection
