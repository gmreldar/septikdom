@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Завершенный объект
        </h1>
   </section>
   <div class="content">
       @include('flash::message')
       <div class="box box-success">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($marker, ['route' => ['admin.map.update', $marker->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                        @include('admin.map.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection