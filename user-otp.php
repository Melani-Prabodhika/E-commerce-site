<?php 
require('top.php');
require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
    ?>
	<script>
	window.location.href='login-user.php';
	</script>
	<?php
}
?>
<link rel="stylesheet" href="bs/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">

    <div style ="width:100%;transform: translate(-50%, -50%);top: 50%; left: 50%; margin-top:30px;" class="container">
        <div style ="width:100%;" class="row">
            <div style ="background: rgb(0, 0, 0);color:#fff;" class="col-md-4 offset-md-4 form">
                <form action="user-otp.php" method="POST" autocomplete="off">
                    <h2 class="text-center">Code Verification</h2>
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="number" name="otp" placeholder="Enter verification code" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
