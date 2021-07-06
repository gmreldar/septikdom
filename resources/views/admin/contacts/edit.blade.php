@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Настройки
        </h1>
   </section>
   <div class="content">
       <div class="clearfix"></div>

       @include('flash::message')

       <div class="clearfix"></div>
       <div class="box box-success">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($contact, ['route' => ['contacts.update', $contact->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                        @include('admin.contacts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection