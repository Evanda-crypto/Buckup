<?php
include("session.php");
include("../config/config.php");
$id=$_GET['clientid'];

$sql="select * from turnedonpap where ClientID=$id";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_assoc($result);
$cname=$row['ClientName'];
$contact=$row['ClientContact'];
$mac=$row['MacAddress'];
$reg=$row['Region'];
$bname=$row['BuildingName'];
$bcode=$row['BuildingCode'];


if(isset($_POST['submit'])){
$ClientName = $_POST['ClientName'];
$ClientContact = $_POST['ClientContact'];
$region = $_POST['Region'];
$BuildingName = $_POST['bname'];
$BuildingCode = $_POST['bcode'];
$MAC = $_POST['mac'];

$sql="update turnedonpap set ClientID=$id,Region='$region',ClientName='$ClientName',ClientContact='$ClientContact'
,BuildingName='$BuildingName',BuildingCode='$BuildingCode',MacAddress='$MAC' where ClientID=$id";

$result=mysqli_query($connection,$sql);
if ($result) {
    echo "<script>alert('Update Successfull');</script>";
    echo '<script>window.location.href="turnedon.php";</script>';
} else {
    echo "<script>alert('An error occurred please try again');</script>";
    echo '<script>window.location.href="edit-turnedon.php";</script>';

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
    <title>Edit Turned On</title>
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
                        <a href="gallery.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-gallery"></i>Gallery </a>
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
        </header><!-- /header -->
        <!-- Header-->

        <div class="content">
            <div class="animated fadeIn">


                <div class="row">
                <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-header"></div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Edit Turned On</h3>
                                        </div>
                                        <hr>
                                        <form method="POST" action="">
                                        <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="cc-exp" class="control-label mb-1">Building Name</label>
                                                        <input id="cc-exp" name="bname" type="tel" class="form-control cc-exp" value="<?php echo $bname; ?>" data-val="true" placeholder="Building Name"
                                                            data-val-cc-exp="Please enter a valid month and year" placeholder="MM / YY"
                                                            autocomplete="cc-exp">
                                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="x_card_code" class="control-label mb-1">Building Code</label>
                                                    <div class="input-group">
                                                        <input id="x_card_code" name="bcode" type="text" class="form-control cc-cvc" value="<?php echo $bcode; ?>" data-val="true" placeholder="Building Code"
                                                            data-val-cc-cvc="Please enter a valid security code" autocomplete="off">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group has-success">
                                            <select data-placeholder="Choose a Country..." class="standardSelect form-control" name="Region" tabindex="1">
                                            <option value="<?php echo $reg?>" ><?php echo $reg?></option>
                                           <option value="G44">G44</option>
                                           <option value="ZMM">ZMM</option>
                                           <option value="G45S">G45S</option>
                                           <option value="G45N">G45N</option>
                                           <option value="R&M">R&M</option>
                                           <option value="LSM">LSM</option>
                                           <option value="KWT">KWT</option>
                                              </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">Mac Address</label>
                                                <input id="cc-pament" name="mac"  type="text" pattern="[0-9A-Fa-f]{1}[0-9A-Fa-f]{1}-[0-9A-Fa-f]{1}[0-9A-Fa-f]{1}-[0-9A-Fa-f]{1}[0-9A-Fa-f]{1}-[0-9A-Fa-f]{1}[0-9A-Fa-f]{1}-[0-9A-Fa-f]{1}[0-9A-Fa-f]{1}-[0-9A-Fa-f]{1}[0-9A-Fa-f]{1}" style="text-transform: uppercase" value="<?php echo $mac; ?>" class="form-control" aria-required="true" aria-invalid="false" placeholder="Building Code">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Client Name</label>
                                                <input id="cc-name" name="ClientName" type="text" class="form-control cc-name valid" value="<?php echo $cname; ?>" data-val="true" placeholder="Status"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Contact</label>
                                                <input id="cc-number" name="ClientContact" type="tel" class="form-control "  value="<?php echo $contact; ?>" data-val="true" pattern="[0-9]{10}"   placeholder="Contact 07XXXXXXXX"
                                                    data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                                    autocomplete="cc-number">
                                                <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
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

                   <div class="col-lg-9">
              <div class="card"><div class="card-body">
              <div class="card-header">
                           <center> <strong class="card-title">Turned On Today</strong></center>
                        </div>
                        <div class="table-responsive">
                                    <table class="table table-borderless table-striped table-earning" id="example">
                                        <thead>
                                            <tr>
                                            <th class="th-sm">Building Name
                   </th>
                   <th class="th-sm">Building Code
                   </th>
                   <th class="th-sm">Region
                  </th>
                   <th class="th-sm">Client Name
                   </th>
                   <th class="th-sm">Client Contact
                   </th>
                   <th class="th-sm">MAC Address
                   </th>  
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
$sql =
    "SELECT turnedonpap.ClientID,turnedonpap.BuildingName,upper(turnedonpap.BuildingCode) as bcode,upper(turnedonpap.Region) as reg,turnedonpap.ChampName,turnedonpap.ClientName,turnedonpap.ClientContact,Upper(turnedonpap.MacAddress) as Mac,turnedonpap.PapStatus,turnedonpap.DateTurnedOn from papdailysales LEFT JOIN turnedonpap ON turnedonpap.ClientID=papdailysales.ClientID WHERE DateTurnedOn=CURDATE()";
$result = $connection->query($sql);
while ($row = $result->fetch_array()) { ?>
  <tr>
    <td><?php echo $row["BuildingName"]; ?></td>
    <td><?php echo $row["bcode"]; ?></td>
    <td><?php echo $row["reg"]; ?></td>
    <td><?php echo $row["ClientName"]; ?></td>
    <td><?php echo $row["ClientContact"]; ?></td>
    <td><?php echo $row["Mac"]; ?></td>
</tr>
<?php }
?>
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
<script src="../assets/js/main.js"></script>

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
</body>
</html>
