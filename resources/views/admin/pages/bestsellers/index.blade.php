@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Хиты продаж</h1>
        <h1 class="pull-right">
           <input form="bestsellers" onclick="submit();" type="submit" class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" value="Сохранить">
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-success">
            <div class="box-body">
                    @include('admin.pages.bestsellers.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>

    <script>
        var count = {{count($products)}};
        function addRow(){
            var cleanRow = $('#cleanRow').clone();
            cleanRow.removeAttr('id');
            cleanRow.removeAttr('style');
            cleanRow.find('select').attr('name', 'bestseller[' + ++count + '][product_id]');
            $('#addRow').before(cleanRow);
        }

        function submit(){
            $('[name="bestsellers"]').submit();
        }

    </script>
@endsection

