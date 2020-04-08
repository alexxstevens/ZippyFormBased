<?php 
include 'view/header-admin.php';
require('model/admin_db.php');
?>
  <main>
        <BR>
        <h2 class="add">Admin Registration</h2>
        <?php 
          if(isset($_SESSION['username'])) { ?>
          <p class="center-text">Welcome, <?php echo $_SESSION['username'];?>!  <a href="admin.php">Click Here</a> to view the vehicle inventory.</p>
        <?php
          } else { ?>
        <p class="center-text">Please fill out the form below and click the "Register" button to complete your administer registration with Zippy's Used Autos. </p>

        <div class="add">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="admin_register_form">
                <input type="hidden" name="action" value="admin_register">

                <label>Username: </label>
                <input type="text" name="username" max="30" required><br>

                 <!-- <label>Password:</label>
                <input type="text" name="password" max="30" required><br>

                 <label>Confirm Password:</label>
                <input type="text" name="confirm_password" max="30" required><br> -->

                <label>&nbsp;</label>
                <input type="submit" value="Register as Admin" name="Submit" class="button blue"><br>
            </form>
          </div> 
          <?php 
          }
          ?>
<br>
  </main>



<?php

  if(isset($_POST['username'])) {
    $val = filter_input(INPUT_POST, 'username');
    $res = array("options"=>array("regexp"=>"/[0-9a-zA-Z]{6,}/"));
    if (filter_var($val, FILTER_VALIDATE_REGEXP,$res)) {
    $username = filter_input(INPUT_POST, 'username');
    $checkusername=check_username($username);
    global $checkusername;
      if (!empty($checkusername)) {
        echo 'Username is invalid. Entered username already exists. Please re-enter your username.';
      } else {
        $username = filter_input(INPUT_POST, 'username');
        echo 'check' . $checkusername;
        echo 'user' . $username;}
   } else {
    echo 'Username is invalid. Please re-enter your username.';
   }}

    if(isset($_POST['password'])) {
    $val = filter_input(INPUT_POST, 'password');
    $res = array("options"=>array("regexp"=>"/[0-9a-zA-Z]{6,}/"));
    if (filter_var($val, FILTER_VALIDATE_REGEXP,$res)) {
    $password = filter_input(INPUT_POST, 'password');
   } else {
    echo 'Password is invalid. Please re-enter your password.';
   }}



//     $_SESSION['username'] = filter_input(INPUT_GET, 'firstName');
//     $_SESSION['password'] = 
//     $_SESSIOM['confrim_password'] =
//     header("Location: register.php");
//     }

   


// $error_username
// $error_password
// $error_confirm_password

// if empty($error_username && $error_password && $error_confirm_password) {



?>

<?php include 'view/footer.php'; ?>