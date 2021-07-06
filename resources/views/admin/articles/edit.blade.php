@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {{ $article->name }}
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-success">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($article, ['route' => ['articles.update', $article->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                        @include('admin.articles.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection