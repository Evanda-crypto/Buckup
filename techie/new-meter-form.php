<?php

include("../config/config.php");
include("session.php");

if(isset($_POST['submit']) && !empty($_FILES["image"]["name"])) {
$Team_ID=$_POST['teamid'];
$MacAddress = $_POST['macaddress'];
$SerialNumber = "N/A";
$DateInstalled = $_POST['dateinstalled'];
$ClientID = $_POST['ClientID'];
$Region = $_POST['region'];
$techie1 = $row['Techie1'];
$techie2 = $row['Techie2'];
$Floor = $_POST['floor'];
$Note = $_POST['note'];
$layout = $_POST['layout'];
$status = "Installed";

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

//checking connection
if($connection->connect_error){
    die('connection failed : '.$connection->connect_error);
}
else
{
  $stmt= $connection->prepare("select * from papinstalled where MacAddress= ?");
  $stmt->bind_param("s",$MacAddress);
  $stmt->execute();
  $stmt_result= $stmt->get_result();
  if($stmt_result->num_rows>0){
    echo "<script>alert('The Macaddress Already Exists');</script>";
    echo '<script>window.location.href="mytask.php";</script>';
  }
  else{
     // Insert records into database 
     $sql="update papdailysales set ClientID=$id,Floor='$Floor',AptLayout='$layout',PapStatus='$status' where ClientID=$id";
     $result=mysqli_query($connection,$sql);
     $insert = $connection->query("INSERT into papinstalled (Team_ID,ClientID,MacAddress,SerialNumber,DateInstalled,Region,Image,Note,Floor,AptLayout) VALUES ('$Team_ID','$ClientID','$MacAddress','$SerialNumber','$DateInstalled','$Region','$imgContent','$Note','$Floor','$layout')"); 
    
     if($insert && $result){ 
     echo '<script>alert("Submitted!")</script>';
      echo '<script>window.location.href="mytask.php";</script>';
  }else{ 
    echo "<script>alert('UnSuccessfull.');</script>"; 
echo '<script>window.location.href="mytask.php";</script>';
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
    <title>New Meter Report</title>
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
                    <li class="active">
                        <a href="mytask.php"><i class="menu-icon fa fa-tasks"></i>My Task</a>
                    </li>
                    <li class="active">
                        <a href="new-meter-form.php"><i class="menu-icon fa fa-lightbulb-o"></i>New Meter</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>PANEL APs</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="installed.php">Installed Today</a></li>
                            <li><i class="fa fa-table"></i><a href="not-turnedon.php">Not Turned On</a></li>
                            <li><i class="fa fa-table"></i><a href="restituted.php">Restituted</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="profile.php"><i class="menu-icon fa fa-user"></i>Profile</a>
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
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger"><?php
                                            $query="SELECT  COUNT(teams.Team_ID)as MyTask from papdailysales LEFT JOIN techietask on techietask.ClientID=papdailysales.ClientID LEFT JOIN teams ON teams.Team_ID=techietask.TeamID  LEFT JOIN papinstalled ON papinstalled.ClientID=papdailysales.ClientID WHERE 
                                             techietask.ClientID is not null AND papinstalled.ClientID is null AND teams.Team_ID='".$_SESSION['TeamID']."'";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['MyTask']."<br><br>";
                                              }
                                              ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                               <hr> <p class="red">You have <?php
                                            $query="SELECT  COUNT(teams.Team_ID)as MyTask from papdailysales LEFT JOIN techietask on techietask.ClientID=papdailysales.ClientID LEFT JOIN teams ON teams.Team_ID=techietask.TeamID  LEFT JOIN papinstalled ON papinstalled.ClientID=papdailysales.ClientID WHERE 
                                             techietask.ClientID is not null AND papinstalled.ClientID is null AND teams.Team_ID='".$_SESSION['TeamID']."'";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['MyTask'];
                                              }
                                              ?> Tasks</p></hr>
                                <a class="dropdown-item media" href="mytask.php">
                                    <i class="fa fa-check"></i>
                                    <p>Check Out</p>
                                </a>
                            </div>
                        </div>
                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <center><p class="red">Account Information</p></center>
                                <a class="dropdown-item media" href="#">
                                    <div class="message media-body">
                                       <center> <span class="name"><?php echo $_SESSION['TeamID']?></span></center>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="../images/avatar/images.jpg"></span>
                                    <div class="message media-body">
                                        <strong><span class="name float-left">Techie 1</span></strong>
                                        <center> <span class="name float-left"><?php echo $_SESSION['Techie1']?></span> </center>
                                        
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="../images/avatar/images.jpg"></span>
                                    <div class="message media-body">
                                        <strong><span class="name float-left">Techie 2</span></strong>
                                        <center><span class="name float-left"><?php echo $_SESSION['Techie2']?></span> </center>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="name float-left"><?php echo $_SESSION[
                 "TeamID"
             ]; ?></span>
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
                                            <h3 class="text-center">New Meter Report</h3>
                                        </div>
                                        <hr>
                                        <form  method="post" enctype="multipart/form-data" autocomplete="off">
                                        <div class="form-group">
                                        <label for="x_card_code" class="control-label mb-1">Team ID</label>
                                        <div class="input-group">
                                        <input id="bname" name="teamid" type="text" class="form-control cc-cvc" value="<?php echo $_SESSION['TeamID']?>"   placeholder="Team ID" readonly><br></br>
                                        </div>
                                        <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Meter No</label>
                                            <input id="cc-number" pattern="[0-9]{11}" name="mtrno" type="number" class="form-control cc-number identified visa"  data-val="true" required placeholder="Meter Number" > 
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Building Name</label>
                                                    <div class="input-group">
                                                        <input id="bname" name="Buildingname" type="text" class="form-control cc-cvc"  placeholder="Building Name" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Building Code</label>
                                                        <input id="bcode" placeholder="Building Code" name="BuildingCode" type="text" class="form-control cc-exp"  required>
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Region</label>
                                                <div class="form-group has-success">
                                            <select data-placeholder="Choose a Region..." class="standardSelect form-control" name="region" tabindex="1">
                                            <option ></option>
                                            <option disabled selected>Select Region</option>
                                             <option value="G44">G44</option>
                                            <option value="ZMM">ZMM</option>
                                           <option value="G45S">G45S</option>
                                             <option value="G45N">G45N</option>
                                            <option value="R&M">R&M</option>
                                            <option value="LSM">LSM</option>
                                           <option value="JAR">JAR</option>
                                            <option value="KWT">KWT</option>  
                                              </select>
                                            </div>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Termination Date</label>
                                                <input id="termination" name="dateinstalled" type="date" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-invalid="false" aria-describedby="cc-name" required >
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                            <label for="cc-number" class="control-label mb-1">Image</label>
                                            <input id="cc-number" name="image" type="file" class="form-control cc-number identified visa" required> 
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Suggestions/Observations/Comments</label>
                                                <input id="cc-number" name="note" type="text" class="form-control cc-number identified visa" maxlength="40"  required placeholder="Suggestions/Observations/Comments">
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
 document.getElementById("termination").setAttribute("max",maxdate);
 </script>
</body>
</html>
