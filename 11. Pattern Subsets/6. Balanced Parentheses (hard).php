<?php
/*
Problem Statement #
For a given number ‘N’, write a function to generate all combination of ‘N’ pairs of balanced parentheses.

Example 1:

Input: N=2
Output: (()), ()()
Example 2:

Input: N=3
Output: ((())), (()()), (())(), ()(()), ()()()
 */

$n = 2;
//var_dump(generateValidParentheses($n));
var_dump(generateValidParenthesesV1($n));

$n = 3;
//var_dump(generateValidParentheses($n));
var_dump(generateValidParenthesesV1($n));
function  generateValidParentheses($num) {
    $parentheses = "";
    $res = [];
    helper($parentheses, $num, $num, $res);

    return $res;
}

function helper($parentheses, $leftNum, $rightNum, &$res) {

    if ($leftNum <0 || $rightNum < 0) return;

    if ($leftNum > $rightNum) return;

    if ($rightNum == $leftNum && $leftNum == 0) {
        $res[] = $parentheses;
        return;
    }
    helper($parentheses . "(", $leftNum-1, $rightNum, $res);
    helper($parentheses . ")", $leftNum, $rightNum-1, $res);
}


class Item {
    public $p;
    public  $l;
    public  $r;

    public function __construct($str, $l, $r)
    {
        $this->p = $str;
        $this->l = $l;
        $this->r = $r;
    }
}

function generateValidParenthesesV1($num) {
    $queue = [new Item("", 0,0)];
    $res = [];
    while (!empty($queue)) {
        $ps = array_shift($queue);
        if ($ps->l == $ps->r && $ps->l == $num) {
            $res[] = $ps->p;
        } else {
            if ($ps->l < $num) {
                $queue[] = new Item($ps->p . "(", $ps->l + 1, $ps->r);
            }

            if ($ps->l > $ps->r) {
                $queue[] = new Item($ps->p . ")", $ps->l, $ps->r+1);
            }
        }
    }

    return $res;

}