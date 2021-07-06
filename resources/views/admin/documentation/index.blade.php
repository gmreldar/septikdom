@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">{!! $title !!}</h1>
        <h1 class="pull-right">
            <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! url('documentation/create?type='.$type) !!}">Добавить</a>
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
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($documentations as $documentation)
                        <tr>
                            <td>{!! $documentation->id !!}</td>
                            <td>{!! $documentation->title !!}</td>
                            <td>
                                {!! Form::open(['route' => ['documentation.destroy', $documentation->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{!! route('documentation.edit', [$documentation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
