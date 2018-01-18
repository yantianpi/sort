<?php
/**
 * Created by PhpStorm.
 * User: peteryan
 * Date: 2018/1/18
 * Time: 14:48
 */
include_once("./Common.php");
$arr = [2,4,100,78,89,50,40,29,100];
var_dump('sort before', $arr);
radixSort($arr);
var_dump('sort after', $arr);

/**
 * 基排序，按位运用多次桶排序，从低位到高位，导到有序数列
 * 首先根据个位，走访数值，将元素分配到0-9号桶中，同一位相同元素入同一个桶，桶内相对顺序保持原序列相对顺序
 * 经过一次桶排序，将桶中数据重新串接起来，覆盖原序列
 * 进入下一位桶排序，直到完成最高位桶排序
 *
 * 本例子未方便确认比较位，规定待排序序列元素值为正整数，本排序主要是提供一些思想，可根据具体情况进行扩展
 */

/**
 * 入口
 *
 * @param $arr
 * @param $length
 */
function radixSort(&$arr) {
    $maxNumber = max($arr);
    $digit = getDigit($maxNumber);
    for ($i = 1; $i <= $digit; $i++) {
        bucket($arr, $i);
    }
}

/**
 * 获取给定值的位数
 *
 * @param $number
 * @return int
 */
function getDigit($number) {
    $tmpDigit = 1;
    while (true) {
        $number = floor($number/10);
        if ($number > 0) {
            $tmpDigit++;
        } else {
            break;
        }
    }
    return $tmpDigit;
}

/**
 * 按位桶排序（原始桶排序变型）
 *
 * @param $arr
 * @param $index
 */
function bucket(&$arr, $index) {
    $bucketArray = array();
    foreach ($arr as $number) {
        $tmpNumber = floor($number/pow(10, $index - 1))%10;
        $bucketArray[$tmpNumber][] = $number;
    }
    $tmpArray = array();
    for ($i = 0; $i <= 9; $i++) {
        if (isset($bucketArray[$i])) {
            foreach ($bucketArray[$i] as $item) {
                $tmpArray[] = $item;
            }
        }
    }
    $arr = $tmpArray;
}