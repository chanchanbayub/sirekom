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
                            <div class="ms-auto">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item text-info">
                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Upload <?= $title ?></button>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="role_table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nomor Surat</th>
                                        <th scope="col">Pemohon</th>
                                        <th scope="col">Tanggal Pengajuan</th>
                                        <th scope="col">Tanggal Surat</th>
                                        <th scope="col">Status Perizinan</th>
                                        <th scope="col">Surat Rekomendasi</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Formulir Upload Surat Rekomendasi <?= $title ?> </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add_form">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="pengajuan_id" class="col-form-label">Pengajuan Rekom :</label>
                        <select name="pengajuan_id" id="pengajuan_id" class="form-select text-capitalize">
                            <option value="">--Silahkan Pilih--</option>
                            <?php foreach ($pengajuan_rekomendasi as $pengajuan_rekom) : ?>
                                <option value="<?= $pengajuan_rekom->id ?>"> <?= $pengajuan_rekom->noPengajuanRekom ?> - <?= $pengajuan_rekom->nama_lengkap ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div id="error-pengajuan" class="invalid-feedback">

                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_surat" class="col-form-label">Tanggal Surat :</label>
                        <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat">
                        <div id="error-tanggal" class="invalid-feedback">

                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="surat_rekomendasi" class="col-form-label">Upload Surat Rekom :</label>
                        <input type="file" class="form-control" id="surat_rekomendasi" name="surat_rekomendasi">
                        <div id="error-surat-rekomendasi" class="invalid-feedback">

                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="status_perizinan_id" class="col-form-label">Status Perzinan :</label>
                        <select name="status_perizinan_id" id="status_perizinan_id" class="form-select">
                            <option value="">--Silahkan Pilih--</option>
                            <?php foreach ($status_perizinan as $status_perizinan) : ?>
                                <option value="<?= $status_perizinan->id ?>"> <?= $status_perizinan->status_perizinan ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div id="error-status" class="invalid-feedback">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary save"> Simpan</button>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Form <small>Edit <?= $title ?></small> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit_form" autocomplete="off">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id_edit" name="id">
                        <input type="hidden" class="form-control" id="surat_rekomendasi_lama" name="surat_rekomendasi">
                        <label for="pengajuan_id_edit" class="col-form-label">Pengajuan Rekom :</label>
                        <select name="pengajuan_id" id="pengajuan_id_edit" class="form-select">
                            <option value="">--Silahkan Pilih--</option>
                        </select>
                        <div class="invalid-feedback error-pengajuan-edit">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_surat_edit" class="col-form-label">Tanggal Surat :</label>
                        <input type="date" name="tanggal_surat" id="tanggal_surat_edit" class="form-control">
                        <div class="invalid-feedback error-tanggal-edit">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="surat_rekomendasi_edit" class="col-form-label">Surat Rekomendasi :</label>
                        <input type="file" name="surat_rekomendasi" id="surat_rekomendasi_edit" class="form-control">
                        <div class="invalid-feedback error-surat-edit">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status_perizinan_id_edit" class="col-form-label">Status Perzinan :</label>
                        <select name="status_perizinan_id" id="status_perizinan_id_edit" class="form-select">
                            <option value="">--Silahkan Pilih--</option>
                        </select>
                        <div class="invalid-feedback error-status-edit">

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"> <i class="bi bi-x-lg"></i> Batal</button>
                        <button type="submit" class="btn btn-outline-primary update"> <i class="bi bi-arrow-right"></i> Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->

<!-- Modal hapus  -->
<div class="modal fade" id="deleteModal" tabindex="0">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form <small> Hapus <?= $title ?> </small></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="delete_form">
                    <?= csrf_field(); ?>
                    <input type="hidden" class="form-control" id="id_delete" name="id">
                    <div class="modal-body">
                        <p>Apakah Anda Yakin ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal"> <i class="bi bi-x-lg"></i> Batal</button>
                        <button type="submit" class="btn btn-outline-danger button_delete"> <i class="bi bi-trash"></i> Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End hapus Modal-->

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script>
    $(document).ready(function() {

        $('#pengajuan_id').select2({
            theme: 'bootstrap-5',
            dropdownParent: $('#exampleModal')
        });
        $('#status_perizinan_id').select2({
            theme: 'bootstrap-5',
            dropdownParent: $('#exampleModal')
        });

        $('#pengajuan_id_edit').select2({
            theme: 'bootstrap-5',
            dropdownParent: $('#editModal')
        });
        $('#status_perizinan_id_edit').select2({
            theme: 'bootstrap-5',
            dropdownParent: $('#editModal')
        });

        $('#role_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '/backoffice/surat_rekomendasi/getSurat',
                method: 'POST'
            },
            order: [],
            columns: [{
                    data: 'nomor',
                    orderable: false

                },
                {
                    data: 'noPengajuanRekom',
                    orderable: true
                },
                {
                    data: 'nama_perusahaan',
                    orderable: true
                },
                {
                    data: 'tanggal_pengajuan',
                    orderable: true
                },
                {
                    data: 'tanggal_surat',
                    orderable: true
                },

                {
                    data: 'status',
                    orderable: false
                },
                {
                    data: 'surat_rekom',
                    orderable: false
                },

                {
                    data: 'action',
                    orderable: false
                },

            ],
        });

    });


    $("#add_form").submit(function(e) {
        e.preventDefault();
        let pengajuan_id = $("#pengajuan_id").val();
        let tanggal_surat = $("#tanggal_surat").val();
        let surat_rekomendasi = $("#surat_rekomendasi").val();
        let status_perizinan_id = $("#status_perizinan_id").val();

        let formData = new FormData(this);

        formData.append('pengajuan_id', pengajuan_id);
        formData.append('tanggal_surat', tanggal_surat);
        formData.append('surat_rekomendasi', surat_rekomendasi);
        formData.append('status_perizinan_id', status_perizinan_id);


        $.ajax({
            url: '/backoffice/surat_rekomendasi/insert',
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
                $('.save').html('Simpan');
                $('.save').prop('disabled', false);
                if (response.error) {
                    if (response.error.pengajuan_id) {
                        $("#pengajuan_id").addClass('is-invalid');
                        $("#error-pengajuan").html(response.error.pengajuan_id);
                    } else {
                        $("#pengajuan_id").removeClass('is-invalid');
                        $("#error-pengajuan").html('');
                    }
                    if (response.error.tanggal_surat) {
                        $("#tanggal_surat").addClass('is-invalid');
                        $("#error-tanggal").html(response.error.tanggal_surat);
                    } else {
                        $("#tanggal_surat").removeClass('is-invalid');
                        $("#error-tanggal").html('');
                    }
                    if (response.error.surat_rekomendasi) {
                        $("#surat_rekomendasi").addClass('is-invalid');
                        $("#error-surat-rekomendasi").html(response.error.surat_rekomendasi);
                    } else {
                        $("#surat_rekomendasi").removeClass('is-invalid');
                        $("#error-surat-rekomendasi").html('');
                    }
                    if (response.error.status_perizinan_id) {
                        $("#status_perizinan_id").addClass('is-invalid');
                        $("#error-status").html(response.error.status_perizinan_id);
                    } else {
                        $("#status_perizinan_id").removeClass('is-invalid');
                        $("#error-status").html('');
                    }

                } else {
                    Swal.fire({
                        icon: 'success',
                        title: `${response.success}`,
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 1000)
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: `Data Belum Tersimpan!`,
                });
                $('.save').html('Simpan');
                $('.save').prop('disabled', false);
            }
        });
    });

    // Aksi Edit 
    $(document).on('click', "#edit", function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: '/backoffice/surat_rekomendasi/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                console.log(response);
                $("#id_edit").val(response.surat_rekomendasi.id);
                $("#surat_rekomendasi_lama").val(response.surat_rekomendasi.surat_rekomendasi);
                $("#tanggal_surat_edit").val(response.surat_rekomendasi.tanggal_surat);

                let pengajuan_rekom = `<option value="">--Silahkan Pilih--</option>`;

                response.pengajuan_rekomendasi.forEach(function(e) {
                    pengajuan_rekom += `<option value="${e.id}"> ${e.noPengajuanRekom} - ${e.nama_perusahaan} </option>`
                });

                $("#pengajuan_id_edit").html(pengajuan_rekom);

                $("#pengajuan_id_edit").val(response.surat_rekomendasi.pengajuan_id).trigger('change');

                let status = `<option value="">--Silahkan Pilih--</option>`;

                response.status_perizinan.forEach(function(e) {
                    status += `<option value="${e.id}"> ${e.status_perizinan} </option>`
                });

                $("#status_perizinan_id_edit").html(status);

                $("#status_perizinan_id_edit").val(response.pengajuan_rekom_data.status_perizinan_id).trigger('change');

            }
        });
    });

    $("#edit_form").submit(function(e) {
        e.preventDefault();

        let id = $('#id_edit').val();

        let surat_rekomendasi_lama = $("#surat_rekomendasi_lama").val();
        let pengajuan_id = $("#pengajuan_id_edit").val();
        let tanggal_surat = $("#tanggal_surat_edit").val();
        let surat_rekomendasi = $("#surat_rekomendasi_edit").val();
        let status_perizinan_id = $("#status_perizinan_id_edit").val();

        let formData = new FormData(this);

        formData.append('id', id);
        formData.append('surat_rekomendasi_lama', surat_rekomendasi_lama);
        formData.append('pengajuan_id', pengajuan_id);
        formData.append('tanggal_surat', tanggal_surat);
        formData.append('surat_rekomendasi', surat_rekomendasi);
        formData.append('status_perizinan_id', status_perizinan_id);


        $.ajax({
            url: '/backoffice/surat_rekomendasi/update',
            data: formData,
            dataType: 'json',
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            cache: false,
            method: 'POST',
            dataType: 'JSON',
            beforeSend: function() {
                $('.update').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('.update').prop('disabled', true);
            },
            success: function(response) {
                $('.update').html('Ubah');
                $('.update').prop('disabled', false);
                if (response.error) {
                    if (response.error.pengajuan_id) {
                        $("#pengajuan_id_edit").addClass('is-invalid');
                        $(".error-pengajuan-edit").html(response.error.pengajuan_id);
                    } else {
                        $("#pengajuan_id_edit").removeClass('is-invalid');
                        $(".error-pengajuan-edit").html('');
                    }
                    if (response.error.tanggal_surat) {
                        $("#tanggal_surat_edit").addClass('is-invalid');
                        $(".error-tanggal-edit").html(response.error.tanggal_surat);
                    } else {
                        $("#tanggal_surat_edit").removeClass('is-invalid');
                        $(".error-tanggal-edit").html('');
                    }
                    if (response.error.status_perizinan_id) {
                        $("#status_perizinan_id_edit").addClass('is-invalid');
                        $(".error-status-edit").html(response.error.status_perizinan_id);
                    } else {
                        $("#status_perizinan_id_edit").removeClass('is-invalid');
                        $(".error-status-edit").html('');
                    }

                } else {
                    Swal.fire({
                        icon: 'success',
                        title: `${response.success}`,
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 1000)
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: `Data Belum Tersimpan!`,
                });
                $('.update').html('Ubah');
                $('.update').prop('disabled', false);
            }
        });
    });
    // End Aksi

    // Aksi Hapus
    $(document).on('click', "#delete", function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: '/backoffice/surat_rekomendasi/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                $("#id_delete").val(response.surat_rekomendasi.id);
            }
        });
    });

    $("#delete_form").submit(function(e) {
        e.preventDefault();
        let id = $("#id_delete").val();
        $.ajax({
            url: '/backoffice/surat_rekomendasi/delete',
            method: 'post',
            dataType: 'JSON',
            data: {
                id: id,
            },
            beforeSend: function() {
                $('.button_delete').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('.button_delete').prop('disabled', true);
            },
            success: function(response) {
                $('.button_delete').html('Hapus');
                $('.button_delete').prop('disabled', false);

                $("#deleteModal").modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: `${response.success}`,
                });
                setTimeout(function() {
                    location.reload();
                }, 1000)
            },
            error: function(response) {

                Swal.fire({
                    icon: 'error',
                    title: `Data Gagal di Hapus!`,
                });
                $('.button_delete').html('Hapus');
                $('.button_delete').prop('disabled', false);

            }
        });
    });
    // End Aksi Hapus
</script>
<?= $this->endSection(); ?>