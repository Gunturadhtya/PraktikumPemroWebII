<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nilai = $_POST["nilai"];
    $dari = $_POST["dari"];
    $ke = $_POST["ke"];

    $nilai = (float)$nilai;

    $celsius = match ($dari) {
        'Fahrenheit' => ($nilai - 32) * 5/9,
        'Rheamur' => $nilai * 5/4,
        'Kelvin' => $nilai - 273.15,
        default => $nilai
    };

    $konversi = match ($ke) {
        'Fahrenheit' => ($celsius * 9/5) + 32,
        'Rheamur' => $celsius * 4/5,
        'Kelvin' => $celsius + 273.15,
        default => $celsius
    };
}


?>

<html>
    <head>
        <title>Soal 3 Modul 2</title>
    </head>
    <body>
        <form method="post">
            Nilai: <input type="text" name="nilai"> <br>

            Dari: <br>
            <input type="radio" name="dari" value="Celcius">
            <label for="html">Celcius</label><br>
            <input type="radio" name="dari" value="Fahrenheit">
            <label for="css">Fahrenheit</label><br>
            <input type="radio" name="dari" value="Rheamur">
            <label for="css">Rheamur</label><br>
            <input type="radio" name="dari" value="Kelvin">
            <label for="css">Kelvin</label><br>

            Ke: <br>
            <input type="radio" name="ke" value="Celcius">
            <label for="html">Celcius</label><br>
            <input type="radio" name="ke" value="Fahrenheit">
            <label for="css">Fahrenheit</label><br>
            <input type="radio" name="ke" value="Rheamur">
            <label for="css">Rheamur</label><br>
            <input type="radio" name="ke" value="Kelvin">
            <label for="css">Kelvin</label><br>

            <input type="submit" value="Konversi">
        </form>
        <h2>Hasil Konversi: <?php echo $konversi?></h2>
    </body>
</html>