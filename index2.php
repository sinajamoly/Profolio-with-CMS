<?php
require_once ('include/header.php');
$projects=Profolio::find_all();
?>

    <!-- PROJECTS-->
    <div class="container my-2 projects" id="projectSection">
        <div class="row">
            <?php foreach ($projects as $project){  ?>
            <div class="col-md-4 border-success text-center my-2">
                <div class="card ">
                    <img src=<?php echo $project->image ?> alt="" class="card-img-top">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo $project->title ?>
                        </h4>
                        <div class="card-text">
                            <?php echo $project->description ?>
                        </div>
                    </div>
                    <p class="card-subtitle">
                        <?php echo $project->language ?>
                    </p>
                    <a href="<?php echo $project->link ?>" class="btn btn-outline-danger my-3">
                        SEE THE PROJECT
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
<!--CONTACT FROM-->
    <div class="m-2 bg-secondary border-danger" id="contactSection">
        <h2 class="form-control text-primary"> please leave message and feedback <span class="fa fa-envelope-open-o"></span></h2>
        <form action="" class="m-4">
            <div class="form-group">
                <label for="email">Name</label>
                <input type="input" class="form-control" id="email" placeholder="Your Email Address">
            </div>

            <div class="form-group">
                <label for="email">Company</label>
                <input type="input" class="form-control" id="email" placeholder="Your Email Address">
            </div>

            <div class="form-group">
                <label for="email">EMAIL</label>
                <input type="input" class="form-control" id="email" placeholder="Your Email Address">
            </div>

            <div class="form-group">
                <label for="message">Your Message</label>
                <textarea name="message"  cols="30" rows="10" id="message" class="form-control"></textarea>
            </div>

            <div class="form-group m-4">
                <button class="btn btn-primary form-control"  name="submit" type="submit">
                    <span class="fa fa-envelope"></span> Send
                </button>
            </div>

        </form>
    </div>
    <!--   ------------------------------------------          -->
        <!--ABOUT ME-->

    <div class="jumbotron jumbotron-fluid m-4" id="sectionAbout">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="img/sina.jpg" alt="" class="img-fluid rounded-circle">
                </div>
                <div class="col-md-6">
                    <h1>Sina Jamoly</h1>
                    <h2 class="lead">Software Engineer</h2>
                    <p>I am software engineer graduated from <a href="http://www.apu.edu.my/">ASIA PACIFIC UNIVERSITY</a> and
                        <a href="http://www.staffs.ac.uk/" class="">STAFFORDSHIRE UNIVERSITY</a>.
                    </p>
                    <p>working experience on several different platform and programming languages
                        for different projects.
                    </p>
                    <ul class="list-group">

                        <li class="list-group-item">
                            JavaScript
                        </li>
                        <li class="list-group-item">
                            Java(EE)
                        </li>
                        <li class="list-group-item">
                            PHP(Laravel)
                        </li>
                        <li class="list-group-item">
                            MATLAB
                        </li>
                        <li class="list-group-item">
                            HTML
                            <span class="fa fa-html5"></span>
                        </li>
                        <li class="list-group-item">
                            CSS
                            <span class="fa fa-css3"></span>
                        </li>
                    </ul>
                    <p>I have advance knowledge on mathematic
                        which have been applied on number of
                        Artificial Inteligent projects such as iris recognition
                        and fingerprint recognition.
                    </p>
                </div>
            </div>

        </div>
    </div>
<!-- ----------------------------------->



    <!--footer-->
<?php require_once ('include/footer.php'); ?>
