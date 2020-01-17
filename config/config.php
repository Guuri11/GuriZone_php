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
$consumer_key = 'trp5a5l4jbVCxChaH7yYD7W7q';
$consumer_secret='w3JqxYJOSp6xbsZYEoHhTU00lWvNsaoBWL4fydBDkVYoHu8bC3';
$access_token='1217927431757160453-f2eioQFmIEgoDShB5KxvGfG1e9kLle';
$access_token_secret='LpOmaZMVHLUVvQ6WMSOh20qoeEgXpW9CuXTCgiONxi6GT';