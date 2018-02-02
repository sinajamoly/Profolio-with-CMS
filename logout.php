<?php
    require_once('include/header.php');
    global $session;
    if($session->is_signed_in()){
        $session->logout();
    }
    redirect('index2.php');

require_once('include/footer.php');