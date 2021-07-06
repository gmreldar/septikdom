@extends('layouts.app')

@section('content')

<div class="content">
    <section class="content-header">
        <h1>Описание категории "{{ \App\Models\ProductCategory::TYPE[$type] }}"</h1>
    </section>
    <div>
        {!! Form::open(['route' => 'categoriesText.store']) !!}
        <div style="display: none">
            {!! Form::text('type', $type, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-sm-12 col-lg-12">
            {!! Form::textarea('text', null, ['class' => 'ckeditor form-control', 'id' => 'text1']) !!}
        </div>

        <div class="form-group col-sm-12">
            {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    <div style="height: 100px"></div>
</div>

@endsection

