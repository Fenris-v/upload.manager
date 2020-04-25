<?php

namespace filesProp;

/**
 * Function for get size of file
 * @param $file - name of file with path
 * @return string - size with unit
 */
function getSize($file): string
{
    $size = filesize($file);
    if ($size / 1024 < 10) {
        $unit = 'b';
    } elseif ($size / 1024 >= 10 && $size / 1024 / 1024 < 1) {
        $size = intval($size / 1024);
        $unit = 'Kb';
    } else {
        $size = intval($size / 1024 / 1024);
        $unit = 'Mb';
    }
    return $size . $unit;
}

/**
 * Function for get time of create file
 * @param $file - name of file with path
 * @return string - time of create
 */
function getTimeUpload($file): string
{
    return date("d F Y H:i:s.", filectime($file));
}
