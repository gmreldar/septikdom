<?php

if (!function_exists('removeUrlDoubleSlash')) {

    function removeUrlDoubleSlash($httpType = 'http')
    {
        $url = str_replace_first("$httpType://", '', url()->full());
        if (str_contains(url()->full(), "$httpType://") && str_contains($url, '//')) {
            $url = str_replace_first("$httpType://", '', url()->full());
            $newUrl = str_replace('//', '/', $url);
            if ($url != $newUrl) {
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: $httpType://$newUrl");
                exit();
            }
        }
        $uri = preg_replace('/([^:])(\/{2,})/', '$1/', url()->current());
        if ($uri != url()->current()) {
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: $httpType://$url");
            exit();
        }
    }
}