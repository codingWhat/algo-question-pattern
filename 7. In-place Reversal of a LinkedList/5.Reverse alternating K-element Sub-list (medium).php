<?php
/*
Reverse alternating K-element Sub-list (medium) #
Given the head of a LinkedList and a number ‘k’, reverse every alternating ‘k’ sized sub-list starting from the head.

If, in the end, you are left with a sub-list with less than ‘k’ elements, reverse it too.
 */

/*
 1->2->3->4->5->6->7->8
 2->1->3->4->6->5->7->8
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

//时间复杂度： O(n)
//空间复杂度: O(1)

$head = reverseAlternate($head, 2);

while ($head) {
    echo $head->val . PHP_EOL;
    $head = $head->next;
}


function reverseAlternate($head, $k){
    if (!$head) {
        return  $head;
    }
    $end = $head;
    for ($i=1; $i < $k; $i++) {
        if (!$end) {
            return $head;
        }
        $end = $end->next;
    }

    $cur = $head;
    $ending = $end ? $end->next : null;
    $prev = $ending;
    while ($cur != $ending) {
        $next = $cur->next;
        $cur->next  = $prev;
        $prev = $cur;
        $cur = $next;
    }


    $nextStart = $ending;
    for ($i = 1; $i < $k; $i++) {
         if (!$nextStart) {
            return $prev;
        }
        $nextStart = $nextStart->next;
    }

    if (!$nextStart || !$nextStart->next) {
        return  $prev;
    }


    $nextStart->next = reverseAlternate($nextStart->next, $k);

    return  $prev;
}