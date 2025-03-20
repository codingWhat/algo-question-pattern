<?php
/*
 Rotate a LinkedList (medium) #
Given the head of a Singly LinkedList and a number ‘k’, rotate the LinkedList to the right by ‘k’ nodes.

1->2->3->4->5->6

4->5->6->1->2->3


1->2->3->4->5
3->4->5->1->2
 */


class Node {
    public  $val;
    public  $next;

    public function __construct($val)
    {
        $this->val = $val;
    }
}



//
//$head = new Node(1);
//$head->next = new Node(2);
//$head->next->next = new Node(3);
//$head->next->next->next = new Node(4);
//$head->next->next->next->next = new Node(5);
//$head->next->next->next->next->next = new Node(6);
//
//$node = rotate($head);


$head = new Node(1);
$head->next = new Node(2);
$head->next->next = new Node(3);
$head->next->next->next = new Node(4);
$head->next->next->next->next = new Node(5);
$head->next->next->next->next->next = new Node(6);

$node = rotate($head);

while ($node) {
    echo $node->val . PHP_EOL;
    $node = $node->next;
}

function rotate($head) {
    if (!$head || !$head->next) {
        return  $head;
    }

    $prev = $last = $slow = $fast = $head;

    while ($fast && $fast->next) {
        $prev = $slow;
        $last = $fast->next;
        $slow = $slow->next;
        $fast = $fast->next->next;
    }

    if (!$fast) {
        $prev->next = $fast;
        $last->next = $head;
    } else {
        $prev->next = $fast->next;
        $fast->next = $head;
    }


    return $slow;
}