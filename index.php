<?php
include "config/config.php";
if (isset($_POST["submit"])) {
    session_start();
    $EMAIL = trim($_POST["Username"]);
    $Password = trim($_POST["Password"]);

    if (!$connection) {
        echo "<script>alert('There is no connection at this time.Please try again later.');</script>";
        echo '<script>window.location.href="index.php";</script>';
    } else {
        $stmt = $connection->prepare("select * from employees where EMAIL= ?");
        $stmt->bind_param("s", $EMAIL);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if ($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            if (
                $data["DEPARTMENT"] == "Nats" ||
                $data["DEPARTMENT"] == "Executive"
            ) {
                if (password_verify($Password, $data["PASSWORD"])) {
                    $_SESSION["start"] = time();
                    $_SESSION["Admin"] = $EMAIL;
                    $_SESSION["FName"] = $data["FIRST_NAME"];
                    $_SESSION["LName"] = $data["LAST_NAME"];
                    $_SESSION["ID"] = $data["ID"];
                    header("Location: admin/dashboard.php");
                } else {
                    echo "<script>alert('Wrong Password.');</script>";
                    echo '<script>window.location.href="index.php";</script>';
                }
            } elseif ($data["DEPARTMENT"] == "Sales") {
                if (password_verify($Password, $data["PASSWORD"])) {
                    $_SESSION["start"] = time();
                    $_SESSION["Sales"] = $EMAIL;
                    $_SESSION["FName"] = $data["FIRST_NAME"];
                    $_SESSION["LName"] = $data["LAST_NAME"];
                    $_SESSION["ID"] = $data["ID"];
                    $_SESSION["Region"] = $data["REGION"];
                    $_SESSION["Region1"] = $data["ADDREGION"];
                    header("Location: champs/dashboard.php");
                } else {
                    echo "<script>alert('Wrong Password.');</script>";
                    echo '<script>window.location.href="index.php";</script>';
                }
            } else {
                $result = $connection->prepare(
                    "select * from teamleaders where EMAIL= ?"
                );
                $result->bind_param("s", $EMAIL);
                $result->execute();
                $result_result = $result->get_result();
                if ($result_result->num_rows > 0) {
                    $info = $result_result->fetch_assoc();
                    if (
                        password_verify($Password, $data["PASSWORD"]) &&
                        $data["DEPARTMENT"] == "TechieTL"
                    ) {
                        $_SESSION["start"] = time();
                        $_SESSION["teamleader"] = $EMAIL;
                        $_SESSION["FName"] = $data["FIRST_NAME"];
                        $_SESSION["LName"] = $data["LAST_NAME"];
                        $_SESSION["ID"] = $info["ID"];
                        $_SESSION["Region"] = $info["REGION"];
                        header("Location: teamleaders/techies/dashboard.php");
                    } elseif (
                        password_verify($Password, $data["PASSWORD"]) &&
                        $data["DEPARTMENT"] == "SalesTL"
                    ) {
                        $_SESSION["start"] = time();
                        $_SESSION["FName"] = $data["FIRST_NAME"];
                        $_SESSION["LName"] = $data["LAST_NAME"];
                        $_SESSION["Sales"] = $EMAIL;
                        $_SESSION["ID"] = $data["ID"];
                        $_SESSION["Region"] = $info["REGION"];
                        header("Location: teamleaders/champs/dashboard.php ");
                    } else {
                        echo "<script>alert('Wrong Password.');</script>";
                        echo '<script>window.location.href="index.php";</script>';
                    }
                }
            }
        } else {
            $query = $connection->prepare(
                "SELECT * from token_teams Where Team_ID= ?"
            );
            $query->bind_param("s", $EMAIL);
            $query->execute();
            $query_result = $query->get_result();
            if ($query_result->num_rows > 0) {
                $row = $query_result->fetch_assoc();
                if (password_verify($Password, $row["Password"])) {
                    $_SESSION["start"] = time();
                    $_SESSION["Techie"] = $EMAIL;
                    $_SESSION["Techie1"] = $row["Techie1"];
                    $_SESSION["Techie2"] = $row["Techie2"];
                    $_SESSION["TeamID"] = $row["Team_ID"];
                    $_SESSION["ID"] = $row["ID"];
                    $_SESSION["Region"] = $row["Region"];
                    header("Location: techie/dashboard.php");
                } else {
                    echo "<script>alert('Wrong Password.');</script>";
                    echo '<script>window.location.href="index.php";</script>';
                }
            } else {
                echo "<script>alert('No Records.');</script>";
                echo '<script>window.location.href=index.php";</script>';
            }
        }
    }
}
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
                <div class="text-center">
		 		     <img src="images/logo1.png" alt="logo icon" style="height:40%; width: 80%; ">
		 	         </div>
                    <form action="" method="post">
 
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
                            <p> <a href="forgot-pass/">Forgot Password</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>