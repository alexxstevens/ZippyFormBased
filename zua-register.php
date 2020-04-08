<?php 
include 'view/header-admin.php';
require('model/admin_db.php');
session_start();
require('util/valid_admin.php');
?>
  <main>
        <BR>

        <h2 class="add">Admin Registration</h2>
        
        <p class="center-text">Please fill out the form below and click the "Register" button to complete your administer registration with Zippy's Used Autos. </p>

        <div class="add">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="admin_register_form">
                <input type="hidden" name="action" value="admin_register">

                <label>Username:* </label>
                <input type="text" name="username" max="30" required><br>

                <label>Password:*</label>
                <input type="password" name="password" max="30" required><br>

                 <label>Confirm Password:*</label>
                <input type="password" name="confirm_password" max="30" required><br> 

                <label>&nbsp;</label>
                <input type="submit" value="Register as Admin" name="Submit" class="button blue"><br>
            </form><br>
            <p>* Indicates a required field.</p>
          </div> 

<br>
  </main>

<?php
//username parameters
  if(isset($_POST['username'])) {
    $val = filter_input(INPUT_POST, 'username');
    $res = array("options"=>array("regexp"=>"/[0-9a-zA-Z]{6,}/"));
    if (filter_var($val, FILTER_VALIDATE_REGEXP,$res)) {
    $username = filter_input(INPUT_POST, 'username');
    $checkusername=check_username($username);
    global $checkusername;
      if (!empty($checkusername)) {
        $error_username = 'Username is invalid. Entered username already exists. Please re-enter your username.';
      } else {
        $username = filter_input(INPUT_POST, 'username');
        echo 'check' . $checkusername;
        echo 'user' . $username;}
   } else {
    $error_username = 'Username is invalid. Please re-enter your username.';
   }}

//password parameters
    if(isset($_POST['password'])) {
    $val = filter_input(INPUT_POST, 'password');
    $res = array("options"=>array("regexp"=>"/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/"));
    if (filter_var($val, FILTER_VALIDATE_REGEXP,$res)) {
    $password = filter_input(INPUT_POST, 'password');
    $confirm_password = filter_input(INPUT_POST, 'confirm_password');
      if ($password == $confirm_password) {
        $password = filter_input(INPUT_POST, 'password');
      } else {
        $error_confirm_password = 'Password does not match the confirmed password.  Please try again.';
      }
   } else {
    $error_password = 'Password is invalid. All passwords must contain: at least one number, one uppercase letter, one lowercase letter, and is at least 8 characters. Please re-enter a valid password.';
   }}


   
    if (isset($error_username)) {
      echo "<script>alert('$error_username')</script>";
    } else if (isset($error_password)) {
      echo "<script>alert('$error_password')</script>";
    } else if (isset($error_confirm_password)) {
      echo "<script>alert('$error_confirm_password')</script>";
    }


    if(isset($_POST['Submit']))
      if ((empty($error_username)) && (empty($error_password)) && (empty($error_confirm_password))) {
        if (isset($username, $password)){
        add_admin($username, $password);
        header("Location: admin.php");}
      }

?>
<br>
<?php include 'view/footer.php'; ?>