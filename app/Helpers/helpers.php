<?php

if (!function_exists('removeUrlDoubleSlash')) {

    function removeUrlDoubleSlash($httpType = 'http')
    {
        if (preg_match('/[\/]{1,100}$/', $_SERVER['REQUEST_URI'])) {
            $newUrl = url()->full();
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: $newUrl");
            exit();
        }
        $url = \Illuminate\Support\Str::replaceFirst("$httpType://", '', url()->full());
        if (str_contains(url()->full(), "www")) {
            $newUrl = str_replace('www.', '', url()->full());
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: $newUrl");
            exit();
        }
        if (str_contains(url()->full(), "$httpType://") && str_contains($url, '//')) {
            $url = \Illuminate\Support\Str::replaceFirst("$httpType://", '', url()->full());
            $newUrl = str_replace('//', '/', $url);
            if ($url != $newUrl) {
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: $httpType://$newUrl");
                exit();
            }
        }
        $current =  url()->current();
        if (str_contains(str_replace(['http://', 'https://'], '', $current), '//')) {
            $newUrl = explode('/', $current);
            $prepareUrl = [];
            foreach ($newUrl as $value) {
                if ($value != '') {
                    $prepareUrl[] = $value;
                }
            }
            $newUrl = str_replace($current, '/' . implode('/', $prepareUrl), url()->full());
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $newUrl);
            exit();
        }
        if (str_contains(url()->full(), 'index.php')) {
            $newUrl = str_replace('index.php', '', url()->full());
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $newUrl);
            exit();
        }
    }
}