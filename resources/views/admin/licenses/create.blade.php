@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Сертификаты и лицензии
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-success">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'licenses.store', 'enctype' => 'multipart/form-data']) !!}

                        @include('admin.licenses.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
