<?php
    $dataMahasiswa = [
        '2101001' => [
            'Nama' => 'Andi',
            'Nilai UTS' => 87,
            'Nilai UAS' => 65
        ],
        '2101002' => [
            'Nama' => 'Budi',
            'Nilai UTS' => 76,
            'Nilai UAS' => 79
        ],
        '2101003' => [
            'Nama' => 'Tono',
            'Nilai UTS' => 50,
            'Nilai UAS' => 41
        ],
        '2101004' => [
            'Nama' => 'Jessica',
            'Nilai UTS' => 60,
            'Nilai UAS' => 75
        ]
    ];

    foreach ($dataMahasiswa as $nim => $mahasiswa) {
        $nilaiAkhir = ($mahasiswa['Nilai UTS'] * 0.4) + ($mahasiswa['Nilai UAS'] * 0.6);
        $dataMahasiswa[$nim]['Nilai Akhir'] = $nilaiAkhir;

        if ($nilaiAkhir >= 80) {
            $huruf = 'A';
        } elseif ($nilaiAkhir >= 70) {
            $huruf = 'B';
        } elseif ($nilaiAkhir >= 60) {
            $huruf = 'C';
        } elseif ($nilaiAkhir >= 50) {
            $huruf = 'D';
        } else {
            $huruf = 'E';
        }
        $dataMahasiswa[$nim]['Huruf'] = $huruf;
    }
?>

<html>
    <head>
        <title>Soal 2 Modul 4</title>
    </head>
    <body>
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Nilai UTS</th>
                    <th>Nilai UAS</th>
                    <th>Nilai Akhir</th>
                    <th>Huruf</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataMahasiswa as $nim => $mahasiswa): ?>
                    <tr>
                        <td><?php echo $mahasiswa['Nama']; ?></td>
                        <td><?php echo $nim; ?></td>
                        <td><?php echo $mahasiswa['Nilai UTS']; ?></td>
                        <td><?php echo $mahasiswa['Nilai UAS']; ?></td>
                        <td><?php echo $mahasiswa['Nilai Akhir']; ?></td>
                        <td><?php echo $mahasiswa['Huruf']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>