<table class="table table-responsive" id="pages-table">
    <thead>
        <tr>
        <th>Название</th>
        <th>Title</th>
        <th colspan="2">Действие</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pages as $page)
        <tr>
            <td><a href="{!! route('pages.edit', [$page->id]) !!}">{!! $page->name !!}</a></td>
            <td>{!! $page->title !!}</td>
            <td>
                {!! Form::open(['route' => ['pages.destroy', $page->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pages.edit', [$page->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {{--{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>