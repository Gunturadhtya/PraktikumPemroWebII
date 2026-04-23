<?php

$jari = 4.2;
$tinggi = 5.4;
$panjang = 8.9;
$lebar = 14.7;
$sisi = 7.9;

$volumeKerucut =  round(1/3 * 3.14 * $jari * $jari * $tinggi, 3);

?>


<html>
    <head>
        <title>Soal 2 Modul 1</title>
    </head>
    <body>
        <p>Volume Kerucut : <?php echo $volumeKerucut ?> m3</p>
    </body>
</html>