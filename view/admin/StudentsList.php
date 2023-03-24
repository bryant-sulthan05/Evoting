<?php
$title = "Students List";
include '../components/config.php';
include '../components/meta.php';
include '../components/session.php';
include '../components/query/studentsQuery.php';

$pages = isset($_GET['page']) ? $_GET['page'] : '';

if (isset($_POST['cari'])) {

    $search = $_POST['search'];

    $SearchQuery = $config->query("SELECT * FROM students JOIN classroom USING (classroom_id) JOIN expertise USING (expertise_id) WHERE firstname LIKE '%$search%'");
    $AllStudents = mysqli_fetch_all($SearchQuery, MYSQLI_ASSOC);
}
?>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include '../components/sidebar.php' ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-md-4 mt-4">
                <?php if (isset($_GET['addstudent'])) : ?>
                    <a href="StudentsList.php" class="btn btn-danger mb-3 fw-bold"><span class="bi bi-backspace">&nbsp;Back</span></a>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center fw-bold">Tambah Murid Baru</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <label for="firstname" class="fw-bold">Nama Depan :</label>
                                        <input type="text" name="firstname" id="firstname" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastname" class="fw-bold">Nama Belakang :</label>
                                    <input type="text" name="lastname" id="lastname" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="classroom" class="fw-bold">Kelas :</label>
                                    <select class="form-select" name="classroom" required>
                                        <option value="">---</option>
                                        <?php $no = 1;
                                        foreach ($classroomQuery as $c) {

                                            if ($classroom == $c['classroom_id']) {
                                                $selected = 'selected';
                                            } else {
                                                $selected = '';
                                            }
                                        ?>
                                            <option value="<?= $c['classroom_id'] ?>" <?= $selected ?>> <?= $c['classroom'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="expertise" class="fw-bold">Jurusan :</label>
                                    <select class="form-select" name="expertise" required>
                                        <option value="">---</option>
                                        <?php $no = 1;
                                        foreach ($expertiseQuery as $exp) {

                                            if ($expertise == $exp['expertise_id']) {
                                                $selected = 'selected';
                                            } else {
                                                $selected = '';
                                            }
                                        ?>
                                            <option value="<?= $exp['expertise_id'] ?>" <?= $selected ?>> <?= $exp['expertise'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="fw-bold">Password :</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="tlp" class="fw-bold">No tlp :</label>
                                    <input type="number" name="tlp" id="tlp" class="form-control" required>
                                </div>
                                <div class="col-md-12 mb-3 d-flex justify-content-end">
                                    <button type="submit" name="add" class="btn btn-success fw-bold"><span class="bi bi-plus">&nbsp;Tambah</span></button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="d-flex justify-content-between">
                        <form action="" method="get">
                            <button type="submit" class="btn btn-dark fw-bold" name="addstudent"><span class="bi bi-person-add">&nbsp;&nbsp;Tambah Murid Baru</span></button>
                        </form>
                        <form class="d-flex col-md-4" role="search" method="post" action="" enctype="multipart/form-data">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search" name="search">
                            <button class="btn btn-outline-success" type="submit" name="cari" id="cari">Search</button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead style="background-color: #1f2833; color: #fff;">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php if ($pages == 'xmm') : ?>
                                    <?php
                                    $no = 1;
                                    foreach ($XMMStudents as $s) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><img src="../../public/uploaded/<?= $s['photo'] ?>" class="rounded-circle" width="50" height="50"></td>
                                            <td><?= $s['firstname'] . " " . $s['lastname'] ?></td>
                                            <td><?= $s['email'] ?></td>
                                            <td><?= $s['classroom'] ?></td>
                                            <td><?= $s['expertise'] ?></td>
                                            <td>
                                                <?php if ($s['role'] == 'student') : ?>
                                                    <span class="btn btn-outline-primary fw-bold">Siswa</span>
                                                <?php elseif ($s['role'] == 'member') : ?>
                                                    <span class="btn btn-outline-warning fw-bold">Anggota Osis</span>
                                                <?php elseif ($s['role'] == 'candidate') : ?>
                                                    <span class="btn btn-outline-success fw-bold">Kandidat</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <input type="text" name="students_id" id="students_id" value="<?= $s['students_id'] ?>" class="d-none">
                                                    <button type="submit" name="delete" class="btn btn-danger fw-bold"><span class="bi bi-trash">&nbsp;Delete</span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php elseif ($pages == 'ximm') : ?>
                                    <?php
                                    $no = 1;
                                    foreach ($XIMMStudents as $s) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><img src="../../public/uploaded/<?= $s['photo'] ?>" class="rounded-circle" width="50" height="50"></td>
                                            <td><?= $s['firstname'] . " " . $s['lastname'] ?></td>
                                            <td><?= $s['email'] ?></td>
                                            <td><?= $s['classroom'] ?></td>
                                            <td><?= $s['expertise'] ?></td>
                                            <td>
                                                <?php if ($s['role'] == 'student') : ?>
                                                    <span class="btn btn-outline-primary fw-bold">Siswa</span>
                                                <?php elseif ($s['role'] == 'member') : ?>
                                                    <span class="btn btn-outline-warning fw-bold">Anggota Osis</span>
                                                <?php elseif ($s['role'] == 'candidate') : ?>
                                                    <span class="btn btn-outline-success fw-bold">Kandidat</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <input type="text" name="students_id" id="students_id" value="<?= $s['students_id'] ?>" class="d-none">
                                                    <button type="submit" name="delete" class="btn btn-danger fw-bold"><span class="bi bi-trash">&nbsp;Delete</span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php elseif ($pages == 'xiimm') : ?>
                                    <?php
                                    $no = 1;
                                    foreach ($XIIMMStudents as $s) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><img src="../../public/uploaded/<?= $s['photo'] ?>" class="rounded-circle" width="50" height="50"></td>
                                            <td><?= $s['firstname'] . " " . $s['lastname'] ?></td>
                                            <td><?= $s['email'] ?></td>
                                            <td><?= $s['classroom'] ?></td>
                                            <td><?= $s['expertise'] ?></td>
                                            <td>
                                                <?php if ($s['role'] == 'student') : ?>
                                                    <span class="btn btn-outline-primary fw-bold">Siswa</span>
                                                <?php elseif ($s['role'] == 'member') : ?>
                                                    <span class="btn btn-outline-warning fw-bold">Anggota Osis</span>
                                                <?php elseif ($s['role'] == 'candidate') : ?>
                                                    <span class="btn btn-outline-success fw-bold">Kandidat</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <input type="text" name="students_id" id="students_id" value="<?= $s['students_id'] ?>" class="d-none">
                                                    <button type="submit" name="delete" class="btn btn-danger fw-bold"><span class="bi bi-trash">&nbsp;Delete</span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php elseif ($pages == 'xrpl') : ?>
                                    <?php
                                    $no = 1;
                                    foreach ($XRPLStudents as $s) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><img src="../../public/uploaded/<?= $s['photo'] ?>" class="rounded-circle" width="50" height="50"></td>
                                            <td><?= $s['firstname'] . " " . $s['lastname'] ?></td>
                                            <td><?= $s['email'] ?></td>
                                            <td><?= $s['classroom'] ?></td>
                                            <td><?= $s['expertise'] ?></td>
                                            <td>
                                                <?php if ($s['role'] == 'student') : ?>
                                                    <span class="btn btn-outline-primary fw-bold">Siswa</span>
                                                <?php elseif ($s['role'] == 'member') : ?>
                                                    <span class="btn btn-outline-warning fw-bold">Anggota Osis</span>
                                                <?php elseif ($s['role'] == 'candidate') : ?>
                                                    <span class="btn btn-outline-success fw-bold">Kandidat</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <input type="text" name="students_id" id="students_id" value="<?= $s['students_id'] ?>" class="d-none">
                                                    <button type="submit" name="delete" class="btn btn-danger fw-bold"><span class="bi bi-trash">&nbsp;Delete</span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php elseif ($pages == 'xirpl') : ?>
                                    <?php
                                    $no = 1;
                                    foreach ($XIRPLStudents as $s) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><img src="../../public/uploaded/<?= $s['photo'] ?>" class="rounded-circle" width="50" height="50"></td>
                                            <td><?= $s['firstname'] . " " . $s['lastname'] ?></td>
                                            <td><?= $s['email'] ?></td>
                                            <td><?= $s['classroom'] ?></td>
                                            <td><?= $s['expertise'] ?></td>
                                            <td>
                                                <?php if ($s['role'] == 'student') : ?>
                                                    <span class="btn btn-outline-primary fw-bold">Siswa</span>
                                                <?php elseif ($s['role'] == 'member') : ?>
                                                    <span class="btn btn-outline-warning fw-bold">Anggota Osis</span>
                                                <?php elseif ($s['role'] == 'candidate') : ?>
                                                    <span class="btn btn-outline-success fw-bold">Kandidat</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <input type="text" name="students_id" id="students_id" value="<?= $s['students_id'] ?>" class="d-none">
                                                    <button type="submit" name="delete" class="btn btn-danger fw-bold"><span class="bi bi-trash">&nbsp;Delete</span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php elseif ($pages == 'xiirpl') : ?>
                                    <?php
                                    $no = 1;
                                    foreach ($XIIRPLStudents as $s) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><img src="../../public/uploaded/<?= $s['photo'] ?>" class="rounded-circle" width="50" height="50"></td>
                                            <td><?= $s['firstname'] . " " . $s['lastname'] ?></td>
                                            <td><?= $s['email'] ?></td>
                                            <td><?= $s['classroom'] ?></td>
                                            <td><?= $s['expertise'] ?></td>
                                            <td>
                                                <?php if ($s['role'] == 'student') : ?>
                                                    <span class="btn btn-outline-primary fw-bold">Siswa</span>
                                                <?php elseif ($s['role'] == 'member') : ?>
                                                    <span class="btn btn-outline-warning fw-bold">Anggota Osis</span>
                                                <?php elseif ($s['role'] == 'candidate') : ?>
                                                    <span class="btn btn-outline-success fw-bold">Kandidat</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <input type="text" name="students_id" id="students_id" value="<?= $s['students_id'] ?>" class="d-none">
                                                    <button type="submit" name="delete" class="btn btn-danger fw-bold"><span class="bi bi-trash">&nbsp;Delete</span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php elseif ($pages == 'xtkj') : ?>
                                    <?php
                                    $no = 1;
                                    foreach ($XTKJStudents as $s) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><img src="../../public/uploaded/<?= $s['photo'] ?>" class="rounded-circle" width="50" height="50"></td>
                                            <td><?= $s['firstname'] . " " . $s['lastname'] ?></td>
                                            <td><?= $s['email'] ?></td>
                                            <td><?= $s['classroom'] ?></td>
                                            <td><?= $s['expertise'] ?></td>
                                            <td>
                                                <?php if ($s['role'] == 'student') : ?>
                                                    <span class="btn btn-outline-primary fw-bold">Siswa</span>
                                                <?php elseif ($s['role'] == 'member') : ?>
                                                    <span class="btn btn-outline-warning fw-bold">Anggota Osis</span>
                                                <?php elseif ($s['role'] == 'candidate') : ?>
                                                    <span class="btn btn-outline-success fw-bold">Kandidat</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <input type="text" name="students_id" id="students_id" value="<?= $s['students_id'] ?>" class="d-none">
                                                    <button type="submit" name="delete" class="btn btn-danger fw-bold"><span class="bi bi-trash">&nbsp;Delete</span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php elseif ($pages == 'xitkj') : ?>
                                    <?php
                                    $no = 1;
                                    foreach ($XITKJStudents as $s) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><img src="../../public/uploaded/<?= $s['photo'] ?>" class="rounded-circle" width="50" height="50"></td>
                                            <td><?= $s['firstname'] . " " . $s['lastname'] ?></td>
                                            <td><?= $s['email'] ?></td>
                                            <td><?= $s['classroom'] ?></td>
                                            <td><?= $s['expertise'] ?></td>
                                            <td>
                                                <?php if ($s['role'] == 'student') : ?>
                                                    <span class="btn btn-outline-primary fw-bold">Siswa</span>
                                                <?php elseif ($s['role'] == 'member') : ?>
                                                    <span class="btn btn-outline-warning fw-bold">Anggota Osis</span>
                                                <?php elseif ($s['role'] == 'candidate') : ?>
                                                    <span class="btn btn-outline-success fw-bold">Kandidat</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <input type="text" name="students_id" id="students_id" value="<?= $s['students_id'] ?>" class="d-none">
                                                    <button type="submit" name="delete" class="btn btn-danger fw-bold"><span class="bi bi-trash">&nbsp;Delete</span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php elseif ($pages == 'xiitkj') : ?>
                                    <?php
                                    $no = 1;
                                    foreach ($XIITKJStudents as $s) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><img src="../../public/uploaded/<?= $s['photo'] ?>" class="rounded-circle" width="50" height="50"></td>
                                            <td><?= $s['firstname'] . " " . $s['lastname'] ?></td>
                                            <td><?= $s['email'] ?></td>
                                            <td><?= $s['classroom'] ?></td>
                                            <td><?= $s['expertise'] ?></td>
                                            <td>
                                                <?php if ($s['role'] == 'student') : ?>
                                                    <span class="btn btn-outline-primary fw-bold">Siswa</span>
                                                <?php elseif ($s['role'] == 'member') : ?>
                                                    <span class="btn btn-outline-warning fw-bold">Anggota Osis</span>
                                                <?php elseif ($s['role'] == 'candidate') : ?>
                                                    <span class="btn btn-outline-success fw-bold">Kandidat</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <input type="text" name="students_id" id="students_id" value="<?= $s['students_id'] ?>" class="d-none">
                                                    <button type="submit" name="delete" class="btn btn-danger fw-bold"><span class="bi bi-trash">&nbsp;Delete</span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php elseif ($pages == 'all' or $pages == NULL) : ?>
                                    <?php
                                    $no = 1;
                                    foreach ($AllStudents as $s) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><img src="../../public/uploaded/<?= $s['photo'] ?>" class="rounded-circle" width="50" height="50"></td>
                                            <td><?= $s['firstname'] . " " . $s['lastname'] ?></td>
                                            <td><?= $s['email'] ?></td>
                                            <td><?= $s['classroom'] ?></td>
                                            <td><?= $s['expertise'] ?></td>
                                            <td>
                                                <?php if ($s['role'] == 'student') : ?>
                                                    <span class="btn btn-outline-primary fw-bold">Siswa</span>
                                                <?php elseif ($s['role'] == 'member') : ?>
                                                    <span class="btn btn-outline-warning fw-bold">Anggota Osis</span>
                                                <?php elseif ($s['role'] == 'candidate') : ?>
                                                    <span class="btn btn-outline-success fw-bold">Kandidat</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <input type="text" name="students_id" id="students_id" value="<?= $s['students_id'] ?>" class="d-none">
                                                    <button type="submit" name="delete" class="btn btn-danger fw-bold"><span class="bi bi-trash">&nbsp;Delete</span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </main>
        </div>
    </div>
</body>