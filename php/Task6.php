<?php

$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$search = 3;

if(in_array($search, $numbers)) {
    echo $search . " is found in the array.\n";
} else {
    echo $search . " is not found in the array.\n";
}

?>