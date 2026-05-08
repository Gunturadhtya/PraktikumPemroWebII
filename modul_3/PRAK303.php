<?php

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $upper = $_GET["upper"];
    $bottom = $_GET["bottom"];
}

?>

<html>
    <head>
        <title>Soal 3 Modul 3</title>
    </head>
    <body>
        <form method="get">
            Batas Bawah : <input type="text" name="bottom"> <br>
            Batas Atas : <input type="text" name="upper"> <br>
            <input type="submit" value="Cetak">
        </form>
        <?php for ($i = $bottom; $i <= $upper; $i++) {
                if(($i + 7) % 5 == 0){
                    echo "<img width=\"16\" height=\"16\" src=\"../media/star-images.png\"/>" . " ";
                }else{
                    echo $i . " ";
                }
            } ?>
    </body>
</html>