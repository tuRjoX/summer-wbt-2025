<?php

$number1 = 10;
$number2 = 20;
$number3 = 5;

if($number1 >= $number2 && $number1 >= $number3){
    $largest = $number1;
} elseif($number2 >= $number1 && $number2 >= $number3){
    $largest = $number2;
} else {
    $largest = $number3;
}
echo "The largest number is: " . $largest . "\n";
?>