<?php
session_start();
session_destroy();
echo "<script> window.location.href='index.php?msg=1';
alert('successfully logged out');
</script>";
?>