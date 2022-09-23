<?php


class AA {
    function numberOfSubarrays($nums, $k) {

        $stat = [];
        $oddNum = 0;
        $count = 0;
        for($i = 0; $i < count($nums); $i++) {
            $oddNum += $nums[$i] & 1;
            if (isset($stat[$oddNum-$k])) {
                $count += $stat[$oddNum-$k];
            }

            !isset($stat[$oddNum]) && $stat[$oddNum] = 0;
            $stat[$oddNum]++;
        }

        return $count;
    }
}

$obj = new AA();
$nums = [1,2,3];
$k =  3;
var_dump($obj->numberOfSubarrays($nums, $k));