<?php 
$list=[7,81,8,21,21.23,14,1] ;
print_r(BubbleSort($list)) ;
print_r(BubbleSortOptimized($list)) ;

// not optimized
function BubbleSort($list)
{
    for($i=0;$i<sizeof($list);$i++)
    {
        for($j=0;$j<sizeof($list)-1 ;$j++) 
        {
            if($list[$j]>$list[$j+1] )
            {
                $swapped = $list[$j+1] ;
                $list[$j+1] =$list[$j] ;
                $list[$j] = $swapped ;
            }
        }
    }
    return $list ;
}

function BubbleSortOptimized($list)
{
    for($i=sizeof($list);$i>0;$i--)
    {
        $IsSwapped= false ;
        for($j=0;$j<$i-1 ;$j++) 
        {
            if($list[$j]>$list[$j+1] )
            {
                $temp = $list[$j+1] ;
                $list[$j+1] =$list[$j] ;
                $list[$j] = $temp ;
                $IsSwapped = true ;
            }
        }
        if($IsSwapped==false) break ;

    }
    return $list ;
}   