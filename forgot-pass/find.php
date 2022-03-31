<?php
session_start();
include "../config/config.php";
if (isset($_POST["submit"])) {
    
    $EMAIL = trim($_POST["Username"]);

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
            $_SESSION["uname"] = $EMAIL;
            $_SESSION["id"] = $data["ID"];
            header("Location: reset-pass.php");
        }else{
            $query = $connection->prepare(
                "SELECT * from token_teams Where Team_ID= ?"
            );
            $query->bind_param("s", $EMAIL);
            $query->execute();
            $query_result = $query->get_result();
            if ($query_result->num_rows > 0) {
                $row = $stmt_result->fetch_assoc();
                $_SESSION["uname"] = $EMAIL;
                $_SESSION["id"] = $row["ID"];
                header("Location: reset-pass.php");
            }
            else{
                $_SESSION["status"] = "No records";
                header("Location: index.php");
            }
        }

    }
}
?>