@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Иконки</h1>
        <h1 class="pull-right">
            <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! url('icons/create') !!}">Добавить</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-success">
            <div class="box-body">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>Группа Id</th>
                        <th>Имя группы</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($icons as $icon)
                        <tr>
                            <td>{!! $icon->id !!}</td>
                            <td>{!! $icon->title !!}</td>
                            <td>
                                {!! Form::open(['route' => ['icons.destroy', $icon->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{!! route('icons.edit', [$icon->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
