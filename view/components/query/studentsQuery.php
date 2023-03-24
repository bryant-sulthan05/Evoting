<?php
$XMMStudents = $config->query("SELECT * FROM students JOIN classroom USING (classroom_id) JOIN expertise USING (expertise_id) WHERE expertise.expertise = 'Multimedia' AND classroom.classroom = 'X' ORDER BY firstname ASC");
$XIMMStudents = $config->query("SELECT * FROM students JOIN classroom USING (classroom_id) JOIN expertise USING (expertise_id) WHERE expertise.expertise = 'Multimedia' AND classroom.classroom = 'XI' ORDER BY firstname ASC");
$XIIMMStudents = $config->query("SELECT * FROM students JOIN classroom USING (classroom_id) JOIN expertise USING (expertise_id) WHERE expertise.expertise = 'Multimedia' AND classroom.classroom = 'XII' ORDER BY firstname ASC");

$XRPLStudents = $config->query("SELECT * FROM students JOIN classroom USING (classroom_id) JOIN expertise USING (expertise_id) WHERE expertise.expertise = 'Rekayasa Perangkat Lunak' AND classroom.classroom = 'X' ORDER BY firstname ASC");
$XIRPLStudents = $config->query("SELECT * FROM students JOIN classroom USING (classroom_id) JOIN expertise USING (expertise_id) WHERE expertise.expertise = 'Rekayasa Perangkat Lunak' AND classroom.classroom = 'XI' ORDER BY firstname ASC");
$XIIRPLStudents = $config->query("SELECT * FROM students JOIN classroom USING (classroom_id) JOIN expertise USING (expertise_id) WHERE expertise.expertise = 'Rekayasa Perangkat Lunak' AND classroom.classroom = 'XII' ORDER BY firstname ASC");

$XTKJStudents = $config->query("SELECT * FROM students JOIN classroom USING (classroom_id) JOIN expertise USING (expertise_id) WHERE expertise.expertise = 'Teknik Komputer dan Jaringan' AND classroom.classroom = 'X' ORDER BY firstname ASC");
$XITKJStudents = $config->query("SELECT * FROM students JOIN classroom USING (classroom_id) JOIN expertise USING (expertise_id) WHERE expertise.expertise = 'Teknik Komputer dan Jaringan' AND classroom.classroom = 'XI' ORDER BY firstname ASC");
$XIITKJStudents = $config->query("SELECT * FROM students JOIN classroom USING (classroom_id) JOIN expertise USING (expertise_id) WHERE expertise.expertise = 'Teknik Komputer dan Jaringan' AND classroom.classroom = 'XII' ORDER BY firstname ASC");

$AllStudents = $config->query("SELECT * FROM students JOIN classroom USING (classroom_id) JOIN expertise USING (expertise_id) ORDER BY firstname ASC");

$id = 0;
$classroom = "";
$expertise = "";
$expertiseQuery = $config->query("SELECT * FROM expertise");
$classroomQuery = $config->query("SELECT * FROM classroom");

if (isset($_POST['add'])) :
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $classroom = $_POST['classroom'];
    $expertise = $_POST['expertise'];
    $email = strtolower($_POST['firstname'] . rand(100, 15000));
    $password = hash('md5', $_POST['password']);
    $plaintext_password = $_POST['password'];
    $tlp = $_POST['tlp'];

    if (strlen($plaintext_password) >= 8) :
        $Insert = $config->query("INSERT INTO students VALUES (NULL, '$classroom', '$expertise', '$firstname', '$lastname', '$email@gmail.com', '$password', '$plaintext_password', '$tlp', NULL, 'profile.svg', 'student')");
        if ($Insert == true) :
            echo "
        <script>
            alert('Data Berhasil Ditambahkan');
            document.location.href = 'StudentsList.php';
        </script>
        ";
        else :
            echo "
        <script>
            alert('Data Gagal Ditambahkan');
            document.location.href = 'StudentsList.php';
        </script>
        ";
        endif;
    else :
        echo "
        <script>
            alert('Password harus memiliki minimal 8 karakter');
        </script>
        ";
    endif;
elseif (isset($_POST['delete'])) :
    $Delete = $config->query("DELETE FROM students WHERE students_id = '$_POST[students_id]'");
    if ($Delete == true) :
        echo "
            <script>
                alert('Data Berhasil Dihapus');
                document.location.href = 'StudentsList.php';
            </script>
            ";
    else :
        echo "
            <script>
                alert('Data Gagal Dihapus');
                document.location.href = 'StudentsList.php';
            </script>
            ";
    endif;
endif;
