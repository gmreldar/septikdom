<table class="table table-responsive" id="productCategories-table">
    <thead>
        <tr>
        <th>Название</th>
        <th>Ссылка</th>
        <th>Отображение</th>
            <th colspan="2">Действие</th>
        </tr>
    </thead>
    <tbody>
    @foreach($productCategories as $productCategory)
        <tr data-id="{{$productCategory->id}}">
            <td><span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                <a href="{!! route('productCategories.edit', [$productCategory->id]) !!}">{!! $productCategory->name !!}</a>
            </td>
            <td>{!! $productCategory->link !!}</td>
            <td>
                <input data-id="{{ $productCategory->id }}" id="check-{{ $productCategory->id }}" class="checkbox" type="checkbox" @if($productCategory->is_active) checked @endif>
                <label for="check-{{ $productCategory->id }}">
                    <svg>
                        <use xlink:href="/img/svgdefs.svg#icon-check" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                </label>
            </td>
            <td>
                {!! Form::open(['route' => ['productCategories.destroy', $productCategory->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('productCategories.edit', [$productCategory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
        var model = '{{ isset($productCategory) ? quotemeta(get_class($productCategory)) : '' }}';
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