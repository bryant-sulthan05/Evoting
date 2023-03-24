<?php
$title = "Dashboard";
include '../components/config.php';
include '../components/meta.php';
include '../components/session.php';
include '../components/query/dashboard.php';

?>
<style>
    .card-data {
        background-color: #1f2833;
        border: #13cfac solid;
        color: #13cfac;
        border-radius: 15px;
    }

    .card-data .card-body {
        color: #ffd100;
    }

    .card-data .card-footer a {
        color: #13cfac;
    }
</style>

<body>
    <?php
    if (isset($_SESSION['notif']) == 'login') {
    ?>
        <script>
            const information = $("#notif", function() {
                Swal.fire({
                    title: "Login Success",
                    icon: "success"
                });
            });
        </script>
        <div class="notif" id="notif" data-infodata="info"></div>
    <?php
        unset($_SESSION['notif']);
    }
    ?>
    <div class="container-fluid">
        <div class="row">
            <?php include '../components/sidebar.php' ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-md-4" style="margin-bottom: 100px;">
                <div class="row">
                    <div class="col-md-3 col-sm-2 mt-2">
                        <div class="card card-data">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h3 class="fw-bold"><i class="bi bi-person-lines-fill"></i></h3>
                                    <h4 class="card-title">Daftar Murid</h4>
                                </div>
                            </div>
                            <div class="card-body align-content-end">
                                <div class="display-5 text">
                                    <b><?= $count2; ?></b>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="StudentsList.php" class="text-decoration-none">Lihat Selengkapnya&nbsp;<i class="bi bi-fast-forward"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-2 mt-2">
                        <div class="card card-data">
                            <div class="card-header">
                                <h3 class="float-start"><i class="bi bi-person-lines-fill"></i></h3>
                                <h4 class="card-title float-end">Anggota Osis</h4>
                            </div>
                            <div class="card-body align-content-end">
                                <div class="display-5 text">
                                    <b><?= $count4; ?></b>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="CouncilMember.php" class="text-decoration-none">Lihat Selengkapnya&nbsp;<i class="bi bi-fast-forward"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-2 mt-2">
                        <div class="card card-data">
                            <div class="card-header">
                                <h3 class="float-start"><i class="bi bi-person-lines-fill"></i></h3>
                                <h4 class="card-title float-end">Calon Ketua Osis</h4>
                            </div>
                            <div class="card-body align-content-end">
                                <div class="display-5 text">
                                    <b><?= $count1; ?></b>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="CandidatesList.php" class="text-decoration-none">Lihat Selengkapnya&nbsp;<i class="bi bi-fast-forward"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-2 mt-2">
                        <div class="card card-data">
                            <div class="card-header">
                                <h3 class="float-start"><i class="bi bi-person-lines-fill"></i></h3>
                                <h4 class="card-title float-end">Hasil Vote</h4>
                            </div>
                            <div class="card-body align-content-end">
                                <div class="display-5 text">
                                    <b><?= $count3; ?></b>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="VotesResult.php" class="text-decoration-none">Lihat Selengkapnya&nbsp;<i class="bi bi-fast-forward"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="card shadow" style="background-color: #fff;">
                            <div class="table-responsive">
                                <div class="card-header">
                                    <h4 class="card-title text-center"><b>Osis Tahun <?= $Year ?></b></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center">
                                    <div class="chart">
                                        <canvas id="myChart<?= $Year ?>" style="height:400px"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        // if (date('d') == 31 || (date('m') == 1 && date('d') > 28)) {
                        //     $date = strtotime('last day of next day');
                        // } else {
                        //     $date = strtotime('+2 days');
                        // }
                        // $due = date('d', $date);
                        // $total = 500000;
                        // var_dump(number_format(($due - date('d')) * $total, 0, ".", "."));
                        ?>
                        <script>
                            <?php
                            $CandidatesQuery = $config->query("SELECT * FROM candidates JOIN member USING (member_id) JOIN students USING (students_id) WHERE candidates.year = '$Year' AND candidates.status  = 'approved'");
                            if ($CandidatesQuery->num_rows > 0) :
                                $candidates = [];
                                $votes = [];
                                foreach ($CandidatesQuery as $_candidates) {
                                    $candidates[] = $_candidates['firstname'];
                                    $votes[] = $config->query("SELECT * FROM vote WHERE candidates_id = '$_candidates[candidates_id]'")->num_rows;
                                }
                                $candidates = json_encode($candidates);
                                $votes = json_encode($votes);
                            ?>
                                const data<?= $Year ?> = {
                                    labels: <?= $candidates ?>,
                                    datasets: [{
                                        label: '<?= $Year ?>',
                                        data: <?= $votes ?>,
                                        backgroundColor: [
                                            '#00ff90',
                                            '#1f2833'
                                        ],
                                        hoverOffset: 4
                                    }],
                                };
                                const config<?= $Year ?> = {
                                    type: 'bar',
                                    data: data<?= $Year ?>,
                                };
                                const myChart<?= $Year ?> = new Chart(
                                    document.getElementById('myChart<?= $Year ?>'),
                                    config<?= $Year ?>
                                )
                            <?php endif; ?>
                        </script>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>