@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Слайды 2
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($logoSlide, ['route' => ['logoSlides.update', $logoSlide->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                        @include('admin.logo_slides.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection