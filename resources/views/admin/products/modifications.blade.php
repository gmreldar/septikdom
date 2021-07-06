<table class="table table-responsive" id="modifications-table">
    <thead>
        <tr>
        <th>Название</th>
        <th>Цена</th>
        <th>Скидка</th>
        <th>Отвод</th>
        <th>Производительность</th>
        <th>Глубина</th>
        <th>Размеры</th>
        <th>Мощность</th>
        <th>Масса</th>
            <th colspan="3">Действие</th>
        </tr>
    </thead>
    <tbody>
    @foreach($product->modifications as $modification)
        <tr>
            <td><a href="{!! route('modifications.edit', [$modification->id]) !!}">{!! $modification->modtitle !!}</a></td>
            <td>{!! $modification->price !!}</td>
            <td>{!! $modification->discount !!}</td>
            <td>{!! \App\Models\Modification::DESTINATION[$modification->destination] !!}</td>
            <td>{!! $modification->proizvoditelnost !!}</td>
            <td>{!! $modification->glubina !!}</td>
            <td>{!! $modification->gabarit !!}</td>
            <td>{!! $modification->power !!}</td>
            <td>{!! $modification->massa !!}</td>
            <td>
                {!! Form::open(['route' => ['modifications.destroy', $modification->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('modifications.edit', [$modification->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Вы уверены?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>