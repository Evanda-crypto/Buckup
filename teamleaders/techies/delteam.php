<?php
include("session.php");
include("../../config/config.php");
$id = $_GET['id'];

$msg = "";
if (isset($id)) {

    $query = "DELETE FROM  token_teams  WHERE ID= '$id'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $msg = '<div class="alert alert-success" role="alert">
        Deleted Successfully
      </div>';
        "";
    } else {
        $msg = '<div class="alert alert-warning" role="alert">
        Error occurs while updating the query
      </div>';
    }
}
?>
<!doctype html>
<html lang="ar" dir="ltr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title></title>
</head>

<body>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-12 border p-3">
                <span><?php echo $msg; ?></span>
            </div>

            <div class="col-md-12 text-center pt-5 ">
                <a href="create-team.php" class="btn btn-info">Go back</a>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script> -->

</body>

</html>