<?= $this->extend('layout/template_admin') ?>

<?= $this->section('content') ?>

<!--  Header End -->
<div class="body-wrapper-inner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Detail Pengajuan Rekomendasi</h4>
                                <p class="card-subtitle">
                                    <hr>
                                </p>

                            </div>
                        </div>

                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Nomor Pengajuan Rekom</td>
                                    <td>:</td>
                                    <td style="text-transform: capitalize;"><?= $pengajuan_rekom->noPengajuanRekom ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Nama Pemohon</td>
                                    <td>:</td>
                                    <td style="text-transform: capitalize;"><?= $pengajuan_rekom->nama_lengkap ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Nama Perusahaan</td>
                                    <td>:</td>
                                    <td style="text-transform: uppercase;"><?= $users_management->nama_perusahaan ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Alamat Perusahaan</td>
                                    <td>:</td>
                                    <td style="text-transform: capitalize;"><?= $users_management->alamat_perusahaan ?></td>
                                </tr>
                                <tr>
                                    <th scope=" row">5</th>
                                    <td>Nomor Whastapp</td>
                                    <td>:</td>
                                    <td style="text-transform: capitalize;"><?= $users_management->no_whatsapp ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Pengantar Rekomendasi</td>
                                    <td>:</td>
                                    <td style="text-transform: capitalize;"><?= $pengajuan_rekom->surat_pengantar ?> </td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td>Jenis Perizinan</td>
                                    <td>:</td>
                                    <td style="text-transform: capitalize;"><span class="badge text-bg-warning"><?= $pengajuan_rekom->jenis_perizinan ?></span></td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td>Tanggal Pengajuan</td>
                                    <td>:</td>
                                    <td style="text-transform: capitalize;"><?= $pengajuan_rekom->tanggal_pengajuan ?> </td>
                                </tr>
                                <tr>
                                    <th scope="row">9</th>
                                    <td>Status Pengajuan</td>
                                    <td>:</td>
                                    <td style="text-transform: capitalize;"><span class="badge text-bg-info"><?= $pengajuan_rekom->status_perizinan ?></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card overflow-hidden">
                    <div class="card-body pb-0">
                        <div class="d-flex align-items-start">
                            <div>
                                <h4 class="card-title"> <u> Dokumen Persyaratan</u></h4>
                            </div>
                        </div>
                        <div class="mt-4 pb-3 d-flex align-items-center">
                            <span class="btn btn-primary rounded-circle round-48 hstack justify-content-center">
                                <i class="ti ti-files fs-6"></i>
                            </span>
                            <div class="ms-3">
                                <h5 class="mb-0 fw-bolder fs-4">Dokumen Surat Pengantar</h5>
                            </div>
                            <div class="ms-auto">
                                <a href="/surat_pengantar/<?= $pengajuan_rekom->dokumen_surat_pengantar ?>" target="_blank" class="btn btn-sm btn-outline-primary"><i class="ti ti-eye"></i></a>
                                <!-- <span class="badge bg-secondary-subtle text-muted">Lihat</span> -->
                            </div>
                        </div>
                        <div class="py-3 d-flex align-items-center">
                            <span class="btn btn-primary rounded-circle round-48 hstack justify-content-center">
                                <i class="ti ti-files fs-6"></i>
                            </span>
                            <div class="ms-3">
                                <h5 class="mb-0 fw-bolder fs-4">Dokumen Lainnya</h5>
                            </div>
                            <div class="ms-auto">
                                <a href="/dokumen_lainnya/<?= $pengajuan_rekom->dokumen_lainnya ?>" target="_blank" class="btn btn-sm btn-outline-primary"><i class="ti ti-eye"></i></a>
                            </div>
                        </div>

                        <div class="py-3 d-flex align-items-center">
                            <span class="btn btn-primary rounded-circle round-48 hstack justify-content-center">
                                <i class="ti ti-files fs-6"></i>
                            </span>
                            <div class="ms-3">
                                <h5 class="mb-0 fw-bolder fs-4">Legalitas Perusahaan</h5>
                            </div>
                            <div class="ms-auto">
                                <a href="/legalitas_perusahaan/<?= $users_management->legalitas_perusahaan ?>" target="_blank" class="btn btn-sm btn-outline-primary"><i class="ti ti-eye"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-md-flex justify-content-center">
                            <div>
                                <h4 class="card-title text-center">Jumlah Kendaraan yang Diajukan</h4>
                                <p class="card-subtitle">
                                    <hr>
                                </p>
                                <h4 class="card-title text-center"><?= $jumlah_pengajuan ?> Kendaraan</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Kendaraan yang Terdaftar di PTSP</h4>
                                <p class="card-subtitle">
                                    <hr>
                                </p>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
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
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Kendaraan Yang Tidak Terdaftar di PTSP</h4>
                                <p class="card-subtitle">
                                    <hr>
                                </p>
                            </div>
                        </div>

                        <table class="table">
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
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Kendaraan yang Masih Berlaku Masa Uji</h4>
                                <p class="card-subtitle">
                                    <hr>
                                </p>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
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
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Kendaraan yang Tidak Berlaku Masa Uji</h4>
                                <p class="card-subtitle">
                                    <hr>
                                </p>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="row">#</th>
                                        <th scope="row">NOMOR KENDARAAN</th>
                                        <th scope="row">MASA BERLAKU UJI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($kendaraan_tidak_berlaku as $tidak_berlaku) : ?>
                                        <tr>
                                            <td scope="col"><?= $no++ ?></td>
                                            <td scope="col"><?= $tidak_berlaku["nomor_kendaraan"] ?></td>
                                            <td scope="col"><span class="badge text-bg-danger"><?= $tidak_berlaku["tgl_berlaku_uji"] ?></span></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-md-flex justify-content-center">
                            <div class="text-center">
                                <h4 class="card-title text-center">Cetak Surat Rekomendasi</h4>
                                <p class="card-subtitle text-center">
                                    <hr>
                                </p>
                                <a href="/backoffice/export_word" target="__blank" class="btn btn-outline-success btn-lg"> Cetak Surat</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>



        <?= $this->endSection(); ?>