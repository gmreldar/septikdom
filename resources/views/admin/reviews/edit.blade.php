@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Отзыв
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-success">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($review, ['route' => ['reviews.update', $review->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                        @include('admin.reviews.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection