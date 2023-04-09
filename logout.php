<?php
setcookie("userIdCookie", "", time() - 3600);
session_start();
session_destroy();
echo '<script> location.href = "index.php";</script>';
?>