<?php

include $_SERVER['DOCUMENT_ROOT'] . '/include/const.php';

if (isset($_POST['upload']) && count($_FILES) <= 5) {
    if (!file_exists(UPLOAD_PATH)) {
        mkdir(UPLOAD_PATH);
    }
    foreach ($_FILES as $file) {
        if (
            in_array(mime_content_type($file['tmp_name']), ALLOWED_FILES_TYPE) &&
            $file['size'] < FILE_MAX_SIZE
        ) {
            move_uploaded_file($file['tmp_name'], UPLOAD_PATH . $file['name']);
            echo 'File ' . $file['name'] . ' success uploaded! <br />';
        } elseif (!in_array(mime_content_type($file['tmp_name']), ALLOWED_FILES_TYPE)) {
            echo 'Not allowed file\'s type';
        } else {
            echo 'Max size of file - ' . FILE_MAX_SIZE . 'Mb';
        }
    }
} elseif (isset($_POST['upload']) && count($_FILES) > 5) {
    echo 'Max count for upload - 5';
}
