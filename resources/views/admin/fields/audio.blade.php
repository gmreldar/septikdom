<div class="image-upload">
    <div class="form-group">
        <b>{{ $image['title'] }}:</b><br>
        <label for="{{ $image['name'] }}">
            <a class="btn btn-success button-load"><i class="fa fa-upload"></i> Выбор {{ $image['title'] }}</a>
        </label>
        <input type="file" accept="audio/*" id="{{ $image['name'] }}" name="{{ $image['name'] }}" style="display: none;">
    </div>
    <!-- Image Field -->
    <ul class="mailbox-attachments clearfix">
        <li {{ isset($image['src']) ? 'class=loaded' : '' }} style="border: 0px;">
            <audio controls>
                <source src="{{ asset($image['src']) }}" >
                Тег audio не поддерживается вашим браузером.
                <a href="{{ $image['src'] }}">Скачайте музыку</a>.
            </audio>
            <span class="mailbox-attachment-icon" style="overflow: hidden; padding: 0;">

            </span>
            <div class="mailbox-attachment-info">
                <a href="{{ isset($image['src']) ? '/' . $image['src'] : '' }}" class="mailbox-attachment-name" target="_blank"><i class="fa fa-file-audio-o"></i>
                    <span class="file-name">{{ isset($image['src']) ? '/' . $image['src'] : '' }}</span>
                </a>
            </div>
        </li>
    </ul>
</div>