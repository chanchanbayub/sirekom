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
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Tambah Data <?= $title ?></button>
                                    </li>
                                </ul>
                            </div>
                            <br><br><br>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="kendaraan_table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Operator</th>
                                        <th scope="col">Jumlah Kendaraan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($kendaraan_data != null) : ?>
                                        <?php $no = 1; ?>
                                        <?php foreach ($kendaraan_data as $data) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $data["operator_kendaraan"] ?></td>
                                                <td><?= number_format($data["jumlah_kendaraan"])  ?> Kendaraan</td>
                                                <td><a href="/backoffice/data_base_kendaraan/<?= urlencode(base64_encode($data["operator_kendaraan"])) ?>" class="btn btn-outline-primary btn-sm">Lihat Data Kendaraan</a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="4" class="text-center">
                                                <h5>Tidak Ada Data</h5>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
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
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Formulir Import <?= $title ?> </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add_form">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="data_kendaraan" class="col-form-label">Upload File Kendaraan :</label>
                        <input type="file" class="form-control" id="data_kendaraan" name="data_kendaraan">
                        <div id="error-kendaraan" class="invalid-feedback">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger batal" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary save"> <i class="ti ti-send"></i> Simpan</button>

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

        // $("kendaraan_table").DataTable({

        // });

        $("#add_form").submit(function(e) {
            e.preventDefault();
            let data_kendaraan = $("#data_kendaraan").val();

            let formData = new FormData(this);

            formData.append('data_kendaraan', data_kendaraan);

            $.ajax({
                url: '/backoffice/data_base_kendaraan/insert',
                data: formData,
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                cache: false,
                method: 'POST',
                dataType: 'JSON',
                beforeSend: function() {
                    $('.save').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                    $('.save').prop('disabled', true);
                    $('.batal').prop('disabled', true);
                },
                success: function(response) {
                    $('.save').html('<i class="ti ti-send"></i> Simpan');
                    $('.save').prop('disabled', false);
                    $('.batal').prop('disabled', false);
                    if (response.error) {

                        if (response.error.data_kendaraan) {
                            $("#data_kendaraan").addClass('is-invalid');
                            $("#error-kendaraan").html(response.error.data_kendaraan);
                        } else {
                            $("#data_kendaraan").removeClass('is-invalid');
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
                        // console.log(response);
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: `Data Belum Tersimpan!`,
                    });
                    $('.save').html('<i class="ti ti-send"></i> Simpan');
                    $('.save').prop('disabled', false);
                    $('.batal').prop('disabled', false);
                }
            });
        });
    });

    // $(document).on('click', "#view", function(e) {
    //     e.preventDefault();
    //     let id = $(this).attr('data-id');

    //     $.ajax({
    //         url: '/backoffice/data_base_kendaraan/view',
    //         method: 'get',
    //         dataType: 'JSON',
    //         data: {
    //             id: id,
    //         },
    //         success: function(response) {

    //             alert(response);


    //             // $("#id_edit").val(response.jenis_perizinan.id);
    //             // $("#jenis_perizinan_edit").val(response.jenis_perizinan.jenis_perizinan);

    //             // let surat_pengantar_data = `<option value="">--Silahkan Pilih--</option>`;

    //             // response.pengantar_perizinan.forEach(function(e) {
    //             //     surat_pengantar_data += `<option value="${e.id}"> ${e.surat_pengantar} </option>`
    //             // });

    //             // $("#surat_pengantar_id_edit").html(surat_pengantar_data);

    //             // $("#surat_pengantar_id_edit").val(response.jenis_perizinan.surat_pengantar_id).trigger('change');

    //         }
    //     });
    // });
</script>
<?= $this->endSection(); ?>