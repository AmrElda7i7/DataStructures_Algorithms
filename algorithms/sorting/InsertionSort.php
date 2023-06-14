<?php
$list= [80,90,60,30,70,50,40]  ;
print_r(InsertionSort($list)) ;



function InsertionSort($list)
{
    for ($i = 1; $i < count($list); $i++) {
        $current = $list[$i];
        for ($j = $i - 1; $j > -1 && $current < $list[$j]; $j--) {
            $list[$j+1] = $list[$j ] ; 
        }
        $list[$j+1] =$current ;
    }
    return $list ;
    // 

}