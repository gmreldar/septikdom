<!-- Text1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('text1', 'Текст №1:') !!}
    {!! Form::text('text1', null, ['class' => 'form-control']) !!}
</div>

<!-- Text2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('text2', 'Текст №2:') !!}
    {!! Form::text('text2', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
@php ($image = ['src' => isset($headSlide->image) ? $headSlide->image : null, 'name' => 'image', 'title' => 'Изображение'])
<div class="col-sm-4">
    @include('admin.fields.image')
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('headSlides.index') !!}" class="btn btn-default">Отменить</a>
</div>

@section('scripts')
    <script src="{{ asset('/js/selectImage.js') }}"></script>
    <script>
        $("#{{ $image['name'] }}").change(function () {
            readURL(this);
        });
    </script>
@endsection