<?php
/**
Given an array of characters where each character represents a fruit tree, you are given two baskets and your goal is to put maximum number of fruits in each basket. The only restriction is that each basket can have only one type of fruit.

You can start with any tree, but once you have started you can’t skip a tree. You will pick one fruit from each tree until you cannot, i.e., you will stop when you have to pick from a third fruit type.

Write a function to return the maximum number of fruits in both the baskets.

Example 1:

Input: Fruit=['A', 'B', 'C', 'A', 'C']
Output: 3
Explanation: We can put 2 'C' in one basket and one 'A' in the other from the subarray ['C', 'A', 'C']

Example 2:
Input: Fruit=['A', 'B', 'C', 'B', 'B', 'C']
Output: 5
Explanation: We can put 3 'B' in one basket and two 'C' in the other basket.
This can be done if we start with the second letter: ['B', 'C', 'B', 'B', 'C']
 */

$fruits = ['A', 'B', 'C', 'A', 'C'];
echo "get:".getMaxFruits ($fruits) . ", want:3".PHP_EOL;

$fruits = ['A', 'B', 'C', 'B', 'B', 'C'];
echo "get:".getMaxFruits ($fruits) . ", want:5".PHP_EOL;

$fruits = ['A', 'B', 'C', 'A', 'C'];
var_dump(getMaxFruitsV1($fruits));

$fruits = ['A', 'B', 'C', 'B', 'B', 'C'];
var_dump(getMaxFruitsV1($fruits));

function getMaxFruitsV1($fruits) {
    $stat = [];
    $left = 0;
    $right = 0;
    $maxNum = PHP_INT_MIN;
    while ($right < count($fruits)) {
        $cur =  $fruits[$right];
        !isset($stat[$cur]) && $stat[$cur] = 0;
        $stat[$cur]++;

        while (count($stat) > 2) {
            $leftCh = $fruits[$left];
            $stat[$leftCh]--;
            if ($stat[$leftCh] == 0 ){
                unset($stat[$leftCh]);
            }
            $left++;
        }

        if (count($stat) == 2) {
            $maxNum = max($maxNum, $right-$left+1);
        }
        $right++;
    }

    return $maxNum;
}


//限制只有两种水果，最多能拿多少个水果
function getMaxFruits ($fruits) {
    $limits = 2;
    $start = 0;
    $fruitCount = [];
    $maxFruits = 0;
    for ($end = 0; $end < count($fruits); $end++) {
        !isset( $fruitCount[$fruits[$end]]) &&  $fruitCount[$fruits[$end]] = 0;
        $fruitCount[$fruits[$end]]++;

        if (count($fruitCount) == $limits) {
            $maxFruits = max($maxFruits, array_sum($fruitCount));
        }

        while (count($fruitCount) > $limits) {
            $fruitCount[$fruits[$start]]--;
            if ($fruitCount[$fruits[$start]] == 0) {
                unset($fruitCount[$fruits[$start]]);
            }
        }
    }

    return $maxFruits;
}