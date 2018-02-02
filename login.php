<?php
require_once('include/header.php');
global $session;
if($session->is_signed_in()){
    redirect('add_project.php');
}
if(isset($_POST['login'])) {
    global $database;
    $username = $database->escape_string($_POST['username']);
    $password = $database->escape_string($_POST['password']);
    if (User::varify($username, $password)) {
        redirect('add_project.php');
    }
}
?>

<form action="login.php" method="post">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control"  id="password" name="password" placeholder="password">
    </div>
    <button name="login" class="btn btn-dark" type="submit">Login</button>
    <a href="index2.php" class="btn btn-primary">Cancel</a>
</form>

<?php
require_once('include/footer.php');
?>

