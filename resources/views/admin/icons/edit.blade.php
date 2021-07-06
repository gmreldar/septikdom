@extends('layouts.app')

@section('content')

    <div class="content">
        <section class="content-header">
            <h1>Редактирование </h1>
        </section>
        <div>
            <form method="POST" action="/update-icons" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('title', 'Название:') !!}
                    {!! Form::text('title', $icons->title, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-sm-6 col-lg-6">
                    {!! Form::label('sink', 'Раковина:') !!}
                    {!! Form::number('sink', $icons->sink, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-sm-6 col-lg-6">
                    {!! Form::label('bath', 'Ванна:') !!}
                    {!! Form::number('bath', $icons->bath, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-sm-6 col-lg-6">
                    {!! Form::label('toilet', 'Унитаз:') !!}
                    {!! Form::number('toilet', $icons->toilet, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-sm-6 col-lg-6">
                    {!! Form::label('washing', 'Стиралка:') !!}
                    {!! Form::number('washing', $icons->washing, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-sm-12 col-lg-12">
                    {!! Form::label('shower', 'Душ:') !!}
                    {!! Form::number('shower', $icons->shower, ['class' => 'form-control']) !!}
                </div>

                <div style="display: none">
                    {!! Form::label('id', 'Название:') !!}
                    {!! Form::text('id', $icons->id, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    <div class="container-fluid">
                        {!! Form::label('text', 'Товары:') !!}
                    </div>
                    <div id="add-product-block" class="container-fluid">
                        @if($products)
                            @foreach($products as $product)
                                <div style="display: flex; margin-bottom: 10px;" id="product" class="form">
                                    {!! Form::select('product-name[]', \App\Models\Product::getAll(), isset($product->id_product) ? $product->id_product : null, ['class' => 'form-control fine_select']) !!}
                                    <button type="button" style="margin-left: 20px; height: 35px;" class="btn btn-danger del">Удалить</button>
                                </div>

                            @endforeach
                        @endif
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary" type="button" onclick='plus()'>+ Добавить товар</button>
                    </div>

                </div>


                <div class="form-group col-sm-12">
                    {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
                </div>
            </form>
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