@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1 class="pull-left">Описание категорий</h1>
</section>
<div class="content">
    <div class="clearfix"></div>
    <div class="box box-success">
        <div class="box-body">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Септики</td>
                    <td>
                        <div class='btn-group'>
                            @if(isset($septics_text))
                                <a href="{!! route('categoriesText.edit', [$septics_text->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                            @else
                                <a href="{!! url('categoriesText/create?type=1') !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                            @endif
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Погребы</td>
                    <td>
                        <div class='btn-group'>
                            @if(isset($cellars_text))
                                <a href="{!! route('categoriesText.edit', [$cellars_text->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                            @else
                                <a href="{!! url('categoriesText/create?type=3') !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                            @endif
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Кессоны</td>
                    <td>
                        <div class='btn-group'>
                            @if(isset($caissons_text))
                                <a href="{!! route('categoriesText.edit', [$caissons_text->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                            @else
                                <a href="{!! url('categoriesText/create?type=4') !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                            @endif
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
