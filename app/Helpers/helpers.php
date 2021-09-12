<?php

if (!function_exists('removeUrlDoubleSlash')) {

    function removeUrlDoubleSlash($httpType = 'http')
    {
        $url = '';
        if (str_contains(url()->current(), "$httpType://")) {
            $url = str_replace_first("$httpType://", '', url()->current());
            $newUrl = str_replace('//', '/', $url);
            if ($url != $newUrl) {
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: $httpType://$newUrl");
                exit();
            }
        }
    }
}