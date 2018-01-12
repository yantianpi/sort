<?php
/**
 * Created by PhpStorm.
 * User: peteryan
 * Date: 2018/1/11
 * Time: 15:37
 */
include_once("./Common.php");
$arr = [2,4,100,78,89,50,40,29,100];
$length = count($arr);
var_dump('sort before', $arr);
sort($arr, $length);
var_dump('sort after', $arr);

/**
 * 插入排序，对于长度为length的待排序序列，
 * 假设序列的开始索引为1，分为两个部分，1-i为有序序列，（i+1）-length不清楚，
 * 插入排序进行length-1次排序就能使整个序列有序，每次插入排序将未排序的序列中的某个元素加入到已经排好序的序列正确位置处，使得有序序列长度加1
 *
 * @param $arr
 * @param $length
 */
function insertSort(&$arr, $length) {
    for ($i = 1; $i < $length; $i++) {
        $j = $i - 1; // 已经有序的末尾元素索引
        $tmp = $arr[$i]; // 待插入元素值
        while ($j >= 0) {
            if (Common::compare($tmp, $arr[$j]) >= 0) {
                break;
            } else {
                $arr[$j + 1] = $arr[$j];
                $j--;
            }
        }
        $arr[$j + 1] = $tmp;
    }
}