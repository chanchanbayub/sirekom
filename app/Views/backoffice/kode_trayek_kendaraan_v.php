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
                            <table class="table table-bordered" id="trayek_table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Jenis Kendaraan</th>
                                        <th scope="col">Kode Trayek Kendaraan</th>
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
                        <label for="jenis_kendaraan_id" class="col-form-label">Jenis Kendaraan :</label>
                        <select name="jenis_kendaraan_id" id="jenis_kendaraan_id" class="form-select">
                            <option value="">--Silahkan Pilih--</option>
                            <?php foreach ($jenis_kendaraan as $jenis_kendaraan) : ?>
                                <option value="<?= $jenis_kendaraan->id ?>"><?= $jenis_kendaraan->jenis_kendaraan ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div id="error-kendaraan" class="invalid-feedback">

                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="kode_kendaraan" class="col-form-label">Kode Trayek Kendaraan :</label>
                        <input type="text" class="form-control" id="kode_kendaraan" name="kode_kendaraan">
                        <div id="error-trayek" class="invalid-feedback">

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
                        <label for="jenis_kendaraan_id_edit" class="col-form-label">Jenis Kendaraan :</label>
                        <select name="jenis_kendaraan_id" id="jenis_kendaraan_id_edit" class="form-select">
                            <option value="">--Silahkan Pilih--</option>
                        </select>
                        <div class="invalid-feedback error-kendaraan-edit">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="kode_kendaraan_edit" class="col-form-label">Nama Lengkap :</label>
                        <input type="text" class="form-control" id="kode_kendaraan_edit" name="kode_kendaraan">
                        <div class="invalid-feedback error-trayek-edit">

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

        $('#jenis_kendaraan_id').select2({
            theme: 'bootstrap-5',
            dropdownParent: $('#exampleModal')
        });

        $('#jenis_kendaraan_id_edit').select2({
            theme: 'bootstrap-5',
            dropdownParent: $('#editModal')
        });

        $('#trayek_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '/backoffice/kode_kendaraan/getKodeKendaraan',
                method: 'POST'
            },
            order: [],
            columns: [{
                    data: 'nomor',
                    orderable: false

                },
                {
                    data: 'kode_kendaraan',
                },

                {
                    data: 'jenis_kendaraan',
                },

                {
                    data: 'action',
                    orderable: false
                },

            ],
        });

    });

    $(document).ready(function(e) {
        $("#add_form").submit(function(e) {
            e.preventDefault();

            let kode_kendaraan = $("#kode_kendaraan").val();
            let jenis_kendaraan_id = $("#jenis_kendaraan_id").val();


            $.ajax({
                url: '/backoffice/kode_kendaraan/insert',
                method: 'post',
                dataType: 'JSON',
                data: {
                    kode_kendaraan: kode_kendaraan,
                    jenis_kendaraan_id: jenis_kendaraan_id,
                },
                beforeSend: function() {
                    $('.save').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                    $('.save').prop('disabled', true);
                },
                success: function(response) {
                    $('.save').html('<i class="bi bi-box-arrow-in-right"></i> Kirim');
                    $('.save').prop('disabled', false);
                    if (response.error) {
                        if (response.error.kode_kendaraan) {
                            $("#kode_kendaraan").addClass('is-invalid');
                            $("#error-trayek").html(response.error.kode_kendaraan);
                        } else {
                            $("#kode_kendaraan").removeClass('is-invalid');
                            $("#error-trayek").html('');
                        }
                        if (response.error.jenis_kendaraan_id) {
                            $("#jenis_kendaraan_id").addClass('is-invalid');
                            $("#error-kendaraan").html(response.error.jenis_kendaraan_id);
                        } else {
                            $("#jenis_kendaraan_id").removeClass('is-invalid');
                            $("#error-kendaraan").html('');
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
                    $('.save').html('<i class="bi bi-box-arrow-in-right"></i> Kirim');
                    $('.save').prop('disabled', false);
                }
            });
        })
    });

    // Aksi Edit 
    $(document).on('click', "#edit", function(e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            url: '/backoffice/kode_kendaraan/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                // console.log(response);
                $("#id_edit").val(response.kode_kendaraan.id);
                $("#kode_kendaraan_edit").val(response.kode_kendaraan.kode_kendaraan);


                let jenis_kendaraan_id = `<option value="">--Silahkan Pilih--</option>`;

                response.jenis_kendaraan.forEach(function(e) {
                    jenis_kendaraan_id += `<option value="${e.id}"> ${e.jenis_kendaraan} </option>`
                });

                $("#jenis_kendaraan_id_edit").html(jenis_kendaraan_id);

                $("#jenis_kendaraan_id_edit").val(response.kode_kendaraan.jenis_kendaraan_id).trigger('change');


            }
        });
    });

    $("#edit_form").submit(function(e) {
        e.preventDefault();
        let id = $('#id_edit').val();
        let kode_kendaraan = $('#kode_kendaraan_edit').val();

        let jenis_kendaraan_id = $('#jenis_kendaraan_id_edit').val();

        $.ajax({
            url: '/backoffice/kode_kendaraan/update',
            method: 'post',
            dataType: 'JSON',
            data: {
                id: id,
                kode_kendaraan: kode_kendaraan,
                jenis_kendaraan_id: jenis_kendaraan_id,

            },
            beforeSend: function() {
                $('.update').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('.update').prop('disabled', true);
            },
            success: function(response) {
                $('.update').html('<i class="bi bi-box-arrow-in-right"></i> Ubah');
                $('.update').prop('disabled', false);
                if (response.error) {
                    if (response.error.kode_kendaraan) {
                        $("#kode_kendaraan_edit").addClass('is-invalid');
                        $(".error-trayek-edit").html(response.error.kode_kendaraan);
                    } else {
                        $("#kode_kendaraan_edit").removeClass('is-invalid');
                        $(".error-trayek-edit").html('');
                    }

                    if (response.error.jenis_kendaraan_id) {
                        $("#jenis_kendaraan_id_edit").addClass('is-invalid');
                        $(".error-kendaraan-edit").html(response.error.jenis_kendaraan_id);
                    } else {
                        $("#jenis_kendaraan_id_edit").removeClass('is-invalid');
                        $(".error-kendaraan-edit").html('');
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
            url: '/backoffice/kode_kendaraan/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                $("#id_delete").val(response.kode_kendaraan.id);
            }
        });
    });

    $("#delete_form").submit(function(e) {
        e.preventDefault();
        let id = $("#id_delete").val();
        $.ajax({
            url: '/backoffice/kode_kendaraan/delete',
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