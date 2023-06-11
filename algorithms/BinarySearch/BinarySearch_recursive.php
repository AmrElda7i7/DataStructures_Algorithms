<?php
$arr = [1,2,3,5,7,8,9] ;
$size = sizeof($arr) ;
echo BinarySearch($arr,11,0,$size) ;


function BinarySearch($list, $element, $start, $end)
{
    if ($start >= $end)
    {

        return -1;
    }
    $middle = floor(($start + $end) / 2);
    if ($list[$middle] == $element) {
        return $middle;
    }
    elseif($element>$list[$middle])
    {
        return BinarySearch($list ,$element,$middle+1 ,$end) ;

    }else 
    {
        return BinarySearch($list ,$element,$start,$middle-1) ;
    }

}