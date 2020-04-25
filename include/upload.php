<?php
include $_SERVER['DOCUMENT_ROOT'] . '/include/const.php';

$uploadPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/';

if (isset($_POST['upload']) && count($_FILES) <= 5) {
    if (!file_exists($uploadPath)) {
        mkdir($uploadPath);
    }
    foreach ($_FILES as $file) {
        if (
            in_array($file['type'], ALLOWED_FILES_TYPE) &&
            $file['size'] < FILE_MAX_SIZE
        ) {
            move_uploaded_file($file['tmp_name'], $uploadPath . $file['name']);
        }
    }
}
