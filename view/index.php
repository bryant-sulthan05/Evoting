<?php
session_start();
$title = 'Login';
include 'components/config.php';
include 'components/query/Login.php';
?>
<!-- Meta -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- CSS -->
<link rel="stylesheet" href="../public/assets/css/bootstrap.min.css">
<link rel="shortcut icon" href="../public/img//logoTitle.png" type="image/x-icon">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<style>
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css");
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

    * {
        font-family: 'Poppins', sans-serif;
    }
</style>
<!-- JS -->
<script src="../public/assets/js/bootstrap.bundle.min.js"></script>
<script src="../public/assets/jquery/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../public/assets/js/sweetalert2.all.min.js"></script>
<title><?= $title ?></title>
<?php
if (isset($_SESSION['SignOut']) == true) {
?>
    <script>
        const information = $("#notif", function() {
            Swal.fire({
                title: "Logout Success",
                icon: "success"
            });
        });
    </script>
    <div class="notif" id="notif" data-infodata="info"></div>
<?php
    unset($_SESSION['SignOut']);
}
?>
<?php
if (isset($_SESSION['info']) == 'failed') {
?>
    <script>
        const information = $("#notif", function() {
            Swal.fire({
                title: "Please, Login First",
                icon: "warning"
            });
        });
    </script>
    <div class="notif" id="notif" data-infodata="info"></div>
<?php
    unset($_SESSION['info']);
}
?>
<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-md-6" style="margin-top: 120px;">
            <div class="card p-2" style="background-color: #1f2833; color: #00ff90;">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <h4 class="fw-bold">Login</h4>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <img src="../public/img/logoTitle.png" width="128">
                    </div>
                    <div class="form mt-5">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="email" class="fw-bold">Email :</label>
                                <input type="email" name="email" id="email" class="form-control border-primary" placeholder="Enter Email" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="password" class="fw-bold">Password :</label>
                                <input type="password" name="password" id="password" class="form-control border-primary" placeholder="Enter Password" required>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="form-group mt-3">
                                    <input type="checkbox" name="remember" id="remember">
                                    <label for="remember" class="fw-bold">Remember Me</label>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="checkbox" name="show" id="show" aria-hidden="true" onclick="toggle()">
                                    <label for="show" class="fw-bold">Show password</label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit" name="SignIn" class="btn fw-bold" style="background-color: #00ff90; color:#1f2833;">Login</button>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <span class="text-light">Lupa Password?&nbsp;</span><a href="students/forgotPassword.php" class="text-decoration-none fw-bold" style="color:#00ff90;">Klik disini!</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var state = false;

    function toggle() {
        if (state) {
            document.getElementById("password").setAttribute("type", "password");
            document.getElementById("show");
            state = false;
        } else {
            document.getElementById("password").setAttribute("type", "text");
            document.getElementById("show");
            state = true;
        }
    }
</script>