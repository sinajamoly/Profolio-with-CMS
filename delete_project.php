<?php
    require_once("include/header.php");
    if($session->is_signed_in() && isset($_GET['id'])){
        $project=Profolio::find_by_id($_GET['id']);
        $project->delete();
        redirect("edit_project.php");

    }else{

    }
?>
