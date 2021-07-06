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


<!-- Volume Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gabarit', 'Габариты (Длина х Ширина х Высота):') !!}
    {!! Form::text('gabarit', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('useful_volume', 'Полезный объем:') !!}
    {!! Form::number('useful_volume', null, ['class' => 'form-control', 'min' => '0']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('weight', 'Вес:') !!}
    {!! Form::number('weight', null, ['class' => 'form-control', 'min' => '0']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('entry', 'Размер входа (Длина х Ширина):') !!}
    {!! Form::text('entry', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('equipment', 'Комплектация:') !!}
    {!! Form::text('equipment', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('extended_neck', 'Удлиненная горловина:') !!}
    {!! Form::hidden('extended_neck', isset($modification) ? $modification->extended_neck : 0, ['id' => 'extended_neck']) !!}
    @if (isset($modification))
        @if ($modification->extended_neck == 1)
            <input type="checkbox" id="two" class="checkbox_carousels" checked onchange="checkbox('two', '#extended_neck')">
        @else
            <input type="checkbox" id="two" class="checkbox_carousels" onchange="checkbox('two', '#extended_neck')">
        @endif
    @else
        <input type="checkbox" id="two" class="checkbox_carousels" onchange="checkbox('two', '#extended_neck')">
    @endif
</div>

<div class="form-group col-sm-6">
    {!! Form::label('fasteners', 'Якорение:') !!}
    {!! Form::hidden('fasteners', isset($modification) ? $modification->fasteners : 0, ['id' => 'fasteners']) !!}
    @if (isset($modification))
        @if ($modification->fasteners == 1)
            <input type="checkbox" id="one" class="checkbox_carousels" checked onchange="checkbox('one', '#fasteners')">
        @else
            <input type="checkbox" id="one" class="checkbox_carousels" onchange="checkbox('one', '#fasteners')">
        @endif
    @else
        <input type="checkbox" id="one" class="checkbox_carousels" onchange="checkbox('one', '#fasteners')">
    @endif
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
    <script>
        function checkbox(id, id2) {
            var chbox;
            chbox = document.getElementById(id);
            if (chbox.checked) {
                $(id2).val(1)
            }
            else {
                $(id2).val(0)
            }
        }
    </script>
@endsection
