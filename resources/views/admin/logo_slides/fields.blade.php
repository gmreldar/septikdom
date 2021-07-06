<!-- Alt Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alt', 'Alt:') !!}
    {!! Form::text('alt', null, ['class' => 'form-control']) !!}
</div>

<!-- Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url', 'Url:') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
@php ($image = ['src' => isset($logoSlide->image) ? $logoSlide->image : null, 'name' => 'image', 'title' => 'Изображение'])
<div class="col-sm-4">
    @include('admin.fields.image')
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('headSlides.index') !!}" class="btn btn-default">Отменить</a>
</div>

@section('scripts')
    <script src="/js/selectImage.js"></script>
    <script>
        $("#{{ $image['name'] }}").change(function () {
            readURL(this);
        });
    </script>
@endsection