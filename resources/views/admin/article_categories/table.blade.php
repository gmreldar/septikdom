<table class="table table-responsive" id="articleCategories-table">
    <thead>
        <tr>
            <th>Название</th>
            <th>Ссылка</th>
            <th colspan="2">Действие</th>
        </tr>
    </thead>
    <tbody>
    @foreach($articleCategories as $articleCategory)
        <tr data-id="{{$articleCategory->id}}">
            <td><span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                <a href="{!! route('articleCategories.edit', [$articleCategory->id]) !!}">{!! $articleCategory->name !!}</a></td>
            <td>{!! $articleCategory->link !!}</td>
            <td>
                {!! Form::open(['route' => ['articleCategories.destroy', $articleCategory->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('articleCategories.edit', [$articleCategory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
        var model = '{{ isset($articleCategory) ? quotemeta(get_class($articleCategory)) : '' }}';
        var orderableBlock = 'tbody';
    </script>
    <script src="{{ asset('/js/orderable.js') }}"></script>
@endsection