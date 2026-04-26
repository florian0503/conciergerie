<?php

$path = $_SERVER['REQUEST_URI'];
$file = __DIR__ . parse_url($path, PHP_URL_PATH);

if (is_file($file)) {
    return false;
}

$_SERVER['SCRIPT_FILENAME'] = __DIR__ . '/index.php';
$_SERVER['SCRIPT_NAME']     = '/index.php';

include __DIR__ . '/index.php';
