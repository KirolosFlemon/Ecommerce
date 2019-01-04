<?php
/*
 * Tittle Function That Echo The Page Tittle In Case The page
 * Has The  Variable $pagetittle And Echo Default For Other Page
 */
function getTittle(){
global $pageTittle;
if(isset($pageTittle)){
    echo $pageTittle;
}else
    echo 'Default';
}

?>