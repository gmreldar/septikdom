<table class="table table-responsive" id="comments-table">
    <thead>
        <tr>
        <th>Продукт</th>
        <th>Имя</th>
        <th>Отображение</th>
        <th>Дата</th>
        <th>Действие</th>
        </tr>
    </thead>
    <tbody>
    @foreach($comments as $comment)
        <tr>
            <td>
                @if($comment->product)
                    <a href="{!! route('products.edit', [$comment->product_id]) !!}">{!! $comment->product->name !!}</a>
                @else
                    -
                @endif
            </td>
            <td><a href="{!! route('comments.edit', [$comment->id]) !!}">{!! $comment->name !!}</a></td>
            <td>
                <input data-id="{{ $comment->id }}" id="check-{{ $comment->id }}" class="checkbox" type="checkbox" @if($comment->is_active) checked @endif>
                <label for="check-{{ $comment->id }}">
                    <svg>
                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-check') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                </label>
            </td>
            <td>{!! $comment->created_at->format('d/m/Y H:i') !!}</td>
            <td>
                {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('comments.edit', [$comment->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var model = '{{ isset($comment) ? quotemeta(get_class($comment)) : '' }}';
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