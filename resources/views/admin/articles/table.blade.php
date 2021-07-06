<table class="table table-responsive" id="articles-table">
    <thead>
        <tr>
            <th>Название</th>
            <th>Категория</th>
            <th>Ссылка</th>
            <th colspan="2">Действие</th>
        </tr>
    </thead>
    <tbody>
    @foreach($articles as $article)
        <tr>
            <td><a href="{!! route('articles.edit', [$article->id]) !!}">{!! $article->name !!}</a></td>
            <td>
                @if($article->category)
                    <a href="{!! route('articleCategories.edit', [$article->article_category_id]) !!}">{!! $article->category->name !!}</a>
                @else
                    -
                @endif
            </td>
            <td>{!! $article->link !!}</td>
            <td>
                {!! Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('articles.edit', [$article->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Вы уверены?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>