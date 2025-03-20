<?php

$arr  = [5,4,3,2,1];
var_dump(printStack($arr));
function printStack(&$arr) {
    $res = array_pop($arr);
    if (empty($arr)) {
        return $res;
    }

    $last = printStack($arr);
    $arr[] = $res;
    return $last;
}
