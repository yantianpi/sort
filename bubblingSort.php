<?php
/**
 * Created by PhpStorm.
 * User: peteryan
 * Date: 2018/1/12
 * Time: 16:19
 */
include_once("./Common.php");
$arr = [2,4,100,78,89,50,40,29,100];
$length = count($arr);
var_dump('sort before', $arr);
bubblingSort($arr, $length);
var_dump('sort after', $arr);

/**
 * 冒泡排序，通过对无序区中的相邻记录关键词进行比较和交换位置，使关键词中最小或最大的记录如气泡一样逐渐漂浮直到水面，
 * 经过一趟排序后，无序区内关键词最小或最大的记录会到达最上端，使得有序区记录增加1，无序区记录减1
 * 最多经过n-1次就可以使序列有序
 *
 * @param $arr
 * @param $length
 */
function bubblingSort(&$arr, $length) {
    echo 'bubbling sort';
    for ($i = 0; $i < $length - 1; $i++) { // n-1次
        for ($j = 0; $j < $length - $i - 1; $j++) { // 对无序区进行冒泡
            if (Common::compare($arr[$j], $arr[$j + 1]) > 0) {
                $tmp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $tmp;
            }
        }
    }
}