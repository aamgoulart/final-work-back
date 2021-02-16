<?php

include 'php-config-db.php';
$conn = OpenCon();
echo "Connected Successfully";
CloseCon($conn);
?>
