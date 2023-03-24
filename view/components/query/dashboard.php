<?php

// Count total data
$count1 = mysqli_num_rows($config->query("SELECT * FROM candidates"));
$count2 = mysqli_num_rows($config->query("SELECT * FROM students"));
$count3 = mysqli_num_rows($config->query("SELECT * FROM vote"));
$count4 = mysqli_num_rows($config->query("SELECT * FROM member WHERE status = 'approved'"));

// get Year
$y = date('Y');
$Year = mysqli_real_escape_string($config, $y);
