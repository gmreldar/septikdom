<!-- Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Продукт:') !!}
    {!! Form::select('product_id', \App\Models\Product::getAll(), isset($comment->product_id) ? $comment->product_id : null, ['class' => 'form-control fine_select']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Имя:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Contacts Field -->
<div class="form-group col-sm-12">
    {!! Form::label('contacts', 'Контакты:') !!}
    {!! Form::text('contacts', null, ['class' => 'form-control']) !!}
</div>

<!-- Text Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('text', 'Текст:') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
</div>

<!-- Text Field -->
<div class="form-group col-sm-3">
    {!! Form::label('created_at', 'Дата добавления:') !!}
    {!! Form::date('created_at', isset($comment->created_at) ? $comment->created_at : null, ['class' => 'form-control']) !!}
</div>

<!-- Is Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_active', 'Отображение:') !!}
    {!! Form::checkbox('is_active', 1, isset($comment->is_active) ? $comment->is_active : false) !!}
    <label for="is_active">
        <svg>
            <use xlink:href="/img/svgdefs.svg#icon-check" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
        </svg>
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('comments.index') !!}" class="btn btn-default">Отменить</a>
</div>

@section('scripts')
    <script>
        $('.fine_select').select2({ width: '100%' });
    </script>
@endsection