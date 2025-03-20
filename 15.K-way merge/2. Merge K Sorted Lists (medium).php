<?php
/*
Problem Statement #
Given an array of ‘K’ sorted LinkedLists, merge them into one sorted list.

Example 1:

Input: L1=[2, 6, 8], L2=[3, 6, 7], L3=[1, 3, 4]
Output: [1, 2, 3, 3, 4, 6, 6, 7, 8]
Example 2:

Input: L1=[5, 8, 9], L2=[1, 7]
Output: [1, 5, 7, 8, 9]
 */


class ListNode {
    public  $next;
    public  $val;

    public function __construct($val)
    {
        $this->val = $val;
    }
}


$l1 = new ListNode(2);
$l1->next = new ListNode(6);
$l1->next->next = new ListNode(8);

$l2 = new ListNode(3);
$l2->next = new ListNode(6);
$l2->next->next = new ListNode(7);


$l3 = new ListNode(1);
$l3->next = new ListNode(3);
$l3->next->next = new ListNode(4);


class MyMinHeap extends SplMinHeap {
    protected function compare($value1, $value2):int
    {
        return  $value2->val - $value1->val;
    }
}

$arr = [$l1, $l2, $l3];
$l = merge($arr);
while ($l) {
    echo $l->val . PHP_EOL;
    $l = $l->next;
}

function merge($arr) {

    $minHeap = new  MyMinHeap();
    foreach ($arr as $l) {
        $minHeap->insert($l);
    }


    $cur = $dummy = new ListNode(0);

    while (!$minHeap->isEmpty()) {
        $node  = $minHeap->extract();
        $cur->next = $node;
        $cur = $node;
        $node->next && $minHeap->insert($node->next);
    }

    return $dummy->next;

}