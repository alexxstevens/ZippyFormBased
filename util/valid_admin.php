Your "valid_admin.php" just needs to check if the $SESSION variable "is_valid_admin" is set. If not, it needs to send the user back to login. 
<?php 
if (!isset($_SERVER[is_valid_admin])) {
  include('zua-login.php');
}
?>