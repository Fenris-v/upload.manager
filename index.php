<?php

define('ALLOWED_FILES_TYPE', [
    'image/jpg',
    'image/jpeg',
    'image/png',
]);
define('FILE_MAX_SIZE', 5 * 1024 * 1024);

if (isset($_POST['upload']) && count($_FILES['image']['name']) <= 5) {

    for ($i = 0; $i < count($_FILES['image']['name']); $i++) {

        if (!empty($_FILES['image']['error'][$i])) {
            echo 'Upload fail with error code: ' . $_FILES['image']['error'][$i];
        } elseif (
            in_array($_FILES['image']['type'][$i], ALLOWED_FILES_TYPE)
            && $_FILES['image']['size'][$i] <= ALLOWED_FILES_TYPE
        ) {
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath);
            }

            move_uploaded_file($_FILES['image']['tmp_name'][$i], $uploadPath . $_FILES['image']['name'][$i]);
        }
    }
} elseif (isset($_POST['upload']) && count($_FILES['image']['name']) > 5) {
    echo 'max count for upload = 5';
}


require $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
require $_SERVER['DOCUMENT_ROOT'] . '/templates/uploadPage.php';
require $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.html';
