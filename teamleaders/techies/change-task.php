<?php
include("session.php");
include("../../config/config.php");
$id=$_GET['client-id'];

$sql="select * from papdailysales where ClientID=$id";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_assoc($result);
$id=$row['ClientID'];
$cname=$row['ClientName'];
$contact=$row['ClientContact'];
$availD=$row['ClientAvailability'];
$reg=$row['Region'];
$bname=$row['BuildingName'];
$bcode=$row['BuildingCode'];

if(isset($_POST['submit'])){
    $TeamID = $_POST['teamid'];
    $ClientID = $_POST['ClientID'];
    $Date = $_POST['date'];
    $Region = $_POST['Region'];

    if($connection->connect_error){
        die('connection failed : '.$connection->connect_error);
    }
    else
    {    
      $stmt= $connection->prepare("select * from teams where Team_ID= ? and Region= ?");
      $stmt->bind_param("ss",$TeamID,$Region);
      $stmt->execute();
      $stmt_result= $stmt->get_result();
    if($stmt_result->num_rows>0){
        $sql="update techietask set ClientID=$id,TeamID='$TeamID',Date='$Date' where ClientID=$id";
  
        $result=mysqli_query($connection,$sql);
        if ($result) {
          echo '<script>alert("Successfully reasigned!")</script>';
            echo '<script>window.location.href="reasign-task.php";</script>';
        } else {
          echo '<script>alert("Not submitted try again!")</script>';
            echo '<script>window.location.href="change-task.php";</script>';
        }
    
    }
    else{
      echo "<script>alert('Team does not exist.');</script>";
      echo '<script>window.location.href="reasign-task.php";</script>';
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
    <title>Reasign Task</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet">

<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Bootstrap core JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

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
                    <li class="menu-title">ACTIVITIES</li><!-- /.menu-title -->
                    <li>
                        <a href="create-team.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Create New Team </a>
                    </li>
                    <li>
                        <a href="assign-task.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Assign Task </a>
                    </li>
                    <li>
                        <a href="reasign-task.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Reasign Task</a>
                    </li>
                    <li>
                        <a href="reminders.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Reminders</a>
                    </li>
                    <li class="menu-title">PANEL APS</li><!-- /.menu-title -->

                    <li>
                        <a href="installed.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Installed</a>
                    </li>
                    <li>
                        <a href="restituted.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Restituted </a>
                    </li>
                    <li>
                        <a href="turned-on.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Turned On</a>
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
                <img src="../../images/picture1.png" style="width: 120px; height: 70px;" class="logo-icon" alt="logo icon">
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
         $query="SELECT COUNT(*) as restituted FROM papnotinstalled WHERE Reason='Already installed' and Region='".$_SESSION['Region']."'";
          $data=mysqli_query($connection,$query);
          while($row=mysqli_fetch_assoc($data)){
          echo $row['restituted'];
    }
    ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have <?php
         $query="SELECT COUNT(*) as restituted FROM papnotinstalled WHERE Reason='Already installed' and Region='".$_SESSION['Region']."'";
          $data=mysqli_query($connection,$query);
          while($row=mysqli_fetch_assoc($data)){
          echo $row['restituted'];
    }
    ?> Restitute(s)</p>
                                <a class="dropdown-item media" href="restituted.php">
                                    <i class="fa fa-check"></i>
                                    <p>Check Out.</p>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                                <span class="count bg-primary"><?php
                                             $query="SELECT COUNT(*) AS reminded from reminders Where Region='".$_SESSION['Region']."'";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['reminded']."<br><br>";
                                              }
                                              ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have <?php
                                             $query="SELECT COUNT(*) AS reminded from reminders Where Region='".$_SESSION['Region']."'";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['reminded'];
                                              }
                                              ?> Pap to urgently assign</p>
                                <a class="dropdown-item media" href="reminders.php">
                                    <div class="message media-body">
                                        <span class="name float-left">Check Out</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-question"></i>
                                <span class="count bg-primary"><?php
                                             $query="SELECT COUNT(papdailysales.ClientID) AS pending from papdailysales LEFT OUTER JOIN techietask on techietask.ClientID=papdailysales.ClientID left join  papnotinstalled on papnotinstalled.ClientID=papdailysales.ClientID
                                             WHERE techietask.ClientID is null and papnotinstalled.ClientID is null and papdailysales.Region='".$_SESSION['Region']."'";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['pending'];
                                              }
                                              ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have <?php
                                             $query="SELECT COUNT(papdailysales.ClientID) AS pending from papdailysales LEFT OUTER JOIN techietask on techietask.ClientID=papdailysales.ClientID left join  papnotinstalled on papnotinstalled.ClientID=papdailysales.ClientID
                                             WHERE techietask.ClientID is null and papnotinstalled.ClientID is null and papdailysales.Region='".$_SESSION['Region']."'";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['pending'];
                                              }
                                              ?> pending installations</p>
                                <a class="dropdown-item media" href="assign-task.php">
                                    <div class="message media-body">
                                        <span class="name float-left">Check Out</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="name float-left"><?php echo $_SESSION[
                 "FName"
             ]; ?> <?php echo $_SESSION["LName"]; ?></span>
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="../../config/logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Header-->

        <div class="content">
            <div class="animated fadeIn">


                <div class="row">
                <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header"></div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Reasign Task</h3>
                                        </div>
                                        <hr>
                                        <form method="POST" action="">
                                        <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Team ID</label>
                                                        <input id="cc-exp" name="teamid" type="tel" class="form-control cc-exp" value="<?php echo $_SESSION['Region']?>-"data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="Team ID">
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Date of Work</label>
                                                    <div class="input-group">
                                                        <input id="work" name="date" type="date" class="form-control cc-cvc" value=""  autocomplete="off">
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Client ID</label>
                                                <input id="cc-pament" name="ClientID"  type="text" value="<?php echo $id?>" readonly class="form-control" aria-required="true" aria-invalid="false" placeholder="Client ID">
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Building Name</label>
                                                <input id="cc-pament" name="bname"  type="text" value="<?php echo $bname?>" readonly class="form-control" aria-required="true" aria-invalid="false" placeholder="Team ID">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Building Code</label>
                                                <input id="cc-name" name="bcode" type="text" class="form-control cc-name valid"  data-val="true" placeholder="Building Code" value="<?php echo $bcode?>" readonly
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Region</label>
                                                <input id="cc-name" name="Region" type="text" class="form-control cc-name valid"  data-val="true" placeholder="Region"
                                                    autocomplete="cc-name" readonly aria-required="true" aria-invalid="false" value="<?php echo $reg?>"aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Client Name</label>
                                                <input id="cc-name" name="cname" type="text" class="form-control cc-name valid" readonly  data-val="true" placeholder="Client Name"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" value="<?php echo $cname?>" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Contact </label>
                                                <input id="cc-name" name="contact" type="text" class="form-control cc-name valid" readonly  data-val="true" value="<?php echo $contact?>" placeholder="Contact"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Availability </label>
                                                <input id="cc-name" name="availD" type="text" value="<?php echo $availD?>" class="form-control cc-name valid" readonly data-val="true" placeholder="Availability"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>      
                                            <div>
                                                <button id="payment-button" type="submit" name="submit" class="btn btn-warning">
                                                    <span id="payment-button-amount">Submit</span>
                                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div><!--/.col-->

                   <div class="col-lg-8">
              <div class="card"><div class="card-body">
              <div class="card-header">
                           <center> <strong class="card-title">Current Tasks</strong></center>
                        </div>
                        <div class="table-responsive">
                                    <table class="table table-borderless table-striped table-earning" id="example">
                                        <thead>
                                            <tr>
                                            <th scope="col">Team ID</th>
                                            <th scope="col">Techie 1</th>
                                            <th scope="col">Techie 2</th>
                                            <th scope="col">Pending Tasks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
    
    $sql="SELECT techietask.TeamID, COUNT(techietask.TeamID) as tasks,teams.Techie1,teams.Techie2 FROM techietask left join papinstalled on papinstalled.ClientID=techietask.ClientID
    left join teams on techietask.TeamID=teams.Team_ID WHERE papinstalled.ClientID is null and techietask.Region='".$_SESSION['Region']."' 
    GROUP BY techietask.TeamID HAVING COUNT(techietask.TeamID)>1 OR COUNT(techietask.TeamID)=1";
$result=$connection->query($sql);
while($row=$result->fetch_array()){
  ?>
  <tr>
    <td><?php echo $row['TeamID']?></td>
    <td><?php echo $row['Techie1']?></td>
    <td><?php echo $row['Techie2']?></td>
   <td><?php echo $row['tasks']?></td>
</tr>
<?php } ?>
                                    </tbody>
                                    </table>
                                </div>
              </div></div>
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
<script src="../../assets/js/main.js"></script>

<script type="text/javascript">
$( document ).ready(function() {
$('#example').DataTable({
		 "processing": true,
		 "dom": 'lBfrtip',
		 "buttons": [
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'excel',
                    'csv'
                ]
            }
        ]
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
 document.getElementById("work").setAttribute("min",mindate);
</script>
</body>
</html>
