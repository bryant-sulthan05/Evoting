<?php
$title = "Votes Result";
include '../components/config.php';
include '../components/meta.php';
include '../components/session.php';

?>

<style>
    @media print {
        .navbar {
            display: none;
        }

        #sidebarMenu {
            display: none;
        }

        .print {
            display: none;
        }

        .footer {
            display: none;
        }
    }
</style>
<script>
    function toggle() {
        window.print()
    }
</script>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include '../components/sidebar.php' ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-md-4 mt-4">
                <div class="d-flex justify-content-between mb-2">
                    <div class="print">
                        <form action="" method="get" enctype="multipart/form-data">
                            <label for="year">Masukkan Tahun Pemilihan : </label>
                            <?php if (isset($_GET['year'])) : ?>
                                <input type="text" name="year" id="year" value="<?= $_GET['year'] ?>">
                            <?php else : ?>
                                <input type="text" name="year" id="year">
                            <?php endif; ?>
                        </form>
                    </div>
                    <div class="print">
                        <a href="#" class="btn btn-outline-primary" aria-hidden="true" onclick="toggle()"><span class="bi bi-printer">&nbsp;Print</span></a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-striped caption-top">
                        <?php if (isset($_GET['year'])) : ?>
                            <caption class="fw-bold">Kandidat Osis Tahun : <?= $_GET['year'] ?></caption>
                        <?php else : ?>
                            <caption class="fw-bold">Kandidat Osis Tahun : -</caption>
                        <?php endif; ?>
                        <thead style="background-color: #1f2833; color: #fff;">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Jumlah Suara</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php if (isset($_GET['year'])) : ?>
                                <?php
                                $no = 1;
                                $year = mysqli_real_escape_string($config, $_GET['year']);
                                $Votes = $config->query("SELECT * FROM candidates JOIN member USING (member_id) JOIN students USING (students_id) JOIN classroom USING (classroom_id) JOIN expertise USING (expertise_id) WHERE year = '$year' AND candidates.status = 'approved'");
                                $count = $Votes->num_rows;
                                if ($count > 0) :
                                ?>
                                    <?php
                                    foreach ($Votes as $v) :
                                        $Result = $config->query("SELECT * FROM vote WHERE candidates_id = '$v[candidates_id]'");
                                        $r = $Result->num_rows;
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><img src="../../public/uploaded/<?= $v['photo'] ?>" class="rounded-circle" width="50" height="50"></td>
                                            <td><?= $v['firstname'] . " " . $v['lastname'] ?></td>
                                            <td><?= $v['classroom'] . " " . $v['expertise'] . " " . "($v[slug])" ?></td>
                                            <td><?= $r ?></td>
                                        </tr>
                                    <?php
                                    endforeach;
                                else :
                                    ?>
                                    <tr>
                                        <td colspan="4">
                                            <h4 class="text-center fw-bold">Data Tidak Ditemukan</h4>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="4">
                                        <h4 class="text-center fw-bold">Data Tidak Ditemukan</h4>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>