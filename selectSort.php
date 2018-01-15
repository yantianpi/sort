<?php
/**
 * Created by PhpStorm.
 * User: peteryan
 * Date: 2018/1/15
 * Time: 18:04
 */
include_once("./Common.php");
$arr = [2,4,100,78,89,50,40,29,100];
$length = count($arr);
var_dump('sort before', $arr);
selectSort($arr, $length);
var_dump('sort after', $arr);

/**
 * 选择排序，总共进行length-1趟，每一趟从待排序的数据中选择最小(大)的一个元素，顺序放在已排好序的数列的最后，
 * 放的方式可以采用数据交换位置
 *
 * @param $arr
 * @param $length
 */
function selectSort(&$arr, $length) {
    for ($i = 0; $i < $length - 1; $i++) {
        $k = $i;
        for ($j = $i + 1; $j < $length; $j++) {
            if (Common::compare($arr[$k], $arr[$j]) > 0) {
                $k = $j;
            }
        }
        if ($k != $i) {
            $tmp = $arr[$k];
            $arr[$k] = $arr[$i];
            $arr[$i] = $tmp;
        }
    }
}