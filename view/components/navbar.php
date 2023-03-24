<?php
session_start();
if (!isset($_SESSION['students'])) {
    $_SESSION['info'] = 'failed';
    echo "
    <script>
        document.location.href = '../index.php'
    </script>
    ";
}

$StudentsQuery = $config->query("SELECT * FROM students WHERE students_id = '$_SESSION[students_id]'");
$s = mysqli_fetch_assoc($StudentsQuery);
?>
<style>
    @media only screen and (min-width: 320px) {
        .navbar {
            background-color: #1b222c;
        }

        .navbar a {
            color: white;
        }

        .navbar-nav a:hover {
            color: #fff;
        }

        .navbar-nav .nav-link.active {
            color: #13cfac;
        }
    }

    @media only screen and (min-width: 992px) {
        .navbar {
            background-color: #1f2833;
        }

        .navbar a {
            color: #fff;
        }

        .navbar-nav .nav-link:hover {
            color: #fff;
            border-bottom: #13cfac solid;
        }

        .navbar-nav .nav-link.active {
            color: #13cfac;
            border-bottom: #13cfac solid;
            margin-right: 5px;
            margin-left: 5px;
        }
    }

    .logout {
        background-color: #13cfac;
        color: #1f2833;
    }

    .logout:hover {
        background-color: #1f2833;
        color: #13cfac;
        border: 2px #13cfac solid;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class=" container">
        <a class="navbar-brand" href="index.php"><img src="../../public/img/nav.png" width="128">&nbsp;</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto me-3">
                <a class="nav-link <?= $title == 'Dashboard' ? 'active' : '' ?>" aria-current="page" href="index.php">Home</a>
                <?php if ($s['role'] == 'student') : ?>
                    <a class="nav-link <?= $title == 'Vote' ? 'active' : '' ?>" href="Vote.php">Vote</a>
                    <a class="nav-link <?= $title == 'Daftar Anggota Osis' ? 'active' : '' ?>" href="MemberRegister.php">Daftar Anggota Osis</a>
                <?php elseif ($s['role'] == 'member') : ?>
                    <a class="nav-link <?= $title == 'Vote' ? 'active' : '' ?>" href="Vote.php">Vote</a>
                    <a class="nav-link <?= $title == 'Daftar Ketua Osis' ? 'active' : '' ?>" href="CouncilRegister.php">Daftar Ketua Osis</a>
                <?php elseif ($s['role'] == 'candidate') : ?>
                    <a class="nav-link <?= $title == 'Votes Result' ? 'active' : '' ?>" href="VotesResult.php">Lihat Hasil Vote</a>
                <?php endif; ?>
                <?php if (isset($_SESSION['students'])) : ?>
                    <a class="nav-link <?= $title == 'Profile' ? 'active' : '' ?>" href="Profile.php">Profile</a>
                    <a class="btn fw-bold ms-3 logout" href="../components/query/SignOut.php">Sign Out</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>