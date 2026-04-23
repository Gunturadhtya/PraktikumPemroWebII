<?php

$smartphone = ["Samsung Galaxy S22", "Samsung Galaxy S22+", "Samsung Galaxy A03", "Samsung Galaxy Xcover 5"];

?>

<html>
    <head>
        <title>Soal 4 Modul 1</title>
        <style>
            table, th, td {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <th><b>Daftar Smartphone Samsung</b></th>
            </tr>
            <?php for ($i = 0; $i < count($smartphone); $i++) : ?>
                <tr>
                    <td>
                        <?php echo $smartphone[$i] ?>
                    </td>
                </tr>
            <?php endfor; ?>
        </table>
    </body>
</html>