<?php

include("../config/config.php");
include("session.php");
$id=$_GET['clientid'];

$sql="select * from papdailysales where ClientID=$id";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_assoc($result);
$ChampName=$row['ChampName'];
$ClientName=$row['ClientName'];
$ClientContact=$row['ClientContact'];
$ClientGender=$row['ClientGender'];
$ClientAge=$row['ClientAge'];
$ClientOccupation=$row['ClientOccupation'];
$availability=$row['ClientAvailability'];
$Region=$row['Region'];
$WhatsApp=$row['ClientWhatsApp'];
$BuildingName=$row['BuildingName'];
$BuildingCode=$row['BuildingCode'];
$Apt=$row['Apt'];
$Floors=$row['Floor'];
$AptLayout=$row['AptLayout'];
$HouseholdSize=$row['HouseholdSize'];
$Children=$row['Children'];
$Teenagers=$row['Teenagers'];
$Adults=$row['Adults'];
$Birthday=$row['Birthday'];
$ISP=$row['CurrentPackage'];
$FamilyName=$row['FamilyName'];
$email=$row['Email'];
$Bizname=$row['BizName'];
$Phonealt=$row['PhoneAlt'];
$note=$row['Note'];

if(isset($_POST['submit'])){
$ClientName = $_POST['ClientName'];
$ClientContact = $_POST['ClientContact'];
$ClientGender = $_POST['gender'];
$ClientAge = $_POST['age'];
$ClientOccupation = $_POST['occupation'];
$ClientAvailability = $_POST['Day'];
$Region = $_POST['Region'];
$BuildingName = $_POST['bname'];
$BuildingCode = $_POST['bcode'];
$Apt = $_POST['Apt'];
$Floor = $_POST['floor'];
$Layout = $row['AptLayout'];
$HouseholdSize = $_POST['house'];
$Children = $_POST['Children'];
$Teenagers = $_POST['Teenagers'];
$Adults = $_POST['Adults'];
$Birthday = $_POST['Birthday'];
$ClientWhatsApp = $_POST['whatsapp'];
$PhoneAlt = $_POST['PhoneAlt'];
$CurrISP = $_POST['package'];
$email = $_POST['email'];
$FamilyName = $_POST['FamilyName'];
$note = $_POST['note'];


$query="update turnedonpap set ClientID=$id,BuildingName='$BuildingName',BuildingCode='$BuildingCode',Region='$Region' where ClientID=$id";
$upd=mysqli_query($connection,$query);
$sql="update papdailysales set ClientID=$id,CurrentPackage='$CurrISP',ClientName='$ClientName',ClientContact='$ClientContact'
,ClientGender='$ClientGender',ClientAge='$ClientAge',ClientOccupation='$ClientOccupation',ClientAvailability='$ClientAvailability',Region='$Region',BuildingName='$BuildingName',BuildingCode='$BuildingCode',Apt='$Apt'
,Floor='$Floor',AptLayout='$Layout',HouseholdSize='$HouseholdSize',Children='$Children',Teenagers='$Teenagers',Adults='$Adults',Birthday='$Birthday',ClientWhatsApp='$ClientWhatsApp',
PhoneAlt='$PhoneAlt',Email='$email' where ClientID=$id";

$result=mysqli_query($connection,$sql);
if ($result && $query) {
    $_SESSION["success"] = "Records Updated";
    header("Location: pap-daily-sales.php");
} else {
    $_SESSION["status"] = "Not updated";
    header("Location: edit-records.php");
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
    <title>Edit Pap Records</title>
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
  <!-- Left Panel -->
  <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="dashboard.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">PANEL APS</li><!-- /.menu-title -->
                    <li>
                        <a href="pap-daily-sales.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Signed </a>
                    </li>
                    <li>
                        <a href="restituted.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Resitituted </a>
                    </li>
                    <li>
                        <a href="pending-installation.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Pending Installation </a>
                    </li>
                    <li>
                        <a href="installed.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Installed </a>
                    </li>
                    <li>
                        <a href="turnedon.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Turned On </a>
                    </li>
                    <li class="menu-title">ACCOUNTS</li><!-- /.menu-title -->

                    <li>
                        <a href="add-tl.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-themify-favicon-alt"></i>Add Teamleader </a>
                    </li>
                    <li>
                        <a href="view-tl.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-eye"></i>View Teamleader </a>
                    </li>
                    <li class="menu-title" >TOOLS</li><!-- /.menu-title -->
                    <li>
                        <a href="charts.php" style="color:black; font-size: 15px;"> <i class="menu-icon fa fa-bar-chart"></i>Graphs & Charts </a>
                    </li>
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
        <!-- /#header -->
        <!-- /#header -->
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
                                            <h3 class="text-center">Edit Pap Record</h3>
                                        </div>
                                        <hr>
                                        <form  method="post" action="">
                                        <div class="form-group has-success">
                                        <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Building Code</label>
                                                        <input id="bcode" value="<?php echo $BuildingCode?>" onkeyup="GetDetail(this.value)" placeholder="Search in 'BUILDING' to copy the EXACT building code here" name="bcode" type="text" class="form-control cc-exp"   placeholder="Building Name" required>
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Building Name</label>
                                                    <div class="input-group">
                                                        <input id="bname" name="bname" value="<?php echo $BuildingName?>" type="text" class="form-control cc-cvc"  placeholder="Building Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Region</label>
                                                <input id="region" name="Region" value="<?php echo $Region?>" type="text" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Floor</label>
                                                <div class="form-group has-success">
                                            <select data-placeholder="Choose Floor..." class="standardSelect form-control" name="floor" tabindex="1">
                                            <option value="<?php echo $Floor?>"><?php echo $Floors?></option>
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
                                            <label for="cc-number" class="control-label mb-1">APT#</label>
                                            <input id="cc-number" name="Apt" value="<?php echo $Apt?>" type="text" class="form-control cc-number identified visa" maxlength="40" data-val="true" required placeholder="Enter N/A if not available"> 
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">APT Layout</label>
                                                <div class="form-group has-success">
                                            <select data-placeholder="Choose a Floor..." class="standardSelect form-control" name="aptlayout" tabindex="1">
                                            <option value="<?php echo $AptLayout?>"><?php echo $AptLayout?></option>
                                            <option value="Single">Single</option>
                                            <option value="Double">Double</option>
                                            <option value="Bedsitter">Bedsitter</option>
                                            <option value="1 BR">1 BR</option>
                                             <option value="2 BR">2 BR</option>
                                            <option value="3 BR">3 BR</option>
                                            <option value="4 BR and above">4 BR and above</option> 
                                              </select>
                                            </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">First Name</label>
                                                        <input id="cc-exp" name="ClientName" type="text" class="form-control cc-exp" value="<?php echo $ClientName?>"  data-val="true" placeholder="First Name"
                                                            autocomplete="cc-exp">
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Family Name</label>
                                                    <div class="input-group">
                                                        <input id="x_card_code" name="FamilyName" type="text" class="form-control cc-cvc" value="<?php echo $FamilyName?>" data-val="true" placeholder="Family Name"
                                                            data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Availability</label>
                                                <input id="cc-name" name="Day" type="date" class="form-control cc-name valid" value="<?php echo $ClientAvailability?>" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-invalid="false" aria-describedby="cc-name" required >
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Phone Main</label>
                                                        <input  name="ClientContact" type="tel" pattern="[0-9]{10}" id="phone" value="<?php echo $ClientContact?>" name="ClientContact" placeholder="Phone Main 07XXXXXXXX" required class="form-control cc-exp" 
                                                            data-val-cc-exp="Please enter a valid month and year" 
                                                            autocomplete="cc-exp">
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Phone Alt</label>
                                                    <div class="input-group">
                                                        <input id="x_card_code" name="PhoneAlt" type="tel" pattern="[0-9]{10}" value="<?php echo $Phonealt?>" class="form-control cc-cvc" placeholder="Phone Alt 07XXXXXXXX"  data-val="true" 
                                                            data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">WhatsApp</label>
                                            <input id="cc-number" name="whatsapp" type="text" value="<?php echo $WhatsApp?>" class="form-control cc-number identified visa" maxlength="40" data-val="true" required placeholder="Enter N/A if not available"> 
                                            </div>
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1"> Client's Email</label>
                                            <input id="cc-number" name="email" type="text" value="<?php echo $email?>" class="form-control cc-number identified visa" maxlength="40" data-val="true" required placeholder="Enter N/A if not available"> 
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Gender</label>
                                                <div class="form-group has-success">
                                            <select data-placeholder="Choose Gender..." class="standardSelect form-control" name="gender" tabindex="1" required>
                                            <option value="<?php echo $ClientGender?>"><?php echo $ClientGender?></option>
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
                                            <option value="<?php echo $ClientAge?>" data-placeholder="Choose Age range..."><?php echo $ClientAge?></option>
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
                                            <label for="cc-number" class="control-label mb-1">Current ISP Package</label>
                                            <input id="cc-number" name="package" type="text" value="<?php echo $ISP?>" class="form-control cc-number identified visa" maxlength="40" data-val="true" required placeholder="Enter N/A if not available"> 
                                            </div>
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Occupation</label>
                                            <input id="cc-number" name="occupation" type="text" value="<?php echo $ClientOccupation?>" class="form-control cc-number identified visa" maxlength="40" data-val="true" required placeholder="Enter N/A if not available"> 
                                            </div>
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Birthday</label>
                                            <input id="min" name="Birthday" type="text" value="<?php echo $Birthday?>" class="form-control cc-number identified visa" maxlength="40" data-val="true" required placeholder="Birthday"> 
                                            </div>
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Household Size</label>
                                            <input class="form-control cc-number identified visa" value="<?php echo $HouseholdSize?>" data-val="true" type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" name="house" placeholder="Enter total number of peolpe living in the apartment"> 
                                            </div>
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Children</label>
                                            <input class="form-control cc-number identified visa" value="<?php echo $Children?>" data-val="true" type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" name="Children" placeholder="<=12"> 
                                            </div>
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Teengers</label>
                                            <input class="form-control cc-number identified visa" data-val="true" value="<?php echo $Teenagers?>" type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" name="Teenagers" placeholder="13-18"> 
                                            </div>
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Adults</label>
                                            <input class="form-control cc-number identified visa" data-val="true" value="<?php echo $Adults?>" type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" name="Adults" placeholder="<=13"> 
                                            </div>
                                            <div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Suggestions/Observations/Comments</label>
                                                <input id="cc-number" name="note" value="<?php echo $note?>" type="text" class="form-control cc-number identified visa" maxlength="40"  required placeholder="Suggestions/Observations/Comments">
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
            no_results_text: "Oops, nothing found!",
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
