<?php   
print_r(MergeSort([15,5,5,5,0,2,34,44]));

function MergeSort($list) 
{
    if(count($list)<=1) return $list ;
    $middle= floor((0+count($list))/2 ) ;
    $rightList= MergeSort(array_slice($list ,0 ,$middle)) ;
    $leftList= MergeSort(array_slice($list , $middle)) ;
    return Merge($rightList,$leftList) ;

}



function Merge($list1, $list2)
{
    $mergedList = [];
    $i = 0;
    $j = 0;
    while ($i < count($list1) && $j < count($list2)) {
        if ($list1[$i] < $list2[$j]) {
            // array_push($mergedList, $list1[$i]);
            $mergedList[] =$list1[$i] ;
            $i++;
        } else {
            // array_push($mergedList, $list2[$j]);
            $mergedList[] =$list2[$j] ;
            $j++;
        }
    }
    while ($i < count($list1)) {
        // array_push($mergedList, $list1[$i]);
        $mergedList[] =$list1[$i] ;
        $i++;
    }
    
    while ($j < count($list2)) {
        // array_push($mergedList, $list2[$j]);
        $mergedList[] =$list2[$j] ;
        $j++;
    }
    return $mergedList;
}
