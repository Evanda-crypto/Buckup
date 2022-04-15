<?php
include("session.php");
include("../../config/config.php");

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Completed | Tasks</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
  <link href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../../assets/css/style.css">

    <link href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css" rel="stylesheet"/>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>




<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">-->

<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Page level plugin JavaScript--<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>-->

<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<style>
tfoot td {
	font-weight:bold;
}
</style>
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
                    <li>
                        <a href="rejected-meters.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Rejected Meters</a>
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
                    <li class="menu-title" >COMPLETED TASKS</li><!-- /.menu-title --> 
                    <li>
                        <a href="completed-tasks.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Completed Tasks </a>
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
                            <a class="nav-link" href="../../config/logout.php"><i class="fa fa-power -off"></i>Logout</a>
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
                           <center> <strong class="card-title">Completed Tasks</strong></center>
                           <div class="table-responsive">
        <table border="0" cellspacing="5" cellpadding="5">
        <tbody><tr>
            <td>Start date:</td>
            <td><input type="text" id="min" placeholder="Start Date" style="color:red;" class="form-control" name="min"></td>
        </tr>
        <tr>
            <td>End date:</td>
            <td><input type="text" id="max" placeholder="End Date"   class="form-control" name="max"></td>
        </tr>
    </tbody></table>
                        </div>
                        <div class="card-body">
                        <table class="table table-striped" id="example">
                                <thead>
                                    <tr>
      <th class="th-sm">Client Name
      </th>
      <th class="th-sm">Contact
      </th>
      <th class="th-sm">Building Name
      </th>
      <th class="th-sm">Building Code
      </th>
      <th class="th-sm">Mac Address
      </th>
      <th class="th-sm">Techies
      </th>
      <th class="th-sm">Date Installed
      </th>
      <th class="th-sm">Date Turned On
      </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                        $query  = "SELECT turnedonpap.ClientID,turnedonpap.ClientName,turnedonpap.ChampName,papdailysales.ClientContact,papdailysales.BuildingName,papdailysales.BuildingCode,upper(turnedonpap.MacAddress) as mac,CONCAT(Token_teams.Techie1,'/',Token_teams.Techie2) as techies,
                        turnedonpap.DateTurnedOn,papdailysales.Region,papinstalled.DateInstalled FROM turnedonpap JOIN papdailysales ON papdailysales.ClientID=turnedonpap.ClientID left join papinstalled ON papinstalled.ClientID=papdailysales.ClientID left join Token_teams on Token_teams.Team_ID=papinstalled.Team_ID WHERE turnedonpap.ClientID IS NOT null and papdailysales.Region='".$_SESSION['Region']."'";
                        $result  = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                
                        ?>
                                <tr>
                                    <td><?php echo $row['ClientName']; ?></td>
                                    <td><?php echo $row['ClientContact']; ?></td>
                                    <td><?php echo $row['BuildingName']; ?></td>
                                    <td><?php echo $row['BuildingCode']; ?></td>
                                    <td><?php echo $row['mac']; ?></td>
                                    <td><?php echo $row['techies']; ?></td>
                                    <td><?php echo $row['DateInstalled']; ?></td>
                                    <td><?php echo $row['DateTurnedOn']; ?></td>
                                </tr>
                        <?php

                            }
                        ?>
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
<script src="../../assets/js/main.js"></script>


<script>
  var minDate, maxDate;
 
 // Custom filtering function which will search data in column four between two values
 $.fn.dataTable.ext.search.push(
     function( settings, data, dataIndex ) {
         var min = minDate.val();
         var max = maxDate.val();
         var date = new Date( data[7] );
  
         if (
             ( min === null && max === null ) ||
             ( min === null && date <= max ) ||
             ( min <= date   && max === null ) ||
             ( min <= date   && date <= max )
         ) {
             return true;
         }
         return false;
     }
 );
  
 $(document).ready(function() {
     // Create date inputs
     minDate = new DateTime($('#min'), {
         format: 'MMMM Do YYYY'
     });
     maxDate = new DateTime($('#max'), {
         format: 'MMMM Do YYYY'
     });
  
     // DataTables initialisation
     var table = $('#example').DataTable();
  
     // Refilter the table
     $('#min, #max').on('change', function () {
         table.draw();
     });
 });
 $('#myTable').DataTable( {
    fixedColumns: true
} );
  </script>
 <!-- <script>
  $(document).ready(function() {
	// DataTable initialisation
	$('#example').DataTable(
		{
		
		}
	);
});
  </script>-->
</body>
</html>
