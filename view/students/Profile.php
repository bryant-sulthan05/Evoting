<?php
$title = 'Profile';
include '../components/config.php';
include '../components/meta.php';
include '../components/navbar.php';
include '../components/query/ProfileQuery.php';
?>
<?php
if (isset($_COOKIE['edited'])) {
?>
    <script>
        const information = $("#notif", function() {
            Swal.fire({
                title: "Edit Profile Berhasil",
                icon: "success"
            });
        });
    </script>
    <div class="notif" id="notif" data-infodata="info"></div>
<?php
    setcookie('edited', 'cek', time() - 30);
}
?>
<?php
if (isset($_COOKIE['failed'])) {
?>
    <script>
        const information = $("#notif", function() {
            Swal.fire({
                title: "Edit Profile Gagal",
                icon: "error"
            });
        });
    </script>
    <div class="notif" id="notif" data-infodata="info"></div>
<?php
    unset($_COOKIE['edited']);
}
?>

<?php
if (isset($_COOKIE['cek']) == 'ada') {
?>
    <script>
        const information = $("#notif", function() {
            Swal.fire({
                title: "Email Sudah Ada",
                icon: "warning"
            });
        });
    </script>
    <div class="notif" id="notif" data-infodata="info"></div>
<?php
    unset($_COOKIE['cek']);
}
?>

<style>
    #choose {
        background-color: #13cfac;
        color: #1f2833;
        border: #1f2833 2px solid;
    }

    #choose:hover {
        background-color: #1f2833;
        color: #13cfac;
    }

    .edit {
        background-color: #13cfac;
        color: #1f2833;
        border: #1f2833 2px solid;
    }

    .edit:hover {
        background-color: #1f2833;
        color: #13cfac;
    }
</style>
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="card p-3 shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <h3 class="fw-bold text-center">Profile</h3>
                        </div>
                        <div class="d-flex justify-content-center">
                            <!-- Menampilkan gambar yang dipilih -->
                            <?php if ($Profile['photo'] == NULL) { ?>
                                <img id="pict" src="../../public/img/profile.svg" style="height: 150px;" class="rounded-circle" width="150" />
                            <?php } else { ?>
                                <img id="pict" src="../../public/uploaded/<?= $Profile['photo'] ?>" style="height: 150px;" class="rounded-circle" width="150" />
                            <?php } ?>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <!-- Pilih gambar -->
                            <?php if ($Profile['photo'] == NULL) { ?>
                                <input type="file" name="pict" id="image-input" onchange="readURL(this);" class="d-none" accept="image/jpeg, image/png, image/jpg" value="../../public/img/profile.svg" />
                            <?php } else { ?>
                                <input type="file" name="pict" id="image-input" onchange="readURL(this);" class="d-none" accept="image/jpeg, image/png, image/jpg" value="../../public/uploaded/<?= $Profile['photo'] ?>" />
                            <?php } ?>
                            <label for="image-input" id="choose" class="d-flex justify-content-center btn fw-bold"><span class="bi bi-upload">&nbsp;&nbsp;Pilih Gambar</span></label>
                        </div>
                        <div class="card-text">
                            <div class="row">
                                <div class="d-flex justify-content-center mt-4">
                                    <div class="col-md-5">
                                        <div class="d-flex justify-content-center">
                                            <h4 class="fw-bold"><?= $Profile['firstname'] . " " . $Profile['lastname'] ?></h4>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <span class="fw-bold text-secondary"><?= $Profile['classroom'] . " | " . $Profile['expertise'] ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="email" class="fw-bold">Email :</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email" value="<?= $Profile['email'] ?>">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="password" class="fw-bold">Password :</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password" value="<?= $Profile['pass'] ?>" required>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="tlp" class="fw-bold">No. tlp :</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="tlp">+62</span>
                                        <input type="number" name="tlp" id="tlp" class="form-control" placeholder="Masukkan No. Tpl" value="<?= $Profile['tlp'] ?>" aria-describedby="tlp" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="alamat" class="fw-bold">Alamat :</label>
                                    <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat" value="<?= $Profile['address'] ?>" required>
                                </div>
                                <div class="col-md-12 mt-5 d-flex justify-content-center">
                                    <button type="submit" name="edit" class="btn fw-bold edit"><span class="bi bi-pencil-square">&nbsp;Edit</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#pict').attr('src', e.target.result).width(150).height(150);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>