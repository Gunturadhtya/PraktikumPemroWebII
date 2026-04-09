<?php

$smartphone = [
    "s22" => "Samsung Galaxy S22", 
    "s22+" => "Samsung Galaxy S22+", 
    "a03" => "Samsung Galaxy A03", 
    "xc5" => "Samsung Galaxy Xcover 5"
    ];

$key = ["s22", "s22+", "a03", "xc5"];

?>

<html>
    <head>
        <title>Soal 5 Modul 1</title>
        <style>
            th {
                padding: 10px 0px 10px 0px;
                font-size: 24px;
                background-color: red;
            }

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
            <?php for ($i = 0; $i < count($key); $i++) : ?>
                <tr>
                    <td>
                        <?php echo $smartphone[$key[$i]] ?>
                    </td>
                </tr>
            <?php endfor; ?>
        </table>
    </body>
</html>