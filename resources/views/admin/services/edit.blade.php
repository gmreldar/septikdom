@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{ $service->name }}
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-success">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($service, ['route' => ['services.update', $service->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                        @include('admin.services.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection