@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>{{ $modification->modtitle }}</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{!! route('productCategories.show', $modification->product->category->type) !!}">{{ \App\Models\ProductCategory::TYPE[$modification->product->category->type] }}</a>
            </li>
            <li>
                <a href="{!! route('productCategories.edit', $modification->product->category->id) !!}">{{ $modification->product->category->name }}</a>
            </li>
            <li>
                <a href="{!! route('products.edit', $modification->product->id) !!}">{{ $modification->product->name }}</a>
            </li>
            <li class="active">{{ $modification->modtitle }}</li>
        </ol>
    </section>
    <div class="content">
        @include('flash::message')
        @include('adminlte-templates::common.errors')
        <div class="box box-success">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($modification, ['route' => ['modifications.update', $modification->id], 'method' => 'patch']) !!}
                    @if($modification->product->category->type == \App\Models\ProductCategory::SEPTICS_ID)
                        @include('admin.modifications.fields')
                    @elseif($modification->product->category->type == \App\Models\ProductCategory::ACCESSORIES_ID)
                        @include('admin.modifications.fields_accessories')
                    @elseif($modification->product->category->type == \App\Models\ProductCategory::CELLAR_ID)
                        @include('admin.modifications.fields_cellar')
                    @elseif($modification->product->category->type == \App\Models\ProductCategory::CAISSON_ID)
                        @include('admin.modifications.fields_caisson')
                    @endif

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection