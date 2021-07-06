@extends('layouts.app')

@section('content')

<div class="content">
    <section class="content-header">
        <h1>Описание категории "{{ \App\Models\ProductCategory::TYPE[$text->type] }}"</h1>
    </section>
    <div>
        <form method="POST" action="/update-categoriesText" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div style="display: none">
                {!! Form::text('id', $text->id, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-sm-12 col-lg-12">
                {!! Form::textarea('text', $text->text, ['class' => 'ckeditor form-control', 'id' => 'text1']) !!}
            </div>

            <div class="form-group col-sm-12">
                {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
            </div>
        </form>
    </div>
    <div style="height: 100px"></div>
</div>

@endsection

