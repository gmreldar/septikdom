<!-- Image Field -->
@php ($image = ['src' => isset($license->image) ? $license->image : null, 'name' => 'image', 'title' => 'Изображение'])
<div class="col-sm-4">
    @include('admin.fields.image')
</div>

<!-- Alt Field -->
<div class="form-group col-sm-8">
    {!! Form::label('alt', 'Alt:') !!}
    {!! Form::text('alt', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('licenses.index') !!}" class="btn btn-default">Отменить</a>
</div>

@section('scripts')
    <script src="{{ asset('/js/selectImage.js') }}"></script>
    <script>
        $("#{{ $image['name'] }}").change(function () {
            readURL(this);
        });
    </script>
@endsection