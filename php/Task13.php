<?php

for ($i = 5; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "\n";
}

for ($i = 1; $i <= 4; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $j;
    }
    echo "\n";
}

$letters = ["A", "B", "C", "D"];

for ($i = 0; $i < count($letters); $i++) {
    for ($j = 0; $j <= $i; $j++) {
        echo $letters[$i] . " ";
    }
    echo "\n";
}

?>