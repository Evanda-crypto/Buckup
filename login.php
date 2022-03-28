<?php
session_start();
include "config/config.php";
if (isset($_POST["submit"])) {
    
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
                    $_SESSION["status"] = "Wrong Password";
                    header("Location: index.php");
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
                    $_SESSION["status"] = "Wrong Password";
                    header("Location: index.php");
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
                        $_SESSION["status"] = "Wrong Password";
                        header("Location: index.php");
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
                    $_SESSION["status"] = "Wrong Password";
                    header("Location: index.php");
                }
            } else {
                $_SESSION["status"] = "No Records";
                    header("Location: index.php");
            }
        }
    }
}
?>