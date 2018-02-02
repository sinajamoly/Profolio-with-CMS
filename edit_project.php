<?php
    require_once("include/header.php");
    if($session->is_signed_in() && isset($_POST['submit'])){
        $project=new Profolio();
        $project->title=$_POST['title'];
        $project->description=$_POST['description'];
        $project->add_image($_FILES['image']);
        $project->language=$_POST['language'];
        $project->link=$_POST['link'];
        $project->create();
        unset($_POST);
        //redirect("index2.php");
    }else{

    }
    $projects=Profolio::find_all();

?>



<div class="container" >
    <div class="row" style="margin: 100px 20px;">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>#</th>
                    <th>title</th>
                    <th>description</th>
                    <th>language</th>
                    <th>image</th>
                    <th>link</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    foreach ($projects as $project){
                        echo "<tr>";
                        echo "<td>". $project->id."</td>";
                        echo "<td>". $project->title."</td>";
                        echo "<td>". $project->description."</td>";
                        echo "<td>". $project->language."</td>";
                        echo "<td>". "<img src='$project->image' alt='' class='img-fluid'>"."</td>";
                        echo "<td>". $project->link."</td>";
                        echo "<td><a href='delete_project.php?id={$project->id}' class='btn btn-danger'>Delete</a></td>";
                        echo "</tr>";
                    }

                ?>

            </tbody>
        </table>
    </div>
</div>





<?php require_once("include/footer.php");?>
