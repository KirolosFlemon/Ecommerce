<?php
function lang($phrase){
    static $lang=array(
        'massage'=>'welcome in arabic',
        'admin'=>'Administrator in arabic'

    );
    return $lang[$phrase];

};

