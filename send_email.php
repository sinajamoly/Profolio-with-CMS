<?php
require_once("include/header.php");
if(isset($_POST['submit'])){
    $to="sinajamoly1@gmail.com";
    $subject=$_POST['email']." ".$_POST['company'];
    $body=$_POST["name"]." ".$_POST['message'];
    $body=wordwrap($body,70);
    mail($to,$subject,$body,"");

}
redirect("index.php");
require_once("include/footer.php");
?>
