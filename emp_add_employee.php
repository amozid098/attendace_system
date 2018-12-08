<?php
session_start();
if (($_SESSION['login_status']) != 'TRUE') {
    header('Location: login.php');
}
include 'db_con.php';
if (!empty($_POST)) {
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    $address = $_POST['address'];
    $designation = $_POST['designation'];
    $gender = $_POST['gender'];
    $joining_date = $_POST['joining_date'];
    $voter_id = $_POST['voter_id'];
    $user_type = $_POST['user_type'];
    $password = $_POST['password'];
    $update_by = $_SESSION['id'];
    $insert_datetime = date('Y-m-d H:i:s a');
    $insert = mysql_query("insert into employee values('','$first_name','$last_name','$email','$phone_no','$address','$designation','$gender','$joining_date','$voter_id','$user_type','$password','$update_by','$insert_datetime')");
    if ($insert) {
        $_SESSION['msg'] = "Employee Added Successfully";
        header('Location: emp_view_employee.php');
    }
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
                                    <h3 class="box-title">Add Employee</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form action="" method="POST" onsubmit="return validateForm()" id="contact_form">
                                    <div class="box-body">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fname">First Name</label>
                                                <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lname">Last Name</label>
                                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone_no">Phone No</label>
                                                <input type="number" class="form-control" id="phone_no" name="phone_no" placeholder="Phone No" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="designation">Designation</label>
                                                <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender">Gender</label>
                                                <select class="form-control" name="gender" id="gender">
                                                    <option value="">Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="joining_date">Joining Date</label>
                                                <input type="date" class="form-control" id="joining_date" name="joining_date" placeholder="Joining Date">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="voter_id">Voter ID No</label>
                                                <input type="number" class="form-control" id="voter_id" name="voter_id" placeholder="Voter ID No" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="user_type">User Type</label>                      
                                                <select class="form-control" id="user_type" name="user_type">
                                                    <option value=""> Select User Type</option>
                                                    <?php
                                                    $query = mysql_query("select * from user_type order by id asc");
                                                    while ($row = mysql_fetch_array($query)) {
                                                        ?>
                                                        <option value="<?= $row['id']; ?>"><?= $row['type']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="conf_pass">Confirm Password <span id="not_match"></span></label>
                                                <input type="password" class="form-control" id="conf_pass" name="conf_pass" placeholder="Confirm Password" required>
                                            </div>
                                        </div>                
                                    </div>
                                    <!-- /.box-body -->

                                    <div class="box-footer">
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-primary" name="save" value="Submit">
                                            <input type="reset" class="btn btn-danger" value="Clear">
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
