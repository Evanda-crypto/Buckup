<?php
include("session.php");
include("../../config/config.php");

?>
<?php 
if (!$connection) {
    # code...
    echo "Problem in database connection! Contact administrator!" .
        mysqli_error();
} else {
    $sql =
        "SELECT upper(Region) as reg, COUNT(clientID) as pap FROM turnedonpap GROUP BY Region ORDER BY pap DESC";
    $result = mysqli_query($connection, $sql);
    $chart_data = "";
    while ($row = mysqli_fetch_array($result)) {
        $Region[] = $row["reg"];
        $Clients[] = $row["pap"];
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
    <title>Dashboard</title>
    

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
 

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script>-->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }
        #a{
            color:black; 
            font-size: 20px;
        }
        .topcorner{
   position:absolute;
   top:25px;
   right: 25px;;
  }

    </style>
</head>

<body style="background-color:#e1e1e1">

<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="dashboard.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">PANEL APS</li><!-- /.menu-title -->

                    <li>
                        <a href="all-paps.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>All Paps</a>
                    </li>
                    <li>
                        <a href="not-installed.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Not Installed </a>
                    </li>
                    <li>
                        <a href="assigned.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Assigned</a>
                    </li>
                    <li>
                        <a href="restituted.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Restituted </a>
                    </li>
                    <li>
                        <a href="turned-on.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Turned On </a>
                    </li>
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
         $query="SELECT COUNT(*) as restituted FROM papnotinstalled left join trash on trash.ClientID=papnotinstalled.ClientID WHERE trash.ClientID is null and papnotinstalled.Reason<>'Already installed' and papnotinstalled.Region='".$_SESSION['Region']."'";
          $data=mysqli_query($connection,$query);
          while($row=mysqli_fetch_assoc($data)){
          echo $row['restituted'];
    }
    ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have <?php
         $query="SELECT COUNT(*) as restituted FROM papnotinstalled left join trash on trash.ClientID=papnotinstalled.ClientID WHERE trash.ClientID is null and papnotinstalled.Reason<>'Already installed' and papnotinstalled.Region='".$_SESSION['Region']."'";
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
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                 <!-- Widgets  -->
                 <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon ">
                                        <i class="pe-7s-check"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php
                  $query =
                      "SELECT count(*) as clients from papdailysales left join papnotinstalled on papdailysales.ClientID=papnotinstalled.ClientID where papnotinstalled.ClientID is null 
                      and papdailysales.Region='".$_SESSION['Region']."'";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["clients"] . "<br><br>";
                  }
                  ?></span></div>
                                            <div class="stat-heading">Signed[<?php echo $_SESSION['Region']?>]</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-help1"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php
                                             $query="SELECT COUNT(papdailysales.ClientID) AS pending from papdailysales LEFT OUTER JOIN techietask on techietask.ClientID=papdailysales.ClientID left join  papnotinstalled on papnotinstalled.ClientID=papdailysales.ClientID
                                             WHERE techietask.ClientID is null and papnotinstalled.ClientID is null and papdailysales.Region='".$_SESSION['Region']."'";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['pending']."<br><br>";
                                              }
                                              ?></span></div>
                                            <div class="stat-heading">Pending Istallation[<?php echo $_SESSION['Region']?>]</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-settings"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php
                  $query =
                      "SELECT COUNT(papinstalled.MacAddress) as pap FROM token_teams LEFT JOIN papinstalled on token_teams.Team_ID=papinstalled.Team_ID left join turnedonpap on papinstalled.ClientID=turnedonpap.ClientID 
                      JOIN papdailysales on papdailysales.ClientID=papinstalled.ClientID WHERE papinstalled.ClientID is NOT null and turnedonpap.ClientID is null and papdailysales.Region='".$_SESSION['Region']."'";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["pap"] . "<br><br>";
                  }
                  ?></span></div>
                                            <div class="stat-heading">Installed[<?php echo $_SESSION['Region']?>]</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-signal"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php
                  $query = "SELECT count(*) as turnedon from turnedonpap Where Region='".$_SESSION['Region']."'";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["turnedon"] . "<br><br>";
                  }
                  ?></span></div>
                                            <div class="stat-heading">Turned On[<?php echo $_SESSION['Region']?>]</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
                <!--  Traffic  -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Pap Progress </h4>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-body">
                                    <canvas id="barChart"></canvas>   
                                    </div>
                                </div>
                            </div> <!-- /.row -->
                            <div class="card-body"></div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mb-3">Panel Aps</h4>
                                    <canvas id="doughutChart"></canvas>
                                </div>
                            </div>
                        </div>
                </div>
                <!--  /Traffic -->
                <div class="clearfix"></div>

                    <div class="row">
                    <div class="col-lg-12">
                    <div class="card">
                    <div class="card-body">
                                    
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Signed</th>
                                                    <th>Assigned</th>
                                                    <th>Restituted</th>
                                                    <th>Installed</th>
                                                    <th>Turned On</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <td class="serial"><?php if (!$connection) {
          echo "Problem in database connection! Contact administrator!" .
              mysqli_error();
      } else {
          $sql =
              "SELECT COUNT(papdailysales.ClientID) as signed FROM papdailysales left join papnotinstalled on papnotinstalled.ClientID=papdailysales.ClientID where papnotinstalled.ClientID is null and papdailysales.Region='".$_SESSION['Region']."'";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["signed"];
          }
      } ?></td>
                                                <td class="serial"><?php if (!$connection) {
    echo "Problem in database connection! Contact administrator!" .
        mysqli_error();
} else {
    $sql =
        "SELECT COUNT(techietask.ClientID) as assigned FROM  techietask LEFT JOIN papinstalled ON papinstalled.ClientID=techietask.ClientID left join papdailysales on papdailysales.ClientID=techietask.ClientID WHERE papinstalled.ClientID is null and papdailysales.Region='" .
        $_SESSION["Region"] .
        "'";
    $result = mysqli_query($connection, $sql);
    $chart_data = "";
    while ($notinstalled = mysqli_fetch_assoc($result)) {
        echo $notinstalled["assigned"];
    }
} ?></td>
                                                <td class="serial"><?php if (!$connection) {
    echo "Problem in database connection! Contact administrator!" .
        mysqli_error();
} else {
    $sql =
        "SELECT COUNT(ClientID) restituted FROM papnotinstalled  WHERE Reason<>'Already Installed' and Region='" .
        $_SESSION["Region"] .
        "'";
    $result = mysqli_query($connection, $sql);
    $chart_data = "";
    while ($torestore = mysqli_fetch_assoc($result)) {
        echo $torestore["restituted"];
    }
} ?></td>
                                                    </td>
                                         
                                                    <td class="serial"><?php if (!$connection) {
    echo "Problem in database connection! Contact administrator!" .
        mysqli_error();
} else {
    $sql =
        " SELECT COUNT(papinstalled.ClientID) as installed FROM papinstalled LEFT JOIN turnedonpap ON turnedonpap.ClientID=papinstalled.ClientID LEFT JOIN papdailysales ON papdailysales.ClientID=papinstalled.ClientID WHERE turnedonpap.ClientID is null and papdailysales.Region='" .
        $_SESSION["Region"] .
        "'";
    $result = mysqli_query($connection, $sql);
    $chart_data = "";
    while ($installed = mysqli_fetch_assoc($result)) {
        echo $installed["installed"];
    }
} ?></td>
                                                    <td class="serial"><?php if (!$connection) {
    echo "Problem in database connection! Contact administrator!" .
        mysqli_error();
} else {
    $sql =
        " SELECT COUNT(turnedonpap.ClientID) as turnedon FROM turnedonpap where Region='" .
        $_SESSION["Region"] .
        "'";
    $result = mysqli_query($connection, $sql);
    $chart_data = "";
    while ($turnedon = mysqli_fetch_assoc($result)) {
        echo $turnedon["turnedon"];
    }
} ?></td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                
                                </div>
    </div>
    </div></div>
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>

    </div>
    <!-- /#right-panel -->

   <!-- Scripts -->
   <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../../assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="../../assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="../../assets/js/init/fullcalendar-init.js"></script>

    <!--Local Stuff-->

<script>
  //bar chart
  var ctx = document.getElementById( "barChart" );
     ctx.height = 100;
    var myChart = new Chart( ctx, {
        type: 'bar',
        data: {
            labels: ["<?php echo date("Y-m-d", strtotime("-6 days")); ?>","<?php echo date(
    "Y-m-d",
    strtotime("-5 days")
); ?>","<?php echo date("Y-m-d", strtotime("-4 days")); ?>","<?php echo date(
    "Y-m-d",
    strtotime("-3 days")
); ?>","<?php echo date("Y-m-d", strtotime("-2 days")); ?>","<?php echo date(
    "Y-m-d",
    strtotime("-1 days")
); ?>","<?php echo date("Y-m-d"); ?>" ],
            datasets: [
                {
                    label: "All Regions",
                    data: [ <?php
                  $query =
                      "SELECT count(*) as clients from papdailysales left join papnotinstalled on papdailysales.ClientID=papnotinstalled.ClientID where papnotinstalled.ClientID is null and papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 6 DAY)";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["clients"];
                  }
                  ?>, <?php
                  $query =
                      "SELECT count(*) as clients from papdailysales left join papnotinstalled on papdailysales.ClientID=papnotinstalled.ClientID where papnotinstalled.ClientID is null and papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 5 DAY)";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["clients"];
                  }
                  ?>, <?php
                  $query =
                      "SELECT count(*) as clients from papdailysales left join papnotinstalled on papdailysales.ClientID=papnotinstalled.ClientID where papnotinstalled.ClientID is null and papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 4 DAY)";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["clients"];
                  }
                  ?>, <?php
                  $query =
                      "SELECT count(*) as clients from papdailysales left join papnotinstalled on papdailysales.ClientID=papnotinstalled.ClientID where papnotinstalled.ClientID is null and papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 3 DAY)";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["clients"];
                  }
                  ?>, <?php
                  $query =
                      "SELECT count(*) as clients from papdailysales left join papnotinstalled on papdailysales.ClientID=papnotinstalled.ClientID where papnotinstalled.ClientID is null and papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 2 DAY)";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["clients"];
                  }
                  ?>, <?php
                  $query =
                      "SELECT count(*) as clients from papdailysales left join papnotinstalled on papdailysales.ClientID=papnotinstalled.ClientID where papnotinstalled.ClientID is null and papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["clients"];
                  }
                  ?>, <?php
                  $query =
                      "SELECT count(*) as clients from papdailysales left join papnotinstalled on papdailysales.ClientID=papnotinstalled.ClientID where papnotinstalled.ClientID is null and papdailysales.DateSigned=CURDATE()";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["clients"];
                  }
                  ?> ],
                    borderColor: "rgba(0, 194, 146, 0.9)",
                    borderWidth: "0",
                    backgroundColor: "#85ce36"
                            },
                {
                    label: "Best Region",
                    data: [ "<?php
          $sql =
              "SELECT (SELECT MAX(mycount)
              FROM (SELECT Region,COUNT(DateSigned) AS mycount,DateSigned 
              FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 6 DAY)
              GROUP BY Region,DateSigned) as maxm) as bestreg";
          $result = mysqli_query($connection, $sql);
          $chart_data = "";
          while ($signed = mysqli_fetch_assoc($result)) {
              echo $signed["bestreg"];
          }
      ?>", "<?php
      $sql =
          "SELECT (SELECT MAX(mycount)
          FROM (SELECT Region,COUNT(DateSigned) AS mycount,DateSigned 
          FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 5 DAY)
          GROUP BY Region,DateSigned) as maxm) as bestreg";
      $result = mysqli_query($connection, $sql);
      $chart_data = "";
      while ($signed = mysqli_fetch_assoc($result)) {
          echo $signed["bestreg"];
      }
  ?>", "<?php
  $sql =
      "SELECT (SELECT MAX(mycount)
      FROM (SELECT Region,COUNT(DateSigned) AS mycount,DateSigned 
      FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 4 DAY)
      GROUP BY Region,DateSigned) as maxm) as bestreg";
  $result = mysqli_query($connection, $sql);
  $chart_data = "";
  while ($signed = mysqli_fetch_assoc($result)) {
      echo $signed["bestreg"];
  }
?>", "<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT Region,COUNT(DateSigned) AS mycount,DateSigned 
    FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 3 DAY)
    GROUP BY Region,DateSigned) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT Region,COUNT(DateSigned) AS mycount,DateSigned 
    FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 2 DAY)
    GROUP BY Region,DateSigned) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>","<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT Region,COUNT(DateSigned) AS mycount,DateSigned 
    FROM papdailysales where DateSigned=DATE_SUB(CURDATE(), INTERVAL 1 DAY)
    GROUP BY Region,DateSigned) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>", "<?php
$sql =
    "SELECT (SELECT MAX(mycount)
    FROM (SELECT Region,COUNT(DateSigned) AS mycount,DateSigned 
    FROM papdailysales where DateSigned=CURDATE()
    GROUP BY Region,DateSigned) as maxm) as bestreg";
$result = mysqli_query($connection, $sql);
$chart_data = "";
while ($signed = mysqli_fetch_assoc($result)) {
    echo $signed["bestreg"];
}
?>" ],
                    borderColor: "rgba(0,0,0,0.09)",
                    borderWidth: "0",
                    backgroundColor: "#FFB91F"
                            },
                {
                    label: "My Region",
                    data: [<?php
                  $query =
                      "SELECT count(*) as clients from papdailysales left join papnotinstalled on papdailysales.ClientID=papnotinstalled.ClientID where papnotinstalled.ClientID is null and papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 6 DAY) 
                      and papdailysales.Region='".$_SESSION['Region']."'";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["clients"];
                  }
                  ?>, <?php
                  $query =
                      "SELECT count(*) as clients from papdailysales left join papnotinstalled on papdailysales.ClientID=papnotinstalled.ClientID where papnotinstalled.ClientID is null and papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 5 DAY) 
                      and papdailysales.Region='".$_SESSION['Region']."'";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["clients"];
                  }
                  ?>, <?php
                  $query =
                      "SELECT count(*) as clients from papdailysales left join papnotinstalled on papdailysales.ClientID=papnotinstalled.ClientID where papnotinstalled.ClientID is null and papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 4 DAY) 
                      and papdailysales.Region='".$_SESSION['Region']."'";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["clients"];
                  }
                  ?>, <?php
                  $query =
                      "SELECT count(*) as clients from papdailysales left join papnotinstalled on papdailysales.ClientID=papnotinstalled.ClientID where papnotinstalled.ClientID is null and papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 3 DAY) 
                      and papdailysales.Region='".$_SESSION['Region']."'";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["clients"];
                  }
                  ?>, <?php
                  $query =
                      "SELECT count(*) as clients from papdailysales left join papnotinstalled on papdailysales.ClientID=papnotinstalled.ClientID where papnotinstalled.ClientID is null and papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 2 DAY) 
                      and papdailysales.Region='".$_SESSION['Region']."'";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["clients"];
                  }
                  ?>, <?php
                  $query =
                      "SELECT count(*) as clients from papdailysales left join papnotinstalled on papdailysales.ClientID=papnotinstalled.ClientID where papnotinstalled.ClientID is null and papdailysales.DateSigned=DATE_SUB(CURDATE(), INTERVAL 1 DAY) 
                      and papdailysales.Region='".$_SESSION['Region']."'";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["clients"];
                  }
                  ?>, <?php
                  $query =
                      "SELECT count(*) as clients from papdailysales left join papnotinstalled on papdailysales.ClientID=papnotinstalled.ClientID where papnotinstalled.ClientID is null and papdailysales.DateSigned=CURDATE() 
                      and papdailysales.Region='".$_SESSION['Region']."'";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["clients"];
                  }
                  ?>  ],
                    borderColor: "rgba(0,0,0,0.09)",
                    borderWidth: "0",
                    backgroundColor: "#EE2C4E"
                            }
                        ]
        },
        options: {
            scales: {
                yAxes: [ {
                    ticks: {
                        beginAtZero: true
                    }
                                } ]
            }
        }
    } );      
    
</script>
<script>
    
    //doughut chart
    var ctx = document.getElementById( "doughutChart" );
    ctx.height = 270;
    var myChart = new Chart( ctx, {
        type: 'doughnut',
        data: {
            datasets: [ {
                data: [ <?php
                  $query =
                      "SELECT count(*) as clients from papdailysales left join papnotinstalled on papdailysales.ClientID=papnotinstalled.ClientID where papnotinstalled.ClientID is null 
                      and papdailysales.Region='".$_SESSION['Region']."'";
                  $data = mysqli_query($connection, $query);
                  while ($row = mysqli_fetch_assoc($data)) {
                      echo $row["clients"];
                  }
                  ?>, <?php if (!$connection) {
                    echo "Problem in database connection! Contact administrator!" .
                        mysqli_error();
                } else {
                    $sql =
                        "SELECT COUNT(techietask.ClientID) as assigned FROM  techietask LEFT JOIN papinstalled ON papinstalled.ClientID=techietask.ClientID left join papdailysales on papdailysales.ClientID=techietask.ClientID WHERE papinstalled.ClientID is null and papdailysales.Region='" .
                        $_SESSION["Region"] .
                        "'";
                    $result = mysqli_query($connection, $sql);
                    $chart_data = "";
                    while ($notinstalled = mysqli_fetch_assoc($result)) {
                        echo $notinstalled["assigned"];
                    }
                } ?>, <?php if (!$connection) {
                    echo "Problem in database connection! Contact administrator!" .
                        mysqli_error();
                } else {
                    $sql =
                        "SELECT COUNT(ClientID) restituted FROM papnotinstalled  WHERE Region='" .
                        $_SESSION["Region"] .
                        "'";
                    $result = mysqli_query($connection, $sql);
                    $chart_data = "";
                    while ($torestore = mysqli_fetch_assoc($result)) {
                        echo $torestore["restituted"];
                    }
                } ?>, <?php if (!$connection) {
                    echo "Problem in database connection! Contact administrator!" .
                        mysqli_error();
                } else {
                    $sql =
                        " SELECT COUNT(papinstalled.ClientID) as installed FROM papinstalled LEFT JOIN turnedonpap ON turnedonpap.ClientID=papinstalled.ClientID LEFT JOIN papdailysales ON papdailysales.ClientID=papinstalled.ClientID WHERE turnedonpap.ClientID is null and papdailysales.Region='" .
                        $_SESSION["Region"] .
                        "'";
                    $result = mysqli_query($connection, $sql);
                    $chart_data = "";
                    while ($installed = mysqli_fetch_assoc($result)) {
                        echo $installed["installed"];
                    }
                } ?> ,<?php
                $query = "SELECT count(*) as turnedon from turnedonpap Where Region='".$_SESSION['Region']."'";
                $data = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($data)) {
                    echo $row["turnedon"];
                }
                ?>],
                backgroundColor: [
                                    "#EE2C4E",
                                    "#FFB91F",
                                    "#0CBEAF",
                                    "#3072F5",
                                    "#85CE36"
                                ],
                hoverBackgroundColor: [
                                    "#EE2C4E",
                                    "#FFB91F",
                                    "#0CBEF",
                                    "#3072F5",
                                    "#85CE36"
                                ]

                            } ],
            labels: [
                            "Signed",
                            "Assigned",
                            "Restituted",
                            "Installed",
                            "Turned On"
                        ]
        },
        options: {
            responsive: true
        }
    } );

</script>
</body>
</html>
