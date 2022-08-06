<?php
/*

Problem Statement
Given an array of numbers and a number ‘K’,
 we need to remove ‘K’ numbers from the array such that we are left with maximum distinct numbers.

Example 1:
Input: [7, 3, 5, 8, 5, 3, 3], and K=2
Output: 3
Explanation: We can remove two occurrences of 3 to be left with 3 distinct numbers [7, 3, 8], we have
to skip 5 because it is not distinct and occurred twice.
Another solution could be to remove one instance of '5' and '3' each to be left with three
distinct numbers [7, 5, 8], in this case, we have to skip 3 because it occurred twice.

Example 2:
Input: [3, 5, 12, 11, 12], and K=3
Output: 2
Explanation: We can remove one occurrence of 12, after which all numbers will become distinct. Then
we can delete any two numbers which will leave us 2 distinct numbers in the result.

Example 3:
Input: [1, 2, 3, 3, 3, 3, 4, 4, 5, 5, 5], and K=2
Output: 3
Explanation: We can remove one occurrence of '4' to get three distinct numbers.
 */

class MyMinHeap extends SplMinHeap {
    protected function compare($value1, $value2):int
    {
        return $value1[1] - $value2[1];
    }

}

//这道题采用贪心算法
//题意是要通过删除元素使得数组中的唯一元素最多，
//那么怎么删除？ 应该是要从重复最小的元素开始删起，!! 重复元素还得保留1个 !!
//

$arr = [7, 3, 5, 8, 5, 3, 3];
$k = 2;
var_dump(findMaximumDistinctElements($arr, $k));
function findMaximumDistinctElements($arr, $k){

    $numFrequency = [];
    foreach ($arr as  $item) {
        !isset($numFrequency[$item]) && $numFrequency[$item] = 0;
        $numFrequency[$item] ++;
    }

    $minHeap = new MyMinHeap();
    $distinctNum = 0;
    foreach ($numFrequency as $num => $freq) {
        if ($freq == 1) {
            $distinctNum++;
        } else {
            $minHeap->insert([$num, $freq]);
        }
    }

    while ($k > 0 && !$minHeap->isEmpty()) {
        $item =  $minHeap->extract();
        $k -= $item[1] - 1;  //重复元素，保留一个
        if ($k >= 0) { //重复元素变唯一
            $distinctNum++;
        }
    }

    //还有要删除的元素 就得从唯一元素里面减去
    if ($k > 0) {
        $distinctNum -= $k;
    }

    return $distinctNum;
}