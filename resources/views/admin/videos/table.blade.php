<table class="table table-responsive" id="videos-table">
    <thead>
        <tr>
        <th>Название</th>
        <th>Ссылка</th>
        <th colspan="3">Действие</th>
        </tr>
    </thead>
    <tbody>
    @foreach($videos as $video)
        <tr data-id="{{ $video->id }}">
            <td><span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                <a href="{!! route('videos.edit', [$video->id]) !!}">{!! $video->name !!}</a></td>
            <td><a href="{!! $video->link !!}" target="_blank">{!! $video->link !!}</a></td>
            <td>
                {!! Form::open(['route' => ['videos.destroy', $video->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('videos.edit', [$video->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
        var model = '{{ isset($video) ? quotemeta(get_class($video)) : '' }}';
        var orderableBlock = 'tbody';
    </script>
    <script src="{{ asset('/js/orderable.js') }}"></script>
@endsection