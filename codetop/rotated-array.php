<?php
// 33. Search in Rotated Sorted Array
// 81. Search in Rotated Sorted Array II
// 153. Find Minimum in Rotated Sorted Array
// 154. Find Minimum in Rotated Sorted Array II

//解题说明
//33和81是在部分有序数组中找特定的值(搜索区间[left, right])，需要确定一个有序区间，然后在区间中判断target是否在所在区间
//81的不同点在于有重复的值时，需要右移空间，减少搜索区间

//153和154是找部分有序数组中找最小的值(搜索区间(left, right))，最小的值有个特点就是，如果mid的值大于right的值，那么最小值就在右区间,
//反之就在左区间
//154的不同点就在于有重复元素，处理方式和81一样，缩小右边界，减少搜索区间


