<?php

$multiply = function($multiplier)
{
    $multiplier *= 2;
    return function($x) use ($multiplier)
    {
        echo $multiplier;
        return $x * $multiplier;
    };
};
 
// $mul5 now contains a function that returns a number multiplied by 5
$mult5 = $multiply(5);
 
// $mul7 contains a function that returns a number multiplied by 7
$mult7 = $multiply(7);
 
echo $mult5(5)."<br>";
echo $mult7(5);