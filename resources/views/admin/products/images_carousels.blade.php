<table class="table table-striped images">
    <thead>
    <tr><th>Изображение</th><th>Alt</th><th colspan="1">Действие</th></tr>
    </thead>
    <tbody>
    @foreach($product->images as $image)
        <tr data-id="{{$image->id}}">
            <td>
                <span class="handle ui-sortable-handle">
                    <i class="fa fa-ellipsis-v"></i>
                    <i class="fa fa-ellipsis-v"></i>
                </span>
                {{-- @todo --}}
                <a href="/{!! $image->image !!}" class="mailbox-attachment-name" target="_blank"><i class="fa fa-camera"></i><span class="file-name"> /{!! $image->image !!}</span></a>
            </td>
            <td>{!! $image->alt !!}</td>
            <td>
                {!! Form::open(['route' => ['productImages.destroy', $image->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {!! Form::button('Удалить', ['type' => 'submit', 'class' => 'btn btn-danger', 'style' => 'width:90px', 'onclick' => "return confirm('Вы уверены?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    <tr>
        {!! Form::open(['route' => 'productImages.store', 'enctype' => 'multipart/form-data']) !!}
        {!! Form::hidden('product_id', $product->id) !!}
        {!! Form::hidden('product_id', 1) !!}
        <td class="image-upload">
            <div class="form-group">
                <label for="images">
                    <a class="btn btn-success button-load"><i class="fa fa-upload"></i> Выбор изображения</a>
                </label>
                <input type="file" accept="image/*" data-valid="true" id="images" name="images" style="display: none;">
            </div>
            <!-- Image Field -->
            <ul class="mailbox-attachments clearfix">
                <li>
                    <span class="mailbox-attachment-icon" style="overflow: hidden; padding: 0;"><img class="image-load" src=""></span>
                    <div class="mailbox-attachment-info">
                        <a href="" class="mailbox-attachment-name" target="_blank"><i class="fa fa-camera"></i> <span class="file-name"></span></a>
                    </div>
                </li>
            </ul>
        </td>
        <td>
            {!! Form::text('alt', null, ['class' => 'form-control']) !!}
        </td>
        <td>
            <div class='btn-group'>
                {!! Form::submit('Добавить', ['class' => 'btn btn-success', 'id' => 'uploadImageBtn', 'style' => 'width:90px', 'disabled']) !!}
            </div>
        </td>
        {!! Form::close() !!}
    </tr>
    </tbody>
</table>