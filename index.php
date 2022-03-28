<?php session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <title>KOMP</title>
</head>
<body style="background-color:#e1e1e1;" >
<div class="container my-5" >
    <div class="row my-5">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
           
            <div class="card card-signin my-5" style="background-color:#; corner-radius:20px;">
                <div class="card-body my-5">
                <?php
            if(isset($_SESSION['status'])){
                ?>
                <div class="alert alert-danger" role="alert">
                   <?php echo $_SESSION['status'];
                unset($_SESSION['status']);?>
                 </div>
                <?php
                
            }
            ?>
                <div class="text-center">
		 		     <img src="images/logo1.png" alt="logo icon" style="height:40%; width: 80%; ">
		 	         </div>
                    <form action="login.php" method="post">
 
                        <label for="inputPassword">Username<span style="color: #FF0000" >*</span></label>
                        <div class="form-label-group">
                            <input type="text"  name="Username" class="form-control" placeholder="Username" required autofocus style="background-color:#E1E1E1;height:50px;">
                        </div><br/>
                        <label for="inputPassword">Password <span style="color: #FF0000">*</span></label>
                        <div class="form-label-group">
                        <input type="password" name="Password" class="form-control" placeholder="Password" required style="background-color:#E1E1E1;height:50px;">
                        </div> <br/>
                        <div class="form-label-group">
                        </div> <br/>
                        <button type="submit" name="submit" class="btn btn-primary btn-block" style="background-color:#FF0000;">Login</button><br></br>
                        <div class="register-link m-t-10 text-center">
                            <p> <a href="forgot-pass/index.php">Forgot Password</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
