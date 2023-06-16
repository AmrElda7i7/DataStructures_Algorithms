<?php
$arr = [5, 6, 7, 8,2, 3, 1, 4 ];
print_r(QuickSort($arr ,0,count($arr)-1));

function QuickSort(&$array, $left, $right )
{
    
    if ($left < $right) {
        $pivotIndex = partition($array, $left, $right);
        QuickSort($array, $left, $pivotIndex - 1);
        QuickSort($array, $pivotIndex + 1, $right);
    }
    return $array;
}

function partition(&$array, $low, $high)
{
    $pivot = $array[$high]; // Choose the pivot element (in this case, the element at the end)

    // Index of the smaller element
    $smallerIndex = $low;

    for ($i = $low; $i < $high; $i++) {
        if ($array[$i] <= $pivot) {
            swap($array, $smallerIndex, $i);
            $smallerIndex++;
        }
    }

    swap($array, $smallerIndex, $high);

    return $smallerIndex;
}

function swap(&$array, $i, $j)
{
    $temp = $array[$i];
    $array[$i] = $array[$j];
    $array[$j] = $temp;
}