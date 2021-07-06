<!-- Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Продукт:') !!}
    {!! Form::select('product_id', \App\Models\Modification::getAll(), isset($order->product_id) ? $order->product_id : null, ['class' => 'form-control fine_select']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Статус:') !!}
    {!! Form::select('status', \App\Models\Order::STATUS, isset($order->status) ? $order->status : 0, ['class' => 'form-control select']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-5">
    {!! Form::label('name', 'Имя:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-5">
    {!! Form::label('phone', 'Телефон:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Montazh Field -->
<div class="form-group col-sm-1">
    {!! Form::label('montazh', 'Монтаж:') !!}
    {!! Form::checkbox('montazh', 1, isset($order->montazh) ? $order->montazh : false) !!}
    <label for="montazh">
        <svg>
            <use xlink:href="/img/svgdefs.svg#icon-check" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
        </svg>
    </label>
</div>

<!-- Text Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('text', 'Комментарий:') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('orders.index') !!}" class="btn btn-default">Отменить</a>
</div>

@section('scripts')
    <script>
        $('.fine_select').select2({ width: '100%' });
    </script>
@endsection
