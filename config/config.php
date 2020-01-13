<?php
session_set_cookie_params(1440,null,"gurizone.local",null,true);
session_name('gurizone');
session_start();
session_regenerate_id();
