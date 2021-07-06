@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>{{ $product->name }}</h1>
        <ol class="breadcrumb">
            <li><a href="{!! route('productCategories.show', $product->category->type) !!}">{{ \App\Models\ProductCategory::TYPE[$product->category->type] }}</a></li>
            <li><a href="{!! route('productCategories.edit', $product->category->id) !!}">{{ $product->category->name }}</a></li>
            <li class="active">{{ $product->name }}</li>
        </ol>
   </section>
   <div class="content">
       @include('flash::message')
       @include('adminlte-templates::common.errors')
       <div class="box box-success">
           <div class="box-header with-border">
               <h3 class="box-title">
                   Модификации
               </h3>
               <h3 class="box-title pull-right">
                   <a class="btn btn-success pull-right" href="{!! route('modifications.create', ['product_id' => $product->id]) !!}">Добавить</a>
               </h3>
           </div>
           <div class="box-body">
               @if($product->category->type == \App\Models\ProductCategory::SEPTICS_ID)
                   @include('admin.products.modifications')
               @else
                   @include('admin.products.modifications_accessories')
               @endif
           </div>
       </div>
       <div class="box box-success collapsed-box">
           <div class="box-header with-border">
               <h3 class="box-title pointer" data-widget="collapse">Характеристики продукта</h3>
               <div class="box-tools pull-right">
                   <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                   </button>
               </div>
           </div>
           <div class="box-body">
               <div class="row">
                   {!! Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                       @if($product->category->type == \App\Models\ProductCategory::SEPTICS_ID)
                           @include('admin.products.fields')
                       @else
                           @include('admin.products.fields_accessories')
                       @endif

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
       <div class="box box-success">
           <div class="box-header with-border">
               <h3 class="box-title pointer" data-widget="collapse">Изображения</h3>
               <div class="box-tools pull-right">
                   <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                   </button>
               </div>
           </div>
           <div class="box-body no-padding">
               @include('admin.products.images')
           </div>
       </div>
   </div>
@endsection
