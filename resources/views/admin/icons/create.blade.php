@extends('layouts.app')

@section('content')

    <div class="content">
        <section class="content-header">
            <h1>Создание группы иконок</h1>
        </section>
        <div>
            {!! Form::open(['route' => 'icons.store']) !!}
            <div class="form-group col-sm-12 col-lg-12">
                {!! Form::label('title', 'Название:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-6">
                {!! Form::label('sink', 'Раковина:') !!}
                {!! Form::number('sink', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-6">
                {!! Form::label('bath', 'Ванна:') !!}
                {!! Form::number('bath', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-6">
                {!! Form::label('toilet', 'Унитаз:') !!}
                {!! Form::number('toilet', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-sm-6 col-lg-6">
                {!! Form::label('washing', 'Стиралка:') !!}
                {!! Form::number('washing', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-sm-12 col-lg-12">
                {!! Form::label('shower', 'Душ:') !!}
                {!! Form::number('shower', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                <div class="container-fluid">
                    {!! Form::label('text', 'Товары:') !!}
                </div>
                <div id="add-product-block" class="container-fluid">

                </div>
                <div class="text-center">
                    <button class="btn btn-primary" type="button" onclick='plus()'>+ Добавить товар</button>
                </div>

            </div>


            <div class="form-group col-sm-12">
                {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
        <div style="height: 100px"></div>
    </div>

@endsection

@section('scripts')
    <script>
        $('.del').on('click', function(){
            $(this).parent('.form').remove();
        });

        function plus(){
            document.getElementById('add-product-block').insertAdjacentHTML('beforeend', `{!! Form::select('product-name[]', \App\Models\Product::getAll(), null, ['class' => 'form-control fine_select']) !!}`);
        }

    </script>
@endsection
