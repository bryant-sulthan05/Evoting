<?php
$title = "Candidates";
include '../components/config.php';
include '../components/meta.php';
include '../components/session.php';
include '../components/query/CandidatesQuery.php';

?>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include '../components/sidebar.php' ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-md-4 mt-4">
                <?php if (isset($_GET['addCandidate'])) : ?>
                    <div class="table-responsive">
                        <a href="CandidatesList.php" class="btn btn-danger mb-3 fw-bold"><span class="bi bi-backspace">&nbsp;Back</span></a>
                        <table class="table table-hover table-striped">
                            <thead style="background-color: #1f2833; color: #fff;">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Visi/Misi</th>
                                    <th scope="col">Setujui/Tolak</th>
                                </tr>
                            </thead>
                            <?php
                            $no = 1;
                            foreach ($pendingCandidates as $cp) :
                            ?>
                                <tbody>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <tr>
                                            <td>
                                                <?= $no++ ?>
                                                <input type="text" name="candidates_id" id="candidates_id" value="<?= $cp['candidates_id'] ?>" class="d-none">
                                                <input type="text" name="students_id" id="students_id" value="<?= $cp['students_id'] ?>" class="d-none">
                                            </td>
                                            <td><img src="../../public/uploaded/<?= $cp['photo'] ?>" class="rounded-circle" width="50" height="50"></td>
                                            <td><?= $cp['firstname'] . " " . $cp['lastname'] ?></td>
                                            <td><?= $cp['classroom'] ?></td>
                                            <td><?= $cp['expertise'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#view<?= $cp['candidates_id'] ?>"><span class="bi bi-eye">&nbsp;View</span></button>
                                                <div class="modal fade" id="view<?= $cp['candidates_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <span class="fw-bold">Visi : </span>
                                                                    <?= $cp['visi']; ?>
                                                                    <span class="fw-bold">Misi : </span>
                                                                    <?= $cp['misi']; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="submit" name="approve" class="btn btn-success">Setujui</button>
                                                <button type="submit" name="decline" class="btn btn-danger">Tolak</button>
                                            </td>
                                        </tr>
                                    </form>
                                </tbody>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php else : ?>
                    <form action="" method="get">
                        <button type="submit" class="btn btn-dark" name="addCandidate"><span class="bi bi-person-add">&nbsp;&nbsp;Tambah Kandidat Baru</span></button>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead style="background-color: #1f2833; color: #fff;">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Visi/Misi</th>
                                    <th scope="col">Batas Pemilihan</th>
                                    <th scope="col">Edit/Hapus</th>
                                </tr>
                            </thead>
                            <?php
                            $no = 1;
                            foreach ($CandidatesQuery as $c) :
                            ?>
                                <tbody>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><img src="../../public/uploaded/<?= $c['photo'] ?>" class="rounded-circle" width="50" height="50"></td>
                                        <td><?= $c['firstname'] . " " . $c['lastname'] ?></td>
                                        <td><?= $c['classroom'] ?></td>
                                        <td><?= $c['expertise'] ?></td>
                                        <td>
                                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#view<?= $c['candidates_id'] ?>"><span class="bi bi-eye">&nbsp;View</span></button>
                                            <div class="modal fade" id="view<?= $c['candidates_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <span class="fw-bold">Visi : </span>
                                                                <?= $c['visi']; ?>
                                                                <span class="fw-bold">Misi : </span>
                                                                <?= $c['misi']; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?= $c['until'] ?></td>
                                        <td>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#edit<?= $c['candidates_id'] ?>"><span class="bi bi-pencil-square">&nbsp;Edit</span></button>
                                                <button type="submit" name="delete" id="delete" class="btn btn-outline-danger"><span class="bi bi-trash">&nbsp;Hapus</span></button>
                                                <div class="modal fade" id="edit<?= $c['candidates_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <input type="text" name="students_id" id="students_id" value="<?= $c['students_id'] ?>" class="d-none">
                                                                    <input type="text" name="candidates_id" id="candidates_id" value="<?= $c['candidates_id'] ?>" class="d-none">
                                                                    <label for="name">Name : </label>
                                                                    <input type="text" class="form-control" name="name" id="name" value="<?= $c['firstname'] . " " . $c['lastname'] ?>" readonly><br>
                                                                    <label for="classroom">Class : </label>
                                                                    <input type="text" class="form-control" name="classroom" id="classroom" value="<?= $c['classroom'] . " " . $c['slug'] ?>" readonly>
                                                                    <label for="status">Status : </label>
                                                                    <select name="status" id="status" class="form-select">
                                                                        <option value="<?= $c['status'] ?>" class="d-none"><?= $c['status'] ?></option>
                                                                        <option value="pending">Pending</option>
                                                                        <option value="decline">Tolak</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-outline-primary" name="edit" id="edit">Edit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </main>
        </div>
    </div>
</body>