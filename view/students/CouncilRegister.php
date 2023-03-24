<?php
$title = 'Daftar Ketua Osis';
include '../components/config.php';
include '../components/meta.php';
include '../components/navbar.php';
include '../components/query/CandidatesQuery.php';
include '../components/query/ProfileQuery.php';
$MemberCheck = $config->query("SELECT * FROM member WHERE students_id = '$_SESSION[students_id]'");
$MCheck = mysqli_fetch_array($MemberCheck, MYSQLI_ASSOC);

$CandidateCheck = $config->query("SELECT * FROM candidates WHERE member_id = '$MCheck[member_id]'");
$Check = mysqli_fetch_array($CandidateCheck, MYSQLI_ASSOC);
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
                                <h4 class="fw-bold text-center">Daftar Calon Ketua Osis</h4>
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
                                        <span class="form-control"><?= $Profile['tlp'] ?></span>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="visi" class="fw-bold">Visi :</label>
                                        <textarea name="visi" id="visi" class="form-control" required placeholder="Masukkan Visi"></textarea>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="misi" class="fw-bold">Misi :</label>
                                        <textarea name="misi" id="misi" class="form-control" required placeholder="Masukkan Misi"></textarea>
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-center">
                                        <input type="text" name="member_id" id="member_id" value="<?= $MCheck['member_id'] ?>" class="d-none">
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
        $('#visi').summernote({
            placeholder: 'Masukan visi!',
            height: 150,
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#misi').summernote({
            placeholder: 'Masukan misi!',
            height: 150
        });
    });
</script>