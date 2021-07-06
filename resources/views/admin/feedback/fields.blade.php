<div class="form-group col-sm-6">
    {!! Form::label('name', 'Имя:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

    {!! Form::label('phone', 'Телефон:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}

    {!! Form::label('status', 'Статус:') !!}
    {!! Form::select('status', \App\Models\Feedback::STATUS, isset($feedback->status) ? $feedback->status : 0, ['class' => 'form-control select']) !!}
</div>

<!-- Message Field -->
<div class="form-group col-sm-6">
    {!! Form::label('text', 'Сообщение:') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control', 'rows' => '8']) !!}
</div>

<!-- Text Field -->
<div class="form-group col-sm-12">
    {!! Form::label('message', 'Комментарий:') !!}
    {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('afeedback.index') !!}" class="btn btn-default">Отменить</a>
</div>
