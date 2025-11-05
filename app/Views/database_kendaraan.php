<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<!-- Header-->
<div class="container px-5 my-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Database Kendaraan SIREKOM</span></h1>
    </div>

    <div class="row gx-5 justify-content-center">
        <div class="col-lg-12">

            <section>
                <!-- Experience Card 1-->
                <div class="card shadow border-0 rounded-4 mb-5">
                    <div class="card-body p-5">
                        <div class="row align-items-center gx-5">
                            <div class="col-lg-6">
                                <h3 class="text-capitalize text-center">Total Operator : <?= number_format($total_semua_operator) ?> Operator </h3>
                                <hr>
                            </div>
                            <div class="col-lg-6">
                                <h3 class="text-capitalize text-center">Total Kendaraan : <?= number_format($total_semua_kendaraan) ?> Kendaraan </h3>
                                <hr>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Experience Card 2-->
            </section>

            <section>
                <!-- Experience Card 1-->
                <div class="card shadow border-0 rounded-4 mb-5">
                    <div class="card-body p-5">
                        <div class="row align-items-center gx-5">
                            <div class="col-lg-4">
                                <h4 class="text-capitalize text-center">Jenis Kendaraan DB 2014 </h4>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Jenis Kendaraan</th>
                                                <th scope="col">Jumlah</th>

                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            <?php $no = 1; ?>
                                            <?php foreach ($jenis_kendaraan_2014 as $jenis_kendaraan_2014) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $jenis_kendaraan_2014["jenis_kendaraan"] ?></td>
                                                    <td><?= number_format($jenis_kendaraan_2014["jumlah"]) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <tr>
                                                <td colspan="2"> TOTAL :</td>
                                                <td colspan="1"> <b><?= number_format($total_kendaraan_2014); ?></b></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <h4 class="text-capitalize text-center">Jenis Kendaraan data PTSP </h4>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Jenis Kendaraan</th>
                                                <th scope="col">Jumlah</th>

                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            <?php $no = 1; ?>
                                            <?php foreach ($jenis_kendaraan_ptsp_data as $jenis_kendaraan_ptsp) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $jenis_kendaraan_ptsp["jenis_kendaraan"] ?></td>
                                                    <td><?= number_format($jenis_kendaraan_ptsp["jumlah"]) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <tr>
                                                <td colspan="2"> TOTAL :</td>
                                                <td colspan="1"> <b><?= number_format($total_kendaraan_ptsp); ?></b></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                            <div class="col-lg-4">
                                <h4 class="text-capitalize text-center">Jenis Kendaraan data Terintegrasi </h4>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Jenis Kendaraan</th>
                                                <th scope="col">Jumlah</th>

                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            <?php $no = 1; ?>
                                            <?php foreach ($jenis_kendaraan_terintegrasi as $jenis_kendaraan_terintegrasi) : ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $jenis_kendaraan_terintegrasi["jenis_kendaraan"] ?></td>
                                                    <td><?= number_format($jenis_kendaraan_terintegrasi["jumlah"]) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <tr>
                                                <td colspan="2"> TOTAL :</td>
                                                <td colspan="1"> <b><?= number_format($total_kendaraan_terintegrasi); ?></b></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Experience Card 2-->
            </section>

            <section>
                <!-- Experience Card 1-->
                <div class="card shadow border-0 rounded-4 mb-5">
                    <div class="card-body p-5">
                        <div class="row align-items-center gx-5">
                            <div class="col-lg-12">
                                <h3 class="text-capitalize">Database Kendaraan yang terdaftar di Database 2014</h3>
                                <h4 class="text-capitalize"> Jumlah Operator : <u> <?= $jumlah_operator_2014 ?> yang Terdaftar di Database 2014 </u></h4>

                                <hr>
                                <div class="table_responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama Operator</th>
                                                <th scope="col" class="text-center">Jumlah Kendaraan</th>

                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            <?php $no = 1; ?>
                                            <?php foreach ($operator_2014 as $operator_2014) : ?>
                                                <tr>
                                                    <th scope="row"><?= $no++ ?></th>
                                                    <td><?= $operator_2014["operator_kendaraan"] ?></td>
                                                    <td class="text-center"><?= number_format($operator_2014["jumlah_kendaraan"])  ?> Kendaraan</td>


                                                </tr>
                                            <?php endforeach; ?>
                                            <tr>
                                                <td colspan="2" style="text-align: center; text-transform:uppercase"><b> Total Kendaraan : </b></td>
                                                <td colspan="2" style="text-align: center; text-transform:uppercase"> <b><?= number_format($total_kendaraan_2014) ?> Kendaraan</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Experience Card 2-->
            </section>
            <!-- Experience Section-->
            <section>
                <!-- Experience Card 1-->
                <div class="card shadow border-0 rounded-4 mb-5">
                    <div class="card-body p-5">
                        <div class="row align-items-center gx-5">
                            <div class="col-lg-12">
                                <h3 class="text-capitalize">Database Kendaraan yang terdaftar di PTSP</h3>
                                <h4 class="text-capitalize"> Jumlah Operator : <u> <?= $jumlah_operator_ptsp ?> yang Terdaftar di PTSP </u></h4>

                                <hr>
                                <div class="table_responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama Operator</th>
                                                <th scope="col" class="text-center">Jumlah Kendaraan</th>

                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            <?php $no = 1; ?>
                                            <?php foreach ($operator_data_ptsp as $operator_ptsp) : ?>
                                                <tr>
                                                    <th scope="row"><?= $no++ ?></th>
                                                    <td><?= $operator_ptsp["operator_kendaraan"] ?></td>
                                                    <td class="text-center"><?= number_format($operator_ptsp["jumlah_kendaraan"])  ?> Kendaraan</td>


                                                </tr>
                                            <?php endforeach; ?>
                                            <tr>
                                                <td colspan="2" style="text-align: center; text-transform:uppercase"><b> Total Kendaraan : </b></td>
                                                <td colspan="2" style="text-align: center; text-transform:uppercase"> <b><?= number_format($total_kendaraan_ptsp) ?> Kendaraan</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Experience Card 2-->
            </section>

            <section>
                <!-- Experience Card 1-->
                <div class="card shadow border-0 rounded-4 mb-5">
                    <div class="card-body p-5">
                        <div class="row align-items-center gx-5">
                            <div class="col-lg-12">
                                <h3 class="text-capitalize">Database Kendaraan yang Terintegrasi Transjakarta</h3>
                                <h4 class="text-capitalize"> Jumlah Operator : <u> <?= $jumlah_operator_terintegrasi ?> yang Terintegrasi Transjakarta </u></h4>

                                <hr>
                                <div class="table_responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama Operator</th>
                                                <th scope="col" class="text-center">Jumlah Kendaraan</th>

                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            <?php $no = 1; ?>
                                            <?php foreach ($operator_terintegrasi as $integrasi) : ?>
                                                <tr>
                                                    <th scope="row"><?= $no++ ?></th>
                                                    <td><?= $integrasi["operator_kendaraan"] ?></td>
                                                    <td class="text-center"><?= number_format($integrasi["jumlah_kendaraan"])  ?> Kendaraan</td>


                                                </tr>
                                            <?php endforeach; ?>
                                            <tr>
                                                <td colspan="2" style="text-align: center; text-transform:uppercase"><b> Total Kendaraan : </b></td>
                                                <td colspan="2" style="text-align: center; text-transform:uppercase"> <b><?= number_format($total_kendaraan_terintegrasi) ?> Kendaraan</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Experience Card 2-->
            </section>


            <div class="pb-5"></div>
            <!-- Skills Section-->
        </div>
    </div>
</div>
<!-- About Section-->
</main>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script>
    $("#search_form").submit(function(e) {
        e.preventDefault();

        let noPengajuanRekom = $("#noPengajuanRekom").val();

        $.ajax({
            url: '/search/',
            method: 'get',
            dataType: 'JSON',
            data: {
                noPengajuanRekom: noPengajuanRekom,
            },
            beforeSend: function() {
                $('.search').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('.search').prop('disabled', true);
            },
            success: function(response) {
                $('.search').html('<i class="bi bi-search"></i> Cek Pengajuan Rekom');
                $('.search').prop('disabled', false);
                if (response.error) {
                    if (response.error.noPengajuanRekom) {
                        $("#noPengajuanRekom").addClass('is-invalid');
                        $(".error-pengajuan").html(response.error.noPengajuanRekom);
                    } else {
                        $("#noPengajuanRekom").removeClass('is-invalid');
                        $(".error-pengajuan").html('');
                    }


                } else if (response.null) {

                    $("#exampleModal").modal('hide');

                    Swal.fire({
                        icon: 'error',
                        title: `Data Tidak Ditemukan`,
                    });
                    $('.search').html('<i class="bi bi-search"></i> Cek Pengajuan Rekom');
                    $('.search').prop('disabled', false);

                    $("#noPengajuanRekom").val('');
                    $("#tanggal_pengajuan").val('');

                } else {
                    $("#exampleModal").modal('hide');

                    $("#rekomView").modal('show');

                    $table_data = `<tr>
                                   <th scope="row">1</th>
                                   <td>${response.pengajuan_rekom.noPengajuanRekom}</td>
                                   <td>${response.pengajuan_rekom.surat_pengantar}</td>
                                   <td>${response.pengajuan_rekom.jenis_perizinan}</td>
                                   <td>${response.pengajuan_rekom.tanggal_pengajuan}</td>
                                   <td>${(response.pengajuan_rekom.tanggal_surat) == null ? "Belum Approval" : response.pengajuan_rekom.tanggal_surat}</td>
                                   <td><a href="${(response.pengajuan_rekom.surat_rekomendasi) == null ? "#" : "../rekomendasi/" + response.pengajuan_rekom.surat_rekomendasi}" class="btn btn-sm btn-outline-success"> Download</a> </td>
                                   <td><span class="badge text-bg-success">${response.pengajuan_rekom.status_perizinan}</span></td>
                                 </tr>`;

                    $("#table_data").html($table_data)
                }
            },
            error: function() {

                Swal.fire({
                    icon: 'error',
                    title: `Data Belum Tersimpan!`,
                });
                $('.search').html('<i class="bi bi-search"></i> Cek Pengajuan Rekom');
                $('.search').prop('disabled', false);
            }
        });
    });
</script>

<?= $this->endSection(); ?>