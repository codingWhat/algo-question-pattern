<?php
/*
Problem Statement #
Given the head of a Singly LinkedList that contains a cycle, write a function to find the starting node of the cycle.

 */


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

$head->next->next->next->next->next->next = $head->next->next;
var_dump(findCircleStart($head)->val);
//
$head->next->next->next->next->next->next = $head->next->next->next;
var_dump(findCircleStart($head)->val);

function findCircleStart($node) {

    $slow = $fast = $node;

    while ($fast && $fast->next) {
        $slow = $slow->next;
        $fast = $fast->next->next;

        if ($slow == $fast) {
            break;
        }
    }

    $k = $node;
    while ($k != $slow) {
        $k = $k->next;
        $slow  = $slow->next;
    }

    return $k;
}