@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Слайды
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($headSlide, ['route' => ['headSlides.update', $headSlide->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                        @include('admin.head_slides.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection