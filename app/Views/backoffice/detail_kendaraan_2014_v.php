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
                                        <th scope="col">Nomor Uji Kendaraan</th>
                                        <th scope="col">Kode Trayek</th>
                                        <th scope="col">Trayek</th>
                                        <th scope="col">Operator</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Tahun</th>
                                        <th scope="col">Merk</th>
                                        <th scope="col">Jenis Kendaraan</th>
                                        <th scope="col">Awal Masa Berlaku</th>
                                        <th scope="col">Habis Masa Berlaku</th>
                                        <th scope="col">Tanggal Penerbitan</th>

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
                url: '/backoffice/getDataKendaraan2014/<?= $send_data ?>',
                // url: '/backoffice/getDataKendaraan/<?= $send_data ?>',
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
                    data: 'no_uji_kendaraan',
                    orderable: true
                },
                {
                    data: 'kode_trayek',
                    orderable: true
                },
                {
                    data: 'trayek',
                    orderable: true
                },
                {
                    data: 'operator',
                    orderable: true
                },
                {
                    data: 'alamat',
                    orderable: true
                },
                {
                    data: 'tahun',
                    orderable: true
                },
                {
                    data: 'merk',
                    orderable: true
                },
                {
                    data: 'jenis_kendaraan',
                    orderable: true
                },
                {
                    data: 'awal_masa_berlaku',
                    orderable: true
                },
                {
                    data: 'habis_masa_berlaku',
                    orderable: true
                },
                {
                    data: 'tanggal_penerbitan',
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