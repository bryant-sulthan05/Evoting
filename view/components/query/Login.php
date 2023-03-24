<?php
date_default_timezone_set("Asia/Jakarta");
$login_date =  date("Y-m-d H:i:s");

// Admins Login
if (isset($_COOKIE['login_admin']) && isset($_COOKIE['admin']) && isset($_COOKIE['pw']) && isset($_SESSION['admin'])) {
    echo "<script>
            alert('Anda Sudah Melakukan Login');
            document.location.href = 'dashboard.php';
        </script>";
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = hash('md5', $_POST['password']);
    $query = $config->query("SELECT * FROM admin WHERE email = '$email' AND password = '$password'");
    $row = mysqli_fetch_assoc($query);

    if (mysqli_num_rows($query) == 1) {
        if ($password == $row['password']) {
            $_SESSION['admin'] = true;
            $_SESSION['admin_id'] = $row['admin_id'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['plaintext'];
            $_SESSION['tlp'] = $row['tlp'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['notif'] = 'login';
            if (isset($_POST['remember'])) {
                setcookie("login_admin", $login_date, time() + 86400);
                setcookie("admin", hash('md5', $row['email']), time() + 86400);
                setcookie("pw", hash('md5', $row['password']), time() + 86400);
            } else {
            }
            echo "<script>
                        document.location.href = 'dashboard.php';
                    </script>";
        } else {
            echo "<script>
                alert('Username atau Password Salah');
                document.location.href = 'index.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Akun Belum Terdaftar');
            document.location.href = 'index.php';
        </script>";
    }
}

// Students Login
if (isset($_COOKIE['date']) && isset($_COOKIE['students']) && isset($_COOKIE['mail']) && isset($_SESSION['students'])) {
    echo "<script>
            alert('Anda Sudah Melakukan Login');
            document.location.href = 'students/index.php';
        </script>";
}

if (isset($_POST['SignIn'])) {
    $email = $_POST['email'];
    $password = hash('md5', $_POST['password']);
    $query = $config->query("SELECT * FROM students WHERE email = '$email'");
    $row = mysqli_fetch_assoc($query);

    if (mysqli_num_rows($query) == 1) {
        if ($password == $row['password']) {
            $_SESSION['students'] = true;
            $_SESSION['students_id'] = $row['students_id'];
            $_SESSION['classroom_id'] = $row['classroom_id'];
            $_SESSION['expertise_id'] = $row['expertise_id'];
            $_SESSION['notif'] = 'login';
            if (isset($_POST['remember'])) {
                setcookie("date", $login_date, time() + 86400);
                setcookie("students", hash('md5', $row['email']), time() + 86400);
                setcookie("mail", hash('md5', $row['password']), time() + 86400);
            } else {
            }
            echo "<script>
                        document.location.href = 'students/index.php';
                    </script>";
        } else {
            echo "<script>
                alert('Username atau Password Salah');
                document.location.href = 'index.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Akun Belum Terdaftar');
            document.location.href = 'index.php';
        </script>";
    }
}
