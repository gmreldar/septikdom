<table class="table table-responsive" id="licenses-table">
    <thead>
        <tr>
        <th>Alt</th>
        <th>Действие</th>
        </tr>
    </thead>
    <tbody>
    @foreach($licenses as $license)
        <tr data-id="{{ $license->id }}">
            <td><span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                <a href="{!! route('licenses.edit', [$license->id]) !!}">{!! $license->alt !!}</a></td>
            <td>
                {!! Form::open(['route' => ['licenses.destroy', $license->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('licenses.edit', [$license->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
        var model = '{{ isset($license) ? quotemeta(get_class($license)) : '' }}';
        var orderableBlock = 'tbody';
    </script>
    <script src="/js/orderable.js"></script>
@endsection