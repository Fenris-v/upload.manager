<?php

$imagesList = [];
foreach (scandir($_SERVER['DOCUMENT_ROOT'] . '/upload') as $item) {
    if ($item !== '.' && $item !== '..') {
        $imagesList[] = $item;
    }
}

if (count($_POST) > 0) {
    foreach ($_POST as $key => $item) {
        if (in_array($item, $imagesList)) {
            $file = $_SERVER['DOCUMENT_ROOT'] . '/upload/' . $item;
            if (file_exists($file)) {
                unlink($file);
            }
        }
    }
}
