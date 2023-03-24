<?php
$ProfileQuery = $config->query("SELECT * FROM students JOIN classroom USING (classroom_id) JOIN expertise USING (expertise_id) WHERE students_id = '$_SESSION[students_id]'");
$Profile = mysqli_fetch_assoc($ProfileQuery);

if (isset($_POST['edit'])) :
    $cekEmail = $config->query("SELECT * FROM students WHERE email = '$_POST[email]' AND students_id != '$_SESSION[students_id]'");
    if (mysqli_num_rows($cekEmail) == 1) :
        // $_SESSION['cek'] = 'ada';
        echo "
        <script>
            alert('Alamat email sudah terpakai');
            document.location.href = 'Profile.php';
        </script>
        ";
    else :
        $email = $_POST['email'];
        $bcrypt = hash('md5', $_POST['password']);
        $plaintext = $_POST['password'];
        $tlp = $_POST['tlp'];
        $address = $_POST['alamat'];
        $pict = $_FILES['pict']['name'];
        $source = $_FILES['pict']['tmp_name'];
        $folder = '../../public/uploaded/';

        $upload = move_uploaded_file($source, $folder . $pict);

        if ($pict == '') :
            $UpdateData = $config->query("UPDATE students SET email = '$email', password = '$bcrypt', pass = '$plaintext', tlp = '$tlp', address = '$address' WHERE students_id = '$_SESSION[students_id]'");
        else :
            $UpdateData = $config->query("UPDATE students SET email = '$email', password = '$bcrypt', pass = '$plaintext', tlp = '$tlp', address = '$address', photo = '$pict' WHERE students_id = '$_SESSION[students_id]'");
        endif;

        if ($UpdateData == true) :
            setcookie('edited', 'cek', time() + 30);
            // var_dump($UpdateData);

            // $_SESSION['edited'] = 'success';
            echo "
            <script>
            document.location.href = 'profile.php';
            </script>
        ";
        else :
            setcookie('failed', 'cek', time() + 30);
            // $_SESSION['edited'] = 'failed';
            echo "
                <script>
                    document.location.href = 'profile.php';
                </script>
            ";
        endif;
    endif;
endif;
