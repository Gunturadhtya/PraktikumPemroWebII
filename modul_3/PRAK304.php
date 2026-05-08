<?php

$flag = false;

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if(isset($_GET["jumlah"])){
        $jumlah =  (int)$_GET["jumlah"];
    }else{
        $jumlah = 0;
    }

    if(isset($_GET["submit"])) $flag = true;

    if (isset($_GET["tambah"])) {
        $jumlah += 1;
        $flag = true; 
    }
    
    if (isset($_GET["kurang"]) && $jumlah > 1) {
        $jumlah -= 1;
        $flag = true;
    }
}


?>

<html>
    <head>
        <title>Soal 4 Modul 3</title>
    </head>
    <body>
        <?php if(!$flag) : ?>
        <form method="get">
            Jumlah Bintang: <input type="text" name="jumlah"> <br>
            <input type="submit" name="submit" value="Submit">
        </form>
        <?php else:?>
            <?php echo "Jumlah bintang " . $jumlah;?><br>
            <?php for ($i = 0; $i < $jumlah; $i++) : ?>
                <img width="32" height="32" src="../media/star-images.png">
            <?php endfor ?>
            <form method="get">
                <input type="hidden" name="jumlah" value="<?php echo $jumlah; ?>" />
                <input type="submit" name="tambah" value="Tambah" />
                <input type="submit" name="kurang" value="Kurang" />
            </form>
        <?php endif ?>
    </body>
</html>