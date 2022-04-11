<?php

if (!function_exists('get_const')) {
    function get_const($path) {
        if($path) {
            $config = $GLOBALS['config'];
            $path = explode('.', $path);
            foreach($path as $item) {
                if(isset($config[$item])) {
                    $config = $config[$item];
                }
            }
            return $config;
        }
        return false;
    }
}

if(!function_exists('get_review_image')){
    function get_review_image($image) {
        $imgDir = get_const('url.img');
        $path = get_const('url.path') . $imgDir;
        return (!$image || !file_exists($imgDir . $image)) ? $path . 'no_image.jpg' : $path . $image;
    }
}

function re_array_files($files) {
    $array = [];
    $file_count = count($files['name']);
    $file_keys = array_keys($files);
    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $array[$i][$key] = $files[$key][$i];
        }
    }
    return $array;
}

if (!function_exists('upload_images')) {
    function upload_images($images, $dir)
    {
        $images = re_array_files($images);
        $photos = [];
        foreach ($images as $image) {
            $newFileExt = pathinfo($image['name'], PATHINFO_EXTENSION);
            $newFileName = 'img_' . md5($image['name'] . time()) . '.' . $newFileExt;
            $destPath = $dir . $newFileName;
            if (move_uploaded_file($image['tmp_name'], $destPath)) {
                $photos[] = $newFileName;
            }
        }
        return $photos;
    }
}