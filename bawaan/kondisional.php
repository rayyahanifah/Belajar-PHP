<?php

$suhu = 35.00;
if ($suhu > 38){
    echo 'kamu perlu istirahat';
} elseif ($suhu == 38){
    echo 'kamu tidak boleh masuk';
} else {
    echo 'kamu boleh masuk';
}