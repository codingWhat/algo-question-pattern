<?php
/*
 Problem Statement #
Given the head of a LinkedList and a number ‘k’, reverse every ‘k’ sized sub-list starting from the head.

If, in the end, you are left with a sub-list with less than ‘k’ elements, reverse it too.
 */

class Node {
    public  $next;
    public  $val;

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
$head->next->next->next->next->next->next = new Node(7);
$head->next->next->next->next->next->next->next = new Node(8);


$node = reverseGroupBy($head, 3);

while ($node) {
    echo $node->val . PHP_EOL;
    $node = $node->next;
}

function reverseGroupBy($head, $k){
    if (!$head) {
        return null;
    }

    $last = $head;
    for ($i = 1; $i < $k; $i++) {
        if (!$last) {
            return  $head;
        }
        $last = $last->next;
    }

    $cur = $head;
    $prev =  $last ? $last->next: null;
    $ending = $prev;
    while ($cur != $ending) {
        $next = $cur->next;
        $cur->next = $prev;
        $prev = $cur;
        $cur = $next;
    }

    $head->next = reverseGroupBy($ending, $k);
    return $prev;
}
