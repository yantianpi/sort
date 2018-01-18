<?php
/**
 * Created by PhpStorm.
 * User: peteryan
 * Date: 2018/1/16
 * Time: 13:47
 */
include_once("./Common.php");
$arr = [2,4,100,78,89,59,40,29,100];
$length = count($arr);
var_dump('sort before', $arr);
quickSort($arr, $length);
var_dump('sort after', $arr);


function quickSort(&$arr, $length) {
    qSort($arr, 0, $length - 1);
}

function qSort(&$arr, $startIndex, $endIndex) {
    if ($startIndex < $endIndex) {
        if (false && $endIndex - $startIndex + 1 <= 3) {
            selectSort($arr, $startIndex, $endIndex);
        } else {

            $pivot = median3($arr, $startIndex, $endIndex);
            $i = $startIndex;
            $j = $endIndex - 1;
            while (true) {
                while ($i < $j && Common::compare($arr[$i], $pivot) <= 0) {
                    $i++;
                }
                while ($i < $j && Common::compare($arr[$j], $pivot) >= 0) {
                    $j--;
                }
                if ($i < $j) {
                    Common::swap($arr[$i], $arr[$j]);
                } else {
                    Common::swap($arr[$i], $arr[$endIndex - 1]);
                    break;
                }
            }

//            $pivot = $arr[$startIndex];
//            $i = $startIndex;
//            $j = $endIndex;
//            while ($i < $j) {
//                while ($i < $j && Common::compare($arr[$j], $pivot) >= 0) {
//                    $j--;
//                }
//                $arr[$i] = $arr[$j];// 小的忘左边扔
//                while ($i < $j && Common::compare($arr[$i], $pivot) <= 0) {
//                    $i++;
//                }
//                $arr[$j] = $arr[$i];// 大的忘右边扔
//            }
//            $arr[$i] = $pivot;

            qSort($arr, $startIndex, $i - 1);
            qSort($arr, $i + 1, $endIndex);
        }
    }
}

/**
 *
 * @param $arr
 * @param $start
 * @param $end
 * @return mixed
 */
function median3(&$arr, $start, $end) {
    $median = floor(($start + $end)/2);
    if ($arr[$start] > $arr[$median]) {
        Common::swap($arr[$start], $arr[$end]);
    }
    if ($arr[$start] > $arr[$end]) {
        Common::swap($arr[$start], $arr[$end]);
    }
    if ($arr[$median] > $arr[$end]) {
        Common::swap($arr[$median], $arr[$end]);
    }
    Common::swap($arr[$median], $arr[$end -1]);
    return $arr[$end -1];
}

function selectSort(&$arr, $startIndex, $endIndex) {
    if ($startIndex < $endIndex) {
        for ($i = $startIndex; $i < $endIndex; $i++) {
            $k = $i;
            for ($j = $i + 1; $j <= $endIndex; $j++) {
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
}
