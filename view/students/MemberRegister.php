<?php
$title = 'Daftar Anggota Osis';
include '../components/config.php';
include '../components/meta.php';
include '../components/navbar.php';
include '../components/query/ProfileQuery.php';
include '../components/query/memberQuery.php';
$MemberCheck = $config->query("SELECT * FROM member WHERE students_id = '$_SESSION[students_id]'");
$Check = mysqli_fetch_array($MemberCheck, MYSQLI_ASSOC);
?>
<style>
    .reg {
        background-color: #13cfac;
        color: #1f2833;
        border: #1f2833 2px solid;
        padding: 10px;
        width: 150px;
        border-radius: 10px;
    }

    .reg:hover {
        background-color: #1f2833;
        color: #13cfac;
        border: #13cfac 2px solid;
    }
</style>
<div class="container mt-5">
    <?php if (!isset($Check)) : ?>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title mb-5">
                                <h4 class="fw-bold text-center">Daftar Anggota Osis</h4>
                            </div>
                            <div class="card-form mt-3">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">Nama :</label>
                                        <span class="form-control"><?= $Profile['firstname'] . " " . $Profile['lastname'] ?></span>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">Kelas :</label>
                                        <span class="form-control"><?= $Profile['classroom'] . " | " . $Profile['expertise'] ?></span>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">Email :</label>
                                        <span class="form-control"><?= $Profile['email'] ?></span>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">No. tlp :</label>
                                        <span class="form-control">+62<?= $Profile['tlp'] ?></span>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="alasan" class="fw-bold">Alasan atau Tujuan ingin bergabung :</label>
                                        <textarea name="reason" id="alasan" class="form-control" required></textarea>
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <input type="text" name="students_id" id="students_id" value="<?= $Profile['students_id'] ?>" class="d-none">
                                        <button type="submit" name="register" class="fw-bold reg">Daftar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php else : ?>
        <script>
            alert("Anda Sudah Melakukan Pendaftaran");
            document.location.href = 'index.php';
        </script>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#alasan').summernote({
            placeholder: 'Masukan alasan mu di sini!',
            height: 150,
        });
    });
</script>