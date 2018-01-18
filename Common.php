<?php
/**
 * Created by PhpStorm.
 * User: peteryan
 * Date: 2018/1/12
 * Time: 11:26
 */

 class Common {

     /**
      * 比较两个数的大小
      *
      * @param $argOne
      * @param $argTwo
      * @return int 大于返回1，等于返回0，小于返回-1
      */
     public static function compare($argOne, $argTwo) {
         if ($argOne > $argTwo) {
             return 1;
         } elseif ($argOne < $argTwo) {
             return -1;
         } else {
             return 0;
         }
     }

     /**
      * 交换元素的值
      *
      * @param $one
      * @param $two
      */
     public static function swap(&$one, &$two) {
         $tmp = $one;
         $one = $two;
         $two = $tmp;
     }
 }