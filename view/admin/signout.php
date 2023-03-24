<?php

session_start();
unset($_SESSION['admin']);

if (isset($_COOKIE['tgl']) or isset($_COOKIE['admin']) or isset($_COOKIE['pw'])) :
    setcookie("tgl", $_COOKIE['tgl'], time() - 86400);
    setcookie("admin", $_COOKIE['admin'], time() - 86400);
    setcookie("pw", $_COOKIE['pw'], time() - 86400);
endif;

$_SESSION['logout'] = 'logout';
echo
"<script>
        document.location.href = 'index.php';
    </script>";
