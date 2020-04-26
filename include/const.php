<?php
define('ALLOWED_FILES_TYPE', [
    'image/jpg',
    'image/jpeg',
    'image/png',
]);
define('FILE_MAX_SIZE', 5 * 1024 * 1024);

define('UPLOAD_PATH', $_SERVER['DOCUMENT_ROOT'] . '/upload/');
