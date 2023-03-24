<?php
$Year = date("Y");
$date = date("Y-m-d");
// if (date('d') == 31 || (date('m') == 1 && date('d') > 28)) {
//     $date = strtotime('last day of next day');
// } else {
//     $date = strtotime('+2 days');
// }
// $due = date('Y-m-d', $date);

$CandidatesQuery = $config->query("SELECT * FROM candidates JOIN member USING (member_id) JOIN students USING (students_id) JOIN classroom USING (classroom_id) JOIN expertise USING (expertise_id) WHERE candidates.status = 'approved' AND students.role = 'candidate' AND year = '$Year' AND until > '$date'");
$due = mysqli_fetch_assoc($CandidatesQuery);
$Cek = mysqli_num_rows($CandidatesQuery);

if ($Cek > 0) {
    $VoteQuery = $config->query("SELECT * FROM students WHERE students_id NOT IN (SELECT students_id FROM vote WHERE date_at BETWEEN '" . $due['date'] . "' AND '" . $due['until'] . "') AND students_id = '$_SESSION[students_id]'");
    // $VoteQuery = $config->query("SELECT * FROM vote JOIN candidates USING (candidates_id) WHERE students_id = '$_SESSION[students_id]' AND date_at BETWEEN '" . $tes['date'] . "' AND '" . $tes['until'] . "'");
} else {
    $VoteQuery = $config->query("SELECT * FROM students WHERE students_id NOT IN (SELECT students_id FROM vote WHERE date_at = '" . $date . "') AND students_id = '$_SESSION[students_id]'");
}
$result = mysqli_fetch_assoc($VoteQuery);

// var_dump($result);

if (isset($_POST['vote'])) :
    $Insert = $config->query("INSERT INTO vote VALUES (NULL, '$_POST[candidates_id]', '$_SESSION[students_id]', '$date')");
    if ($Insert == true) :
        $_SESSION['HaveVote'] = true;
        echo "
        <script>
            document.location.href = 'index.php';
        </script>
        ";
    else :
        echo "
            <script>
                alert('Vote Failed');
                document.location.href = 'index.php';
            </script>
            ";
    endif;
endif;
