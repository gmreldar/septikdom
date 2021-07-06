<table class="table table-responsive" id="feedback-table">
    <thead>
        <tr>
            <th>Имя</th>
            <th>Телефон</th>
            <th>Статус</th>
            <th>Дата</th>
            <th>IP</th>
            <th>User-Agent</th>
            <th colspan="3">Действие</th>
        </tr>
    </thead>
    <tbody>
    @foreach($feedback as $feedback)
        <tr>
            <td><a href="{!! route('afeedback.edit', [$feedback->id]) !!}">{!! $feedback->name !!}</a></td>
            <td><a href="{!! route('afeedback.edit', [$feedback->id]) !!}">{!! $feedback->phone !!}</a></td>
            <td style="width: 200px;">
                {!! Form::select('status', \App\Models\Feedback::STATUS, isset($feedback->status) ? $feedback->status : 0, ['class' => 'select form-control', 'data-id' => $feedback->id]) !!}
            </td>
            <td>{!! $feedback->created_at->format('d/m/Y H:i') !!}</td>
            <td>{!! $feedback->user_ip !!}</td>
            <td>{!! $feedback->user_agent !!}</td>
            <td>
                {!! Form::open(['route' => ['afeedback.destroy', $feedback->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('afeedback.edit', [$feedback->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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

        var model = '{{ isset($feedback) ? quotemeta(get_class($feedback)) : '' }}';
        $('.select').change(function () {
            $.ajax({
                url: '/update/value',
                data: {
                    model: model,
                    id: $(this).attr('data-id'),
                    column: 'status',
                    value: this.value
                },
                type: 'post'
            })
        });
    </script>
@endsection
