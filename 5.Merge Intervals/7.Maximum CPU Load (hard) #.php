<?php
/*
Maximum CPU Load (hard) #
We are given a list of Jobs. Each job has a Start time, an End time, and a CPU load when it is running.
Our goal is to find the maximum CPU load at any time if all the jobs are running on the same machine.

Example 1:

Jobs: [[1,4,3], [2,5,4], [7,9,6]]
Output: 7
Explanation: Since [1,4,3] and [2,5,4] overlap, their maximum CPU load (3+4=7) will be when both the
jobs are running at the same time i.e., during the time interval (2,4).
Example 2:

Jobs: [[6,7,10], [2,4,11], [8,12,15]]
Output: 15
Explanation: None of the jobs overlap, therefore we will take the maximum load of any job which is 15.
Example 3:

Jobs: [[1,4,2], [2,4,1], [3,6,5]]
Output: 8
Explanation: Maximum CPU load will be 8 as all jobs overlap during the time interval [3,4].
 */
//
$arr = [[2,5,4], [1,4,3], [7,9,6]];
//var_dump(findMaxCPULoad($arr));
var_dump(findMaxCPULoadV1($arr));

$arr = [[6,7,10], [2,4,11], [8,12,15]];
//var_dump(findMaxCPULoad($arr));
var_dump(findMaxCPULoadV1($arr));


$arr = [[1,4,2], [2,4,1], [3,6,5]];
//var_dump(findMaxCPULoad($arr));
var_dump(findMaxCPULoadV1($arr));

class MyMinHeap extends SplMinHeap {
    protected function compare($value1, $value2) : int
    {
        return $value2[1] - $value1[1];
    }

}

//时间复杂度:nlogn + n*logn

function findMaxCPULoadV1($arrs) {
    usort($arrs, function ($item1, $item2){
        return $item1[0] - $item2[0];
    });

    $minHeap = new MyMinHeap();

    $curLoad = 0;
    $ret = 0;
    foreach ($arrs as $index => $arr) {

        while (!$minHeap->isEmpty() && $arr[0] > $minHeap->top()[1]) {
            $curLoad -= $minHeap->extract()[2];
        }

        $minHeap->insert($arr);
        $curLoad += $arr[2];
        $ret = max($ret, $curLoad);
    }

    return $ret;
}

//时间复杂度：  nlogn + n
//空间复杂度: o(n)
function findMaxCPULoad($arr) {

    usort($arr, function ($item1, $item2){
       return $item1[1] - $item2[1];
    });

    $i = 1;
    $ret = $arr[0][2];
    while ($i < count($arr)) {
        $curLoad = $arr[$i][2];
        if ($arr[$i][0] <= $arr[$i-1][1]) {
            $curLoad = $arr[$i][2]  + $arr[$i-1][2];
            $arr[$i][2] = $curLoad; //修改当前的负载值
        }

        $ret = max($ret, $curLoad);
        $i++;
    }

    return $ret;
}