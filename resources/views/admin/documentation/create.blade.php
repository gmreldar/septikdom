@extends('layouts.app')

@section('content')

    <div class="content">
        <section class="content-header">
            <h1>Создание </h1>
        </section>
        <div>
            {!! Form::open(['route' => 'documentation.store', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group col-sm-12 col-lg-12">
                {!! Form::label('title', 'Название:') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            <div style="display: none">
                {!! Form::label('type', 'Название:') !!}
                {!! Form::text('type', $type, ['class' => 'form-control']) !!}
            </div>


            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"><label>Файлы на сервере:</label></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if($files)
                                <table style="width: 100%">
                                    <tbody>
                                    @foreach($files as $file)
                                        <tr>
                                            <input type="text" value="{!! $file->link !!}" style="display: none"
                                                   id="file-link{!! $file->id !!}">
                                            <td>{!! $file->old_name !!}</td>
                                            <td>
                                                <button class="text-right" type="button"
                                                        onclick="add_link('file-link{!! $file->id !!}')">Вставить ссылку
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-12 col-lg-12">
                <label>Файлы:</label>
                <div id="add-file-block">
                </div>
                <button class="btn btn-primary" type="button" id="plus_file">+ Добавить файл</button>
                <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter" type="button"
                        id="plus_file">Выбрать файл
                </button>
                <br>
                {!! Form::label('text', 'Описание:') !!}
                {!! Form::textarea('text', null, ['class' => 'form-control', 'id' => 'text']) !!}
            </div>

            <div class="form-group">
                <div class="container-fluid">
                    {!! Form::label('text', 'Товары:') !!}
                </div>
                {{--<div id="add-product-block" class="container-fluid">--}}

                {{--</div>--}}
                {{--<div class="text-center">--}}
                {{--<button class="btn btn-primary" type="button" onclick='plus()'>+ Добавить товар</button>--}}
                {{--</div>--}}

                @foreach($products_all as $products)
                    @if($products->is_active == 1)
                        <div style="padding-left: 20px;">
                            {{ $products->name }}
                            {!! Form::hidden('product-name[]', 0, ['id' => 'product'.$products->id]) !!}
                            <input type="checkbox" id="one{{ $products->id }}" class="checkbox_carousels"
                                   onchange="checkbox_carousels('#product{!! $products->id !!}', '{!! $products->id !!}', 'one{!! $products->id !!}')">
                        </div>
                    @endif
                @endforeach
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
        function checkbox_carousels(id, val, box) {
            var chbox;
            chbox = document.getElementById(box);
            if (chbox.checked) {
                $(id).val($(id).val() + val)
            }
            else {
                $(id).val(0)
            }
        }
    </script>
    <script>
        $('.del').on('click', function () {
            $(this).parent('.form').remove();
        });

        function add_link(link) {
            var nameLink = document.getElementById(link).value;
            {{-- @todo --}}
            var txt = '<a href="/download/' + nameLink + ' ">' + nameLink + '</a>';
            $('#text').val($('#text').val() + txt);
        }

        function plus() {
            document.getElementById('add-product-block').insertAdjacentHTML('beforeend', `{!! Form::select('product-name[]', \App\Models\Product::getAll(), null, ['class' => 'form-control fine_select']) !!}`);
        }

        function creareFileLink(file, link) {
            var nameLink = document.getElementById(link).value;
            {{-- @todo --}}
            var txt = '<a href="/download/' + nameLink + ' ">' + nameLink + '</a>';
            $('#text').val($('#text').val() + txt);
        }

        var count = 1;

        document.getElementById('plus_file').addEventListener("click", function () {

            document.getElementById('add-file-block').insertAdjacentHTML('beforeend', '<span>Файл ' + count + '</span><input name="userfile[]" type="file" id="uploadFile' + count + '"/><input name="nameLink[]" type="text" id="nameLink' + count + '" placeholder="Название"><br><button type="button" onclick="creareFileLink(\'uploadFile' + count + '\', \'nameLink' + count + '\')">Вставить ссылку</button><br><br>');
            count++;
        });

    </script>
@endsection
