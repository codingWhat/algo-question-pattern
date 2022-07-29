<?php

//翻转链表

//pseudocode

/*
$prev = null;
while ($cur) {
    $next = $cur->next;
    $cur->next = $prev;
    $prev = $cur;
    $cur = $next;
}
 */


/*
   function reverse($node) {
     if ($node->next == null) {
            return $node;
        }
        $last = reverse($node->next);
        $node->next->next = $node;
        $node->next = null;

        return $last;
  }
 */