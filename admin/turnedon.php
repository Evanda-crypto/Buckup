<?php
include("session.php");
include("../config/config.php");

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Turned | On</title>
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
                   <!-- <li>
                        <a href="gallery.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-gallery"></i>Gallery </a>
                    </li>-->
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                           <center> <strong class="card-title">Turned On</strong></center>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="example">
                                <thead>
                                    <tr>
                                    <th class="th-sm">PAP Code
                  </th>
                   <th class="th-sm">Building Name
                   </th>
                   <th class="th-sm">Building Code
                   </th>
                   <th class="th-sm">Region
                  </th>
                   <th class="th-sm">Champ Name
                   </th>
                   <th class="th-sm">Client Name
                   </th>
                   <th class="th-sm">Client Contact
                   </th>
                   <th class="th-sm">MAC Address
                   </th>
                   <th class="th-sm">Date Turned On
                   </th>
                   <th class="th-sm">More
                   </th>  
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
    
    $sql="SELECT turnedonpap.ClientID,papdailysales.BuildingName,upper(papdailysales.BuildingCode) as bcode,upper(papdailysales.Region) as reg,turnedonpap.ChampName,turnedonpap.ClientName,turnedonpap.ClientContact,Upper(turnedonpap.MacAddress) as Mac,turnedonpap.PapStatus,turnedonpap.DateTurnedOn, CASE WHEN LENGTH(papdailysales.BuildingCode)>11 THEN CONCAT(papdailysales.BuildingCode,'-',(row_number() over(partition by papdailysales.BuildingCode)),'P')
    WHEN (row_number() over(partition by papdailysales.BuildingCode,papdailysales.Floor)) <=9 THEN CONCAT(upper(papdailysales.BuildingCode),'-',papdailysales.Floor,'0',(row_number() over(partition by papdailysales.BuildingCode,papdailysales.Floor)),'P')
    WHEN (row_number() over(partition by papdailysales.BuildingCode,papdailysales.Floor)) >9 THEN CONCAT(upper(papdailysales.BuildingCode),'-',papdailysales.Floor,(row_number() over(partition by papdailysales.BuildingCode,papdailysales.Floor)),'P')
    end as papcode from papdailysales LEFT JOIN turnedonpap ON turnedonpap.ClientID=papdailysales.ClientID WHERE DateTurnedOn >= DATE_SUB(CURDATE(), INTERVAL 70 DAY) order by turnedonpap.DateTurnedOn Desc";
$result=$connection->query($sql);
while($row=$result->fetch_array()){
  ?>
  <tr>
    <td><?php echo $row['papcode']?></td>
    <td><?php echo $row['BuildingName']?></td>
    <td><?php echo $row['bcode']?></td>
    <td><?php echo $row['reg']?></td>
    <td><?php echo $row['ChampName']?></td>
    <td><?php echo $row['ClientName']?></td>
    <td><?php echo $row['ClientContact']?></td>
    <td><?php echo $row['Mac']?></td>
    <td><?php echo $row['DateTurnedOn']?></td>
    <td>
    <button class="btn btn-warning" ><a href="edit-turnedon.php?clientid=<?php echo $row['ClientID']; ?>" class="text-bold">Edit</a></button>
    </td>
</tr>
<?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

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
