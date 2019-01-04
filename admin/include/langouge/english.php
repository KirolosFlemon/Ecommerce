<?php
function lang($phrase)
{
    static $lang = array(
        //Dashboard Page
        'Home_Admin' =>  'Home',
        'Categories' =>  'Categoies',
        'ITEMS'      =>  'Items ',
        'MEMBERS'    =>  'Members ',
        'STATISTICS' =>  'Statistics ',
        'LOGS'       =>  'Logs ',


    );
    return $lang[$phrase];

}

;

