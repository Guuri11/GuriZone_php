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
$consumer_key = '7B3W3adFLuPm24Bxwy4e113J3';
$consumer_secret='zwQuxVactwkYI0ZaTsCee1sMnf9efRAVJ2bLQEkQAXfKruxtUQ';
$access_token='1217927431757160453-3EV8IQk9KxYye4C2vEACTaWWe02KWn';
$access_token_secret='uQVj0rgyRvaKmvtK18x4ujUGveu6OaXajGeeJh0HXnhJk';
