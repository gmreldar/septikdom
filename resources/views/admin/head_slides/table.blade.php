<table class="table table-responsive" id="headSlides-table">
    <thead>
        <tr>
            <th>Текст №1</th>
            <th>Текст №2</th>
            <th colspan="3">Действие</th>
        </tr>
    </thead>
    <tbody>
    @foreach($headSlides as $headSlide)
        <tr data-id="{{$headSlide->id}}">
            <td>
                <span class="handle ui-sortable-handle">
                    <i class="fa fa-ellipsis-v"></i>
                    <i class="fa fa-ellipsis-v"></i>
                </span>
                {!! $headSlide->text1 !!}
            </td>
            <td>{!! $headSlide->text2 !!}</td>
            <td>
                {!! Form::open(['route' => ['headSlides.destroy', $headSlide->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('headSlides.edit', [$headSlide->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
        var model = '{{ isset($headSlide) ? quotemeta(get_class($headSlide)) : '' }}';
        var orderableBlock = 'tbody';
    </script>
    <script src="{{ asset('/js/orderable.js') }}"></script>
@endsection