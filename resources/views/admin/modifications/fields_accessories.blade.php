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
    {!! Form::number('price', null, ['class' => 'form-control', 'min' => '0']) !!}
</div>

<!-- Discount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('discount', 'Скидка %:') !!}
    {!! Form::number('discount', null, ['class' => 'form-control', 'min' => '0']) !!}
</div>

<!-- Annotation Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('annotation', 'Краткое описание:') !!}
    {!! Form::textarea('annotation', null, ['class' => 'form-control', 'id' => 'text']) !!}
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
