<?php
/*
 Problem Statement #
Given a binary tree, populate an array to represent its zigzag level order traversal.
You should populate the values of all nodes of the first level from left to right,
then right to left for the next level and keep alternating in the same manner for the following levels.
 */


//记录当前的level, level 以1开始，偶数层逆序(array_unshift), 奇数层 array_push

//时间复杂度和空间复杂度都是O(n)