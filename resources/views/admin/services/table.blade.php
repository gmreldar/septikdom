<table class="table table-responsive" id="services-table">
    <thead>
        <tr>
            <th>Название</th>
            <th>Ссылка</th>
            <th colspan="2">Действие</th>
        </tr>
    </thead>
    <tbody>
    @foreach($services as $service)
        <tr data-id="{{$service->id}}">
            <td><span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                <a href="{!! route('services.edit', [$service->id]) !!}">{!! $service->name !!}</a></td>
            <td>{!! $service->link !!}</td>
            <td>
                {!! Form::open(['route' => ['services.destroy', $service->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('services.edit', [$service->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
        var model = '{{ isset($service) ? quotemeta(get_class($service)) : '' }}';
        var orderableBlock = 'tbody';
    </script>
    <script src="/js/orderable.js"></script>
@endsection