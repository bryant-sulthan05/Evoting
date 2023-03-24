<?php
$countMember = mysqli_num_rows(mysqli_query($config, "SELECT * FROM member WHERE status = 'pending'"));
$countCouncil = mysqli_num_rows(mysqli_query($config, "SELECT * FROM candidates WHERE status = 'pending'"));
?>
<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }

    body {
        font-size: 1rem;
    }

    .feather {
        width: 16px;
        height: 16px;
    }

    /*
 * Sidebar
 */

    .sidebar {
        position: fixed;
        top: 0;
        /* rtl:raw:
  right: 0;
  */
        bottom: 0;
        /* rtl:remove */
        left: 0;
        z-index: 100;
        /* Behind the navbar */
        padding: 48px 0 0;
        /* Height of navbar */
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
    }

    @media (max-width: 767.98px) {
        .sidebar {
            top: 5rem;
        }
    }

    .sidebar-sticky {
        height: calc(100vh - 48px);
        overflow-x: hidden;
        overflow-y: auto;
        /* Scrollable contents if viewport is shorter than content. */
    }

    .sidebar .nav-link {
        font-weight: 500;
        color: #333;
    }

    .sidebar .nav-link .feather {
        margin-right: 4px;
        color: #727272;
    }

    .sidebar .nav-link.active {
        color: #2470dc;
    }

    .sidebar .nav-link:hover .feather,
    .sidebar .nav-link.active .feather {
        color: inherit;
    }

    .sidebar-heading {
        font-size: .75rem;
    }

    /*
 * Navbar
 */

    .navbar-brand {
        padding-top: .75rem;
        padding-bottom: .75rem;
        background-color: rgba(0, 0, 0, .25);
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
    }

    .navbar .navbar-toggler {
        top: .25rem;
        right: 1rem;
    }

    .navbar .form-control {
        padding: .75rem 1rem;
    }

    .form-control-dark {
        color: #fff;
        background-color: rgba(255, 255, 255, .1);
        border-color: rgba(255, 255, 255, .1);
    }

    .form-control-dark:focus {
        border-color: transparent;
        box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
    }

    .dropdown:hover>.dropdown-menu {
        display: block;
    }

    .dropdown>.dropdown-toggle:active {
        pointer-events: none;
    }
</style>

<header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" style="background-color: #1f2833;">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="dashboard.php"><img src="../../public/img/nav.png" width="100"></a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <span class="form-control form-control-dark w-100 rounded-0 border-0 fw-bold">Welcome, <?= $_SESSION['firstname'] ?></span>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="signout.php">Sign out</a>
        </div>
    </div>
</header>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?= $title == 'Dashboard' ? 'active' : '' ?>" aria-current="page" href="dashboard.php">
                    <span class="bi bi-house-door">&nbsp;Dashboard</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link <?= $title == 'Students List' ? 'active' : '' ?>" href="StudentsList.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="bi bi-person-lines-fill">&nbsp;Daftar Siswa</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown">
                        <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                            Multimedia
                        </a>
                        <ul class="dropdown-menu ms-1">
                            <li><a class="dropdown-item" href="StudentsList.php?page=xmm">X</a></li>
                            <li><a class="dropdown-item" href="StudentsList.php?page=ximm">XI</a></li>
                            <li><a class="dropdown-item" href="StudentsList.php?page=xiimm">XII</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                            Rekayasa Perangkat Lunak
                        </a>
                        <ul class="dropdown-menu ms-1">
                            <li><a class="dropdown-item" href="StudentsList.php?page=xrpl">X</a></li>
                            <li><a class="dropdown-item" href="StudentsList.php?page=xirpl">XI</a></li>
                            <li><a class="dropdown-item" href="StudentsList.php?page=xiirpl">XII</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-item dropdown-toggle text-wrap" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                            Teknik Komputer dan Jaringan
                        </a>
                        <ul class="dropdown-menu ms-1">
                            <li><a class="dropdown-item" href="StudentsList.php?page=xtkj">X</a></li>
                            <li><a class="dropdown-item" href="StudentsList.php?page=xitkj">XI</a></li>
                            <li><a class="dropdown-item" href="StudentsList.php?page=xiitkj">XII</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-item text-wrap" href="StudentsList.php?page=all">
                            All
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $title == 'Council Member' ? 'active' : '' ?>" href="CouncilMember.php">
                    <div class="d-flex justify-content-between">
                        <span class="bi bi-person-vcard">&nbsp;Anggota Osis</span>
                        <?php if ($countMember > 0) : ?>
                            <span class="fw-bold text-light text-center" style="background-color: #13cfac; text-decoration: none; width: 20px; border-radius: 8px;"><?= $countMember ?></span>
                        <?php endif; ?>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $title == 'Candidates' ? 'active' : '' ?>" href="CandidatesList.php">
                    <div class="d-flex justify-content-between">
                        <span class="bi bi-person-workspace">&nbsp;Kandidat</span>
                        <?php if ($countCouncil > 0) : ?>
                            <span class="fw-bold text-light text-center" style="background-color: #13cfac; text-decoration: none; width: 20px; border-radius: 8px;"><?= $countCouncil ?></span>
                        <?php endif; ?>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $title == 'Votes Result' ? 'active' : '' ?>" href="VotesResult.php">
                    <span class="bi bi-person-bounding-box">&nbsp;Hasil Vote</span>
                </a>
            </li>
        </ul>
    </div>
</nav>