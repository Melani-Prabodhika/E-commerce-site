<?php 
require('top.php');
require_once "controllerUserData.php"; ?>
<?php
if($_SESSION['info'] == false){
    header('Location: login-user.php');  
}
?>
<link rel="stylesheet" href="bs/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">

    <div  style ="width:100%;transform: translate(-50%, -50%);top: 50%; left: 50%; margin-top:30px;"  class="container">
        <div style ="width:100%;" class="row">
            <div style ="background: rgb(0, 0, 0);color:#fff;" class="col-md-4 offset-md-4 form login-form">
            <?php 
            if(isset($_SESSION['info'])){
                ?>
                <div class="alert alert-success text-center">
                <?php echo $_SESSION['info']; ?>
                </div>
                <?php
            }
            ?>
                <form action="login-user.php" method="POST">
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login-now" value="Login Now">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
