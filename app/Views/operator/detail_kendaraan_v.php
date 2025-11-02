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
                            <!-- <div class="ms-auto">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item text-info">
                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Tambah Data <?= $title ?></button>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="role_table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nomor Kendaraan</th>
                                        <th scope="col">Tipe Bus</th>
                                        <th scope="col">Merk Kendaraan</th>
                                        <th scope="col">Tahun Pembuatan</th>
                                        <th scope="col">Tahun Registrasi</th>
                                        <th scope="col">Nomor Uji Kendaraan</th>
                                        <th scope="col">Operator</th>
                                        <th scope="col">Kode Rute Reguler</th>
                                        <th scope="col">Kode Rute TJ</th>
                                        <th scope="col">Rute</th>
                                        <th scope="col">Habis Masa Berlaku KP</th>
                                        <th scope="col">Tanggal Berlaku Uji</th>
                                        <th scope="col">Status Integrasi</th>
                                        <th scope="col">Jenis Perizinan</th>
                                        <!-- <th scope="col">View</th> -->
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



<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script>
    $(document).ready(function() {
        $('#role_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '/operator/getDataKendaraan/<?= base64_encode($send_data) ?>',
                method: 'POST'
            },
            order: [],
            columns: [{
                    data: 'nomor',
                    orderable: false

                },
                {
                    data: 'nomor_kendaraan',
                    orderable: true
                },
                {
                    data: 'jenis_kendaraan',
                    orderable: true
                },
                {
                    data: 'merk',
                    orderable: true
                },
                {
                    data: 'tahun_pembuatan',
                    orderable: true
                },
                {
                    data: 'tahun_registrasi',
                    orderable: true
                },
                {
                    data: 'nomor_uji',
                    orderable: true
                },
                {
                    data: 'operator',
                    orderable: true
                },
                {
                    data: 'kode_trayek_reguler',
                    orderable: true
                },
                {
                    data: 'kode_trayek_tj',
                    orderable: true
                },
                {
                    data: 'rute',
                    orderable: true
                },
                {
                    data: 'habis_masa_berlaku_kp',
                    orderable: true
                },

                {
                    data: 'tgl_berlaku_uji',
                    orderable: true
                },
                {
                    data: 'status_integrasi',
                    orderable: true
                },
                {
                    data: 'jenis_perizinan',
                    orderable: true
                },

                // {
                //     data: 'action',
                //     orderable: false
                // },

            ],
        });

    });

    // End Aksi Hapus
</script>
<?= $this->endSection(); ?>