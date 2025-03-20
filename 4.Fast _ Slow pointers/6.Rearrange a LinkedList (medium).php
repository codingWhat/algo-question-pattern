<?php
/*
Rearrange a LinkedList (medium) #
Given the head of a Singly LinkedList, write a method to modify the LinkedList such that the nodes from the second half of the LinkedList are inserted alternately to the nodes from the first half in reverse order. So if the LinkedList has nodes 1 -> 2 -> 3 -> 4 -> 5 -> 6 -> null, your method should return 1 -> 6 -> 2 -> 5 -> 3 -> 4 -> null.

Your algorithm should not use any extra space and the input LinkedList should be modified in-place.

Example 1:

Input: 2 -> 4 -> 6 -> 8 -> 10 -> 12 -> null

2->4->6
12->10->8
2->12->4->10->6->8
Output: 2 -> 12 -> 4 -> 10 -> 6 -> 8 -> null

Example 2:
Input: 2 -> 4 -> 6 -> 8 -> 10 -> null
Output: 2 -> 10 -> 4 -> 8 -> 6 -> null
 */

class Node {
    public  $val;
    public  $next;

    public function __construct($val)
    {
        $this->val = $val;
    }
}
//$head = new Node(2);
//$head->next = new Node(4);
//$head->next->next = new Node(6);
//$head->next->next->next = new Node(8);
//$head->next->next->next->next = new Node(10);
//$head->next->next->next->next->next = new Node(12);
//
//reorder($head);
//

$head = new Node(2);
$head->next = new Node(4);
$head->next->next = new Node(6);
$head->next->next->next = new Node(8);
$head->next->next->next->next = new Node(10);
reorder($head);

while ($head) {
    var_dump($head->val);
    $head = $head->next;
}


function reorder($node) {

    $slow = $node;
    $fast = $node;

    while ($fast && $fast->next) {
        $slow = $slow->next;
        $fast = $fast->next->next;
    }

    $head = reverse($slow);
    $cur = $node;

/*
 2->4->6
12->10->8

2->12->4

4->10->4

2->12->4
2->12->4->10->6->8
 */
    while ($cur->next && $head->next) {
        echo "cur:{$cur->val}, head:{$head->val}" . PHP_EOL;
        $nC = $cur->next;
        $nH = $head->next;

        $cur->next = $head;
        $head->next = $nC;
        $cur = $nC;
        $head = $nH;
    }

    return $node;
}

function reverse($node) {

    $prev = null;
    $cur = $node;
    while ($cur) {
        $next = $cur->next;
        $cur->next = $prev; //更新next节点
        $prev = $cur; //更新prev节点
        $cur =  $next; // 更新cur节点
    }

    return $prev;
}