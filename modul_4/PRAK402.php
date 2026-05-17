<?php
    $dataMahasiswa = [
        [
            'Nama' => 'Andi',
            'NIM' => '2101001',
            'Nilai UTS' => 87,
            'Nilai UAS' => 65
        ],
        [
            'Nama' => 'Budi',
            'NIM' => '2101002',
            'Nilai UTS' => 76,
            'Nilai UAS' => 79
        ],
        [
            'Nama' => 'Tono',
            'NIM' => '2101003',
            'Nilai UTS' => 50,
            'Nilai UAS' => 41
        ],
        [
            'Nama' => 'Jessica',
            'NIM' => '2101004',
            'Nilai UTS' => 60,
            'Nilai UAS' => 75
        ]
    ];

    foreach ($dataMahasiswa as $index => $mahasiswa) {
        $nilaiAkhir = ($mahasiswa['Nilai UTS'] * 0.4) + ($mahasiswa['Nilai UAS'] * 0.6);
        $dataMahasiswa[$index]['Nilai Akhir'] = $nilaiAkhir;

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
        $dataMahasiswa[$index]['Huruf'] = $huruf;
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
                <?php foreach ($dataMahasiswa as $mahasiswa): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($mahasiswa['Nama']); ?></td>
                        <td><?php echo htmlspecialchars($mahasiswa['NIM']); ?></td>
                        <td><?php echo htmlspecialchars($mahasiswa['Nilai UTS']); ?></td>
                        <td><?php echo htmlspecialchars($mahasiswa['Nilai UAS']); ?></td>
                        <td><?php echo htmlspecialchars($mahasiswa['Nilai Akhir']); ?></td>
                        <td><?php echo htmlspecialchars($mahasiswa['Huruf']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>