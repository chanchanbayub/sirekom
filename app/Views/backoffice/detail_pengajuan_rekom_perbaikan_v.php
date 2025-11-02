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
                        <div class="table-responsive">
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
                                        <th>VALIDASI KENDARAAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($kendaraan_berlaku as $berlaku) : ?>
                                        <tr>
                                            <td scope="col"><?= $no++ ?></td>
                                            <td scope="col"><?= $berlaku["nomor_kendaraan"] ?></td>
                                            <td scope="col"><span class="badge text-bg-success"><?= $berlaku["tgl_berlaku_uji"] ?></span></td>
                                            <td><button class="btn btn-sm btn-outline-info" id="validasi" data-bs-toggle="modal" data-bs-target="#validModal" data-id="<?= $berlaku['id'] ?>" data-rekom="<?= $berlaku['id_pengajuan_rekom'] ?>" type="button"> <i class="ti ti-check"></i> VALIDASI KENDARAAN
                                                </button></td>
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
                                <input type="hidden" class="form-control" id="rekom_id" name="id_pengajuan_rekom">
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
                        id_pengajuan_rekom: rekom_id,
                    },
                    success: function(response) {
                        if (response.validasi_data != null) {
                            $("#kendaraan_id").val(response.validasi_data.kendaraan_id);
                            $("#rekom_id").val(response.validasi_data.id_pengajuan_rekom);
                            $("#validasi_stnk").val(response.validasi_data.validasi_stnk).trigger('change');
                            $("#validasi_kir").val(response.validasi_data.validasi_kir).trigger('change');
                            $(".save").attr('disabled', 'disabled');
                        } else {
                            $("#kendaraan_id").val(response.kendaraan.id);
                            $("#rekom_id").val(response.pengajuan_rekom.id);
                            $("#validasi_stnk").val('');
                            $("#validasi_kir").val('');
                            $(".save").removeAttr('disabled', 'disabled');
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
                        id_pengajuan_rekom: rekom_id,
                        kendaraan_id: kendaraan_id,
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