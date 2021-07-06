@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Обратная связь</h1>
        <h1 class="pull-right">
           <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('afeedback.create') !!}">Добавить</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-success">
            <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                    @include('admin.feedback.table')

                    <div class="col-sm-5">
                        <div class="dataTables_info" id="example1_info">
                            @if( $feedback->count() < $feedback->total() )
                                Показано от {{ ($feedback->currentPage() - 1) * $feedback->perPage() + 1 }} до
                                @if( $feedback->currentPage() * $feedback->perPage() > $feedback->total() )
                                    {{ $feedback->total() }}
                                @else
                                    {{ $feedback->currentPage() * $feedback->perPage() }}
                                @endif
                                из {{ $feedback->total() }}
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="dataTables_paginate paging_simple_numbers pull-right">
                            {{ $feedback->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

