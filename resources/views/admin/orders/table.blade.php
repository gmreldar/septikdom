<table class="table table-responsive" id="orders-table">
    <thead>
        <tr>
            <th>Продукт</th>
            <th>Имя</th>
            <th>Телефон</th>
            <th>Статус</th>
            <th>IP</th>
            <th>User-Agent</th>
            <th>Дата</th>
            <th colspan="3">Действие</th>
        </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>@if(isset($order->product))
                    <a href="{!! route('products.edit', [$order->product->product->id]) !!}">{!! $order->product->product->name !!}</a> |
                    <a href="{!! route('modifications.edit', [$order->product_id]) !!}">{!! $order->product->modtitle !!}</a>
                @else
                    -
                @endif
            </td>
            <td><a href="{!! route('orders.edit', [$order->id]) !!}">{!! $order->name !!}</a></td>
            <td><a href="{!! route('orders.edit', [$order->id]) !!}">{!! $order->phone !!}</a></td>
            <td style="width: 200px;">
                {!! Form::select('status', \App\Models\Order::STATUS, isset($order->status) ? $order->status : 0, ['class' => 'select form-control', 'data-id' => $order->id]) !!}
            </td>
            <td>{!! $order->user_ip !!}</td>
            <td>{!! $order->user_agent !!}</td>
            <td>{!! $order->created_at->format('d/m/Y H:i') !!}</td>
            <td>
                {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('orders.edit', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var model = '{{ isset($order) ? quotemeta(get_class($order)) : '' }}';
        $('.select').change(function () {
            $.ajax({
                url: '/update/value',
                data: {
                    model: model,
                    id: $(this).attr('data-id'),
                    column: 'status',
                    value: this.value
                },
                type: 'post'
            })
        });
    </script>
@endsection
