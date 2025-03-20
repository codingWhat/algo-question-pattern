<?php

/*
Problem Statement #
Given the head of a Singly LinkedList, write a function to determine if the LinkedList has a cycle in it or not.

 Example:
 head
 Following LinkedList has a cycle:
 Following LinkedList doesn't have a cycle:
  2
  4
  6
  8
  10
  null
  1
  2
  3
  4
  5
  6
 head
Try it yourself #
Try solving this question here:
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

var_dump(hasCycle($head));

$head->next->next->next->next->next->next = $head->next->next;
var_dump(hasCycle($head));
//
$head->next->next->next->next->next->next = $head->next->next->next;
var_dump(hasCycle($head));

function hasCycle($node) {
    $slow = $node;
    $fast = $node;
    while ($fast && $fast->next) {
        $slow = $slow->next;
        $fast = $fast->next->next;
        if ($slow == $fast) {
            return true;
        }
    }

    return false;
}

//变种，求环的长度，slow和fast相遇时，记录slow, 继续遍历，下次再遇到slow时，即可得出环长度