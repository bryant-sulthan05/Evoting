<?php
$year = date("Y");
$Date = date("Y-m-d");

$CandidatesQuery = $config->query("SELECT * FROM candidates JOIN member USING (member_id) JOIN students USING (students_id) JOIN classroom USING (classroom_id) JOIN expertise USING (expertise_id) WHERE candidates.status = 'approved' AND students.role = 'candidate' ORDER BY firstname ASC");

$pendingCandidates = $config->query("SELECT * FROM candidates JOIN member USING (member_id) JOIN students USING (students_id) JOIN classroom USING (classroom_id) JOIN expertise USING (expertise_id) WHERE candidates.status = 'declined' OR candidates.status = 'pending' AND role = 'member' ORDER BY firstname ASC");
$updateAt = date("Y-m-d H:i:s");

if (isset($_POST['register'])) :
    $member_id = $_POST['member_id'];
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];
    $InsertData = $config->query("INSERT INTO candidates VALUES (NULL, '$member_id', '$visi', '$misi', 'pending', '$Date', NULL, NULL, '$year')");
    if ($InsertData == true) :
        $_SESSION['reg'] = 'success';
        echo "
        <script>
            document.location.href = 'index.php';
        </script>
        ";
    else :
        echo "
            <script>
                document.location.href = 'index.php';
            </script>
            ";
    endif;
endif;

if (date('d') == 31 || (date('m') == 1 && date('d') > 28)) {
    $date = strtotime('last day of next day');
} else {
    $date = strtotime('+7 days');
}
$due = date('Y-m-d', $date);

if (isset($_POST['approve'])) :
    $candidates_id = $_POST['candidates_id'];
    $UpdateStatus = $config->query("UPDATE candidates SET status = 'approved', updated_at = '$updateAt', until = '$due' WHERE candidates_id = '$candidates_id'");
    $StudentStatus = $config->query("UPDATE students SET role = 'candidate' WHERE students_id = '$_POST[students_id]'");
    if ($UpdateStatus == true) :
        echo "
        <script>
            alert('Kandidat Berhasil Ditambahkan');
            document.location.href = 'CandidatesList.php';
        </script>
        ";
    else :
        echo "
            <script>
                alert('Kandidat Gagal Ditambahkan');
                document.location.href = 'CandidatesList.php';
            </script>
            ";
    endif;
elseif (isset($_POST['decline'])) :
    $candidates_id = $_POST['candidates_id'];
    $UpdateStatus = $config->query("UPDATE candidates SET status = 'declined' WHERE candidates_id = '$candidates_id'");
    if ($UpdateStatus == true) :
        $_SESSION['tolak'] = 'tolak_ketos';
        echo "
            <script>
                alert('Anda Menolak Pendaftaran Kandidat');
                document.location.href = 'CandidatesList.php';
            </script>
            ";
    else :
        echo "
                <script>
                    alert('Penolakan Gagal');
                    document.location.href = 'CandidatesList.php';
                </script>
                ";
    endif;
endif;

if (isset($_POST['edit'])) :
    $candidates_id = $_POST['candidates_id'];
    $UpdateStatus = $config->query("UPDATE candidates SET status = '$_POST[status]', updated_at = '$updateAt' WHERE candidates_id = '$candidates_id'");
    if ($_POST['status'] == 'approved') :
        $StudentStatus = $config->query("UPDATE students SET role = 'candidate' WHERE students_id = '$_POST[students_id]'");
    elseif ($_POST['status'] == 'pending') :
        $StudentStatus = $config->query("UPDATE students SET role = 'member' WHERE students_id = '$_POST[students_id]'");
    elseif ($_POST['status'] == 'decline') :
        $StudentStatus = $config->query("UPDATE students SET role = 'member' WHERE students_id = '$_POST[students_id]'");
    endif;
    if ($UpdateStatus == true) :
        echo "
        <script>
            alert('Status Kandidat Berhasil Diupdate');
            document.location.href = 'CandidatesList.php';
        </script>
        ";
    else :
        echo "
            <script>
                alert('Status Kandidat Gagal Diupdate');
                document.location.href = 'CandidatesList.php';
            </script>
            ";
    endif;
elseif (isset($_POST['delete'])) :
    $candidates_id = $_POST['candidates_id'];
    $Delete = $config->query("DELETE FROM candidates WHERE candidates_id = '$candidates_id'");
    $StudentStatus = $config->query("UPDATE students SET role = 'member' WHERE students_id = '$_POST[students_id]'");
    if ($Delete == true) :
        echo "
            <script>
                alert('Kandidat Berhasil Dihapus');
                document.location.href = 'CandidatesList.php';
            </script>
            ";
    else :
        echo "
                <script>
                    alert('Kandidat Berhasil Dihapus');
                    document.location.href = 'CandidatesList.php';
                </script>
                ";
    endif;
endif;
