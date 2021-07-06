<table class="table table-responsive" id="modifications-table">
    <thead>
        <tr>
            <th>Product Id</th>
        <th>Price</th>
        <th>Datepublic</th>
        <th>Annotation</th>
        <th>Image</th>
        <th>Sale</th>
        <th>Lastmod</th>
        <th>Volume</th>
        <th>Destination</th>
        <th>Modtitle</th>
        <th>Proizvoditelnost</th>
        <th>Glubina</th>
        <th>Gabarit</th>
        <th>Power</th>
        <th>Massa</th>
        <th>Chel</th>
        <th>Topasid</th>
        <th>Evroid</th>
        <th>Oldprice</th>
        <th>Sort Main</th>
        <th>Ueprice</th>
        <th>Ueid</th>
        <th>Showcalc</th>
        <th>Topassid</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($modifications as $modification)
        <tr>
            <td>{!! $modification->product_id !!}</td>
            <td>{!! $modification->price !!}</td>
            <td>{!! $modification->datePublic !!}</td>
            <td>{!! $modification->annotation !!}</td>
            <td>{!! $modification->image !!}</td>
            <td>{!! $modification->sale !!}</td>
            <td>{!! $modification->lastmod !!}</td>
            <td>{!! $modification->volume !!}</td>
            <td>{!! $modification->destination !!}</td>
            <td>{!! $modification->modtitle !!}</td>
            <td>{!! $modification->proizvoditelnost !!}</td>
            <td>{!! $modification->glubina !!}</td>
            <td>{!! $modification->gabarit !!}</td>
            <td>{!! $modification->power !!}</td>
            <td>{!! $modification->massa !!}</td>
            <td>{!! $modification->chel !!}</td>
            <td>{!! $modification->topasid !!}</td>
            <td>{!! $modification->evroid !!}</td>
            <td>{!! $modification->oldprice !!}</td>
            <td>{!! $modification->sort_main !!}</td>
            <td>{!! $modification->ueprice !!}</td>
            <td>{!! $modification->ueid !!}</td>
            <td>{!! $modification->showcalc !!}</td>
            <td>{!! $modification->topassid !!}</td>
            <td>
                {!! Form::open(['route' => ['modifications.destroy', $modification->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('modifications.show', [$modification->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('modifications.edit', [$modification->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>