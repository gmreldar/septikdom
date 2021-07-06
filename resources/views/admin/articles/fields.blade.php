<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Название:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Link Field -->
<div class="form-group col-sm-6">
    {!! Form::label('link', 'Ссылка:') !!}
    {!! Form::text('link', null, ['class' => 'form-control']) !!}
</div>

<!-- Article Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('article_category_id', 'Категория:') !!}
    {!! Form::select('article_category_id', \App\Models\ArticleCategory::getAll(), isset($article->article_category_id)
    ? $article->article_category_id : null, ['class' => 'form-control fine_select']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Keywords Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keywords', 'Keywords:') !!}
    {!! Form::textarea('keywords', null, ['class' => 'form-control']) !!}
</div>

<!-- Annotation Field -->
<div class="form-group col-sm-12">
    {!! Form::label('annotation', 'Аннотация:') !!}
    {!! Form::textarea('annotation', null, ['class' => 'form-control']) !!}
</div>

<!-- Text Field -->
<div class="form-group col-sm-12">
    {!! Form::label('text', 'Текст:') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control', 'id' => 'text']) !!}
</div>

<!-- Image Field -->
@php ($images = [
['src' => isset($article->image) ? $article->image : null, 'name' => 'image', 'title' => 'Изображение'],
['src' => isset($article->seo_image) ? $article->seo_image : null, 'name' => 'seo_image', 'title' => 'SEO Изображение']
])
@foreach($images as $image)
<div class="col-sm-4">
    @include('admin.fields.image')
</div>
@endforeach

@php ($images = [
['src' => isset($article->discount_menu_img) ? $article->discount_menu_img : null, 'name' => 'discount_menu_img', 'title' => 'Изображение акция подменю'],
['src' => isset($article->discount_slider_img) ? $article->discount_slider_img : null, 'name' => 'discount_slider_img', 'title' => 'Изображение акция слайдер'],
])
@foreach($images as $image)
<div class="col-sm-4 more" style="display: @if(!isset($article) || $article->article_category_id != 22) none @endif">
    @include('admin.fields.image')
</div>
@endforeach

<!-- Title Field -->
<div class="form-group col-sm-4">
    {!! Form::label('alt', 'Alt:') !!}
    {!! Form::text('alt', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('articleCategories.index') !!}" class="btn btn-default">Отменить</a>
</div>

@section('scripts')
<script src="/js/selectImage.js"></script>
<script>
    $('#article_category_id').on('change', () => {
        if ($('#article_category_id').val() === "22")
            $('.more').css('display', 'block');
        else
            $('.more').css('display', 'none');

    });

    CKEDITOR.replace('text');
    CKEDITOR.config.protectedSource.push(/<script[\s\S]*?script>/g);

    $('.fine_select').select2({width: '100%'});
    @foreach($images as $image)
    $("#{{ $image['name'] }}").change(function () {
        readURL(this);
    });
    @endforeach
</script>
@endsection