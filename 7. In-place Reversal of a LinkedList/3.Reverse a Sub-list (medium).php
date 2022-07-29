<?php
/*
 *
Reverse a Sub-list (medium)

Problem Statement #
Given the head of a LinkedList and two positions ‘p’ and ‘q’, reverse the LinkedList from position ‘p’ to ‘q’.
 */

class Node {
    public  $val;
    public  $next;

    public function __construct($val)
    {
        $this->val = $val;
    }
}


function reverseBy($node, $start, $end){
    if ($start < 1) {
        return  null;
    }

    if ($start == 1) {
        return reverseN($node, $end);
    }

    $node->next= reverseBy($node->next, $start-1, $end-1);
    return $node;
}

function reverseN($node, $num) {

    $end = $node;
    for ($i = 1; $i < $num; $i++) {
        if ($end) {
            $end = $end->next;
        }
    }


    $prev = $end ? $end->next : null ;
    $cur = $node;
    $ending = $prev;
    while ($cur != $ending) {
        $next = $cur->next;
        $cur->next = $prev;
        $prev = $cur;
        $cur  = $next;
    }

    return $prev;
}

//1->4->3->2->5
//2->5->3->4->5
//

$head = new Node(1);
$head->next = new Node(2);
$head->next->next = new Node(3);
$head->next->next->next = new Node(4);
$head->next->next->next->next = new Node(5);

reverseBy($head, 4,7);

while ($head) {
    echo $head->val . PHP_EOL;
    $head = $head->next;
}