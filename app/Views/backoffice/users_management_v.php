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
                            <table class="table datatable" id="users_table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">No Whatsapp</th>
                                        <th scope="col">Role Management</th>
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
                        <label for="nama_lengkap" class="col-form-label">Nama Lengkap :</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
                        <div id="error-nama" class="invalid-feedback">

                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email :</label>
                        <input type="text" class="form-control" id="email" name="email">
                        <div id="error-email" class="invalid-feedback">

                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="no_whatsapp" class="col-form-label">Nomor Whatsapp :</label>
                        <input type="number" class="form-control" id="no_whatsapp" name="no_whatsapp" placeholder="628xxxxxxxx">
                        <div id="error-whatsapp" class="invalid-feedback">

                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="col-form-label">Password :</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <div id="error-password" class="invalid-feedback">

                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="role_management_id" class="col-form-label">Role Management :</label>
                        <select name="role_management_id" id="role_management_id" class="form-select">
                            <option value="">--Silahkan Pilih--</option>
                            <?php foreach ($role_management as $role_management) : ?>
                                <option value="<?= $role_management->id ?>"><?= $role_management->role_management ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div id="error-role" class="invalid-feedback">

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
                        <label for="nama_lengkap_edit" class="col-form-label">Nama Lengkap :</label>
                        <input type="text" class="form-control" id="nama_lengkap_edit" name="nama_lengkap">
                        <div class="invalid-feedback error-nama-edit">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email_edit" class="col-form-label">Email :</label>
                        <input type="text" class="form-control" id="email_edit" name="email">
                        <div class="invalid-feedback error-email-edit">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_edit" class="col-form-label">Password :</label>
                        <input type="password" class="form-control" id="password_edit" name="password">
                        <span style="font-size:12px; color:red; text-transform:capitalize">masukan password lama jika tidak ingin merubah password</span>
                        <div class=" invalid-feedback error-password-edit">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="no_whatsapp_edit" class="col-form-label">Nomor Whatsapp :</label>
                        <input type="number" class="form-control" id="no_whatsapp_edit" name="no_whatsapp">
                        <div class="invalid-feedback error-whatsapp-edit">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="role_management_id_edit" class="col-form-label">role_management_id :</label>
                        <select name="role_management_id" id="role_management_id_edit" class="form-select">
                            <option value="">--Silahkan Pilih--</option>
                        </select>
                        <div class="invalid-feedback error-role-edit">

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
        $('#users_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '/backoffice/users_management/getUsers',
                method: 'POST'
            },
            order: [],
            columns: [{
                    data: 'nomor',
                    orderable: false

                },
                {
                    data: 'nama_lengkap',
                },
                {
                    data: 'email',
                },
                {
                    data: 'no_whatsapp',
                },
                {
                    data: 'role_management',
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

            let nama_lengkap = $("#nama_lengkap").val();
            let email = $("#email").val();
            let password = $("#password").val();
            let no_whatsapp = $("#no_whatsapp").val();
            let role_management_id = $("#role_management_id").val();


            $.ajax({
                url: '/backoffice/users_management/insert',
                method: 'post',
                dataType: 'JSON',
                data: {
                    nama_lengkap: nama_lengkap,
                    email: email,
                    password: password,
                    no_whatsapp: no_whatsapp,
                    role_management_id: role_management_id,
                },
                beforeSend: function() {
                    $('.save').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                    $('.save').prop('disabled', true);
                },
                success: function(response) {
                    $('.save').html('<i class="bi bi-box-arrow-in-right"></i> Kirim');
                    $('.save').prop('disabled', false);
                    if (response.error) {
                        if (response.error.nama_lengkap) {
                            $("#nama_lengkap").addClass('is-invalid');
                            $("#error-nama").html(response.error.nama_lengkap);
                        } else {
                            $("#nama_lengkap").removeClass('is-invalid');
                            $("#error-nama").html('');
                        }
                        if (response.error.email) {
                            $("#email").addClass('is-invalid');
                            $("#error-email").html(response.error.email);
                        } else {
                            $("#email").removeClass('is-invalid');
                            $("#error-email").html('');
                        }
                        if (response.error.no_whatsapp) {
                            $("#no_whatsapp").addClass('is-invalid');
                            $("#error-whatsapp").html(response.error.no_whatsapp);
                        } else {
                            $("#no_whatsapp").removeClass('is-invalid');
                            $("#error-whatsapp").html('');
                        }
                        if (response.error.password) {
                            $("#password").addClass('is-invalid');
                            $("#error-password").html(response.error.password);
                        } else {
                            $("#password").removeClass('is-invalid');
                            $("#error-password").html('');
                        }
                        if (response.error.role_management_id) {
                            $("#role_management_id").addClass('is-invalid');
                            $("#error-role").html(response.error.role_management_id);
                        } else {
                            $("#role_management_id").removeClass('is-invalid');
                            $("#error-role").html('');
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
            url: '/backoffice/users_management/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                // console.log(response);
                $("#id_edit").val(response.users_management.id);
                $("#nama_lengkap_edit").val(response.users_management.nama_lengkap);
                $("#email_edit").val(response.users_management.email);

                $("#no_whatsapp_edit").val(response.users_management.no_whatsapp);

                let role_id = `<option value="">--Silahkan Pilih--</option>`;

                response.role_management.forEach(function(e) {
                    role_id += `<option value="${e.id}"> ${e.role_management} </option>`
                });

                $("#role_management_id_edit").html(role_id);

                $("#role_management_id_edit").val(response.users_management.role_management_id).trigger('change');


            }
        });
    });

    $("#edit_form").submit(function(e) {
        e.preventDefault();
        let id = $('#id_edit').val();
        let nama_lengkap = $('#nama_lengkap_edit').val();
        let email = $('#email_edit').val();
        let password = $('#password_edit').val();
        let no_whatsapp = $('#no_whatsapp_edit').val();
        let role_management_id = $('#role_management_id_edit').val();

        $.ajax({
            url: '/backoffice/users_management/update',
            method: 'post',
            dataType: 'JSON',
            data: {
                id: id,
                nama_lengkap: nama_lengkap,
                email: email,
                password: password,
                no_whatsapp: no_whatsapp,
                role_management_id: role_management_id,

            },
            beforeSend: function() {
                $('.update').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                $('.update').prop('disabled', true);
            },
            success: function(response) {
                $('.update').html('<i class="bi bi-box-arrow-in-right"></i> Ubah');
                $('.update').prop('disabled', false);
                if (response.error) {
                    if (response.error.nama_lengkap) {
                        $("#nama_lengkap_edit").addClass('is-invalid');
                        $(".error-nama-edit").html(response.error.nama_lengkap);
                    } else {
                        $("#nama_lengkap_edit").removeClass('is-invalid');
                        $(".error-nama-edit").html('');
                    }
                    if (response.error.email) {
                        $("#email_edit").addClass('is-invalid');
                        $(".error-email-edit").html(response.error.email);
                    } else {
                        $("#email_edit").removeClass('is-invalid');
                        $(".error-email-edit").html('');
                    }
                    if (response.error.no_whatsapp) {
                        $("#no_whatsapp_edit").addClass('is-invalid');
                        $(".error-whatsapp-edit").html(response.error.no_whatsapp);
                    } else {
                        $("#no_whatsapp_edit").removeClass('is-invalid');
                        $(".error-whatsapp-edit").html('');
                    }
                    if (response.error.role_management_id) {
                        $("#role_management_id_edit").addClass('is-invalid');
                        $(".error-role-edit").html(response.error.role_management_id);
                    } else {
                        $("#role_management_id_edit").removeClass('is-invalid');
                        $(".error-role-edit").html('');
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
            url: '/backoffice/users_management/edit',
            method: 'get',
            dataType: 'JSON',
            data: {
                id: id,
            },
            success: function(response) {
                $("#id_delete").val(response.users_management.id);
            }
        });
    });

    $("#delete_form").submit(function(e) {
        e.preventDefault();
        let id = $("#id_delete").val();
        $.ajax({
            url: '/backoffice/users_management/delete',
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