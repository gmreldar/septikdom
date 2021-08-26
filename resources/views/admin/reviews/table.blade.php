<table class="table table-responsive" id="reviews-table">
    <thead>
        <tr>
            <th>Имя</th>
            <th>Отображение</th>
            <th>Дата</th>
            <th colspan="3">Действие</th>
        </tr>
    </thead>
    <tbody>
    @foreach($reviews as $review)
        <tr data-id="{{ $review->id }}">
            <td><span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                <a href="{!! route('reviews.edit', [$review->id]) !!}">{!! $review->name !!}</a></td>
            <td>
                <input data-id="{{ $review->id }}" id="check-{{ $review->id }}" class="checkbox" type="checkbox" @if($review->is_active) checked @endif>
                <label for="check-{{ $review->id }}">
                    <svg>
                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-check') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                </label>
            </td>
            <td>{!! $review->created_at->format('d/m/Y H:i') !!}</td>
            <td>
                {!! Form::open(['route' => ['reviews.destroy', $review->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('reviews.edit', [$review->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Вы уверены?')"]) !!}
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

        var model = '{{ isset($review) ? quotemeta(get_class($review)) : '' }}';
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
    <script src="{{ asset('/js/orderable.js') }}"></script>
@endsection