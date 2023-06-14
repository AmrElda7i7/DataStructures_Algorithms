<?php
$array=[3,33,1,32,45,68,77] ;
print_r(SelectionSort($array)) ;



function SelectionSort($array)
{
    for ($i = 0; $i < count($array); $i++) {
        $min = $i;
        for ($j = $i + 1; $j < count($array); $j++) {
            if ($array[$j] < $array[$min]) {
                $min = $j;
            }
        }

        if ($min != $i) {
            $temp = $array[$min];
            $array[$min] = $array[$i];
            $array[$i] = $temp;
        }
    }

    return $array;
}
