
<?php 
$lifetime = time() + (86400 * 30);
$path = '/';
session_set_cookie_params($lifetime, $path);
include 'view/header.php';
?>
  <main>
        <BR>

        <h2 class="add">Register</h2>
        <?php 
          if(isset($_SESSION['firstName'])) { ?>
          <p class="center-text">Welcome, <?php echo $_SESSION['firstName'];?>!  <a href="index.php">Click Here</a> to view our vehicle inventory.</p>
        <?php
          } else { ?>
        <p class="center-text">Please fill out the form below and click the "Register" button to register with Zippy's Used Autos. </p>
        <div class="add">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get" id="register_form">
                <input type="hidden" name="action" value="register">
                <label>Please enter your first name:</label>
                <input type="text" name="firstName" max="30" required><br>
                <label>&nbsp;</label>
                <input type="submit" value="Register" name="Submit" class="button blue"><br>
            </form>
          </div> 
          <?php 
          }
          ?>
<br>
  </main>



<?php

  if(isset($_GET['Submit'])) {
    $_SESSION['firstName'] = filter_input(INPUT_GET, 'firstName');
    header("Location: register.php");
    }

   
?>





<?php include 'view/footer.php'; ?>