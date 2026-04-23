<?php

$nama = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input1 = $_POST["name1"];
    $input2 = $_POST["name2"];
    $input3 = $_POST["name3"];

    $nama = [$input1, $input2, $input3];

    sort($nama);
}

sort($nama);

?>

<html>
    <head>
        <title>Soal 1 Modul 2</title>
    </head>
    <body>
        <form action="soal-1.php" method="post">
            Name: 1 <input type="text" name="name1"><br>
            Name: 2 <input type="text" name="name2"><br>
            Name: 3 <input type="text" name="name3"><br>
            <input type="submit" value="Urutkan">
        </form>
        <p>
            <?php for ($i = 0; $i < count($nama); $i++) :
                echo $nama[$i] . "<br>";
            endfor; ?>
        </p>
    </body>
</html>