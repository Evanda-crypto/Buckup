
<?php
include("../config/config.php");
include_once "session.php";

if (isset($_POST["submit"])) {
    $DateSigned = trim($_POST["DateSigned"]);
    $ChampName = $_POST["ChampName"];
    $BuildingName = trim($_POST["Buildingname"]);
    $BuildingCode = trim($_POST["BuildingCode"]);
    $Region = trim($_POST["Region"]);
    $Apt = trim($_POST["Apt"]);
    $AptLayout = trim($_POST["aptlayout"]);
    $Floor = trim($_POST["floor"]);
    $ClientName = trim($_POST["ClientName"]);
    $ClientAvailability = trim($_POST["Day"]);
    $ClientContact = trim($_POST["ClientContact"]);
    $ClientWhatsApp = trim($_POST["WhatsApp"]);
    $ClientGender = trim($_POST["gender"]);
    $ClientAge = trim($_POST["age"]);
    $ClientOccupation = trim($_POST["occupation"]);
    $HouseholdSize = trim($_POST["Householdsize"]);
    $Children = trim($_POST["Children"]);
    $Teenagers = trim($_POST["Teenagers"]);
    $Adults = trim($_POST["Adults"]);
    $Birthday = trim($_POST["Birthday"]);
    $Note = trim($_POST["Note"]);
    $FamilyName = trim($_POST["FamilyName"]);
    $package = trim($_POST["package"]);
    $Email = trim($_POST["email"]);
    $phonealt = trim($_POST["altcontact"]);
    $Status = "Signed";

    if ($connection->connect_error) {
        die("connection failed : " . $connection->connect_error);
    } else {
        $stmt = $connection->prepare(
            "select * from papdailysales  where ClientContact= ?"
        );
        $stmt->bind_param("s", $ClientContact);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if ($stmt_result->num_rows > 0) {
            $msg = '<div class="alert alert-warning" role="alert">
     The client aready exist.
    </div>';
        } else {
            if (
                strlen(trim($BuildingCode)) < 10 ||
                strlen(trim($BuildingCode)) > 10
            ) {
                echo "<script>alert('Incorrect Building Code format');</script>";
                echo "<script>document.getElementById(bcode.id).select();</script>";
            } else {
              
                $insert = $connection->prepare("insert into papdailysales (DateSigned,ChampName,BuildingName,BuildingCode,Region,Apt,AptLayout,Floor,ClientName,ClientAvailability,ClientContact,
      ClientWhatsApp,ClientGender,ClientAge,ClientOccupation,HouseholdSize,Children,Teenagers,Adults,Birthday,Note,FamilyName,CurrentPackage,Email,PhoneAlt,PapStatus)
      values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                //values from the fields
                $insert->bind_param(
                    "ssssssssssssssssssssssssss",
                    $DateSigned,
                    $ChampName,
                    $BuildingName,
                    $BuildingCode,
                    $Region,
                    $Apt,
                    $AptLayout,
                    $Floor,
                    $ClientName,
                    $ClientAvailability,
                    $ClientContact,
                    $ClientWhatsApp,
                    $ClientGender,
                    $ClientAge,
                    $ClientOccupation,
                    $HouseholdSize,
                    $Children,
                    $Teenagers,
                    $Adults,
                    $Birthday,
                    $Note,
                    $FamilyName,
                    $package,
                    $Email,
                    $phonealt,
                    $Status
                );
                $insert->execute();
                $insert->close();
                $stmt->close();

                if ($insert) {
                    $msg = '<div class="alert alert-success" role="alert">
       Submitted successfully.
      </div>';
                    "";
                } else {
                    $msg = '<div class="alert alert-warning" role="alert">
        Error occurs while updating the query
      </div>';
                }
            }
        }
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
                <a href="residential.php" class="btn btn-info">Go back</a>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script> -->

</body>


</html>