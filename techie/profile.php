<?php
include("session.php");
include("../config/config.php");
?>
<?php
$id=$_SESSION['ID'];
if (isset($_POST["submit"])) {
    $Password = trim($_POST["password"]);
    $newpass = trim($_POST['newpass']);

    $hashpass= password_hash($newpass,PASSWORD_DEFAULT);

    if (!$connection) {
        echo "<script>alert('There is no connection at this time.Please try again later.');</script>";
        echo '<script>window.location.href="login.php";</script>';
    }
    else{
        $stmt = $connection->prepare("SELECT * from teams where ID= ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if ($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            if (password_verify($Password, $data["Password"])) {
                $sql="update teams set Password='$hashpass' where ID=$id";
                $result=mysqli_query($connection,$sql);
                if ($result) {
                  echo '<script>alert("Password reset Succesfull")</script>';
                    echo '<script>window.location.href="../config/logout.php";</script>';
                } else {
                  echo '<script>alert("An Error occured please retry again!")</script>';
                    echo '<script>window.location.href="profile.php";</script>';
                }
            }
            else{
                echo "<script>alert('Current password is wrong');</script>";
                echo '<script>window.location.href="profile.php";</script>';
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
    <title>Profile</title>
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
                                <a class="dropdown-item media" href="my-tasks.php">
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
                        <div class="card-header"></div>
                        <div class="round-img">
                                                    <a href="#"><center><img class="rounded-circle" src="../images/avatar/profile.png" alt=""></center></a>
                                                </div>
                        <div class="card-body card-block">
                            <form action="" method="post" class="" autocomplete="off">
                            <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <input type="text" id="email" name="id" value="<?php echo $_SESSION['ID']?>" placeholder="ID" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" id="username" name="FName" value="<?php echo $_SESSION['Techie1']?>" placeholder="Techie 1" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" id="username" name="LName" placeholder="Techie2" value="<?php echo $_SESSION['Techie2']?>" class="form-control" readonly>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $_SESSION['TeamID']?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                        <input type="password" id="password" name="password" placeholder="Current Password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                        <input type="password" id="password" name="newpass" placeholder="New Password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-actions form-group"><button type="submit" name="submit" class="btn btn-warning btn-sm">Change Pass</button></div>
                            </form>
                        </div>
                    </div>
                </div>
</div>
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


</body>
</html>
