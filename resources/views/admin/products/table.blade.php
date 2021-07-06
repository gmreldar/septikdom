<table class="table table-responsive" id="products-table">
    <thead>
        <tr>
            <th>Product Category Id</th>
        <th>id</th>
        <th>Name</th>
        <th>Link</th>
        <th>Песок</th>
        <th>Suglinok</th>
        <th>Glina</th>
        <th>Plyvun</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr data-id="{{$product->id}}">
            <td>{!! $product->id !!}</td>
            <td>{!! $product->product_category_id !!}</td>
            <td>{!! $product->name !!}</td>
            <td>{!! $product->link !!}</td>
            <td>{!! $product->pesok !!}</td>
            <td>{!! $product->suglinok !!}</td>
            <td>{!! $product->glina !!}</td>
            <td>{!! $product->plyvun !!}</td>
            <td>
                {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('products.show', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('products.edit', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@section('scripts')
    <script>
        $('tbody').sortable({
            stop: function( event, ui ) {
                ui.item.css({ color: "red" });
                alert(ui.item.prev().attr('data-id'));
            }
        });
    </script>
@endsection
