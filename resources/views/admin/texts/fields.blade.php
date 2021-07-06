<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Имя:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Page Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('page_id', 'Страница:') !!}
    {!! Form::select('page_id', \App\Models\Page::getAll(), isset($page->page_id) ? $page->article_category_id : null, ['class' => 'form-control fine_select']) !!}
</div>

<!-- Text Field -->
<div class="form-group col-sm-12">
    {!! Form::label('text', 'Текст:') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control', 'id' => 'text']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('texts.index') !!}" class="btn btn-default">Отменить</a>
</div>


@section('scripts')
    <script>
        CKEDITOR.replace( 'text' );
        $('.fine_select').select2({ width: '100%' });
    </script>
@endsection
