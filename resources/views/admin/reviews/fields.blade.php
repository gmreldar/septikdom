<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Имя:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

    {!! Form::label('city', 'Город:') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}

    {!! Form::label('is_active', 'Отображение:') !!}
    {!! Form::checkbox('is_active', 1, isset($review->is_active) ? $review->is_active : false) !!}
    <label for="is_active">
        <svg>
            <use xlink:href="/img/svgdefs.svg#icon-check" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
        </svg>
    </label>
</div>

<!-- Message Field -->
<div class="form-group col-sm-6">
    {!! Form::label('message', 'Отзыв:') !!}
    {!! Form::textarea('message', null, ['class' => 'form-control', 'rows' => '11']) !!}
</div>

<!-- Image Field -->
@php ($image = ['src' => isset($review->file) ? $review->file : null, 'name' => 'file', 'title' => 'Изображение'])
<div class="col-sm-4">
    @include('admin.fields.image')
</div>

<!-- Alt Field -->
<div class="form-group col-sm-6 col-sm-offset-2">
    {!! Form::label('alt', 'Alt:') !!}
    {!! Form::text('alt', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('reviews.index') !!}" class="btn btn-default">Отменить</a>
</div>

@section('scripts')
    <script src="/js/selectImage.js"></script>
    <script>
        $("#{{ $image['name'] }}").change(function () {
            readURL(this);
        });
    </script>
@endsection
