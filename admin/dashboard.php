<?php
session_start();
if (isset($_SESSION['Usename'])) {
    $pageTittle='Dashboard';
    include 'init.php';
    echo 'welcome';
    include $tpl . 'footer.inc';
} else {
    echo 'you are not allow to view this page';
    header('location: index.php'); //Redirect To Dashboard Page
    exit();
}
?>