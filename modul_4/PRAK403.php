<?php
    $dataKRS = [
        [
            'No' => 1,
            'Nama' => 'Ridho',
            'Mata Kuliah' => [
                'Pemrograman I' => 2,
                'Praktikum Pemrograman I' => 1,
                'Pengantar Lingkungan Lahan Basah' => 2,
                'Arsitektur Komputer' => 3
            ]
        ],
        [
            'No' => 2,
            'Nama' => 'Ratna',
            'Mata Kuliah' => [
                'Basis Data I' => 2,
                'Praktikum Basis Data I' => 1,
                'Kalkulus' => 3
            ]
        ],
        [
            'No' => 3,
            'Nama' => 'Tono',
            'Mata Kuliah' => [
                'Rekayasa Perangkat Lunak' => 3,
                'Analisis dan Perancangan Sistem' => 3,
                'Komputasi Awan' => 3,
                'Kecerdasan Bisnis' => 3
            ]
        ]
    ];

    foreach ($dataKRS as $index => $mahasiswa) {
        $totalSKS = 0;
        
        foreach ($mahasiswa['Mata Kuliah'] as $mataKuliah => $sks) {
            $totalSKS += $sks;
        }
        
        $dataKRS[$index]['Total SKS'] = $totalSKS;
        
        if ($totalSKS < 7) {
            $dataKRS[$index]['Keterangan'] = 'Revisi KRS';
        } else {
            $dataKRS[$index]['Keterangan'] = 'Tidak Revisi';
        }
    }
?>

<html>
    <head>
        <title>Soal 3 Modul 4</title>
    </head>
    <body>
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Mata Kuliah Diambil</th>
                    <th>SKS</th>
                    <th>Total SKS</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataKRS as $mahasiswa): ?>
                    <?php 
                        $bgColor = ($mahasiswa['Keterangan'] == 'Revisi KRS') ? 'red' : 'green';
                        $isFirstRow = true;
                    ?>
                    <?php foreach ($mahasiswa['Mata Kuliah'] as $mataKuliah => $sks): ?>
                    <tr>
                        <td valign="top"><?php echo $isFirstRow ? $mahasiswa['No'] : ''; ?></td>
                        <td valign="top"><?php echo $isFirstRow ? $mahasiswa['Nama'] : ''; ?></td>
                        <td valign="top"><?php echo $mataKuliah; ?></td>
                        <td valign="top"><?php echo $sks; ?></td>
                        <td valign="top"><?php echo $isFirstRow ? $mahasiswa['Total SKS'] : ''; ?></td>
                        <td <?php echo $isFirstRow ? 'style="background-color: ' . $bgColor . ';"' : ''; ?> valign="top">
                            <?php echo $isFirstRow ? $mahasiswa['Keterangan'] : ''; ?>
                        </td>
                    </tr>
                    <?php $isFirstRow = false;?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>