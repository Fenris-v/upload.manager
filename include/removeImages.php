<?php

if (count($_POST) > 0) {
    foreach ($_POST as $key => $item) {
        $file = $_SERVER['DOCUMENT_ROOT'] . '/upload/' . $item;
        if (file_exists($file)) {
            unlink($file);
        }
    }
}
