<?php
$number1 = 5;
$number2 = 10;

[$number1, $number2] = [$number2, $number1];
echo "Swap Numbers: " . $number1 . ", " . $number2;
?>