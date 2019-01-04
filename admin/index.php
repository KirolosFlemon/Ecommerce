<?php
session_start();
$noNav ='';
$pageTittle='Login';

if(isset($_SESSION['Usename'])){
    header('location: dashboard.php'); //Redirect To Dashboard Page
}
include 'init.php';
//check if user come from http post req
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $hashedPass = sha1($password);

//check if user exist in database
    $stmt = $con->prepare("SELECT UserID,Username,Password FROM users WHERE Username = ? AND Password = ? AND GroupID =1 LIMIT 1");
    $stmt->execute(array($username, $hashedPass));
    $row = $stmt->fetch();
    $count = $stmt->rowCount();

// check count  > 0 This Mean the Database Contain Record About This Username
    if ($count > 0) {
        $_SESSION['Usename']=$username; //Register Session Name
        $_SESSION['ID']=$row['UserID'];//Register Session UserID
        header('location: dashboard.php'); //Redirect To Dashboard Page
        exit();
    }
}
?>

<form class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <h4 class="text-center">ADMIN LOGIN</h4>
    <input class="form-control input-lg" type="text" name="user" placeholder="insert your username" autocomplete="off">
    <input class="form-control input-lg" type="password" name="pass" placeholder="insert your password"
           autocomplete="new-password">
    <input class="btn btn-primary btn-block" type="submit" value="login">
</form>

<?php include $tpl . 'footer.inc'; ?>
