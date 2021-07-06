<table class="table table-responsive" id="logoSlides-table">
    <thead>
        <tr>
            <th>Alt</th>
            <th>Url</th>
            <th colspan="3">Действие</th>
        </tr>
    </thead>
    <tbody>
    @foreach($logoSlides as $logoSlide)
        <tr data-id="{{$logoSlide->id}}">
            <td>
                <span class="handle ui-sortable-handle">
                    <i class="fa fa-ellipsis-v"></i>
                    <i class="fa fa-ellipsis-v"></i>
                </span>
                {!! $logoSlide->alt !!}
            </td>
            <td>{!! $logoSlide->url !!}</td>
            <td>
                {!! Form::open(['route' => ['logoSlides.destroy', $logoSlide->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('logoSlides.edit', [$logoSlide->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
        var model = '{{ isset($logoSlide) ? quotemeta(get_class($logoSlide)) : '' }}';
        var orderableBlock = 'tbody';
    </script>
    <script src="/js/orderable.js"></script>
@endsection