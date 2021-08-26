{!! Form::hidden('type', isset($type) ? $type : null, ['class' => 'form-control']) !!}

<div>
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
    <!-- Short Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('short_name', 'Краткое название:') !!}
        {!! Form::text('short_name', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Title Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div>
    <!-- Keywords Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('keywords', 'Keywords:') !!}
        {!! Form::textarea('keywords', null, ['class' => 'form-control']) !!}
    </div>
    <!-- Description Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Is Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_active', 'Отображение:') !!}
    {!! Form::checkbox('is_active', 1, isset($productCategory->is_active) ? $productCategory->is_active : false) !!}
    <label for="is_active">
        <svg>
            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-check') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
        </svg>
    </label>
</div>

<!-- Text Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('text', 'Описание:') !!}
    {!! Form::textarea('text', null, ['class' => 'ckeditor form-control', 'id' => 'text1']) !!}
</div>

<!-- Annotation Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('annotation', 'Аннотация:') !!}
    {!! Form::textarea('annotation', null, ['class' => 'ckeditor form-control', 'id' => 'text2']) !!}
</div>

<!-- price_list_text Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('price_list_text', 'Текст в прайс листе:') !!}
    {!! Form::textarea('price_list_text', null, ['class' => 'ckeditor form-control', 'id' => 'text3']) !!}
</div>

<!-- Images Fields -->
@php ($images = [
['src' => isset($productCategory->image) ? $productCategory->image : null, 'name' => 'image', 'title' => 'Изображение'],
['src' => isset($productCategory->seo_image) ? $productCategory->seo_image : null, 'name' => 'seo_image', 'title' => 'SEO Изображение']
])
@foreach($images as $image)
    <div class="col-sm-4">
        @include('admin.fields.image')
    </div>
@endforeach

<!-- Alt Field -->
<div class="form-group col-sm-4">
    {!! Form::label('alt', 'Alt:') !!}
    {!! Form::text('alt', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
    <a href="{!! isset($productCategory->type) ? route('productCategories.show', $productCategory->type) : route('productCategories.show', $type) !!}" class="btn btn-default">Отменить</a>
</div>

@section('scripts')
    <script src="{{ asset('/js/selectImage.js') }}"></script>
    <script>
        CKEDITOR.replace('text1');
        CKEDITOR.replace('text2');
        CKEDITOR.replace('text3');
        $('.fine_select').select2({width: '100%'});
        @foreach($images as $image)
            $("#{{ $image['name'] }}").change(function () {
                readURL(this);
            });
        @endforeach
    </script>
@endsection
