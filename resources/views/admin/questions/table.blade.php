<table class="table table-responsive" id="questions-table">
    <thead>
        <tr>
            <th>Вопрос</th>
            <th>Ответ</th>
            <th colspan="3">Действие</th>
        </tr>
    </thead>
    <tbody>
    @foreach($questions as $question)
        <tr data-id="{{$question->id}}">
            <td>
                <span class="handle ui-sortable-handle">
                    <i class="fa fa-ellipsis-v"></i>
                    <i class="fa fa-ellipsis-v"></i>
                </span>
                {!! $question->name !!}
            </td>
            <td>{!! $question->text !!}</td>
            <td>
                {!! Form::open(['route' => ['questions.destroy', $question->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('questions.edit', [$question->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Вы уверены?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@section('scripts')
    <script src="{{ asset('/js/orderable.js') }}"></script>
    <script>
        var model = '{{ isset($question) ? quotemeta(get_class($question)) : '' }}';
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