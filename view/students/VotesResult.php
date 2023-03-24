<?php
$title = "Votes Result";
include '../components/config.php';
include '../components/meta.php';
include '../components/navbar.php';
$Year = date("Y");
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
    }
</style>
<script>
    function toggle() {
        window.print()
    }
</script>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <div class="card shadow">
                <div class="table-responsive">
                    <div class="card-header">
                        <h4 class="card-title"><b>Osis Tahun <?= $Year ?></b></h4>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <div class="chart">
                            <canvas id="myChart<?= $Year ?>" style="height:400px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
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
</div>