<?php
    ob_start();
    require_once ("Database.php");
    require_once ("db_object.php");
    require_once ("session.php");
    require_once ("Profolio.php");
    require_once ("User.php");

    function redirect($location){
        header('Location: '.$location);
    }
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Bootstrap 4 Starter Pack</title>
</head>

<body>

<nav class="navbar navbar-light bg-danger navbar-expand-sm">
    <a href="index2.php" class="navbar-brand"><span class="fa fa-smile-o"></span> SINA JAMOLY</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarLink" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarLink">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item p-2">
                <a href="#projectSection" class="nav-link">Projects</a>
            </li>
            <li class="nav-item p-2">
                <a href="#contactSection" class="nav-link">Contact ME</a>
            </li>
            <li class="nav-item p-2">
                <a href="#sectionAbout" class="nav-link">About Me</a>
            </li>
            <?php
                global $session;
                if(!$session->is_signed_in()){
                    echo "<li class='nav-item p-2'>
                        <a href='login.php' class='nav-link'>Login</a>
                        </li>";
                }
                if($session->is_signed_in()){
                    echo "<li class='nav-item p-2'>
                        <a href='logout.php' class='nav-link'>Logout</a>
                        </li>";
                    echo "<li class='nav-item p-2'>
                        <a href='edit_project.php' class='nav-link'>Delete And See the List</a>
                        </li>";
                    echo "<li class='nav-item p-2'>
                        <a href='add_project.php' class='nav-link'>Add</a>
                        </li>";
                }
            ?>

        </ul>
    </div>
</nav>