<?php
include('../config/config.php');
include("session.php");

if (isset($_POST["submit"])) {
    $EMAIL = trim($_POST["uname"]);
    $pass = $_POST["password"];

    $hashpass= password_hash($pass, PASSWORD_DEFAULT);

    if (!$connection) {
        echo "<script>alert('There is no connection at this time.Please try again later.');</script>";
        echo '<script>window.location.href="index.php";</script>';
    } else {
        $stmt = $connection->prepare("select * from employees where EMAIL= ?");
        $stmt->bind_param("s", $EMAIL);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if ($stmt_result->num_rows > 0) {
            $sql="UPDATE employees set PASSWORD='$hashpass' WHERE EMAIL='$EMAIL'";
            $result=mysqli_query($connection,$sql);
            if($result){
                echo "<script>alert('Password Reset was successfully.');</script>";
                echo '<script>window.location.href="../index.php";</script>';
            }
            else{
                echo "<script>alert('There was an error please contact admin for more information.');</script>";
                echo '<script>window.location.href="index.php";</script>';
            }
        }
        else{
            $query = $connection->prepare(
                "SELECT * from token_teams Where Team_ID= ?"
            );
            $query->bind_param("s", $EMAIL);
            $query->execute();
            $query_result = $query->get_result();
            if ($query_result->num_rows > 0) {
                $sql="UPDATE token_teams set PASSWORD='$hashpass' WHERE Team_ID='$EMAIL'";
            $result=mysqli_query($connection,$sql);
            if($result){
                echo "<script>alert('Password Reset was successfully.');</script>";
                echo '<script>window.location.href="../index.php";</script>';
            }
            else{
                echo "<script>alert('There was an error please contact admin for more information.');</script>";
                echo '<script>window.location.href="index.php";</script>';
            }
            }
        }
    }
}


?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>New Pass</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body style="background-color:#e1e1e1;">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                <div class="login-form">
                    <form autocomplete="off" method="POST">
                    <img src="../images/logo1.png" alt="logo icon" style="height:20%; width: 40%; "><br></br>
                        <div class="form-group">
                            <label>User name</label>
                            <input type="text" name="uname" class="form-control" value="<?php echo $_SESSION['uname']?>" placeholder="Username" readonly>
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" class="form-control" name="password" autofill="off" placeholder="Password">
                        </div>                      
                        <button type="submit" name="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" style="background-color:#FF0000;">Reset Password</button><br></br>
                        <div class="register-link m-t-15 text-center">
                            <p> <a href="../index.php">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../assets/js/main.js"></script>

</body>
</html>
