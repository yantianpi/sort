<?php
/**
 * Created by PhpStorm.
 * User: peteryan
 * Date: 2018/1/15
 * Time: 14:21
 */
include_once("./Common.php");
$arr = [2,4,100,78,89,50,40,29,100];
$length = count($arr);
var_dump('sort before', $arr);
mergeSort($arr, $length);
var_dump('sort after', $arr);


/**
 * 归并排序，实质就是将两个有序数据数列合并成一个有序数据数列的过程
 * 以升序方式为例，比较两个有序数列开始位置数据，把较小的值放到新数组中，
 * 较小值序列开始索引后移一位，进入下一次比较
 * 当某个有序数列数据全都放到新数组之后，结束循环
 * 将另外有序数列剩余数据放到新数组中
 */

/**
 * 排序入口
 *
 * @param $arr
 * @param $length
 */
function mergeSort(&$arr, $length) {
    mSort($arr, 0, $length - 1);
}

/**
 * 指定索引区间进行排序
 *
 * @param $arr
 * @param $lStart
 * @param $rEnd
 */
function mSort(&$arr, $lStart, $rEnd) {
    if ($lStart < $rEnd) {
        $middle = ceil(($lStart + $rEnd)/2);
        mSort($arr, $lStart, $middle - 1);
        mSort($arr, $middle, $rEnd);
        merge($arr, $lStart, $middle, $rEnd); // 归并
    }
}

/**
 * 归并，数组一索引lstart到rstart-1的数据
 * 数组二索引rstart到rend的数据
 * 两个数据归并到临时数组tmparray，再回写到arr数组
 *
 * @param $arr
 * @param $lstart
 * @param $rStart
 * @param $rEnd
 */
function merge(&$arr, $lstart, $rStart, $rEnd) {
    $tmpArray = array();
    $elementCount = $rEnd - $lstart + 1;
    $lEnd = $rStart - 1;
    $elementIndex = $lstart;
    while (($lstart <= $lEnd) && ($rStart <= $rEnd)) {
        if (Common::compare($arr[$lstart], $arr[$rStart]) > 0) {
            $tmpArray[$elementIndex] = $arr[$rStart];
            $rStart++;
            $elementIndex++;
        } else {
            $tmpArray[$elementIndex] = $arr[$lstart];
            $lstart++;
            $elementIndex++;
        }
    }
    while ($lstart <= $lEnd) {
        $tmpArray[$elementIndex] = $arr[$lstart];
        $elementIndex++;
        $lstart++;
    }
    while ($rStart <= $rEnd) {
        $tmpArray[$elementIndex] = $arr[$rStart];
        $elementIndex++;
        $rStart++;
    }

    // 回写
    for ($i = 0; $i < $elementCount; $i++, $rEnd--) {
        $arr[$rEnd] = $tmpArray[$rEnd];
    }
}