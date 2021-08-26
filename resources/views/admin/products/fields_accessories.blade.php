<!-- Product Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_category_id', 'Категория:') !!}
    {!! Form::select('product_category_id', \App\Models\ProductCategory::getAll(), isset($product->product_category_id) ? $product->product_category_id : $product_category_id, ['class' => 'form-control fine_select']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Название:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Link Field -->
<div class="form-group col-sm-6">
    {!! Form::label('link', 'Ссылка:') !!}
    {!! Form::text('link', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Keywords Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keywords', 'Keywords:') !!}
    {!! Form::textarea('keywords', null, ['class' => 'form-control']) !!}
</div>

<!-- Text Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('text', 'Описание продукта:') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control ckeditor', 'id' => 'text']) !!}
</div>

<!-- Is Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_active', 'Отображение:') !!}
    {!! Form::checkbox('is_active', 1, isset($product->is_active) ? $product->is_active : false) !!}
    <label for="is_active">
        <svg>
            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-check') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
        </svg>
    </label>
</div>

<!-- Seo image Fields -->
@php ($image = ['src' => isset($product->image) ? $product->image : null, 'name' => 'image', 'title' => 'SEO Изображение'])
@include('admin.fields.image')

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
    <a href="{!! isset($product->product_category_id) ? route('productCategories.edit', $product->product_category_id) : route('productCategories.show', \App\Models\ProductCategory::SEPTICS_ID) !!}" class="btn btn-default">Отменить</a>
</div>

@section('scripts')
    <script src="{{ asset('/js/selectImage.js') }}"></script>
    <script>
        var model = '{{ quotemeta('\App\Models\ProductImage') }}';
        var orderableBlock = 'tbody';
        CKEDITOR.replace( 'text' );
        $('.fine_select').select2({ width: '100%' });
        $.fn.select2.defaults.set("theme", "classic");
        $("#images").change(function () {
            readURL(this);
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(orderableBlock).sortable({
            handle: '.handle',
            placeholder: 'sort-highlight',
            zIndex: 999999,
            stop: function (event, ui) {
                $.ajax({
                    url: '/update/order',
                    data: {
                        model: model,
                        id: ui.item.attr('data-id'),
                        newOrder: $('.images tr').index(ui.item)
                    },
                    type: 'post'
                })
            }
        });
        $("#{{ $image['name'] }}").change(function () {
            readURL(this);
        });
    </script>
@endsection
