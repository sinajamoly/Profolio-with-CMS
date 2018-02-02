<?php
    require_once("include/header.php");
    global $session;
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
?>



<div class="container" >
    <div class="row" style="margin: 100px 20px;">
        <div class="col-md-8">
            <form action="add_project.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="title" name="title">
                </div>
                <div class="form-group">
                    <label for="description">description</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="form-group">
                    <label for="language">Language</label>
                    <input type="text" class="form-control" id="language" placeholder="language" name="language">
                </div>
                <div class="form-group">
                    <label for="link">link</label>
                    <input type="text" class="form-control" id="link" placeholder="link" name="link">
                </div>
                <button class="btn btn-success m-auto" type="submit" name="submit">add the project</button>

                <a href="index2.php" class="btn btn-outline-danger">cancel</a>
            </form>
        </div>
    </div>
</div>





<?php require_once("include/footer.php");?>
