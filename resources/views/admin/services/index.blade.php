@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Услуги</h1>
        <h1 class="pull-right">
            <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px"
               href="{!! route('services.create') !!}">Добавить</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-success">
            <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                    @include('admin.services.table')

                    <div class="col-sm-5">
                        <div class="dataTables_info" id="example1_info">
                            @if( $services->count() < $services->total() )
                                Показано от {{ ($services->currentPage() - 1) * $services->perPage() + 1 }} до
                                @if( $services->currentPage() * $services->perPage() > $services->total() )
                                    {{ $services->total() }}
                                @else
                                    {{ $services->currentPage() * $services->perPage() }}
                                @endif
                                из {{ $services->total() }} услуг
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="dataTables_paginate paging_simple_numbers pull-right">
                            {{ $services->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

