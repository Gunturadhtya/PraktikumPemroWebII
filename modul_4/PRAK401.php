<?php
    $error = '';
    $showTable = false;

    if (isset($_GET['panjang']) && isset($_GET['lebar']) && isset($_GET['nilai'])) {
        $panjang = (int)$_GET['panjang']; 
        $lebar = (int)$_GET['lebar']; 
        $nilai = $_GET['nilai']; 
        $data = explode(' ', trim($nilai));
        $index = 0;    

        if (count($data) != ($panjang * $lebar)) {
            $error = "Panjang nilai tidak sesuai dengan ukuran matriks";
        } else {
            $showTable = true;
        }
    }    
?>


<html>
    <head>
        <title>Soal 1 Modul 4</title>
    </head>
    <body>
        <form method="GET" action="">
            <label for="panjang">Panjang :</label>
            <input type="number" name="panjang" id="panjang" value="panjang"><br>

            <label for="lebar">Lebar :</label>
            <input type="number" name="lebar" id="lebar" value="lebar"><br>

            <label for="nilai">Nilai :</label>
            <input type="text" name="nilai" id="nilai" value="nilai"><br>

            <button type="submit">Cetak</button>
        </form>
        <br>

        <?php if ($error !== ''): 
            echo $error;
        endif; ?>

        <?php if ($showTable) :?>
            <table border="1" cellpadding="8" cellspacing="0">
                <?php for ($i = 0; $i < $panjang; $i++): ?>
                    <tr>
                        <?php for ($j = 0; $j < $lebar; $j++): ?>
                            <td>
                                <?php 
                                echo htmlspecialchars($data[$index]); 
                                $index++;
                                ?>
                            </td>
                        <?php endfor; ?>
                    </tr>
                <?php endfor; ?>
            </table>
        <?php endif; ?>
    </body>
</html>