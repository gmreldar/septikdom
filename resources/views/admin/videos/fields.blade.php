<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Имя:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Город:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Link Field -->
<div class="form-group col-sm-6">
    {!! Form::label('link', 'Ссылка (адрес должен содержать https://www.youtube.com/embed):') !!}
    {!! Form::text('link', null, ['class' => 'form-control']) !!}
</div>

<!-- Alt Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alt', 'Alt:') !!}
    {!! Form::text('alt', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
@php ($image = ['src' => isset($video->image) ? $video->image : null, 'name' => 'image', 'title' => 'Изображение'])
<div class="col-sm-4">
@include('admin.fields.image')
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('videos.index') !!}" class="btn btn-default">Отменить</a>
</div>

@section('scripts')
    <script src="/js/selectImage.js"></script>
    <script>
        $("#{{ $image['name'] }}").change(function () {
            readURL(this);
        });
    </script>
@endsection
