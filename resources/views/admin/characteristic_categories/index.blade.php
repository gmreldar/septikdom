@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">{{ \App\Models\ProductCategory::TYPE[$type] }}</h1>
        <h1 class="pull-right">
           <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! url('productCategories/create?type='.$type) !!}">Добавить</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-success">
            <div class="box-body">
                    @include('admin.product_categories.table')
            </div>
        </div>
        <div class="text-center">
        
        @include('adminlte-templates::common.paginate', ['records' => $productCategories])

        </div>
    </div>
@endsection

