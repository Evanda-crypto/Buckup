<?php

include("../config/config.php");
include("session.php");

if (isset($_POST["submit"]) && !empty($_FILES["image"]["name"])) {
    $DateSigned = trim($_POST["DateSigned"]);
    $ChampName = $_POST["ChampName"];
    $BuildingName = trim($_POST["Buildingname"]);
    $BuildingCode = trim($_POST["BuildingCode"]);
    $Region = trim($_POST["Region"]);
    $Venue = trim($_POST["venue"]);
    $Bizlayout = trim($_POST["bizlayout"]);
    $Floor = trim($_POST["floor"]);
    $ClientName = trim($_POST["ClientName"]);
    $FamilyName = trim($_POST["FamilyName"]);
    $ClientAvailability = trim($_POST["Day"]);
    $ClientContact = trim($_POST["ClientContact"]);
    $ClientWhatsApp = trim($_POST["WhatsApp"]);
    $ClientGender = trim($_POST["gender"]);
    $ClientAge = trim($_POST["age"]);
    $Birthday = trim($_POST["Birthday"]);
    $BizName = trim($_POST["bizname"]);
    $BizCat = trim($_POST["bizcat"]);
    $BizDec = trim($_POST["bizdec"]);
    $Note = trim($_POST["Note"]);
    $PhoneAlt = trim($_POST["phonealt"]);
    $Email = trim($_POST["email"]);
    $Role = trim($_POST["role"]);
    $package = trim($_POST["package"]);
    $Status = "Signed";

    ini_set('upload_max_filesize', '60M');
    ini_set('post_max_size', '70M');
    ini_set('max_input_time', 300);
    ini_set('max_execution_time', 300);

    $fileName = basename($_FILES["image"]["name"]); 
          $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
           
          // Allow certain file formats 
          $allowTypes = array('jpg','png','jpeg','gif'); 
          if(in_array($fileType, $allowTypes)){ 
              $image = $_FILES['image']['tmp_name']; 
              $imgContent = addslashes(file_get_contents($image)); 

    if ($connection->connect_error) {
        die("connection failed : " . $connection->connect_error);
    } else {
        $stmt = $connection->prepare(
            "select * from papdailysales where ClientContact= ?"
        );
        $stmt->bind_param("s", $ClientContact);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if ($stmt_result->num_rows > 0) {
            echo '<script>alert("Client Already exists!")</script>';
        } else {
            if (
                strlen(trim($BuildingCode)) < 10 ||
                strlen(trim($BuildingCode)) > 10
            ) {
                echo "<script>alert('Incorrect Building Code format');</script>";
                echo "<script>document.getElementById(bcode.id).select();</script>";
            } else {
                $insert = $connection->query("INSERT into papdailysales (DateSigned,ChampName,BuildingName,BuildingCode,Region,Venue,BizLayout,Floor,ClientName,ClientAvailability,ClientContact,
        ClientWhatsApp,ClientGender,ClientAge,Birthday,BizName,BizCat,BizDec,Note,FamilyName,PhoneAlt,Email,Role,CurrentPackage,Image,PapStatus) VALUES ('$DateSigned','$ChampName','$BuildingName','$BuildingCode','$Region','$Venue','$Bizlayout','$Floor','$ClientName','$ClientAvailability','$ClientContact',
      '$ClientWhatsApp','$ClientGender','$ClientAge','$Birthday','$BizName','$BizCat','$BizDec','$Note','$FamilyName','$PhoneAlt','$Email','$Role','$package','$imgContent','$Status')");

                if ($insert) {
                    echo '<script>alert("Submitted!")</script>';
                    echo '<script>window.location.href="business.php";</script>';
                } else {
                    echo '<script>alert("An error occured!")</script>';
                }
    
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
    <title>Business report</title>
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
    <link rel="stylesheet" href="../assets/css/lib/chosen/chosen.min.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css" rel="stylesheet"/>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
</head>
<body style="background-color:#e1e1e1">
  <!-- Left Panel -->

  <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="dashboard.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">REPORTS</li><!-- /.menu-title -->
                    <li>
                        <a href="residential.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-home"></i>Residential Report</a>
                    </li> 
                    <li>
                        <a href="business.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-bag"></i>Business Report</a>
                    </li> 
                    <li class="menu-title">PANEL APS</li><!-- /.menu-title -->

                    <li>
                        <a href="not-installed.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Not Installed </a>
                    </li>
                    <li>
                        <a href="to-restore.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>To Restore </a>
                    </li>
                    <li>
                        <a href="turned-on.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Turned On </a>
                    </li>
                    <li>
                        <a href="all-paps.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>All Paps</a>
                    </li>
                    <li>
                    <li>
                    <li class="menu-title">BUILDINGS</li><!-- /.menu-title -->
                    <li>
                        <a href="buildings.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-home"></i>Buildings</a>
                    </li>     
                    <li class="menu-title" >TOOLS</li><!-- /.menu-title -->
                    <li>
                        <a href="profile.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-user"></i>Profile </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>  
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                <img src="../images/picture1.png" style="width: 120px; height: 70px;" class="logo-icon" alt="logo icon">
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        
                        <div class="form-inline">
                            <form class="search-form">
                                
                            </form>
                        </div>

                        <div class="dropdown for-notification">

                        </div>

                        <div class="dropdown for-message">

                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="name float-left"><?php echo $_SESSION[
                 "FName"
             ]; ?> <?php echo $_SESSION["LName"]; ?></span>
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="../config/logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- Header-->

        <div class="content">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <!-- Credit Card -->
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center">Business Report</h3>
                                        </div>
                                        <hr>
                                        <form  method="post" enctype="multipart/form-data">
                                        <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">DateSigned</label>
                                                <input id="datesigned" name="DateSigned" type="date" class="form-control cc-name valid" data-val="true" value="<?php date('Y-m-d');?>" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-invalid="false" aria-describedby="cc-name" required >
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Champ</label>
                                                <input id="" name="ChampName" type="text" class="form-control cc-name valid" data-val="true" value="<?php echo $_SESSION["FName"]; ?> <?php echo $_SESSION["LName"]; ?>" name="ChampName" placeholder="Champ" readonly data-val-required="Please enter the name on card" autocomplete="cc-name" aria-invalid="false" aria-describedby="cc-name" required >
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                        <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Building Code</label>
                                                        <input id="bcode" onkeyup="GetDetail(this.value)" placeholder="Search in 'BUILDING' to copy the EXACT building code here" name="BuildingCode" type="text" class="form-control cc-exp"   placeholder="Building Name" required>
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Building Name</label>
                                                    <div class="input-group">
                                                        <input id="bname" name="Buildingname" type="text" class="form-control cc-cvc"  placeholder="Building Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Region</label>
                                                <input id="region" name="Region"  type="text" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Floor</label>
                                                <div class="form-group has-success">
                                            <select data-placeholder="Choose a Country..." class="standardSelect form-control" name="floor" tabindex="1">
                                            <option value="" disabled selected>'0' is ground; '-' is Basement</option>
                                            <option value="-1">-1</option> 
                                            <option value="0">0</option>  
                                            <option value="1">1</option>  
                                            <option value="2">2</option>  
                                            <option value="3">3</option>  
                                            <option value="4">4</option>  
                                            <option value="5">5</option>
                                            <option value="6">6</option>  
                                            <option value="7">7</option>  
                                            <option value="8">8</option> 
                                              </select>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Business Name</label>
                                            <input id="cc-number" name="bizname" type="text" class="form-control cc-number identified visa" maxlength="40" data-val="true" required placeholder="Business Name"> 
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Venue</label>
                                            <input id="cc-number" name="venue" type="text" class="form-control cc-number identified visa" maxlength="40" data-val="true" required placeholder="Enter N/A if not available"> 
                                            </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Layout</label>
                                                <div class="form-group has-success">
                                            <select data-placeholder="Choose a Country..." class="standardSelect form-control" name="bizlayout" tabindex="1">
                                            <option disabled selected> Select Layout</option>
                                            <option value="Single S(<20sqm)">Single S(<20sqm)</option>  
                                            <option value="Single M(20-60sqm)">Single M(20-60sqm)</option>  
                                            <option value="Single L(>60sqm)">Single L(>60sqm)</option>
                                            <option value="Muilti-Rooms">Multi-Rooms</option>
                                              </select>
                                            </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">First Name</label>
                                                        <input id="cc-exp" name="ClientName" type="text" class="form-control cc-exp"  data-val="true" placeholder="First Name"
                                                            autocomplete="cc-exp">
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Family Name</label>
                                                    <div class="input-group">
                                                        <input id="x_card_code" name="FamilyName" type="text" class="form-control cc-cvc"  data-val="true" placeholder="Family Name"
                                                            data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Availability</label>
                                                <input id="cc-name" name="Day" type="date" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-invalid="false" aria-describedby="cc-name" required >
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Phone Main</label>
                                                        <input  name="ClientContact" type="tel" pattern="[0-9]{10}" id="phone" name="ClientContact" placeholder="Phone Main 07XXXXXXXX" required class="form-control cc-exp" 
                                                            data-val-cc-exp="Please enter a valid month and year" 
                                                            autocomplete="cc-exp">
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Phone Alt</label>
                                                    <div class="input-group">
                                                        <input id="x_card_code" name="phonealt" type="tel" pattern="[0-9]{10}" class="form-control cc-cvc" placeholder="Phone Alt 07XXXXXXXX"  data-val="true" 
                                                            data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">WhatsApp</label>
                                            <input id="cc-number" name="WhatsApp" type="text" class="form-control cc-number identified visa" maxlength="40" data-val="true" required placeholder="Enter N/A if not available"> 
                                            </div>
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1"> Client's Email</label>
                                            <input id="cc-number" name="email" type="text" class="form-control cc-number identified visa" maxlength="40" data-val="true" required placeholder="Enter N/A if not available"> 
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Gender</label>
                                                <div class="form-group has-success">
                                            <select data-placeholder="Choose a Country..." class="standardSelect form-control" name="gender" tabindex="1" required>
                                            <option disabled selected> Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option> 
                                              </select>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Age</label>
                                                <div class="form-group has-success">
                                            <select  class="standardSelect form-control" name="age" tabindex="1" required>
                                            <option disabled selected> Select Age</option>
                                            <option value="Below 17">Below 17</option>  
                                            <option value="18-24">18-24</option>  
                                            <option value="25-34">25-34</option>  
                                            <option value="35-44">35-44</option>  
                                            <option value="45-59">45-59</option>  
                                            <option value="Above 60">Above 60</option>
                                              </select>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Gender</label>
                                                <div class="form-group has-success">
                                            <select data-placeholder="Choose a Country..." class="standardSelect form-control" name="role" tabindex="1" required>
                                            <option value="" disabled selected>Role</option>
                                            <option value="Owner">Owner</option>  
                                            <option value="Manager">Manager</option>  
                                            <option value="Worker">Worker</option> 
                                              </select>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Birthday</label>
                                            <input id="min" name="Birthday" type="text" class="form-control cc-number identified visa" maxlength="40" data-val="true" required placeholder="Birthday"> 
                                            </div>
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Current ISP Package</label>
                                            <input id="cc-number" name="package" type="text" class="form-control cc-number identified visa" maxlength="40" data-val="true" required placeholder="Enter N/A if not available"> 
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Category</label>
                                                <div class="form-group has-success">
                                            
                                                <select data-placeholder="Choose a Country..." class="standardSelect" tabindex="1" name="bizcat">
                                                <optgroup label="F-Food">
                            <option  value="F-Food (Grocery (FG))">Grocery (FG)</option>  
                              <option value="F-Food (Butchery (FU))">Butchery (FU)</option>
                              <option value="F-Food (Bakery (FB))">Bakery (FB)</option>   
                              <option value="F-Food (Food Joints (FJ))">Food Joints (FJ)</option>
                             <option value="F-Food (Restaurant (FR))">Restaurant (FR)</option>
                             <option value="F-Food (Coffee Shop (FC))">Coffee Shop (FC)</option>  
                             <option value="F-Food (Milk ATM (FM))">Milk ATM (FM)</option>
                            </optgroup>
                             <optgroup label="S-Shop">
                             <option  value="S-Shop (Convenient Stores (SC))">Convenient Stores (SC)</option>  
                              <option value="S-Shop (Supermarket (SS))">Supermarket (SS)</option>
                              <option value="S-Shop (Computing & Electronics (SE))">Computing & Electronics (SE)</option>   
                              <option value="S-Shop (Electrical Appliance (SA))">Electrical Appliance (SA)</option>
                             <option value="S-Shop (Home & Living (SH))">Home & Living (SH)</option>
                             <option value="S-Shop (Furniture (SF))">Furniture (SF)</option>  
                             <option value="S-Shop (Fashion & Apparels (SP))">Fashion & Apparels (SP)</option>
                             <option value="S-Shop (Audio Video & Books (SV))">Audio Video & Books (SV)</option>
                             <option value="S-Shop (Gifts & Crafts (SG))">Gifts & Crafts (SG)</option>
                             <option value="S-Shop (Automobile (SU))">Automobile (SU)</option>  
                             <option value="S-Shop (Real Estate(SR))">Real Estate(SR)</option>
                             <option value="S-Shop (Hardware (SW))">Hardware (SW)</option>
                            </optgroup>
                            <optgroup label="V-Life Services">
                            <option  value="V-LifeServices (Bank (VB))">Bank (VB)</option>  
                            <option value="V-LifeServices (ATM (VA))">ATM (VA)</option>
                            <option value="V-LifeServices (Salon & Spa (VS))">Salon & Spa (VS)</option>   
                            <option value="V-LifeServices (Barbershop (VR))">Barbershop (VR)Electrical Appliance (SA)</option>
                            <option value="V-LifeServices (Cyber Cafe (VC))">Cyber Cafe (VC)</option>
                            <option value="V-LifeServices (Baby Care (VY))">Baby Care (VY)Furniture (SF)</option>  
                            <option value="V-LifeServices (Church (VH))">Church (VH)</option>
                            <option value="V-LifeServices (Garage (VG))">Garage (VG)</option>
                            <option value="V-LifeServices (Cinema (VI))">Cinema (VI)</option>
                            <option value="V-LifeServices (Police Station (VP))">Police Station (VP)</option>  
                            <option value="V-LifeServices (Public Toilet (VT))">Public Toilet (VT)</option>
                            <option value="V-LifeServices (Law Firm(VL))">Law Firm(VL)</option>
                            <option value="V-LifeServices (Laudry(VD))">Laudry(VD)</option>
                            </optgroup>
                            <optgroup label="E-Education">
                            <option  value="E-Education (Kindergarten (EK))">Kindergarten (EK)</option>  
                              <option value="E-Education (Primary School (EP))">Primary School (EP)</option>
                              <option value="E-Education (Training Center (ET))">Training Center (ET)</option>   
                            </optgroup>
                            <optgroup label="H-Health">
                            <option  value="H-HealthE-Education (Chemist (HC))">Chemist (HC)</option>  
                              <option value="H-Health (Pharmacy (HP))">Pharmacy (HP)</option>
                              <option value="H-Health (Clinic (HL))">Clinic (HL)</option>
                              <option  value="H-Health (Dispensary (HD))">Dispensary (HD)</option>  
                              <option value="H-Health (Hospital (HH))">Hospital (HH)</option>
                            </optgroup>
                            <optgroup label="N-Nightlife">
                            <option value="N-Nightlife (Pub (NP))">Pub (NP)</option>
                              <option value="N-Nightlife (Bar (NB))">Bar (NB)</option>
                              <option  value="N-Nightlife (Dwelling Zone (ND))">Dwelling Zone (ND)</option>  
                              <option value="N-Nightlife (Club (NC))">Club (NC)</option>
                            </optgroup>
                            <optgroup label="L-Lodging">
                            <option value="L-Lodging (Hotel (LH))">Hotel (LH)</option>
                              <option value="L-Lodging (Motel (LM))">Motel (LM)</option>
                              <option  value="L-Lodging (Guesthouse (LG))">Guesthouse (LG)</option>  
                            </optgroup>
                            <optgroup label="T-Transportation">
                            <option value="T-Transportation (Gas Station (TG))">Gas Station (TG)</option>
                              <option value="T-Transportation (Matatu Stop (TM))">Matatu Stop (TM)</option>
                              <option  value="T-Transportation (Boda-Boda Station (TB))">Boda-Boda Station (TB)</option>  
                              <option value="T-Transportation (Filling Station(TF))">Filling Station(TF)</option>
                            </optgroup>
                            </select>
                             </div>
                              </div>
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Description</label>
                                            <input id="cc-number" name="bizdec" type="text" class="form-control cc-number identified visa" maxlength="40" data-val="true" required placeholder="Description"> 
                                            </div>
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Image</label>
                                            <input id="cc-number" name="image" type="file" class="form-control cc-number identified visa" required> 
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Suggestions/Observations/Comments</label>
                                                <input id="cc-number" name="Note" type="text" class="form-control cc-number identified visa" maxlength="40"  required placeholder="Suggestions/Observations/Comments">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                                            </div>
                                                <button id="payment-button" type="submit" name="submit" class="btn btn-warning">
                                                    <span id="payment-button-amount">Submit</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- .card -->

                    </div><!--/.col-->

            </div>


        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>
</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/lib/chosen/chosen.jquery.min.js"></script>

<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing matches",
            width: "100%"
        });
    });
</script>
<script>
 var todayDate= new Date();
 var month= todayDate.getMonth() + 1;
 var year= todayDate.getFullYear();
 var todate=todayDate.getDate();
if(todate<10){
  todate= "0"+ todate;
}
if(month<10){
  month= "0"+ month;
}
 mindate= year +"-" + month + "-" + todate;
 document.getElementById("cc-name").setAttribute("min",mindate);
 </script>
</body>
<script>
 var todayDate= new Date();
 var month= todayDate.getMonth() + 1;
 var year= todayDate.getFullYear();
 var todate=todayDate.getDate();
if(todate<10){
  todate= "0"+ todate;
}
if(month<10){
  month= "0"+ month;
}
maxdate= year +"-" + month + "-" + todate;
 document.getElementById("datesigned").setAttribute("max",maxdate);
 </script>

<script>
 var todayDate= new Date();
 var month= todayDate.getMonth() + 1;
 var year= todayDate.getFullYear();
 var todate=todayDate.getDate();
if(todate<10){
  todate= "0"+ todate;
}
if(month<10){
  month= "0"+ month;
}
maxdate= year +"-" + month + "-" + todate;
 document.getElementById("min").setAttribute("max",maxdate);
 </script>

<script>

// onkeyup event will occur when the user
// release the key and calls the function
// assigned to this event
function GetDetail(str) {
  if (str.length == 0) {
    document.getElementById("bname").value = "";
    document.getElementById("region").value = "";
    return;
  }
  else {

    // Creates a new XMLHttpRequest object
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {

      // Defines a function to be called when
      // the readyState property changes
      if (this.readyState == 4 &&
          this.status == 200) {
        
        // Typical action to be performed
        // when the document is ready
        var myObj = JSON.parse(this.responseText);

        // Returns the response data as a
        // string and store this array in
        // a variable assign the value
        // received to first name input field
        
        document.getElementById
          ("bname").value = myObj[0];
        
        // Assign the value received to
        // last name input field
        document.getElementById(
          "region").value = myObj[1];
      }
    };

    // xhttp.open("GET", "filename", true);
    xmlhttp.open("GET", "retrieve.php?bcode=" + str, true);
    
    // Sends the request to the server
    xmlhttp.send();
  }
}
</script>

<script>

// onkeyup event will occur when the user
// release the key and calls the function
// assigned to this event
function GetDetails(str) {
  if (str.length == 0) {
    document.getElementById("bnamebiz").value = "";
    document.getElementById("regionbiz").value = "";
    return;
  }
  else {

    // Creates a new XMLHttpRequest object
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {

      // Defines a function to be called when
      // the readyState property changes
      if (this.readyState == 4 &&
          this.status == 200) {
        
        // Typical action to be performed
        // when the document is ready
        var myObj = JSON.parse(this.responseText);

        // Returns the response data as a
        // string and store this array in
        // a variable assign the value
        // received to first name input field
        
        document.getElementById
          ("bnamebiz").value = myObj[0];
        
        // Assign the value received to
        // last name input field
        document.getElementById(
          "regionbiz").value = myObj[1];
      }
    };

    // xhttp.open("GET", "filename", true);
    xmlhttp.open("GET", "retrieve.php?bcode=" + str, true);
    
    // Sends the request to the server
    xmlhttp.send();
  }
}
</script>
<script>
 $(document).ready(function() {
     // Create date inputs
     minDate = new DateTime($('#min'), {
         format: 'MMMM Do YYYY'
     });
     maxDate = new DateTime($('#max'), {
         format: 'MMMM Do YYYY'
     });
 });
 
  </script>
</body>
</html>
