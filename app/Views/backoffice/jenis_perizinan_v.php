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
                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Tambah Data <?= $title ?></button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="role_table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Surat Pengantar</th>
                                        <th scope="col">Jenis Perizinan</th>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Formulir Tambah <?= $title ?> </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add_form">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="surat_pengantar_id" class="col-form-label">Surat Pengantar :</label>
                        <select name="surat_pengantar_id" id="surat_pengantar_id" class="form-control">
                            <option value="">--Silahkan Pilih--</option>
                            <?php foreach ($pengantar_perizinan as $pengantar_perizinan) : ?>
                                <option value="<?= $pengantar_perizinan->id ?>"><?= $pengantar_perizinan->surat_pengantar ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div id="error-pengantar" class="invalid-feedback">

                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_perizinan" class="col-form-label">Jenis Perizinan :</label>
                        <input type="text" class="form-control" id="jenis_perizinan" name="jenis_perizinan">
                        <div id="error-perizinan" class="invalid-feedback">

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
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="id_edit" name="id">
                        <label for="surat_pengantar_id_edit" class="col-form-label">Surat Pengantar :</label>
                        <select name="surat_pengantar_id" id="surat_pengantar_id_edit" class="form-select">
                            <option value="">--Silahkan Pilih--</option>
                        </select>
                        <div class="invalid-feedback error-pengantar-edit">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_perizinan_edit" class="col-form-label"><?= $title ?> :</label>
                        <input type="text" class="form-control" id="jenis_perizinan_edit" name="jenis_perizinan">
                        <div class="invalid-feedback error-perizinan-edit">

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

        $('#surat_pengantar_id').select2({
            theme: 'bootstrap-5',
            dropdownParent: $('#exampleModal')
        });

        $('#surat_pengantar_id_edit').select2({
            theme: 'bootstrap-5',
            dropdownParent: $('#editModal')
        });

        $('#role_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '/backoffice/jenis_perizinan/getJenisPerizinan',
                method: 'POST'
            },
            order: [],
            columns: [{
                    data: 'nomor',
                    orderable: false

                },
                {
                    data: 'surat_pengantar',
                    orderable: true
                },
                {
                    data: 'jenis_perizinan',
                    orderable: true
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

        let surat_pengantar_id = $("#surat_pengantar_id").val();
        let jenis_perizinan = $("#jenis_perizinan").val();

        $.ajax({
            url: '/backoffice/jenis_perizinan/insert',
            method: 'post',
            dataType: 'JSON',
            data: {
                surat_pengantar_id: surat_pengantar_id,
                jenis_perizinan: jenis_perizinan,
            },
            beforeSend: function() {
                $('.save').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('.save').prop('disabled', true);
            },
            success: function(response) {
                $('.save').html('<i class="bi bi-box-arrow-in-right"></i> Simpan');
                $('.save').prop('disabled', false);
                if (response.error) {
                    if (response.error.surat_pengantar_id) {
                        $("#surat_pengantar_id").addClass('is-invalid');
                        $("#error-pengantar").html(response.error.surat_pengantar_id);
                    } else {
                        $("#surat_pengantar_id").removeClass('is-invalid');
                        $("#error-pengantar").html('');
                    }
                    if (response.error.jenis_perizinan) {
                        $("#jenis_perizinan").addClass('is-invalid');
                        $("#error-perizinan").html(response.error.jenis_perizinan);
                    } else {
                        $("#jenis_perizinan").removeClass('is-invalid');
                        $("#error-perizinan").html('');
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
                $('.save').html('<i class="bi bi-box-arrow-in-right"></i> Simpan');
                $('.save').prop('disabled', false);
            }
        });
    });

    // Aksi Edit 
    $(document).on('click', "#edit", function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: '/backoffice/jenis_perizinan/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                // console.log(response);
                $("#id_edit").val(response.jenis_perizinan.id);
                $("#jenis_perizinan_edit").val(response.jenis_perizinan.jenis_perizinan);

                let surat_pengantar_data = `<option value="">--Silahkan Pilih--</option>`;

                response.pengantar_perizinan.forEach(function(e) {
                    surat_pengantar_data += `<option value="${e.id}"> ${e.surat_pengantar} </option>`
                });

                $("#surat_pengantar_id_edit").html(surat_pengantar_data);

                $("#surat_pengantar_id_edit").val(response.jenis_perizinan.surat_pengantar_id).trigger('change');

            }
        });
    });

    $("#edit_form").submit(function(e) {
        e.preventDefault();
        let id = $('#id_edit').val();
        let jenis_perizinan = $('#jenis_perizinan_edit').val();
        let surat_pengantar_id = $('#surat_pengantar_id_edit').val();

        $.ajax({
            url: '/backoffice/jenis_perizinan/update',
            method: 'post',
            dataType: 'JSON',
            data: {
                id: id,
                jenis_perizinan: jenis_perizinan,
                surat_pengantar_id: surat_pengantar_id,

            },
            beforeSend: function() {
                $('.update').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('.update').prop('disabled', true);
            },
            success: function(response) {
                $('.update').html('<i class="bi bi-box-arrow-in-right"></i> Ubah');
                $('.update').prop('disabled', false);
                if (response.error) {
                    if (response.error.jenis_perizinan) {
                        $("#jenis_perizinan_edit").addClass('is-invalid');
                        $(".error-perizinan-edit").html(response.error.jenis_perizinan);
                    } else {
                        $("#jenis_perizinan_edit").removeClass('is-invalid');
                        $(".error-perizinan-edit").html('');
                    }
                    if (response.error.surat_pengantar_id) {
                        $("#surat_pengantar_id_edit").addClass('is-invalid');
                        $(".error-pengantar-edit").html(response.error.surat_pengantar_id);
                    } else {
                        $("#surat_pengantar_id_edit").removeClass('is-invalid');
                        $(".error-pengantar-edit").html('');
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
                $('.update').html('<i class="bi bi-box-arrow-in-right"></i> Ubah');
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
            url: '/backoffice/jenis_perizinan/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                $("#id_delete").val(response.jenis_perizinan.id);
            }
        });
    });

    $("#delete_form").submit(function(e) {
        e.preventDefault();
        let id = $("#id_delete").val();
        $.ajax({
            url: '/backoffice/jenis_perizinan/delete',
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
                $('.button_delete').html('<i class="bi bi-trash"></i> Hapus');
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
                $('.button_delete').html('<i class="bi bi-trash"></i> Hapus');
                $('.button_delete').prop('disabled', false);

            }
        });
    });
    // End Aksi Hapus
</script>
<?= $this->endSection(); ?>