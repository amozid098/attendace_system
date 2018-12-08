<?php
session_start();
if (($_SESSION['login_status']) != 'TRUE') {
    header('Location: login.php');
}
include 'db_con.php';
if(!empty($_GET)){
    $id = $_GET['id']/159137;
    $query = mysql_query("SELECT e.*,ut.type FROM employee AS e LEFT JOIN user_type AS ut ON e.user_type=ut.id where e.id='$id'");
    $row = mysql_fetch_array($query);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Dashboard</title>
        <?php include 'shared/csslinks.php'; ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <?php include "shared/header.php"; ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php include "shared/navbar.php"; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">View Employee Details</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form action="" method="POST" onsubmit="return validateForm()" id="contact_form">
                                    <div class="box-body">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fname">First Name</label>
                                                <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row['first_name']?>" placeholder="First Name" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lname">Last Name</label>
                                                <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $row['last_name']?>" placeholder="Last Name" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']?>" placeholder="Enter email" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone_no">Phone No</label>
                                                <input type="number" class="form-control" id="phone_no" name="phone_no" value="<?php echo $row['phone_no']?>" placeholder="Phone No" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']?>" placeholder="Address"  readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="designation">Designation</label>
                                                <input type="text" class="form-control" id="designation" name="designation" value="<?php echo $row['designation']?>" placeholder="Designation" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="designation">Gender</label>
                                            <input type="text" class="form-control" id="designation" name="designation" value="<?php echo $row['gender']?>" placeholder="Designation" readonly>
                                        </div> 
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="joining_date">Joining Date</label>
                                                <input type="date" class="form-control" id="joining_date" name="joining_date" value="<?php echo $row['joining_date']?>" placeholder="Joining Date" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="voter_id">Voter ID No</label>
                                                <input type="number" class="form-control" id="voter_id" name="voter_id" value="<?php echo $row['voter_id']?>" placeholder="Voter ID No" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="user_type">User Type</label>                      
                                                <input type="text" class="form-control" id="designation" name="designation" value="<?php echo $row['type']?>" placeholder="Designation" readonly>
                                            </div>
                                        </div>              
                                    </div>                                    
                                </form>
                            </div>
                            <!-- /.box -->

                        </div>
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <?php include "shared/footer.php"; ?>
        </div>
        <!-- ./wrapper -->

        <?php include 'shared/jslinks.php' ?>
        <script>
            function validateForm() {
                var password = document.getElementById("password").value;
                var conf_pass = document.getElementById("conf_pass").value;
                if (password != conf_pass)
                {
                    document.getElementById("not_match").innerHTML = "<span style='color:red;'><strong>Password Not Match</strong></span>";
                    return false;
                }
                ;

            }
            ;
        </script>
    </body>
</html>
                                                                                                                                                                                                                                       }
                ;

            }
            ;
        </script>
    </body>
</html>
                                                                                                                                                                                                                                                                                                                                                                                                                           </body>
</html>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                var conf_pass = document.getElementById("conf_pass").value;
                if (password != conf_pass)
                {
                    document.getElementById("not_match").innerHTML = "<span style='color:red;'><strong>Password Not Match</strong></span>";
                    return false;
                }
                ;

            }
            ;
        </script>
    </body>
</html>
                                                                                                                   <div class="chart" id="mmr2" style="height: 280px; position: relative;" ></div>

                                    <script type="text/javascript">
                                        google.charts.load('current', {'packages': ['corechart']});
                                        google.charts.setOnLoadCallback(drawChart);

                                        function drawChart() {
                                            var data = google.visualization.arrayToDataTable([
                                                ['Year', 'Values', {role: 'annotation'}],
                                                
                                                 <?php 
                                        $graph1=mysql_query("SELECT COUNT(attendance_of) AS counter,MONTHNAME(STR_TO_DATE(attend_month, '%m')) AS month_name,attend_year FROM (SELECT *,SUBSTR(attendance_date,6,2) AS attend_month,SUBSTR(attendance_date,1,4) AS attend_year FROM attendance) AS a GROUP B