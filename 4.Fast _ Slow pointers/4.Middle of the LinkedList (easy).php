<?php
/*
 Problem Statement #
Given the head of a Singly LinkedList, write a method to return the middle node of the LinkedList.

If the total number of nodes in the LinkedList is even, return the second middle node.

Example 1:
Input: 1 -> 2 -> 3 -> 4 -> 5 -> null
Output: 3

Example 2:
Input: 1 -> 2 -> 3 -> 4 -> 5 -> 6 -> null
Output: 4

Example 3:
Input: 1 -> 2 -> 3 -> 4 -> 5 -> 6 -> 7 -> null
Output: 4
 */

$ret = 0;

class Node {
    public  $val;
    public  $next;

    public function __construct($val)
    {
        $this->val = $val;
    }
}

$head = new Node(1);
$head->next = new Node(2);
$head->next->next = new Node(3);
$head->next->next->next = new Node(4);
$head->next->next->next->next = new Node(5);
$head->next->next->next->next->next = new Node(6);

echo findMiddle($head)->val;
function findMiddle($node) {

    $slow = $node;
    $fast = $node;

    while ($fast && $fast->next) {
        $slow = $slow->next;
        $fast = $fast->next->next;
    }

    return $slow;
}