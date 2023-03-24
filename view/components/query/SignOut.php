<?php

session_start();
unset($_SESSION['students']);
$_SESSION['SignOut'] = true;
echo
"<script>
        document.location.href = '../../index.php';
    </script>";
