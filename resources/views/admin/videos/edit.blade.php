@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Видео отзывы
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-success">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($video, ['route' => ['videos.update', $video->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                        @include('admin.videos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection