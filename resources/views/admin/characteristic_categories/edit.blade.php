@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>{{ $productCategory->name }}</h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('productCategories.show', $productCategory->type) !!}">{{ \App\Models\ProductCategory::TYPE[$productCategory->type] }}</a></li>
            <li class="active">{{ $productCategory->name }}</li>
        </ol>
   </section>
   <div class="content">
       @include('flash::message')
       @include('adminlte-templates::common.errors')
       <div class="box box-success">
           <div class="box-header with-border">
               <h3 class="box-title">
                   Продукты
               </h3>
               <h3 class="box-title pull-right">
                   <a class="btn btn-success pull-right" href="{!! route('products.create', ['product_category_id' => $productCategory->id]) !!}">Добавить</a>
               </h3>
           </div>
           <div class="box-body">
               @include('admin.product_categories.products')
           </div>
       </div>
       <div class="box box-success collapsed-box">
           <div class="box-header with-border">
               <h3 class="box-title pointer" data-widget="collapse">Характеристики категории</h3>
               <div class="box-tools pull-right">
                   <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                   </button>
               </div>
           </div>
           <div class="box-body">
               <div class="row">
                   {!! Form::model($productCategory, ['route' => ['productCategories.update', $productCategory->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                        @include('admin.product_categories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection