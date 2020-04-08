<?php 
include 'view/header-admin.php';
require('model/admin_db.php');
?>
  <main>
        <BR>

        <h2 class="add">Admin Login</h2>
        
        <p class="center-text">Please login with your credentials below. </p>

        <div class="add">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="admin_register_form">
                <input type="hidden" name="action" value="admin_register">

                <label>Username:* </label>
                <input type="text" name="username" max="30" required><br>

                <label>Password:*</label>
                <input type="password" name="password" max="30" required><br>

                <label>&nbsp;</label>
                <input type="submit" value="Login" name="Submit" class="button blue"><br>
            </form><br>
            <p>* Indicates a required field.</p>
          </div> 


<?php
//username parameters
  if(isset($_POST['username'])) {
    $val = filter_input(INPUT_POST, 'username');
    $res = array("options"=>array("regexp"=>"/[0-9a-zA-Z]{6,}/"));
    if (filter_var($val, FILTER_VALIDATE_REGEXP,$res)) {
    $username = filter_input(INPUT_POST, 'username');
    $checkusername=check_username($username);
    global $checkusername;
      if (empty($checkusername)) {
        $error_login_unknown_username = 'Username does not exist.  Please try again or register as a new user.';
      } else {
        $username = filter_input(INPUT_POST, 'username');}
   } else {
    $error_login_username = 'Username is invalid. Username must be at least 6 characters long. Please re-enter your username.';
   }}

//password parameters
    if(isset($_POST['password'])) {
    $val = filter_input(INPUT_POST, 'password');
    $res = array("options"=>array("regexp"=>"/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/"));
    if (filter_var($val, FILTER_VALIDATE_REGEXP,$res)) {
    $password = filter_input(INPUT_POST, 'password');
    } else {
      $error_password = 'Password is invalid. All passwords must contain: at least one number, one uppercase letter, one lowercase letter, and is at least 8 characters. Please re-enter a valid password.';
   }}




    if(isset($_POST['Submit']))
      if ((empty($error_login_unknown_username)) && (empty($error_login_username)) && (empty($error_password))) {
        if (isset($username, $password)){
        is_valid_admin_login($username, $password);
          if (is_valid_admin_login($username, $password) == true){
            $lifetime = time() + (86400 * 30);
            $path = '/';
            session_set_cookie_params($lifetime, $path);
            session_start();
            $_SESSION['is_valid_admin'] = TRUE;
            header("Location: admin.php");
          } else {
            $error_login_username = 'Invalid Login';
          }
      }}


    if (isset($error_login_unknown_username)) {
      echo "<script>alert('$error_login_unknown_username')</script>";
    } else if (isset($error_login_username)) {
      echo "<script>alert('$error_login_username')</script>";
    } else if (isset($error_password)) {
      echo "<script>alert('$error_password')</script>";
    }

?>


<br>
<?php include 'view/footer.php'; ?>