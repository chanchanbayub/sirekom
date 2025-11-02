<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login SIREKOM</title>
    <link rel="shortcut icon" type="image/png" href="/assets/images/logos/favicon.png" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <h2>SIREKOM</h2>
                                </a>
                                <p class="text-center">Silahkan Login</p>
                                <form id="login_form">
                                    <?= csrf_field(); ?>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Masukan Email :</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Masukan Password :</label>
                                        <input type="password" class="form-control" id="password">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                                            <label class="form-check-label text-dark" for="flexCheckChecked">
                                                Remeber this Device
                                            </label>
                                        </div>
                                        <!-- <a class="text-primary fw-bold" href="index.html">Forgot Password ?</a> -->
                                    </div>
                                    <button type="submit" class="btn btn-outline-primary w-100 py-8 fs-4 mb-4 rounded-2" id="cek_login">Login</button>
                                </form>
                                <br>
                                <div class="text-center">
                                    <a class="text-primary" href="/">Kembali Ke Beranda</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

    <script>
        $("#login_form").submit(function(e) {
            e.preventDefault();
            let email = $("#email").val();
            let password = $("#password").val();

            $.ajax({
                url: '/auth/cek_login',
                method: 'post',
                dataType: 'JSON',
                data: {
                    email: email,
                    password: password
                },
                beforeSend: function() {
                    $('#cek_login').html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...");
                    $('#cek_login').prop('disabled', true);
                },
                success: function(response) {
                    $('#cek_login').html('Masuk');
                    $('#cek_login').prop('disabled', false);
                    if (response.error) {

                        if (response.error.email) {
                            $("#email").addClass('is-invalid');
                            $(".error-email").html(response.error.email);
                        } else {
                            $("#email").removeClass('is-invalid');
                            $(".error-email").html('');
                        }
                        if (response.error.password) {
                            $("#password").addClass('is-invalid');
                            $(".error-password").html(response.error.password);
                        } else {
                            $("#password").removeClass('is-invalid');
                            $(".error-password").html('');
                        }
                    } else if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: `${response.success}`,
                        });
                        setTimeout(function() {
                            window.location.replace(`${response.url}`);
                        }, 1000);

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: `${response.errors}`,
                        });
                        $('#cek_login').html('Masuk');
                        $('#cek_login').prop('disabled', false);
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: `Data Gagal Diproses`,
                    });
                    $('#cek_login').html('<i class="bi bi-send"></i> Masuk');
                    $('#cek_login').prop('disabled', false);
                }
            });
        });
    </script>

</body>

</html>