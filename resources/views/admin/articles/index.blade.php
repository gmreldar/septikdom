@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Статьи блога</h1>
        <h1 class="pull-right">
           <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('articles.create') !!}">Добавить</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-success">
            <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                    @include('admin.articles.table')

                    <div class="col-sm-5">
                        <div class="dataTables_info" id="example1_info">
                            @if( $articles->count() < $articles->total() )
                                Показано от {{ ($articles->currentPage() - 1) * $articles->perPage() + 1 }} до
                                @if( $articles->currentPage() * $articles->perPage() > $articles->total() )
                                    {{ $articles->total() }}
                                @else
                                    {{ $articles->currentPage() * $articles->perPage() }}
                                @endif
                                из {{ $articles->total() }} статей
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="dataTables_paginate paging_simple_numbers pull-right">
                            {{ $articles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

