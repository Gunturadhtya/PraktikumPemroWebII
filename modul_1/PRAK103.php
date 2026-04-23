<?php

$celsius = 37.841;

$fahreinheit = round(($celsius * (9/5)) + 32, 4);

$reamur = round($celsius * 4/5, 4);

$kelvin = round($celsius + 273.15, 4);

?>

<html>
    <head>
        <title>Soal 3 Modul 1</title>
    </head>
    <body>
        <p>
            Fahrenheit (F) = <?php echo $fahreinheit?><br/>
            Reamur (R) = <?php echo $reamur?><br/>
            Kelvin (K) = <?php echo $kelvin?><br/>
        </p>
    </body>
</html>