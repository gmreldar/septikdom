<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Телефон:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Schedule Field -->
<div class="form-group col-sm-6">
    {!! Form::label('schedule', 'График работы:') !!}
    {!! Form::textarea('schedule', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Адрес:') !!}
    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('in', 'Instagram:') !!}
    {!! Form::text('in', null, ['class' => 'form-control']) !!}

    {!! Form::label('yt', 'Youtube:') !!}
    {!! Form::text('yt', null, ['class' => 'form-control']) !!}


    {!! Form::label('fb', 'Facebook:') !!}
    {!! Form::text('fb', null, ['class' => 'form-control']) !!}

    {!! Form::label('vk', 'Вконтакте:') !!}
    {!! Form::text('vk', null, ['class' => 'form-control']) !!}

    {!! Form::label('tg', 'Телеграмм:') !!}
    {!! Form::text('tg', null, ['class' => 'form-control']) !!}

    {!! Form::label('wa', 'WhatsApp:') !!}
    {!! Form::text('wa', null, ['class' => 'form-control']) !!}

    {!! Form::label('phone_class', 'Класс для телефона:') !!}
    {!! Form::text('phone_class', null, ['class' => 'form-control']) !!}

    {!! Form::label('emails', 'Список имейлов для рассылки (через запятую):') !!}
    {!! Form::text('emails', null, ['class' => 'form-control']) !!}
    <div class="panel box box-danger">
        <div class="box-header with-border">
            <h4 class="box-title">
                Цены монтажа
            </h4>
        </div>
        <div>
            <div class="box-body">
                <div class="form-group col-sm-6">
                    {!! Form::label('cable', 'Расстояние от дома до станции:') !!}
                    {!! Form::number('cable', null, ['class' => 'form-control', 'min' => '0']) !!}

                    {!! Form::label('cable2', 'Расстояние от станции до сброса:') !!}
                    {!! Form::number('cable2', null, ['class' => 'form-control', 'min' => '0']) !!}

                    {!! Form::label('hot_cable', 'Греющий кабель:') !!}
                    {!! Form::number('hot_cable', null, ['class' => 'form-control', 'min' => '0']) !!}
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::label('formwork', 'Опалубка:') !!}
                    {!! Form::number('formwork', null, ['class' => 'form-control', 'min' => '0']) !!}
                    
                    {!! Form::label('well_150', 'Дренажный колодец 1.5м:') !!}
                    {!! Form::number('well_150', null, ['class' => 'form-control', 'min' => '0']) !!}

                    {!! Form::label('well_200', 'Дренажный колодец 2м:') !!}
                    {!! Form::number('well_200', null, ['class' => 'form-control', 'min' => '0']) !!}
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::label('concrete_slab', 'Бетонная плита:') !!}
                    {!! Form::number('concrete_slab', null, ['class' => 'form-control', 'min' => '0']) !!}
                </div>
                <div class="form-group col-sm-6">
                    {!! Form::label('pipeline_length', '1м за прокладку трубы:') !!}
                    {!! Form::number('pipeline_length', null, ['class' => 'form-control', 'min' => '0']) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Map Field -->
<div class="form-group col-sm-6">
    {!! Form::label('map', 'Код карты:') !!}
    {!! Form::textarea('map', null, ['class' => 'form-control']) !!}
</div>

<!-- Images Fields -->
<div class="form-group col-sm-6">
@php ($images = [
    ['src' => isset($contact->about_image) ? $contact->about_image : null, 'name' => 'about_image', 'title' => 'Фон страницы "О нас"']
])
@foreach($images as $image)
    <div class="col-sm-12 col-md-6">
        @include('admin.fields.image')
    </div>
@endforeach
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('contacts.edit', 1) !!}" class="btn btn-default">Отменить</a>
</div>

@section('scripts')
    <script src="/js/selectImage.js"></script>
    <script>
        @foreach($images as $image)
            $("#{{ $image['name'] }}").change(function () {
                readURL(this);
            });
        @endforeach
    </script>
@endsection