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
    <title>All | Paps</title>
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
    <link rel="stylesheet" href="../assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
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
        <!-- /#header -->
        <!-- Header-->

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                            <center><strong class="card-title">All Paps[<?php
         $query="SELECT COUNT(*) as pap FROM papdailysales WHERE ChampName='".$_SESSION['FName']." ".$_SESSION['LName']."'";
          $data=mysqli_query($connection,$query);
          while($row=mysqli_fetch_assoc($data)){
          echo $row['pap'];
    }
    ?> Records]</strong></center>
                            </div>
                            <div class="card-body">
                                 <table class="table table-striped" id="example">
                                    <thead>
                                        <tr>
                                        <th class="th-sm">Client
                                        </th>
                                     <th class="th-sm">Building Name
                                     </th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  <?php
    
    $sql="SELECT * from papdailysales WHERE ChampName='".$_SESSION['FName']." ".$_SESSION['LName']."'";
    $result=$connection->query($sql);
    while($row=$result->fetch_array()){
      ?>
      <tr>
        <td><a data-toggle="modal" data-target="#mediumModal" data-href="getallpap.php?id=<?php echo $row['ClientID']; ?>" class="openPopup"><?php echo $row['ClientName']?></a></td>
        <td><a data-toggle="modal" data-target="#mediumModal" data-href="getallpap.php?id=<?php echo $row['ClientID']; ?>" class="openPopup"><?php echo $row['BuildingName']?></a></td>
    </tr>
    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Modal -->

                    <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mediumModalLabel"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div><!--end of modal--><!--End of modal-->
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
<script src="../assets/js/lib/data-table/datatables.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/jszip.min.js"></script>
    <script src="../assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="../assets/js/init/datatables-init.js"></script>
<script>
 $(document).ready(function () {
$('#example').DataTable();
$('.dataTables_length').addClass('bs-select');
});
</script>
<script>
$(document).ready(function(){
  $(document).on('click','.openPopup',function(){
        var dataURL = $(this).attr('data-href');
        $('.modal-body').load(dataURL,function(){
            $('#myModal').modal({show:true});
        });
    }); 
});
$('#example').DataTable( {
    fixedColumn: true
} );
</script>
</body>
</html>
