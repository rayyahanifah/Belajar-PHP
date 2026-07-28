<?php

$text = " ini adalah input user ";

echo "sebelum" . $text . "disini";
echo "<br>";
echo "sesudah" . trim($text) . "disini";
echo "<br>";

$text2 = "<script>haiiiiiiiiiiiiiiiiiiiiiiiiiiiiii</script>";
echo "<br>";
$text3 = "<b> Halo </b> semuanya";
echo strip_tags($text2, '<b>');
echo "<br>";
echo strip_tags($text3, '<b>');