<?php 
if (!isset($_SESSION['is_valid_admin'])) {
  Header("Location: zua-login.php");
}
?>