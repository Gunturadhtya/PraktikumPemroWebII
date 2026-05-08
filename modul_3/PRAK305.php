<?php

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $kata = str_split($_GET["kata"]);
}

?>

<html>
    <head>
        <title>Soal 5 Modul 3</title>
    </head>
    <body>
        <form method="get">
            <input type="text" name="kata">
            <input type="submit" value="submit">
        </form>
        <br/>
        <?php 
            for($i = 0; $i < count($kata); $i++){
                for($j = 0; $j < count($kata); $j++){
                    if($j == 0) echo strtoupper($kata[$i]);
                    else echo strtolower($kata[$i]);
                }
            }

        ?>
    </body>
</html>