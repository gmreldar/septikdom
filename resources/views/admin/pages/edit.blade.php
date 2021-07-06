@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{ $page->name }}
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-success">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($page, ['route' => ['pages.update', $page->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                        @include('admin.pages.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection