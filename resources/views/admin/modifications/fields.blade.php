<!-- Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Продукт:') !!}
    {!! Form::select('product_id', \App\Models\Product::getAll(), isset($product_id) ? $product_id : null, ['class' => 'form-control fine_select']) !!}
</div>

<!-- Modtitle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modtitle', 'Название:') !!}
    {!! Form::text('modtitle', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Цена:') !!}
    {!! Form::number('price', isset($modification) ? $modification->price : 0, ['class' => 'form-control', 'min' => 0]) !!}
</div>

<!-- Discount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('discount', 'Скидка %:') !!}
    {!! Form::number('discount', isset($modification) ? $modification->discount : 0, ['class' => 'form-control', 'min' => 0]) !!}
</div>

<!-- Annotation Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('annotation', 'Краткое описание:') !!}
    {!! Form::textarea('annotation', null, ['class' => 'form-control', 'id' => 'text']) !!}
</div>

<!-- Destination Field -->
<div class="form-group col-sm-6">
    {!! Form::label('destination', 'Отвод:') !!}
    {!! Form::select('destination', \App\Models\Modification::DESTINATION, isset($modification->destination) ? $modification->destination : 0, ['class' => 'form-control select']) !!}
</div>

<!-- Volume Field -->
<div class="form-group col-sm-6">
    {!! Form::label('volume', 'Залповый сброс:') !!}
    {!! Form::number('volume', null, ['class' => 'form-control', 'min' => '0']) !!}
</div>

<!-- Proizvoditelnost Field -->
<div class="form-group col-sm-6">
    {!! Form::label('proizvoditelnost', 'Производительность:') !!}
    {!! Form::number('proizvoditelnost', null, ['class' => 'form-control', 'step' => '0.1', 'min' => '0']) !!}
</div>

<!-- Glubina Field -->
<div class="form-group col-sm-6">
    {!! Form::label('glubina', 'Глубина:') !!}
    {!! Form::number('glubina', null, ['class' => 'form-control', 'min' => '0']) !!}
</div>

<!-- Gabarit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gabarit', 'Размер (пример YхY):') !!}
    {!! Form::text('gabarit', null, ['class' => 'form-control']) !!}
</div>

<!-- Power Field -->
<div class="form-group col-sm-6">
    {!! Form::label('power', 'Мощность:') !!}
    {!! Form::number('power', null, ['class' => 'form-control', 'step' => '0.01', 'min' => '0']) !!}
</div>

<!-- Massa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('massa', 'Масса:') !!}
    {!! Form::number('massa', null, ['class' => 'form-control', 'min' => '0']) !!}
</div>

<!-- Chel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('chel', 'Количество человек:') !!}
    {!! Form::number('chel', null, ['class' => 'form-control', 'min' => '0']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
    @php(isset($modification->product_id) ? $product_id = $modification->product_id : false)
    <a href="{!! isset($product_id) ? route('products.edit', $product_id) : route('productCategories.show', \App\Models\ProductCategory::SEPTICS_ID) !!}" class="btn btn-default">Отменить</a>
</div>

@section('scripts')
    <script>
        $('.fine_select').select2({ width: '100%' });
    </script>
@endsection
