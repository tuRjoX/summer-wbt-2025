<?php
for ($i = 1; $i <= 50; $i++) {
    $isPrime = true;
    for ($j = 2; $j <= sqrt($i); $j++) {
        if ($i % $j == 0) {
            $isPrime = false;
            break;
        }
    }
    if ($isPrime && $i > 1) {
        echo "Prime Number: " . $i . "\n";
    }
}
?>