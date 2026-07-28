<?php
if (isset($_GET['password'])) {
    echo htmlspecialchars($_GET['password'], ENT_QUOTES, 'UTF-8');
}

if (isset($_POST['submit'])) {
    echo htmlspecialchars(  $_POST['password'], ENT_QUOTES, 'UTF-8');
}

?>

<form action="getdanpost.php" method="GET">
    <input type="text" name="nama" placeholder="nama">
    <input type="text" name="password" placeholder="password">
    <input type="submit" value="kirim">
</form>

<form action="getdanpost.php" method="POST">
    <input type="text" name="nama" placeholder="nama">
    <input type="text" name="password" placeholder="password">
    <input type="submit" name="submit" value="kirim">
</form>