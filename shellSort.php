<?php
/**
 * Created by PhpStorm.
 * User: peteryan
 * Date: 2018/1/12
 * Time: 11:26
 */
include_once("./Common.php");
$arr = [2,4,100,78,89,50,40,29,100];
$length = count($arr);
var_dump('sort before', $arr);
sort($arr, $length);
var_dump('sort after', $arr);

/**
 * 希尔排序，基本思想是把待排序记录按下标的一定增量分组，每组记录使用插入排序，
 * 增量逐渐减小，每组包含的记录越来越多，到增量减为1时，整个记录合成一组，继续插入排序，构成一组有序记录
 * 排序完成
 *
 * @param $arr
 * @param $length
 */
function shellSort(&$arr, $length) {
    $increment = $length/2;
    while ($increment > 0) {
        for ($i = $increment; $i < $length; $i++) {
            $tmp = $arr[$i];
            $j = $i - $increment;
            while ($j >= 0) {
                if (Common::compare($tmp, $arr[$j]) >= 0) {
                    break;
                } else {
                    $arr[$j + $increment] = $arr[$j];
                    $j = $j - $increment;
                }
            }
            $arr[$j + $increment] = $tmp;
        }
        $increment = $increment/2;
    }
}