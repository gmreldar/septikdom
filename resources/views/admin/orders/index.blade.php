@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Заказы</h1>
        <h1 class="pull-right">
           <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('orders.create') !!}">Добавить</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-success">
            <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                    @include('admin.orders.table')

                    <div class="col-sm-5">
                        <div class="dataTables_info" id="example1_info">
                            @if( $orders->count() < $orders->total() )
                                Показано от {{ ($orders->currentPage() - 1) * $orders->perPage() + 1 }} до
                                @if( $orders->currentPage() * $orders->perPage() > $orders->total() )
                                    {{ $orders->total() }}
                                @else
                                    {{ $orders->currentPage() * $orders->perPage() }}
                                @endif
                                из {{ $orders->total() }} заказов
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="dataTables_paginate paging_simple_numbers pull-right">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

