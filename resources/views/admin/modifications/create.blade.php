@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Модификация
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-success">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'modifications.store']) !!}

                    @if($type == \App\Models\ProductCategory::SEPTICS_ID)
                        @include('admin.modifications.fields')
                    @elseif($type == \App\Models\ProductCategory::ACCESSORIES_ID)
                        @include('admin.modifications.fields_accessories')
                    @elseif($type == \App\Models\ProductCategory::CELLAR_ID)
                        @include('admin.modifications.fields_cellar')
                    @elseif($type == \App\Models\ProductCategory::CAISSON_ID)
                        @include('admin.modifications.fields_caisson')
                    @endif

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection