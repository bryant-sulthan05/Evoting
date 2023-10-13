<?php
session_start();
if (isset($_POST['continue'])) :
    $email = $_POST['email'];
    $getEmail = $config->query("SELECT * FROM students WHERE email = '$email'");
    $row = mysqli_fetch_assoc($getEmail);
    if (mysqli_num_rows($getEmail) == 1) :
        if ($email == $row['email']) :
            $_SESSION['verify_id'] = $row['students_id'];
            $code = substr(md5(rand()), 0, 5); //Membuat Kode Verifikasi
            $newVerificationCode = $config->query("INSERT INTO verify_code VALUES (NULL, '$row[students_id]', '$code')"); //Memasukan kode ke dalam database
            $code_id = $config->insert_id;
            $getCodes = $config->query("SELECT * FROM verify_code WHERE code_id = '$code_id'");
            $getCode = mysqli_fetch_assoc($getCodes);
            $_SESSION['code'] = $getCode['code'];
            $forgot_pass = mail('bryant7350@gmail.com', 'Forgot Password', $getCode['code']);
            echo "
            <script>
                document.location.href = 'forgotPassword.php?page=verifikasi';
            </script>
            ";
        else :
            echo
            "<script>
                alert('Email tidak terdaftar');
                document.location.href = 'forgotPassword.php';
            </script>";
        endif;
    else :
    endif;
elseif (isset($_POST['lanjut'])) :
    $verify = $_POST['verify'];
    $getVCode = $config->query("SELECT * FROM verify_code WHERE code = '$verify'");
    $row = mysqli_fetch_assoc($getVCode);
    if (mysqli_num_rows($getVCode) == 1) :
        if ($verify == $row['code']) :
            unset($_SESSION['code']);
            echo "
            <script>
                document.location.href = 'forgotPassword.php?page=ubah_password';
            </script>
            ";
        endif;
    else :
        echo
        "<script>
                alert('Kode Verifikasi Salah!');
                document.location.href = 'forgotPassword.php?page=verifikasi';
            </script>";
    endif;
elseif (isset($_POST['save'])) :
    $pass = hash('md5', $_POST['pass']);
    $ppass = $_POST['pass'];
    if (strlen($ppass) >= 8) :
        $changePassword = $config->query("UPDATE students SET password = '$pass', pass = '$ppass' WHERE students_id = '$_SESSION[verify_id]'");
        if ($changePassword == true) :
            unset($_SESSION['verify_id']);
            echo "
        <script>
            document.location.href = 'index.php';
        </script>
        ";
        else :
            echo
            "<script>
                alert('Password berhasil diubah!');
                document.location.href = 'forgotPassword.php?page=ubah_password';
            </script>";
        endif;
    else :
        echo "
        <script>
            alert('Password harus memiliki minimal 8 karakter');
        </script>
        ";
    endif;
endif;
