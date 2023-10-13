<?php

try {
    $config = mysqli_connect("localhost", "root", '', "evote");

    if (!$config) {
        throw new Exception("Koneksi gagal: " . mysqli_connect_error());
    }
} catch (Exception $e) {
    echo "Failed connect to database: ";
}
