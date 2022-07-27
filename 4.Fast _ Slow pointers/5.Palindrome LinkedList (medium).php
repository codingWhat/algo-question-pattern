<?php
/*
 Palindrome LinkedList (medium) #
Given the head of a Singly LinkedList, write a method to check if the LinkedList is a palindrome or not.

Your algorithm should use constant space and the input LinkedList should be in the original form once the algorithm is finished. The algorithm should have O(N)O(N) time complexity where ‘N’ is the number of nodes in the LinkedList.

Example 1:
Input: 2 -> 4 -> 6 -> 4 -> 2 -> null
Output: true

Example 2:
Input: 2 -> 4 -> 6 -> 4 -> 2 -> 2 -> null
Output: false
 */
class Node {
    public  $val;
    public  $next;

    public function __construct($val)
    {
        $this->val = $val;
    }
}


$head = new Node(2);
$head->next = new Node(4);
$head->next->next = new Node(6);
$head->next->next->next = new Node(4);
$head->next->next->next->next = new Node(2);
var_dump(isPalindrome($head));

$head = new Node(2);
$head->next = new Node(4);
$head->next->next = new Node(6);
$head->next->next->next = new Node(4);
$head->next->next->next->next = new Node(2);
$head->next->next->next->next->next = new Node(2);
var_dump(isPalindrome($head));

function  isPalindrome($node) {

    $slow = $node;
    $fast = $node;

    while ($fast && $fast->next) {
        $slow  = $slow->next;
        $fast = $fast->next->next;
    }

    $f = $node;

    $head = reverse($slow);
    $s = $head;

    while ($f && $s) {
        if ($f->val != $s->val) {
            return false;
        }
        $f = $f->next;
        $s = $s->next;
    }

    reverse($head);
    if (!$f || !$s) return true;

    return  false;
}

function reverse($node) {
    $prev = null;
    $cur = $node;

    while ($cur) {
        $next = $cur->next;
        $cur->next = $prev;
        $prev = $cur;
        $cur = $next;
    }
    return $prev;
}