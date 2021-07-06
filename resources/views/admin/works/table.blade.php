<table class="table table-responsive" id="works-table">
    <thead>
        <tr>
        <th>Название</th>
        <th>Ссылка</th>
        <th colspan="2">Действие</th>
        </tr>
    </thead>
    <tbody>
    @foreach($works as $work)
        <tr data-id="{{$work->id}}">
            <td><span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                <a href="{!! route('works.edit', [$work->id]) !!}">{!! $work->name !!}</a>
            </td>
            <td>{!! $work->link !!}</td>
            <td>
                {!! Form::open(['route' => ['works.destroy', $work->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('works.edit', [$work->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
        var model = '{{ isset($work) ? quotemeta(get_class($work)) : '' }}';
        var orderableBlock = 'tbody';
    </script>
    <script src="/js/orderable.js"></script>
@endsection