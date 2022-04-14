<?php
include("session.php");
include("../config/config.php");
$id=$_GET['userid'];

$sql="select * from Users where ID=$id";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_assoc($result);
$fname=$row['FirstName'];
$lname=$row['LastName'];
$email=$row['Email'];
$dpt=$row['Department'];
$reg=$row['Region'];
$reg1=$row['Region1'];

if(isset($_POST['submit'])){
$FirstName = $_POST['FName'];
$LastName = $_POST['LName'];
$Email = $_POST['Email'];
$Department = $_POST['Department'];
$Region = $_POST['Region'];
$Region1 = $_POST['Region1'];

//checking if connection is not created successfully
if($connection->connect_error){
    die('connection failed : '.$connection->connect_error);
}
else
{
  $sql="update Users set ID=$id,FirstName='$FirstName',LastName='$LastName',Email='$Email',Department='$Department',Region='$Region',Region1='$Region1' where ID=$id";
  
  $result=mysqli_query($connection,$sql);
  if ($result) {
    echo '<script>alert("Update Successfull!")</script>';
      echo '<script>window.location.href="new-user.php";</script>';
  } else {
    echo '<script>alert("Not submitted try again!")</script>';
      echo '<script>window.location.href="edit-user.php";</script>';
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
    <title>Edit User</title>
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
<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="#"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">ACTIVITIES</li><!-- /.menu-title -->
                    <li>
                        <a href="new-user.php" style="color:black; font-size: 15px;"> <i class="menu-icon ti-layout-grid3"></i>Create New User </a>
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

               
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="name float-left"><?php echo $_SESSION[
                 "superadmin"
             ]; ?> <?php echo $_SESSION["superadmin"]; ?></span>
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="index.php"><i class="fa fa-power -off"></i>Logout</a>
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
                <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-header"></div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">New user</h3>
                                        </div>
                                        <hr>
                                        <form method="POST" action="">
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1">First Name</label>
                                                <input id="cc-pament" name="FName"  type="text" value="<?php echo $fname?>"  class="form-control" aria-required="true" aria-invalid="false" placeholder="First Name">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Last name</label>
                                                <input id="cc-name" name="LName" type="text" class="form-control cc-name valid" value="<?php echo $lname?>"  data-val="true" placeholder="Last Name"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Email</label>
                                                <input id="cc-name" name="Email" type="text" class="form-control cc-name valid" value="<?php echo $email?>"  data-val="true" placeholder="Email"
                                                    autocomplete="cc-name" radonly aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Department</label>
                                                <div class="form-group has-success">
                                            <select data-placeholder="Choose a Country..." class="standardSelect form-control" name="Department" tabindex="1">
                                            <option value="<?php echo $dpt?>"><?php echo $dpt?></option>
                                                <option value="Executive">Executive</option>
                                                  <option value="HR">HR</option>
                                               <option value="Nats">Nats</option>
                                              <option value="Maton">Maton</option>
                                              <option value="SalesTL">SalesTL</option>
                                               <option value="TechieTL">TechieTL</option>
                                              <option value="Sales">Sales</option>
                                              <option value="Techie">Techie</option>
                                              </select>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Region</label>
                                                <div class="form-group has-success">
                                            <select data-placeholder="Choose a Country..." class="standardSelect form-control" name="Region" tabindex="1">
                                            <option value="<?php echo $reg?>"><?php echo $reg?></option>
                                              <option value="G44">G44</option>
                                             <option value="ZMM">ZMM</option>
                                               <option value="G45S">G45S</option>
                                                  <option value="G45N">G45N</option>
                                              <option value="R&M">R&M</option>
                                             <option value="LSM">LSM</option>
                                              <option value="JCR">JCR</option>
                                               <option value="KWT">KWT</option> 
                                              </select>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Additional Region</label>
                                                <div class="form-group has-success">
                                            <select data-placeholder="Choose a Country..." class="standardSelect form-control" name="Region1" tabindex="1">
                                            <option value="<?php echo $reg1?>"><?php echo $reg1?></option>
                                             <option value="G44">G44</option>
                                            <option value="ZMM">ZMM</option>
                                           <option value="G45S">G45S</option>
                                             <option value="G45N">G45N</option>
                                            <option value="R&M">R&M</option>
                                            <option value="LSM">LSM</option>
                                           <option value="JCR">JCR</option>
                                            <option value="KWT">KWT</option> 
                                              </select>
                                            </div>
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
                           <center> <strong class="card-title">Users</strong></center>
                        </div>
                        <div class="table-responsive">
                                    <table class="table table-striped " id="example">
                                        <thead>
                                            <tr>
                                            <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Department</th>
                    
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
    
    $sql="select * from users order by ID ASC";
    $result=$connection->query($sql);
    while($row=$result->fetch_array()){
      ?>
      <tr>
        <td><?php echo $row['FirstName']?></td>
        <td><?php echo $row['LastName']?></td>
        <td><?php echo $row['Email']?></td>
        <td><?php echo $row['Department']?></td>

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
<script src="../assets/js/main.js"></script>
<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing matches",
            width: "100%"
        });
    });
</script>
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
