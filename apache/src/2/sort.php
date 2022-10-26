<?php

if (isset($_GET['array']))
{
    require_once 'merge_sort.php';

    $array = array_map('intval', explode(',', $_GET['array']));
    $arrayAfterSoring = merge_sort($array);
    echo 'Before sorting: ' . implode(',', $array) . '<br>After sorting: ' . implode(',', $arrayAfterSoring);
}
else {
    echo 'Please specify the <b>array</b> parameter';
}

