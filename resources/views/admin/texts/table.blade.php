<table class="table table-responsive" id="texts-table">
    <thead>
        <tr>
            <th>Страница</th>
            <th>Имя</th>
            <th colspan="2">Действие</th>
        </tr>
    </thead>
    <tbody>
    @foreach($texts as $text)
        <tr>
            <td><a href="{!! route('pages.edit', [$text->page_id]) !!}">{!! $text->page->name !!}</a></td>
            <td><a href="{!! route('texts.edit', [$text->id]) !!}">{!! $text->name !!}</a></td>
            <td>
                {!! Form::open(['route' => ['texts.destroy', $text->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('texts.edit', [$text->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {{--{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Вы уверены?')"]) !!}--}}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>