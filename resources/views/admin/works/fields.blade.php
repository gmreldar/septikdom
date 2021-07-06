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
<div class="form-group col-sm-12">
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

<!-- Annotation Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('annotation', 'Аннотация:') !!}
    {!! Form::text('annotation', null, ['class' => 'form-control']) !!}
</div>

<!-- Text Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('text', 'Текст:') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control', 'id' => 'text']) !!}
</div>

<!-- Image Field -->
@php ($images = [
['src' => isset($work->image) ? $work->image : null, 'name' => 'image', 'title' => 'Изображение'],
['src' => isset($work->seo_image) ? $work->seo_image : null, 'name' => 'seo_image', 'title' => 'SEO Изображение']
])
@foreach($images as $image)
    <div class="col-sm-4">
        @include('admin.fields.image')
    </div>
@endforeach

        <!-- Title Field -->
<div class="form-group col-sm-4">
    {!! Form::label('alt', 'Alt:') !!}
    {!! Form::text('alt', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('works.index') !!}" class="btn btn-default">Отменить</a>
</div>

@section('scripts')
    <script src="/js/selectImage.js"></script>
    <script>
        CKEDITOR.replace( 'text' );
        @foreach($images as $image)
            $("#{{ $image['name'] }}").change(function () {
                readURL(this);
            });
        @endforeach
    </script>
@endsection