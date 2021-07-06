@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{ \App\Models\ProductCategory::TYPE[$type] }}
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-success">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'productCategories.store', 'enctype' => 'multipart/form-data']) !!}

                        @include('admin.product_categories.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
