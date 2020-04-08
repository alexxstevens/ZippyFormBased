
<?php 
include 'view/header.php';?>

<br>
<p class="center-text"><?php if (isset($_SESSION['firstName'])) {?>Thank you for signing out, <?php echo $_SESSION['firstName'];?>!  <?php }?><a href="index.php">Click Here</a> to view our vehicle inventory.</p>

<?php 

//delete session variable
unset ($_SESSION['firstName']);
//destroy session
session_destroy();
//delete session cookie
$name = session_name();
$expire = strtotime('-1 year');
$params = session_get_cookie_params();
$path = $params['path'];
$domain = $params['domain'];
$secure = $params['secure'];
$httponly = $params['httponly'];
setcookie ($name, '', $expire, $path, $domain, $secure, $httponly);

include 'view/footer.php';
?>