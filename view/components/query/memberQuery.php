<?php
$memberQuery = $config->query("SELECT * FROM member JOIN students USING (students_id) JOIN classroom USING (classroom_id) JOIN expertise USING (expertise_id) WHERE status = 'approved' AND role = 'member' or role = 'candidate' or role = 'member' ORDER BY firstname ASC");

$pendingMember = $config->query("SELECT * FROM member JOIN students USING (students_id) JOIN classroom USING (classroom_id) JOIN expertise USING (expertise_id) WHERE status = 'pending' AND role = 'student' ORDER BY firstname ASC");
$Date = date("Y-m-d");
if (isset($_POST['register'])) :
    $students_id = $_POST['students_id'];
    $reason = $_POST['reason'];
    $InsertData = $config->query("INSERT INTO member VALUES (NULL, '$students_id', '$reason', 'pending', '$Date', NULL)");
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

if (isset($_POST['approve'])) :
    $member_id = $_POST['member_id'];
    $UpdateStatus = $config->query("UPDATE member SET status = 'approved', updated_at = '$Date' WHERE member_id = '$member_id'");
    $StudentStatus = $config->query("UPDATE students SET role = 'member' WHERE students_id = '$_POST[students_id]'");
    if ($UpdateStatus == true) :
        echo "
        <script>
            alert('Anggota Berhasil Ditambahkan');
            document.location.href = 'CouncilMember.php';
        </script>
        ";
    else :
        echo "
            <script>
                alert('Gagal Menambahkan Anggota');
                document.location.href = 'CouncilMember.php';
            </script>
            ";
    endif;
elseif (isset($_POST['decline'])) :
    $member_id = $_POST['member_id'];
    $UpdateStatus = $config->query("UPDATE member SET status = 'declined' WHERE member_id = '$member_id'");
    if ($UpdateStatus == true) :
        $_SESSION['tolak'] = 'tolak_anggota';
        echo "
            <script>
                alert('Pendaftaran Anggota Ditolak');
                document.location.href = 'CouncilMember.php';
            </script>
            ";
    else :
        echo "
                <script>
                    document.location.href = 'CouncilMember.php';
                </script>
                ";
    endif;
endif;

if (isset($_POST['edit'])) :
    $member_id = $_POST['member_id'];
    $UpdateStatus = $config->query("UPDATE member SET status = '$_POST[status]', updated_at = '$Date' WHERE member_id = '$member_id'");
    if ($_POST['status'] == 'approved') :
        $StudentStatus = $config->query("UPDATE students SET role = 'member' WHERE students_id = '$_POST[students_id]'");
    elseif ($_POST['status'] == 'pending') :
        $StudentStatus = $config->query("UPDATE students SET role = 'student' WHERE students_id = '$_POST[students_id]'");
    elseif ($_POST['status'] == 'decline') :
        $StudentStatus = $config->query("UPDATE students SET role = 'student' WHERE students_id = '$_POST[students_id]'");
    endif;
    if ($UpdateStatus == true) :
        echo "
        <script>
            alert('Status Anggota Berhasil Diubah');
            document.location.href = 'CouncilMember.php';
        </script>
        ";
    else :
        echo "
            <script>
                document.location.href = 'CouncilMember.php';
            </script>
            ";
    endif;
elseif (isset($_POST['delete'])) :
    $member_id = $_POST['member_id'];
    $Delete = $config->query("DELETE FROM member WHERE member_id = '$member_id'");
    $StudentStatus = $config->query("UPDATE students SET role = 'student' WHERE students_id = '$_POST[students_id]'");
    if ($Delete == true) :
        echo "
            <script>
                alert('Berhasil Menghapus Anggota');
                document.location.href = 'CouncilMember.php';
            </script>
            ";
    else :
        echo "
                <script>
                    document.location.href = 'CouncilMember.php';
                </script>
                ";
    endif;
endif;
