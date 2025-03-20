<?php
/*
 Given a binary tree, connect each node with its level order successor.
 The last node of each level should point to the first node of the next level.
 */
//prev放到while外面, 后续array_shift之后，都依赖于这个prev.
