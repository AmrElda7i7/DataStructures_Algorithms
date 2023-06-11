<?php


print(BinarySearch([1,2,4,5,7,10,12,34],2323)) ;

function BinarySearch($list, $element)
{
    $start = 0;
    $end = sizeof($list) - 1;   
    $middle = floor(($start + $end) / 2);
    while ($list[$middle] != $element && $start <= $end) {
        if ($element > $list[$middle]) {
            $start = $middle + 1;
        }else 
        {
            
            $end = $middle - 1;
        }
        $middle = floor(($start + $end) / 2);
    }
    if($list[$middle]==$element)
    {
        return $middle ;
    }
    return -1 ;
}
//الحب الاسري لول