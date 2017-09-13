<?php
/**
 * Created by PhpStorm.
 * User: ianchaizir
 * Date: 8/31/17
 * Time: 4:29 PM
 */
function debug($var, $exit = 1)
{
    echo '<pre>';
    if (is_array($var) || is_object($var)) {
        print_r($var);
    } else {
        echo $var . PHP_EOL;
    }
    echo '</pre>';
    if ($exit) {
        exit;
    }
}

function json_output($data)
{
    header("Cache-Control: max-age=0, no-cache, no-store, must-revalidate");
    header("Pragma: no-cache");
    header("Expires: Thu, 01 Jan 1970 00:00:00 GMT");
    header('Content-type: application/json');
    echo json_encode($data);
    exit;
}
