<?php

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $tinggi = $_GET["tinggi"];
    $source = $_GET["source"];
}


?>

<html>
    <head>
        <title>Soal 2 Modul 3</title>
    </head>
    <body>
        <form method="get">
            Tinggi: <input type="text" name="tinggi"> <br>
            Alamat Gambar: <input type="text" name="source"> <br>
            <input type="submit" value="Cetak">
        </form>
        <?php for ($i = 0; $i < $tinggi; $i++) {
                for($j = 0; $j < $tinggi; $j++) {
                    echo "<img width=\"32\" height=\"32\"";
                    if($j < $i) echo " src=\"" . $source . "\" style=\"opacity: 0.0\"/>"; 
                    else  echo " src=\"" . $source . "\"/>"; 
                }
                echo "</br>";
            } ?>
    </body>
</html>