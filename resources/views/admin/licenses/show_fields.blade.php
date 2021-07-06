<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $license->id !!}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <p>{!! $license->image !!}</p>
</div>

<!-- Alt Field -->
<div class="form-group">
    {!! Form::label('alt', 'Alt:') !!}
    <p>{!! $license->alt !!}</p>
</div>

<!-- Ord Field -->
<div class="form-group">
    {!! Form::label('ord', 'Ord:') !!}
    <p>{!! $license->ord !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $license->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $license->updated_at !!}</p>
</div>

