<?php
session_start();
echo "<script>alert('Thanks For Login!$_SESSION[nama]');</script>";
session_destroy();
?>
<meta http-equiv="refresh" content="0;url=index.php" />