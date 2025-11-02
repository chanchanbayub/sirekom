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

                        <?php if ($profil == null) : ?>
                            <div class="card text-left">
                                <div class="card-header">
                                    <h3 class="text-uppercase">Silahkan Lengkapi Profil Terlebih Dahulu <br> <a href="/operator/profil_users"> <u>Klik Disini </u></a> </h3>
                                </div>

                            </div>
                        <?php else : ?>
                            <div class="card text-center">
                                <div class="card-header">
                                    <h3 class="text-uppercase">Total Database Kendaraan SIREKOM</h3>
                                    <span class="badge text-bg-success" style="text-transform: uppercase;"><?= $profil ?></span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?= number_format($total_kendaraan) ?> Kendaraan </h5>
                                    <p class="card-text">Terdaftar Database SIREKOM</p>
                                </div>
                                <div class="card-footer text-body-secondary">
                                    <p>Updated : <?= date('d - m - Y'); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script>

</script>
<?= $this->endSection(); ?>