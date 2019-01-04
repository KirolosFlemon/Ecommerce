<?php
$do='';
if (isset($_GET['do'])){
    $do = $_GET['do'];
}else{
    $do ='Manage';
}

//If The Page Main Page//
if ($do=='Manage'){
    echo 'Wlcome You Are In Manage Category Page';

}elseif($do=='Add') {
    echo 'Wlcome You Are In Add Category Page';

}elseif ($do=='Insert'){
    echo 'Wlcome You Are In Insert Category Page';

}else{
    echo 'Error There Is No Page  With This Name';
}