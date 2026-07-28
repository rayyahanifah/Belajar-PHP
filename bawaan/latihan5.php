<?php


$buah = ["Tomat", "Jeruk", "Apel"];

for ($i = 0; $i < count($buah); $i++) {
    echo $buah[$i] . "<br>";
}

foreach ($buah as $b) {
    echo $b . "<br>";
}
