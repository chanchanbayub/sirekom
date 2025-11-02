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
                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Tambah <?= $title ?></button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="role_table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Nama Perusahaan</th>
                                        <th scope="col">Legalitas Perusahaan</th>
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
                        <label for="users_id" class="col-form-label">Users Management :</label>
                        <select name="users_id" id="users_id" class="form-control">
                            <option value="">--Silahkan Pilih--</option>
                            <?php foreach ($users_management as $users_management) : ?>
                                <option value="<?= $users_management->id ?>"><?= $users_management->nama_lengkap ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div id="error-users" class="invalid-feedback">

                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="nama_perusahaan" class="col-form-label">Nama Perusahaan :</label>
                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" placeholder="PT.xxxxx">
                        <div id="error-nama-perusahaan" class="invalid-feedback">

                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="alamat_perusahaan" class="col-form-label">Alamat Perusahaan :</label>
                        <textarea name="alamat_perusahaan" id="alamat_perusahaan" class="form-control"></textarea>
                        <div id="error-alamat-perusahaan" class="invalid-feedback">

                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="legalitas_perusahaan" class="col-form-label">Dokumen Legalitas Perusahaan :</label>
                        <input type="file" name="legalitas_perusahaan" id="legalitas_perusahaan" class="form-control">
                        <div id="error-legalitas" class="invalid-feedback">

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
                        <input type="hidden" name="id" id="id_edit">
                        <input type="hidden" name="legalitas_lama" id="legalitas_lama">

                        <label for="users_id_edit" class="col-form-label">Users Management :</label>
                        <select name="users_id" id="users_id_edit" class="form-control">
                            <option value="">--Silahkan Pilih--</option>

                        </select>
                        <div id="error-users-edit" class="invalid-feedback">

                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="nama_perusahaan_edit" class="col-form-label">Nama Perusahaan :</label>
                        <input type="text" class="form-control" id="nama_perusahaan_edit" name="nama_perusahaan" placeholder="PT.xxxxx">
                        <div id="error-nama-perusahaan-edit" class="invalid-feedback">

                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="alamat_perusahaan_edit" class="col-form-label">Alamat Perusahaan :</label>
                        <textarea name="alamat_perusahaan" id="alamat_perusahaan_edit" class="form-control"></textarea>
                        <div id="error-alamat-perusahaan-edit" class="invalid-feedback">

                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="legalitas_perusahaan_edit" class="col-form-label">Dokumen Legalitas Perusahaan :</label>
                        <input type="file" name="legalitas_perusahaan" id="legalitas_perusahaan_edit" class="form-control">
                        <div id="error-legalitas-edit" class="invalid-feedback">

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
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

<script>
    $(document).ready(function() {

        $('#users_id').select2({
            theme: 'bootstrap-5',
            dropdownParent: $('#exampleModal')
        });

        $('#users_id_edit').select2({
            theme: 'bootstrap-5',
            dropdownParent: $('#editModal')
        });


        $('#role_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '/operator/profil_users/getProfil',
                method: 'POST'
            },
            order: [],
            columns: [{
                    data: 'nomor',
                    orderable: false

                },
                {
                    data: 'nama_lengkap',
                    orderable: true
                },
                {
                    data: 'nama_perusahaan',
                    orderable: true
                },

                {
                    data: 'view',
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
        let users_id = $("#users_id").val();
        let nama_perusahaan = $("#nama_perusahaan").val();
        let alamat_perusahaan = $("#alamat_perusahaan").val();
        let legalitas_perusahaan = $("#legalitas_perusahaan").val();

        let formData = new FormData(this);

        formData.append('users_id', users_id);
        formData.append('nama_perusahaan', nama_perusahaan);
        formData.append('alamat_perusahaan', alamat_perusahaan);
        formData.append('legalitas_perusahaan', legalitas_perusahaan);

        $.ajax({
            url: '/operator/profil_users/insert',
            data: formData,
            dataType: 'json',
            enctype: 'multipart/form-data',
            type: 'POST',
            contentType: false,
            processData: false,
            cache: false,
            method: 'post',
            dataType: 'JSON',
            beforeSend: function() {
                $('.save').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('.save').prop('disabled', true);
            },
            success: function(response) {
                $('.save').html('<i class="bi bi-box-arrow-in-right"></i> Simpan');
                $('.save').prop('disabled', false);
                if (response.error) {
                    if (response.error.users_id) {
                        $("#users_id").addClass('is-invalid');
                        $("#error-users").html(response.error.users_id);
                    } else {
                        $("#users_id").removeClass('is-invalid');
                        $("#error-users").html('');
                    }

                    if (response.error.nama_perusahaan) {
                        $("#nama_perusahaan").addClass('is-invalid');
                        $("#error-nama-perusahaan").html(response.error.nama_perusahaan);
                    } else {
                        $("#nama_perusahaan").removeClass('is-invalid');
                        $("#error-nama-perusahaan").html('');
                    }

                    if (response.error.alamat_perusahaan) {
                        $("#alamat_perusahaan").addClass('is-invalid');
                        $("#error-alamat-perusahaan").html(response.error.alamat_perusahaan);
                    } else {
                        $("#alamat_perusahaan").removeClass('is-invalid');
                        $("#error-alamat-perusahaan").html('');
                    }

                    if (response.error.legalitas_perusahaan) {
                        $("#legalitas_perusahaan").addClass('is-invalid');
                        $("#error-legalitas").html(response.error.legalitas_perusahaan);
                    } else {
                        $("#legalitas_perusahaan").removeClass('is-invalid');
                        $("#error-legalitas").html('');
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
</script>
<?= $this->endSection(); ?>