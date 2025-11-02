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
                                        <!-- <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Tambah Data <?= $title ?></button> -->
                                        <a href="/backoffice/form_pengajuan_rekomendasi" class="btn btn-outline-primary btn-sm">Ajukan Permohonan Surat Rekomendasi</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="rekom_table" style="text-transform: capitalize;">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nomor Pengajuan Rekom</th>
                                        <th scope="col">Pemohon</th>
                                        <th scope="col">Pengantar Rekomendasi</th>
                                        <th scope="col">Jenis Perizinan</th>
                                        <th scope="col">Dokumen</th>
                                        <th scope="col">Tanggal Pengajuan</th>
                                        <th scope="col">Status Pengajuan</th>
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
                        <label for="status_perizinan_id" class="col-form-label">Status Perzinan :</label>
                        <select name="status_perizinan_id" id="status_perizinan_id" class="form-select">
                            <option value="">--Silahkan Pilih--</option>
                            <?php foreach ($status_perizinan as $status_perizinan) : ?>
                                <option value="<?= $status_perizinan->id ?>"><?= $status_perizinan->status_perizinan ?></option>
                            <?php endforeach; ?>
                        </select>

                        <div class="invalid-feedback error-perizinan">

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
        $(document).on('click', "#delete", function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id');
            console.log(id);
            $.ajax({
                url: '/backoffice/pengajuan_rekom/edit',
                method: 'get',
                dataType: 'JSON',
                data: {
                    id: id,
                },
                success: function(response) {
                    // console.log(response.status_perizinan);
                    $("#id_delete").val(response.pengajuan_rekom.id);
                }
            });
        });

        $("#delete_form").submit(function(e) {
            e.preventDefault();
            let id = $("#id_delete").val();
            $.ajax({
                url: '/backoffice/pengajuan_rekom/delete',
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

        $(document).on('click', "#edit", function(e) {
            e.preventDefault();
            let id = $(this).attr('data-id');
            // alert('ok');
            $.ajax({
                url: '/backoffice/pengajuan_rekom/edit',
                method: 'get',
                dataType: 'JSON',
                data: {
                    id: id,
                },
                success: function(response) {

                    console.log(response);
                    $("#id_edit").val(response.pengajuan_rekom.id);

                    let status_perizinan_data = `<option value="">--Silahkan Pilih--</option>`;

                    response.status_perizinan.forEach(function(e) {
                        status_perizinan_data += `<option value="${e.id}"> ${e.status_perizinan} </option>`
                    });

                    $("#status_perizinan_id").html(status_perizinan_data);

                    $("#status_perizinan_id").val(response.pengajuan_rekom.status_perizinan_id).trigger('change');
                    // $("#jenis_kendaraan_edit").val(response.jenis_kendaraan);

                }
            });
        });
    });

    $("#edit_form").submit(function(e) {
        e.preventDefault();
        let id = $('#id_edit').val();
        let status_perizinan_id = $('#status_perizinan_id').val();

        $.ajax({
            url: '/backoffice/pengajuan_rekom/update',
            method: 'post',
            dataType: 'JSON',
            data: {
                id: id,
                status_perizinan_id: status_perizinan_id

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
                        $("#status_perizinan_id").addClass('is-invalid');
                        $(".error-perizinan").html(response.error.status_perizinan_id);
                    } else {
                        $("#status_perizinan_id").removeClass('is-invalid');
                        $(".error-perizinan").html('');
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
    // Aksi Edit 
    $(document).ready(function() {
        $('#rekom_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '/backoffice/pengajuan_rekom/getPengajuanRekom',
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
                    data: 'surat_pengantar',
                    orderable: true
                },
                {
                    data: 'jenis_perizinan',
                    orderable: true
                },
                {
                    data: 'view',
                    orderable: false
                },
                {
                    data: 'tanggal_pengajuan',
                    orderable: true
                },
                {
                    data: 'status_perizinan',
                    orderable: true
                },
                {
                    data: 'action',
                    orderable: false
                },

            ],
        });

    });
    // End Aksi Hapus

    // Aksi Edit 
</script>
<?= $this->endSection(); ?>