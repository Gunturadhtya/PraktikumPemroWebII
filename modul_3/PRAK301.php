<?php

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $jumlah = $_GET["jumlah"];
}

?>

<html>
    <head>
        <title>Soal 1 Modul 3</title>
        <style>
            .green{
                font-size: 2rem;
                margin: 0 0 0 0;
                color:green;
            }

            .red{
                font-size: 2rem;
                margin: 0 0 0 0;
                color:red;
            }
        </style>
    </head>
    <body>
        <form method="get">
            Jumlah Peserta: <input type="text" name="jumlah"> <br>
            <input type="submit" value="Cetak">
        </form>
        <b>
        <?php for ($i = 1; $i <= $jumlah; $i++) :
                if($i%2 == 0) echo "<p class=\"green\">";
                else echo "<p class=\"red\">";
                echo "Peserta ke-" . $i . "</p><br/>";
            
            endfor ?>
        </b>
    </body>
</html>