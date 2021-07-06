@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Комментарии</h1>
        <h1 class="pull-right">
            <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px"
               href="{!! route('comments.create') !!}">Добавить</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-success">
            <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                    @include('admin.comments.table')

                    <div class="col-sm-5">
                        <div class="dataTables_info" id="example1_info">
                            @if( $comments->count() < $comments->total() )
                                Показано от {{ ($comments->currentPage() - 1) * $comments->perPage() + 1 }} до
                                @if( $comments->currentPage() * $comments->perPage() > $comments->total() )
                                    {{ $comments->total() }}
                                @else
                                    {{ $comments->currentPage() * $comments->perPage() }}
                                @endif
                                из {{ $comments->total() }} комминтариев
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="dataTables_paginate paging_simple_numbers pull-right">
                            {{ $comments->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

