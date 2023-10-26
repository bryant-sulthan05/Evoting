<?php
$title = "Lupa Password";
include '../components/config.php';
include '../components/meta.php';
include '../components/query/ForgotPw.php';
$pages = isset($_GET['page']) ? $_GET['page'] : '';
?>
<style>
    .container {
        margin-top: 150px;
    }

    .btn {
        background-color: #13cfac;
        color: #202121;
    }

    .btn:hover {
        background-color: #202121;
        color: #13cfac;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h5 class="fw-bold text-center">Lupa Password</h5>
                    </div>
                    <div class="card-content mt-5">
                        <?php if ($pages == 'ubah_password') : ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <span class="fw-bold">Password baru :</span>
                                <input type="password" name="pass" id="pass" class="form-control mb-1" placeholder="Masukkan Password Baru">
                                <span style="font-size: smaller; margin-left: 5px;">*note : password harus melebihi 8 karakter</span>
                                <div class="d-flex justify-content-center mt-4">
                                    <button type="submit" name="save" id="save" class="btn fw-bold">Simpan</button>
                                </div>
                            </form>
                        <?php else :
                            if (isset($_SESSION['code'])) :
                                echo "<div class='alert alert-warning'>
                                Silahkan cek email untuk memasuki tautan ubah password
                                </div>";
                            endif;
                        ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <span class="fw-bold">Email :</span>
                                <input type="email" name="email" id="email" class="form-control mb-1" placeholder="Masukkan Email">
                                <span style="font-size: smaller; margin-left: 5px;">*note : masukkan email untuk menerima kode verifikasi</span>
                                <div class="d-flex justify-content-center mt-4">
                                    <button type="submit" name="continue" id="continue" class="btn fw-bold">Lanjut</button>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>