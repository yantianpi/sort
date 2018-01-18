<?php
/**
 * Created by PhpStorm.
 * User: peteryan
 * Date: 2018/1/17
 * Time: 17:20
 */
include_once("./Common.php");
$arr = [2,4,100,78,89,59,40,29,100];
$length = count($arr);
var_dump('sort before', $arr);
heapSort($arr, $length);
var_dump('sort after', $arr);


/**
 * 堆排序，首先建立一个最大堆（最大堆特点，父亲节点的值大于左右孩子(如果存在孩子)的值）
 * 假设下标从0开始，则节点i的左孩子节点的索引为2 * i + 1,右孩子节点的索引为2 * i + 2
 * 构造好最大堆之后，根节点0上的元素为堆中最大的值
 * 循环length - 1次，交换根节点0与堆末尾元素的值，将堆的长度减1，保持堆的特性，即得到有序数组
 */

/**
 * 入口
 *
 * @param $arr
 * @param $length
 */
function heapSort(&$arr, $length) {
    buildHeap($arr, $length);
    for ($i = $length; $i > 1; $i--) { // length - 1次
        Common::swap($arr[0], $arr[$length - 1]);
        $length--;
        keepHeap($arr, $length, 0);
    }
}

/**
 * 建堆
 *
 * @param $arr
 * @param $length
 */
function buildHeap(&$arr, $length) {
    $root = floor($length/2) - 1; // 堆中最后的父亲节点索引
    for (; $root >= 0; $root--) {
        keepHeap($arr, $length, $root);
    }
}

/**
 * 保持堆特性
 *
 * @param $arr
 * @param $length
 * @param $k
 */
function keepHeap(&$arr, $length, $k) {
    $lChild = 2 * $k + 1;
    $rChild = 2 * $k + 2;
    $max = $k;
    if ($lChild < $length && Common::compare($arr[$lChild], $arr[$max]) > 0) {
        $max = $lChild;
    }
    if ($rChild < $length && Common::compare($arr[$rChild], $arr[$max]) > 0) {
        $max = $rChild;
    }
    if ($max != $k) { // 交换父亲与孩子节点的值，对于父亲节点来说构造成了一个最大堆，但有可能破坏已孩子为根的堆
        Common::swap($arr[$max], $arr[$k]);
        keepHeap($arr, $length, $max);
    }
}
