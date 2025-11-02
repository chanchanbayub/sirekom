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
                                    <td style="text-transform: capitalize;"><?= $pengajuan_rekom->jenis_perizinan ?> </td>
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
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Kendaraan yang di ajukan</h4>
                                <p class="card-subtitle">
                                    <hr>
                                </p>
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
                                <h4 class="card-title">Kendaraan Yang Masih Berlaku</h4>
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
                                    <th scope="row">MASA BERLAKU UJI</th>
                                    <th scope="row">DOKUMEN KENDARAAN</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $no = 1; ?>
                                <?php foreach ($ceklis_data_kendaraan as $data_kendaraan) : ?>
                                    <tr>
                                        <td scope="col"><?= $no++ ?></td>
                                        <td scope="col"><?= $data_kendaraan->nomor_kendaraan ?></td>
                                        <td scope=" col">
                                            <span class="badge text-bg-success"><?= $data_kendaraan->tgl_berlaku_uji ?></span>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-info" id="validasi" data-bs-toggle="modal" data-bs-target="#validModal" data-id="<?= $data_kendaraan->id ?>" data-rekom="<?= $pengajuan_rekom->id ?>" type="button">
                                                <i class="ti ti-check"></i> Validasi Kendaraan
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
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
                                <h4 class="card-title">Kendaraan Yang Tidak Berlaku Berlaku</h4>
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
                                    <th scope="row">MASA BERLAKU UJI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php if (count($kendaraan_tidak_berlaku) == 0) : ?>
                                    <tr>
                                        <td colspan="3" style="text-align: center;">Tidak Ada Data</td>
                                    </tr>
                                <?php else : ?>
                                    <?php foreach ($kendaraan_tidak_berlaku as $tidak_berlaku) : ?>
                                        <tr>
                                            <td scope="col"><?= $no++ ?></td>
                                            <td scope="col"><?= $tidak_berlaku->nomor_kendaraan ?></td>
                                            <td scope="col"><span class="badge text-bg-danger"><?= $tidak_berlaku->tgl_berlaku_uji ?></span></td>
                                        </tr>
                                    <?php endforeach; ?>
                            </tbody>
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
                                <h4 class="card-title">Kendaraan Tidak Terdaftar KIR Jakarta</h4>
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
                                    <th scope="row">NOMOR UJI BERKALA</th>
                                    <th scope="row">NOMOR KENDARAAN BERDASARKAN NOMOR UJI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php if (count($kendaraan_tidak_terdaftar) == 0) : ?>
                                    <tr>
                                        <td colspan="3" style="text-align: center;">Tidak Ada Data</td>
                                    </tr>
                                <?php else : ?>
                                    <?php foreach ($kendaraan_tidak_terdaftar as $tidak_terdaftar) : ?>
                                        <tr>
                                            <td scope="col"><?= $no++ ?></td>
                                            <td scope="col"><?= $tidak_terdaftar->nomor_kendaraan ?></td>
                                            <td scope="col"><?= $tidak_terdaftar->merk ?></td>
                                            <td scope="col"><?= $tidak_terdaftar->no_kend_cek_kir ?></td>

                                        </tr>
                                    <?php endforeach; ?>
                            </tbody>
                        <?php endif; ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="validModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Form <small>Validasi Dokumen Kendaraan</small> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="validasi_form" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="kendaraan_id" name="kendaraan_id">
                        <input type="hidden" class="form-control" id="rekom_id" name="rekom_id">
                        <label for="validasi_stnk" class="col-form-label">Dokumen STNK :</label>
                        <select name="validasi_stnk" id="validasi_stnk" class="form-select">
                            <option value="">--Silahkan Pilih--</option>
                            <option value="lengkap">Lengkap</option>
                            <option value="tidak lengkap">Tidak Lengkap</option>
                        </select>
                        <div class="invalid-feedback error-validasi-stnk">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="dokumen_kir" class="col-form-label">Dokumen Kartu UJI Berkala :</label>
                        <select name="validasi_kir" id="validasi_kir" class="form-select">
                            <option value="">--Silahkan Pilih--</option>
                            <option value="lengkap">Lengkap</option>
                            <option value="tidak lengkap">Tidak Lengkap</option>
                        </select>
                        <div class="invalid-feedback error-validasi-kir">

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"> <i class="bi bi-x-lg"></i> Batal</button>
                        <button type="submit" class="btn btn-outline-primary save"> <i class="bi bi-arrow-right"></i>Validasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script>
    $(document).ready(function() {

        $("#validasi_rekom").submit(function(e) {
            e.preventDefault();

            let rekom_id = $("#rekom_id_status").val();
            let status_perizinan_id = $("#status_perizinan_id").val();

            $.ajax({
                url: '/backoffice/validasi_rekom/update_status_rekom',
                method: 'post',
                dataType: 'JSON',
                data: {
                    rekom_id: rekom_id,
                    status_perizinan_id: status_perizinan_id
                },
                beforeSend: function() {
                    $('.validasi').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                    $('.validasi').prop('disabled', true);
                },
                success: function(response) {
                    $('.validasi').html('<i class="ti ti-send"></i> Ubah Status');
                    $('.validasi').prop('disabled', false);
                    if (response.error) {
                        if (response.error.validasi_stnk) {
                            $("#status_perizinan_id").addClass('is-invalid');
                            $(".error-status-perizinan").html(response.error.status_perizinan_id);
                        } else {
                            $("#status_perizinan_id").removeClass('is-invalid');
                            $(".error-status-perizinan").html('');
                        }

                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: `${response.success}`,
                        });
                        setTimeout(function() {
                            window.location.href = "/backoffice/pengajuan_rekom/";
                        }, 1000)
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: `Data Belum Tersimpan!`,
                    });
                    $('.validasi').html('<i class="ti ti-send"></i> Ubah Status');
                    $('.validasi').prop('disabled', false);
                }
            });
        })

        // $.ajax({
        //     url: '/backoffice/validasi_rekom/edit_disabled_data',
        //     method: 'get',
        //     dataType: 'JSON',
        //     success: function(response) {
        //         // console.log(response);
        //         let kendaraan = .attr('data-id');

        //         response.kendaraan.forEach(function(e) {
        //             if (e.id == kendaraan) {

        //             }
        //         });
        //     }
        // });
    })

    $(document).on('click', "#validasi", function(e) {
        e.preventDefault();
        let kendaraan_id = $(this).attr('data-id');
        let rekom_id = $(this).attr('data-rekom');
        $.ajax({
            url: '/backoffice/validasi_rekom/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                kendaraan_id: kendaraan_id,
                rekom_id: rekom_id,
            },
            success: function(response) {
                if (response.validasi_data != null) {
                    $("#kendaraan_id").val(response.validasi_data.kendaraan_id);
                    $("#rekom_id").val(response.validasi_data.rekom_id);
                    $("#validasi_stnk").val(response.validasi_data.validasi_stnk).trigger('change');
                    $("#validasi_kir").val(response.validasi_data.validasi_kir).trigger('change');
                    $(".save").attr('disabled', 'disabled');
                } else {
                    $("#kendaraan_id").val(response.kendaraan.id);
                    $("#rekom_id").val(response.pengajuan_rekom.id);
                }
            }
        });
    });

    $("#validasi_form").submit(function(e) {
        e.preventDefault();
        let kendaraan_id = $('#kendaraan_id').val();
        let rekom_id = $('#rekom_id').val();
        let validasi_stnk = $('#validasi_stnk').val();
        let validasi_kir = $('#validasi_kir').val();

        $.ajax({
            url: '/backoffice/validasi_rekom/insert',
            method: 'post',
            dataType: 'JSON',
            data: {
                kendaraan_id: kendaraan_id,
                rekom_id: rekom_id,
                validasi_stnk: validasi_stnk,
                validasi_kir: validasi_kir,
            },
            beforeSend: function() {
                $('.save').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('.save').prop('disabled', true);
            },
            success: function(response) {
                $('.save').html('<i class="bi bi-box-arrow-in-right"></i> Validasi');
                $('.save').prop('disabled', false);
                if (response.error) {
                    if (response.error.validasi_stnk) {
                        $("#validasi_stnk").addClass('is-invalid');
                        $(".error-validasi-stnk").html(response.error.validasi_stnk);
                    } else {
                        $("#validasi_stnk").removeClass('is-invalid');
                        $(".error-validasi-stnk").html('');
                    }
                    if (response.error.validasi_kir) {
                        $("#validasi_kir").addClass('is-invalid');
                        $(".error-validasi-kir").html(response.error.validasi_kir);
                    } else {
                        $("#validasi_kir").removeClass('is-invalid');
                        $(".error-validasi-kir").html('');
                    }
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: `${response.success}`,
                    });
                    $("#validModal").modal('hide');
                    $("#validasi_stnk").val('');
                    $(".error-validasi-stnk").html('');
                    $("#validasi_stnk").removeClass('is-invalid');
                    $("#validasi_kir").val('');
                    $(".error-validasi-kir").html('');
                    $("#validasi_kir").removeClass('is-invalid');
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: `Data Belum Tersimpan!`,
                });
                $('.save').html('<i class="bi bi-box-arrow-in-right"></i> Ubah');
                $('.save').prop('disabled', false);
            }
        });
    });
</script>


<?= $this->endSection(); ?>