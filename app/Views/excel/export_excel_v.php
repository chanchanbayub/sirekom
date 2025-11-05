<?php
header("Content-Type: application/vnd-ms-excel;");
header("Content-Disposition: attachment; filename=hasil_sirekom.xls");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Cek Kir</title>
    <link href="/assets/img/logo2.png" rel="icon">
    <link href="/assets/img/logo2.png" rel="apple-touch-icon">
</head>
<style>
    table {
        width: 100%;
        vertical-align: middle;
        font-family: Arial;
        font-size: 12px;
    }

    table,
    th,
    td {
        text-transform: uppercase;
        border: 1px solid black;
        border-collapse: collapse;
        padding: 10px;
        font-family: Arial;
        font-size: 14px;

    }

    .judul {
        font-family: Arial;
        font-size: 14px;
        text-align: center;
        text-transform: uppercase;
    }
</style>

<body>

    <div class="card-body">
        <h2>Kendaraan Yang terdaftar Di PTSP</h2>
        <table class="table" border="1">
            <thead>
                <tr>
                    <th scope="row">#</th>
                    <th scope="row">NOMOR KENDARAAN</th>
                    <th scope="row">KODE TRAYEK</th>
                    <th scope="row">MERK KENDARAAN SEBELUMNYA</th>
                    <th scope="row">MERK KENDARAAN CEK KIR</th>
                    <th scope="row">NOMOR UJI SEBELUMNYA</th>
                    <th scope="row">NOMOR UJI CEK KIR</th>
                    <th scope="row">NOMOR RANGKA SEBELUMNYA</th>
                    <th scope="row">NOMOR RANGKA CEK KIR</th>
                    <th scope="row">NOMOR MESIN SEBELUMNYA</th>
                    <th scope="row">NOMOR MESIN CEK KIR</th>
                    <th scope="row">TAHUN PEMBUATAN SEBELUMNYA</th>
                    <th scope="row">TAHUN PEMBUATAN CEK KIR</th>
                    <th scope="row">MASA BERLAKU UJI</th>
                    <th scope="row">KETERANGAN</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($terdaftar_ptsp as $kendaraan) : ?>
                    <tr>
                        <td scope="col"><?= $no++ ?></td>
                        <td scope="col"><?= $kendaraan["nomor_kendaraan"] ?></td>
                        <td scope="col"><?= $kendaraan["kode_trayek"] ?></td>
                        <td scope="col"><?= $kendaraan["merk_kendaraan_sebelumnya"] ?></td>
                        <td scope="col"><?= $kendaraan["merk_kendaraan_cek_kir"] ?></td>
                        <td scope="col"><?= $kendaraan["nomor_uji_sebelumnya"] ?></td>
                        <td scope="col"><?= $kendaraan["nomor_uji_cek_kir"] ?></td>
                        <td scope="col"><?= $kendaraan["nomor_rangka_sebelumnya"] ?></td>
                        <td scope="col"><?= $kendaraan["nomor_rangka_cek_kir"] ?></td>
                        <td scope="col"><?= $kendaraan["nomor_mesin_sebelumnya"] ?></td>
                        <td scope="col"><?= $kendaraan["nomor_mesin_cek_kir"] ?></td>
                        <td scope="col"><?= $kendaraan["tahun_pembuatan_sebelumnya"] ?></td>
                        <td scope="col"><?= $kendaraan["tahun_pembuatan_cek_kir"] ?></td>
                        <td scope="col"><?= $kendaraan["tgl_berlaku_uji"] ?></td>
                        <td>
                            <?php if ($kendaraan["perbandingan"] < $tanggal_hari_ini) : ?>
                                <span class="badge text-bg-danger">STUK / KIR Habis Masa Berlaku</span>
                            <?php else : ?>
                                <span class="badge text-bg-success">STUK / KIR Masih Berlaku</span>
                            <?php endif; ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="card-body">
        <h2>Kendaraan Yang Tidak terdaftar Di PTSP</h2>
        <table class="table" border="1">
            <thead>
                <tr>
                    <th scope="row">#</th>
                    <th scope="row">NOMOR KENDARAAN</th>
                    <th scope="row">KODE TRAYEK</th>
                    <th scope="row">MERK KENDARAAN CEK KIR</th>
                    <th scope="row">NOMOR UJI CEK KIR</th>
                    <th scope="row">NOMOR RANGKA CEK KIR</th>
                    <th scope="row">NOMOR MESIN CEK KIR</th>
                    <th scope="row">TAHUN PEMBUATAN CEK KIR</th>
                    <th scope="row">MASA BERLAKU UJI</th>
                    <th scope="row">KETERANGAN</th>
                </tr>
            </thead>
            <?php $no = 1; ?>
            <?php if (count($tidak_terdaftar_ptsp) >= 1) : ?>
                <?php foreach ($tidak_terdaftar_ptsp as $unit_kr) : ?>
                    <tr>
                        <td scope="col"><?= $no++ ?></td>
                        <td scope="col"><?= $unit_kr["nomor_kendaraan"] ?></td>
                        <td scope="col"><?= $unit_kr["kode_trayek"] ?></td>
                        <td scope="col"><?= $unit_kr["merk"] ?></td>
                        <td scope="col"><?= $unit_kr["nomor_uji_cek_kir"] ?></td>
                        <td scope="col"><?= $unit_kr["nomor_rangka_cek_kir"] ?></td>
                        <td scope="col"><?= $unit_kr["nomor_mesin_cek_kir"] ?></td>
                        <td scope="col"><?= $unit_kr["tahun_pembuatan_cek_kir"] ?></td>
                        <td scope="col"><?= $unit_kr["tgl_berlaku_uji"] ?></td>
                        <td>
                            <?php if ($unit_kr["perbandingan"] < $tanggal_hari_ini) : ?>
                                <span class="badge text-bg-danger">STUK / KIR Habis Masa Berlaku</span>
                            <?php else : ?>
                                <span class="badge text-bg-success">STUK / KIR Masih Berlaku</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td class="text-center" scope="col" colspan="10">Tidak Ada Data</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>


    <div class="card-body">
        <h2>Kendaraan Yang Masih Berlaku</h2>
        <table class="table" border="1">
            <thead>
                <tr>
                    <th scope="row">#</th>
                    <th scope="row">NOMOR KENDARAAN</th>
                    <th scope="row">MASA BERLAKU UJI</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($kendaraan_berlaku as $berlaku) : ?>
                    <tr>
                        <td scope="col"><?= $no++ ?></td>
                        <td scope="col"><?= $berlaku["nomor_kendaraan"] ?></td>
                        <td scope="col"><span class="badge text-bg-success"><?= $berlaku["tgl_berlaku_uji"] ?></span></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <div class="card-body">
        <h2>Kendaraan Yang Habis Masa Berlaku</h2>
        <table class="table" border="1">
            <thead>
                <tr>
                    <th scope="row">#</th>
                    <th scope="row">NOMOR KENDARAAN</th>
                    <th scope="row">MASA BERLAKU UJI</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php if ($kendaraan_tidak_berlaku != null) : ?>
                    <?php foreach ($kendaraan_tidak_berlaku as $tidak_berlaku) : ?>
                        <tr>
                            <td scope="col"><?= $no++ ?></td>
                            <td scope="col"><?= $tidak_berlaku["nomor_kendaraan"] ?></td>
                            <td scope="col"><span class="badge text-bg-danger"><?= $tidak_berlaku["tgl_berlaku_uji"] ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3" align="center">Tidak Ada Data</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>