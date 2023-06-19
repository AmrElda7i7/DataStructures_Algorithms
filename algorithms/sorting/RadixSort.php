<?php
print_r( radixSort([110,233232,11,323,0,1,2])) ;

function radixSort($list) 
{
    $MaxDigit = MaxDigit($list) ;
    for($k=0 ;$k<$MaxDigit ;$k++) 
    {
        $buckets=array_fill(0,10,[]) ; 
        for($i=0 ;$i<count($list) ;$i++) 
        {
            $numAtDigit = getNumAtDigit($list[$i] ,$k) ; 
            $buckets[$numAtDigit][] = $list[$i] ;
        }
        $list= array_merge(...$buckets) ;

    }
    return $list ;
}

function getNumAtDigit($num ,$digit ) 
{
    $number = floor(abs($num)/pow(10,$digit) ) %10;
    return $number ;
}
function MaxDigit($list ) 
{
    $max=0 ;
    for($i=0 ;$i<sizeof($list) ;$i++) 
    {
        $max=max($max ,countDigits( $list[$i]) ) ;
    }
    return $max ;
}
function countDigits($number) 
{
    return strlen((string)$number) ;
}