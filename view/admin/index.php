<?php
session_start();
$title = 'Login';
include '../components/config.php';
include '../components/meta.php';
include '../components/query/Login.php';
?>
<?php
if (isset($_SESSION['logout']) == 'logout') {
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
    unset($_SESSION['logout']);
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
<style>
    .container {
        margin-top: 5%;
    }
</style>
<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-2" style="background-color: #1f2833; color: #00ff90;">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <h4 class="fw-bold">Login</h4>
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <img src="../../public/img/logoTitle.png" width="128">
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
                                <button type="submit" name="login" class="btn fw-bold" style="background-color: #00ff90; color:#1f2833;">Login</button>
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