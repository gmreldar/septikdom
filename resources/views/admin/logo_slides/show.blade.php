@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Слайды 2
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.logo_slides.show_fields')
                    <a href="{!! route('logoSlides.index') !!}" class="btn btn-default">Назад</a>
                </div>
            </div>
        </div>
    </div>
@endsection
