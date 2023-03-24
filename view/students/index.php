<?php
$title = "Dashboard";
include '../components/config.php';
include '../components/meta.php';
include '../components/navbar.php';
?>
<?php
if (isset($_SESSION['notif']) == 'login') {
?>
    <script>
        const information = $("#notif", function() {
            Swal.fire({
                title: "Login Success",
                icon: "success"
            });
        });
    </script>
    <div class="notif" id="notif" data-infodata="info"></div>
<?php
    unset($_SESSION['notif']);
}
?>
<?php
if (isset($_SESSION['voteStatus']) == 'done') {
?>
    <script>
        const information = $("#notif", function() {
            Swal.fire({
                title: "Anda sudah melakukan Voting",
                icon: "success"
            });
        });
    </script>
    <div class="notif" id="notif" data-infodata="info"></div>
<?php
    unset($_SESSION['voteStatus']);
}
?>
<?php
if (isset($_SESSION['HaveVote']) == true) {
?>
    <script>
        const information = $("#notif", function() {
            Swal.fire({
                title: "Vote berhasil",
                icon: "success"
            });
        });
    </script>
    <div class="notif" id="notif" data-infodata="info"></div>
<?php
    unset($_SESSION['HaveVote']);
}
?>
<?php
if (isset($_SESSION['reg']) == 'success') {
?>
    <script>
        const information = $("#notif", function() {
            Swal.fire({
                title: "Form telah terkirim, silahkan untuk menunggu konfirmasi",
                icon: "success"
            });
        });
    </script>
    <div class="notif" id="notif" data-infodata="info"></div>
<?php
    unset($_SESSION['reg']);
}
?>
<?php
if (isset($_SESSION['tolak']) == 'tolak_anggota') {
?>
    <script>
        const information = $("#notif", function() {
            Swal.fire({
                title: "Maaf Pendaftaran anda ditolak",
                icon: "alert"
            });
        });
    </script>
    <div class="notif" id="notif" data-infodata="info"></div>
<?php
    unset($_SESSION['tolak']);
}
?>

<?php
if (isset($_SESSION['tolak']) == 'tolak_ketos') {
?>
    <script>
        const information = $("#notif", function() {
            Swal.fire({
                title: "Maaf Pendaftaran anda ditolak",
                icon: "alert"
            });
        });
    </script>
    <div class="notif" id="notif" data-infodata="info"></div>
<?php
    unset($_SESSION['tolak']);
}
?>

<style>
    .vote {
        background-color: #11bb9d;
        color: #1f2833;
    }

    .vote:hover {
        background-color: #1f2833;
        color: #11bb9d;
    }

    @media only screen and (max-width: 320px) {
        .vote {
            z-index: 1;
        }

        .img img {
            margin-top: -250px;
            opacity: 10%;
        }
    }

    @media only screen and (min-width: 992px) {}
</style>

<section class="main text-light" style="background-color: #1f2833;">
    <div class="container pt-5">
        <div class="row d-flex justify-content-between">
            <div class="col-md-6 mt-3">
                <div class="title">
                    <h3 class="fw-bold text-justify">Sistem Informasi <span style="color: #11bb9d;">Evoting</span><br>Pemilihan Ketua Osis Online<br>Berbasis Website</h3>
                    <span>Ayo Suarakan Pilihan Mu Dalam Pemilihan Ketua Osis</span><br>
                    <?php if ($s['role'] == 'student') : ?>
                        <a href="Vote.php" class="btn mt-3 fw-bold opacity-100 vote">Vote Sekarang!</a>
                    <?php elseif ($s['role'] == 'member') : ?>
                        <a href="Vote.php" class="btn mt-3 fw-bold opacity-100 vote">Vote Sekarang!</a>
                    <?php elseif ($s['role'] == 'candidate') : ?>
                        <a class="btn mt-3 fw-bold opacity-100 vote" href="VotesResult.php">Lihat Hasil Vote</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="img d-flex justify-content-center">
                    <img src="../../public/img/slide.png" width="300">
                </div>
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#fff" fill-opacity="1" d="M0,128L120,144C240,160,480,192,720,181.3C960,171,1200,117,1320,90.7L1440,64L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path>
    </svg>
</section>
<section>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">
                <h3 class="text-center fw-bold">About Us</h3>
                <hr style="color: #1f2833;">
            </div>
            <div class="col-md-12">
                <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis sunt consectetur enim optio, iste ipsa laboriosam placeat, voluptates quisquam officiis et alias natus, possimus dolorum corrupti qui tempore magnam. Enim vero nesciunt omnis, ex amet, adipisci ratione odit aperiam earum consequatur libero blanditiis? Maiores animi pariatur dicta recusandae tempora officiis a deserunt esse laboriosam, quas ipsam veritatis dolor ratione earum qui vel consectetur delectus et dolorem necessitatibus? Nam reprehenderit aut atque tenetur cupiditate molestias maxime quidem repudiandae aperiam beatae! Vero distinctio, sunt, tempora aut recusandae in, similique reprehenderit tempore esse exercitationem maxime modi doloremque inventore ad odit iure commodi. Asperiores!</p>
            </div>
        </div>
    </div>
</section>
<?php if ($s['role'] == 'student') : ?>
    <section class="p-3" style="margin-bottom: 90px;">
        <div class="container mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-5">
                    <h4 class="fw-bold text-center">Berminat Menjadi Anggota <span style="color: #11bb9d;">OSIS?</span></h4>
                    <hr>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <a class="btn fw-bold vote" href="../students/MemberRegister.php">Daftar Sekarang!</a>
            </div>
        </div>
    </section>
<?php elseif ($s['role'] == 'member') : ?>
    <section class="p-3" style="margin-bottom: 90px;">
        <div class="container mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-5">
                    <h4 class="fw-bold text-center">Berminat Menjadi Calon Ketua <span style="color: #11bb9d;">OSIS?</span></h4>
                    <hr>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <a class="btn fw-bold vote" href="../students/CouncilRegister.php">Daftar Sekarang!</a>
            </div>
        </div>
    </section>
<?php elseif ($s['role'] == 'candidate') : ?>
<?php endif; ?>
<?php include '../components/footer.php' ?>