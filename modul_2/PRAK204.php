<?php
$hasil = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nilai = (integer)$_POST["nilai"];

    if ($nilai == 0) {
        $hasil = "Nol";
    }else if($nilai < 10) {
        $hasil = "Satuan";

    }else if($nilai < 20 and $nilai != 10){
        $hasil = "Belasan";
    }
    else if($nilai < 100){
        $hasil = "Puluhan";
    }else if($nilai < 1000){
        $hasil = "Ratusan";
    }
    else{
        $hasil = "Anda Menginput Melebih Limit Bilangan";
    }
}

?>

<html>
    <head>
        <title>Soal 4 Modul 2</title>
    </head>
    <body>
        <form method="post">
            Nilai: <input type="text" name="nilai"> <br>
            <input type="submit" value="Konversi">
        </form>
        <h2>Hasil : <?php echo $hasil?></h2>
    </body>
</html>