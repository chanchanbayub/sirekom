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
                                <h4 class="card-title"> <?= $title ?> Pages</h4>
                                <p class="card-subtitle">
                                    Halaman <?= $title ?>
                                </p>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <form class="row g-3" id="add_form">
                            <?= csrf_field(); ?>
                            <div class="col-md-6">
                                <label for="surat_pengantar_id" class="form-label">Surat Pengantar Perizinan</label>
                                <select name="surat_pengantar_id" id="surat_pengantar_id" class="form-select" style="width: 100%;">
                                    <option value="">--Silahkan Pilih--</option>
                                    <?php foreach ($surat_pengantar as $surat_pengantar) : ?>
                                        <option value=" <?= $surat_pengantar->id ?>"><?= $surat_pengantar->surat_pengantar ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div id="validationServer04Feedback" class="invalid-feedback error-surat-pengantar">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="jenis_perizinan_id" class="form-label">Pilih Jenis Perizinan</label>
                                <select name="jenis_perizinan_id" id="jenis_perizinan_id" class="form-select" style="width: 100%;" disabled>
                                    <option value="">--Silahkan Pilih--</option>
                                </select>
                                <div id="validationServer04Feedback" class="invalid-feedback error-jenis-perizinan">

                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="users_id" class="form-label">Pilih Pemohon</label>
                                <select name="users_id" id="users_id" class="form-select" style="width: 100%;">
                                    <option value="">--Silahkan Pilih--</option>
                                    <?php foreach ($users_management as $users_management) : ?>
                                        <option value="<?= $users_management->id ?>"><?= $users_management->nama_lengkap ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div id="validationServer04Feedback" class="invalid-feedback error-users-management">

                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="nama_pemohon" class="form-label">Nama Pemohon</label>
                                <input type="text" name="nama_pemohon" id="nama_pemohon" class="form-control" placeholder="masukan nama pemohon" disabled>
                                <div id="validationServer04Feedback" class="invalid-feedback error-pemohon">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                                <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" placeholder="masukan nama perusahaan" disabled>
                                <div id="validationServer04Feedback" class="invalid-feedback error-nama-perusahaan">

                                </div>
                            </div>

                            <div class="col-6">
                                <label for="dokumen_surat_pengantar" class="form-label">Upload Surat Pengantar (PDF)</label>
                                <input type="file" class="form-control" id="dokumen_surat_pengantar" name="dokumen_surat_pengantar">
                                <div id="validationServer04Feedback" class="invalid-feedback error-dokumen-surat-pengantar">
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="dokumen_nomor_kendaraan" class="form-label">Upload Nomor Kendaraan (Excel)</label>
                                <input type="file" class="form-control" name="dokumen_nomor_kendaraan" id="dokumen_nomor_kendaraan" />
                                <div id="validationServer04Feedback" class="invalid-feedback error-dokumen-nomor-kendaraan">

                                </div>
                            </div>

                            <div class="col-4">
                                <label for="dokumen_lainnya" class="form-label">Upload Dokumen Lainnya (PDF)</label>
                                <input type="file" class="form-control" name="dokumen_lainnya" id="dokumen_lainnya" />
                                <div id="emailHelp" class="form-text">SCAN STNK, SCAN KARTU UJI BERKALA, SCAN DOKUMEN LAINNYA.</div>
                                <div id="validationServer04Feedback" class="invalid-feedback error-dokumen-lainnya">

                                </div>
                            </div>

                            <div class="col-4">
                                <label for="tanggal_pengajuan" class="form-label">Tanggal Pengajuan</label>
                                <input type="date" class="form-control" id="tanggal_pengajuan" name="tanggal_pengajuan" value="<?= date("Y-m-d") ?>">
                                <div id="validationServer04Feedback" class="invalid-feedback error-tanggal-pengajuan">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="status_perizinan_id" class="form-label">Status Jenis Perizinan</label>
                                <select name="status_perizinan_id" id="status_perizinan_id" class="form-select" style="width: 100%;">
                                    <option value="">--Silahkan Pilih--</option>
                                    <option value="<?= $status_perizinan->id ?>"><?= $status_perizinan->status_perizinan ?></option>
                                </select>
                                <div id="validationServer04Feedback" class="invalid-feedback error-status-perizinan">

                                </div>
                            </div>
                            <hr>
                            <div class="col-12">
                                <button type="submit" class="btn btn-outline-primary save"> <i class="ti ti-send"></i> Ajukan Permohonan Rekomendasi</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script>
    $(document).ready(function() {
        // e.preventDefault();
        $('#surat_pengantar_id').select2({
            theme: 'bootstrap-5',
        });
        $('#jenis_perizinan_id').select2({
            theme: 'bootstrap-5',
        });
        $('#users_id').select2({
            theme: 'bootstrap-5',
        });
        $('#status_perizinan_id').select2({
            theme: 'bootstrap-5',
        });

        $("#surat_pengantar_id").change(function(e) {
            e.preventDefault();
            let surat_pengantar_id = $(this).val();
            $.ajax({
                url: '/operator/form_pengajuan_rekomendasi/getJenisPerizinan',
                method: 'post',
                dataType: 'JSON',
                data: {
                    surat_pengantar_id: surat_pengantar_id,
                },

                success: function(response) {
                    if (response.length >= 1) {
                        $("#jenis_perizinan_id").removeAttr('disabled', 'disabled');

                        let jenis_perizinan_data = `<option value="">--Silahkan Pilih--</option>`;

                        response.forEach(function(e) {
                            jenis_perizinan_data += `<option value="${e.id}"> ${e.jenis_perizinan} </option>`
                        });

                        $("#jenis_perizinan_id").html(jenis_perizinan_data);
                    } else {
                        $("#jenis_perizinan_id").attr('disabled', 'disabled');
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: `Data Tidak Ditemukan!`,
                    });

                }
            });
        });

        $("#users_id").change(function(e) {
            e.preventDefault();
            let users_id = $(this).val();
            $.ajax({
                url: '/operator/form_pengajuan_rekomendasi/getUsers',
                method: 'post',
                dataType: 'JSON',
                data: {
                    users_id: users_id,
                },

                success: function(response) {
                    if (response != null) {
                        $("#nama_pemohon").attr('disabled', 'disabled');
                        $("#nama_perusahaan").attr('disabled', 'disabled');

                        $("#nama_pemohon").val(response.nama_lengkap);
                        $("#nama_perusahaan").val(response.nama_perusahaan);

                    } else {
                        $("#nama_pemohon").attr('disabled', 'disabled');
                        $("#nama_perusahaan").attr('disabled', 'disabled');

                        $("#nama_pemohon").val('');
                        $("#nama_perusahaan").val('');
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: `Data Tidak Ditemukan!`,
                    });

                }
            });
        });
    });

    $("#add_form").submit(function(e) {
        e.preventDefault();
        let surat_pengantar_id = $("#surat_pengantar_id").val();
        let jenis_perizinan_id = $("#jenis_perizinan_id").val();
        let users_id = $("#users_id").val();
        let dokumen_surat_pengantar = $("#dokumen_surat_pengantar").val();
        let dokumen_nomor_kendaraan = $("#dokumen_nomor_kendaraan").val();
        let dokumen_lainnya = $("#dokumen_lainnya").val();
        let tanggal_pengajuan = $("#tanggal_pengajuan").val();
        let status_perizinan_id = $("#status_perizinan_id").val();

        let formData = new FormData(this);

        formData.append('surat_pengantar_id', surat_pengantar_id);
        formData.append('jenis_perizinan_id', jenis_perizinan_id);
        formData.append('users_id', users_id);
        formData.append('dokumen_surat_pengantar', dokumen_surat_pengantar);
        formData.append('dokumen_nomor_kendaraan', dokumen_nomor_kendaraan);
        formData.append('dokumen_lainnya', dokumen_lainnya);
        formData.append('tanggal_pengajuan', tanggal_pengajuan);
        formData.append('status_perizinan_id', status_perizinan_id);

        $.ajax({
            url: '/operator/form_pengajuan_rekomendasi/insert',
            data: formData,
            dataType: 'json',
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            cache: false,
            method: 'POST',
            dataType: 'JSON',
            beforeSend: function() {
                $('.save').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('.save').prop('disabled', true);
            },
            success: function(response) {
                $('.save').html('<i class="ti ti-send"></i> Ajukan Permohonan Rekomendasi');
                $('.save').prop('disabled', false);
                if (response.error) {

                    if (response.error.surat_pengantar_id) {
                        $("#surat_pengantar_id").addClass('is-invalid');
                        $(".error-surat-pengantar").html(response.error.surat_pengantar_id);
                    } else {
                        $("#surat_pengantar_id").removeClass('is-invalid');
                        $(".error-surat-pengantar").html('');
                    }
                    if (response.error.jenis_perizinan_id) {
                        $("#jenis_perizinan_id").addClass('is-invalid');
                        $(".error-jenis-perizinan").html(response.error.jenis_perizinan_id);
                    } else {
                        $("#jenis_perizinan_id").removeClass('is-invalid');
                        $(".error-jenis-perizinan").html('');
                    }
                    if (response.error.users_id) {
                        $("#users_id").addClass('is-invalid');
                        $(".error-users-management").html(response.error.users_id);
                    } else {
                        $("#users_id").removeClass('is-invalid');
                        $(".error-users-management").html('');
                    }
                    if (response.error.dokumen_surat_pengantar) {
                        $("#dokumen_surat_pengantar").addClass('is-invalid');
                        $(".error-dokumen-surat-pengantar").html(response.error.dokumen_surat_pengantar);
                    } else {
                        $("#dokumen_surat_pengantar").removeClass('is-invalid');
                        $(".error-dokumen-surat-pengantar").html('');
                    }
                    if (response.error.dokumen_nomor_kendaraan) {
                        $("#dokumen_nomor_kendaraan").addClass('is-invalid');
                        $(".error-dokumen-nomor-kendaraan").html(response.error.dokumen_nomor_kendaraan);
                    } else {
                        $("#dokumen_nomor_kendaraan").removeClass('is-invalid');
                        $(".error-dokumen-nomor-kendaraan").html('');
                    }
                    if (response.error.dokumen_lainnya) {
                        $("#dokumen_lainnya").addClass('is-invalid');
                        $(".error-dokumen-lainnya").html(response.error.dokumen_lainnya);
                    } else {
                        $("#dokumen_lainnya").removeClass('is-invalid');
                        $(".error-dokumen-lainnya").html('');
                    }
                    if (response.error.tanggal_pengajuan) {
                        $("#tanggal_pengajuan").addClass('is-invalid');
                        $(".error-tanggal-pengajuan").html(response.error.tanggal_pengajuan);
                    } else {
                        $("#tanggal_pengajuan").removeClass('is-invalid');
                        $(".error-tanggal-pengajuan").html('');
                    }
                    if (response.error.tanggal_pengajuan) {
                        $("#tanggal_pengajuan").addClass('is-invalid');
                        $(".error-tanggal-pengajuan").html(response.error.tanggal_pengajuan);
                    } else {
                        $("#tanggal_pengajuan").removeClass('is-invalid');
                        $(".error-tanggal-pengajuan").html('');
                    }
                    if (response.error.status_perizinan_id) {
                        $("#status_perizinan_id").addClass('is-invalid');
                        $(".error-status-perizinan").html(response.error.status_perizinan_id);
                    } else {
                        $("#status_perizinan_id").removeClass('is-invalid');
                        $(".error-status-perizinan").html('');
                    }

                } else if (response.ditolak) {
                    Swal.fire({
                        icon: 'error',
                        title: `${response.ditolak}`,
                    });
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: `${response.success}`,
                    });
                    setTimeout(function() {
                        window.location.href = "/backoffice/pengajuan_rekom/";
                    }, 1000)
                    // console.log(response);
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: `Data Belum Tersimpan!`,
                });
                $('.save').html('<i class="ti ti-send"></i> Ajukan Permohonan Rekomendasi');
                $('.save').prop('disabled', false);
            }
        });
    });
</script>
<?= $this->endSection(); ?>