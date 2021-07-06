<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Вопрос:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Text Field -->
<div class="form-group col-sm-12">
    {!! Form::label('text', 'Ответ:') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('questions.index') !!}" class="btn btn-default">Отменить</a>
</div>
