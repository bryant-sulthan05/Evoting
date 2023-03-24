<?php
$title = "Vote";
include '../components/config.php';
include '../components/meta.php';
include '../components/navbar.php';
include '../components/query/VotesQuery.php';
?>
<style>
    .card {
        border: 1.5px #1f2833 solid;
        box-shadow: 0 0 8.5px #1f2833;
    }

    .card:hover {
        box-shadow: 0 0 8.5px #13cfac;
    }

    .btn {
        background-color: #13cfac;
        color: #1f2833;
    }

    .btn:hover {
        background-color: #1f2833;
        color: #13cfac;
    }

    @media only screen and (max-width: 320px) {
        .modal {
            padding: 10px;
        }
    }
</style>
<div class="container mt-5">
    <?php if ($Cek > 0) : ?>
        <?php if ($result) : ?>
            <h4 class="text-center fw-bold">Kandidat</h4>
            <hr class="mb-5">
            <div class="row px-3 d-flex justify-content-center">
                <?php foreach ($CandidatesQuery as $c) : ?>
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-img d-flex justify-content-center mb-3">
                                    <img src="../../public/uploaded/<?= $c['photo'] ?>" class="rounded-circle" width="128" height="128">
                                </div>
                                <div class="card-title d-flex justify-content-center mb-3 text-nowrap">
                                    <h4 class="fw-bold" style="color: #13cfac;"><?= $c['firstname'] . " " . $c['lastname'] ?></h4>
                                </div>
                                <div class="card-text mb-4">
                                    <h5 class="fw-bold text-center text-secondary"><?= $c['classroom'] ?> | <?= $c['slug'] ?></h5>
                                </div>
                                <div class="card-button">
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn fw-bold" data-bs-toggle="modal" data-bs-target="#vm<?= $c['candidates_id'] ?>">
                                            Visi & Misi
                                        </button>
                                        <div class="modal fade" id="vm<?= $c['candidates_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <img src="../../public/uploaded/<?= $c['photo'] ?>" class="rounded-circle" width="50" height="50">
                                                        <h1 class="modal-title fs-5 ms-2" id="exampleModalLabel"><?= $c['firstname'] ?> | <?= $c['classroom'] . " " . $c['slug'] ?></h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body p-5">
                                                        <h4 class="fw-bold">Visi :</h4>
                                                        <span><?= $c['visi'] ?></span>
                                                        <h4 class="fw-bold mt-3">Misi :</h4>
                                                        <span><?= $c['misi'] ?></span>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <input type="text" name="candidates_id" id="candidates_id" value="<?= $c['candidates_id'] ?>" class="d-none">
                                                            <button type="submit" name="vote" class="btn fw-bold voting">Vote</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mt-2">
                                        <button type="button" class="btn fw-bold" data-bs-toggle="modal" data-bs-target="#vote<?= $c['candidates_id'] ?>" style="width: 105px;">
                                            Vote
                                        </button>
                                        <div class="modal fade" id="vote<?= $c['candidates_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body p-5">
                                                        <div class="d-flex justify-content-center">
                                                            <span class="text-center">Anda yakin ingin memilih&nbsp;<b><?= $c['firstname'] . " " . $c['lastname'] ?>&nbsp;</b> sebagai pilihan Anda?</span>
                                                        </div>
                                                        <div class="d-flex justify-content-center mt-3">
                                                            <span class="text-wrap text-center">Anda tidak akan bisa mengubah pilihan anda setelah menekan tombol vote!</span>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <input type="text" name="candidates_id" id="candidates_id" value="<?= $c['candidates_id'] ?>" class="d-none">
                                                            <button type="submit" name="vote" class="btn fw-bold voting">Vote</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else :
            $_SESSION['voteStatus'] = 'done';
        ?>
            <script>
                document.location.href = 'index.php';
            </script>
        <?php endif; ?>
    <?php else :
    ?>
        <?php if (isset($_GET['seeVoteResult'])) :
            echo '<h4 class="text-center fw-bold">Hasil Vote</h4>
            <hr class="mb-5">';
            include '../students/HasilVote.php';
        else :
        ?>
            <h3 class=" text-center fw-bold">Tidak ada kandidat!</h3>
            <div class="d-flex justify-content-center mt-3">
                <form action="" method="get">
                    <button type="submit" name="seeVoteResult" id="seeVoteResult" class="btn fw-bold" style="background-color: #13cfac; color:#1f2833;">Lihat Hasil Vote</button>
                </form>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>