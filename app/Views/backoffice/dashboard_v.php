<?= $this->extend('layout/template_admin') ?>

<?= $this->section('content') ?>

<!--  Header End -->
<div class="body-wrapper-inner">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title"><?= $title ?> Pages</h4>
                                <p class="card-subtitle">
                                    Halaman <?= $title ?>
                                </p>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-4 mb-3 mb-sm-0">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title badge text-bg-success">Status Pengajuan Rekomendasi</h5>
                                        <h3 class="card-text"><?= $status_pengajuan ?> Pengajuan</h3>
                                        <!-- <p class="card-text"></p> -->
                                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title badge text-bg-success">Status Validasi</h5>
                                        <h3 class="card-text"><?= $status_pengajuan_validasi ?> Pengajuan</h3>
                                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title badge text-bg-success">Status E-Office</h5>
                                        <h3 class="card-text"><?= $status_pengajuan_eoffice ?> Pengajuan</h3>
                                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title badge text-bg-success">Status Rekomendasi Terbit</h5>
                                        <h3 class="card-text"><?= $status_pengajuan_terbit ?> Terbit</h3>
                                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title badge text-bg-success">Status Ditolak</h5>
                                        <h3 class="card-text"><?= $status_pengajuan_ditolak ?> Ditolak</h3>
                                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title badge text-bg-success">Total Pengajuan Rekomendasi</h5>
                                        <h3 class="card-text"><?= $total_pengajuan ?> Telah Diajukan</h3>
                                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                    </div>
                                </div>
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
                        <br>

                        <div class="card text-center">
                            <div class="card-header">
                                <h3 class="text-uppercase">Total Database Kendaraan SIREKOM</h3>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?= number_format($total_kendaraan) ?> Kendaraan </h5>
                                <p class="card-text">Terdaftar Database SIREKOM</p>
                            </div>
                            <div class="card-footer text-body-secondary">
                                <p>Updated : <?= date('d - m - Y'); ?></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="d-md-flex align-items-center">
            <div>
                <h4 class="card-title text-uppercase"> <u> Database yang Terdaftar Dengan PTSP </u></h4>
            </div>
        </div>

        <div class="row">
            <?php foreach ($operator_data as $operator_data) : ?>
                <div class="col-lg-4">
                    <div class="card-body">
                        <br>
                        <div class="card text-center">
                            <div class="card-header">
                                <h5 class="text-uppercase"><?= $operator_data['operator_kendaraan'] ?></h5>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?= number_format($operator_data["jumlah_kendaraan"]) ?> Kendaraan yang terdaftar </h5>
                            </div>
                            <div class="card-footer text-body-secondary">
                                <a href="/backoffice/data_base_kendaraan/<?= urlencode(base64_encode($operator_data["operator_kendaraan"])) ?>" target="_blank" class="btn btn-outline-primary btn-sm">Lihat Data Kendaraan</a>
                            </div>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script>

</script>
<?= $this->endSection(); ?>