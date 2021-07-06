<div class="image-upload">
    <div class="form-group">
        <b>{{ $image['title'] }}:</b><br>
        <label for="{{ $image['name'] }}">
            <a class="btn btn-success button-load"><i class="fa fa-upload"></i> Выбор изображения</a>
        </label>
        <input type="file" accept="image/*" id="{{ $image['name'] }}" name="{{ $image['name'] }}" style="display: none;">
    </div>
    <!-- Image Field -->
    <ul class="mailbox-attachments clearfix">
        <li {{ isset($image['src']) ? 'class=loaded' : '' }}>
            <span class="mailbox-attachment-icon" style="overflow: hidden; padding: 0;"><img class="image-load" src="{{ isset($image['src']) ? '/min/' . $image['src'] : '' }}"></span>
            <div class="mailbox-attachment-info">
                <a href="{{ isset($image['src']) ? '/' . $image['src'] : '' }}" class="mailbox-attachment-name" target="_blank"><i class="fa fa-camera"></i> <span class="file-name">{{ isset($image['src']) ? '/' . $image['src'] : '' }}</span></a>
            </div>
        </li>
    </ul>
</div>