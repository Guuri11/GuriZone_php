<?php
session_set_cookie_params(1440,'/',"gurizone.local",null,true);
session_name('gurizone');
session_start();
//Regenerar session usuario
if (array_key_exists('time',$_SESSION) && time()-$_SESSION['time'] >= 15*60){
    session_regenerate_id();
    $_SESSION['time']=time();
}

// Claves App Twitter @gurizonebackend
$consumer_key = '';
$consumer_secret='';
$access_token='';
$access_token_secret='';
