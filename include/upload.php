<?php

include $_SERVER['DOCUMENT_ROOT'] . '/include/const.php';

if (
    isset($_POST['upload']) &&
    count($_FILES) > 0 &&
    $_FILES[0]['name'] !== '' &&
    count($_FILES) <= 5
) {
    if (!file_exists(UPLOAD_PATH)) {
        mkdir(UPLOAD_PATH);
    }
    foreach ($_FILES as $file) {
        if (
            in_array(mime_content_type($file['tmp_name']), ALLOWED_FILES_TYPE) &&
            $file['size'] < FILE_MAX_SIZE &&
            !in_array($file['name'], scandir(UPLOAD_PATH))
        ) {
            move_uploaded_file($file['tmp_name'], UPLOAD_PATH . $file['name']);
            echo 'Файл с названием ' . $file['name'] . ' успешно загружен! <br />';
        } elseif (!in_array(mime_content_type($file['tmp_name']), ALLOWED_FILES_TYPE)) {
            echo 'Файл ' . $file['name']
                . ' не был загружен. Данный тип файлов не поддерживается. Список поддерживаемых форматов: '
                . implode(', ', ALLOWED_FILES_TYPE) . ' <br />';
        } elseif (in_array($file['name'], scandir(UPLOAD_PATH))) {
            echo 'Файл с именем' . $file['name'] . ' уже существует  <br />';
        } else {
            echo 'Файл ' . $file['name'] . ' не был загружен. Максимальный размер файла - ' . FILE_MAX_SIZE . 'Mb  <br />';
        }
    }
} elseif (isset($_POST['upload']) && count($_FILES) > 5) {
    echo 'Максимальное количество файлов для загрузки - 5  <br />';
}
