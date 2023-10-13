<?php
$forgot_pass = mail('@gmail.com', '', 'test email php', 'Tes');

if ($forgot_pass) :
    echo 'Email sent successfully';
else :
    echo 'Failed to send email';
endif;
