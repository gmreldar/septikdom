@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{ \App\Models\ProductCategory::TYPE[$type] }}
        </h1>
    </section>
    <div class="content">
        <div class="box box-success">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.product_categories.show_fields')
                    <a href="{!! route('productCategories.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
