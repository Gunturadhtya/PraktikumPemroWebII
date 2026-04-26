<?php

$fields = [
    "nama"  => "Nama", 
    "nim" => "NIM", 
    "gender" => "Jenis Kelamin"
];

$no_empty = true;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    foreach ($fields as $key => $label) {
        $input = trim($_POST[$key]);
        
        if (empty($input)) {
            $errors[$key] = "$label tidak boleh kosong";
            $no_empty = false;
        } else {
            $values[$key] = $input;
        }
    }
}

?>

<html>
    <head>
        <title>Soal 2 Modul 2</title>
        <style>
            span{
                color: #DC143C;
            }
        </style>
    </head>
    <body>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Nama: <input type="text" name="nama">
            <span class="error">* <?php echo $errors["nama"];?></span><br>

            NIM: <input type="text" name="nim">
            <span class="error">* <?php echo $errors["nim"];?></span><br>

            Jenis Kelamin: <span class="error">* <?php echo $errors["gender"];?></span><br>
            <input type="radio" name="gender" value="Laki-Laki">
            <label for="html">Laki-Laki</label><br>
            <input type="radio" name="gender" value="Perempuan">
            <label for="css">Perempuan</label><br>

            <input type="submit">
        </form>
        <h2>Output: </h2>
        <p>
            <?php
            if ($no_empty) {
                echo $values["nama"] . "<br>"; 
                echo $values["nim"] . "<br>"; 
                echo $values["gender"] . "<br>"; 
            }
            ?>
        </p>
    </body>
</html>