<?php
session_start();
if (($_SESSION['login_status']) != 'TRUE') {
    header('Location: login.php');
}
include 'db_con.php';
if (!empty($_GET)) {
    $id = $_GET['id']/359537;
    $query = mysql_query("select * from employee where id='$id'");
    $row = mysql_fetch_array($query);
}
if (!empty($_POST)) {
    $id = $_POST['id'];
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
    $update_by = 1;
    $insert_datetime = date('Y-m-d H:i:s a');
    $update = mysql_query("Update employee set first_name='$first_name',last_name='$last_name',email='$email',phone_no='$phone_no',address='$address',designation='$designation',gender='$gender',"
            . "joining_date='$joining_date',voter_id='$voter_id',user_type='$user_type',update_by='$update_by',"
            . "insert_datetime='$insert_datetime' where id='$id'");
    if ($update) {
        $_SESSION['msg'] = "Employee Update Successfully";
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
                                    <h3 class="box-title">Edit Employee</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form action="" method="POST" id="contact_form">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <div class="box-body">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fname">First Name</label>
                                                <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row['first_name']; ?>" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lname">Last Name</label>
                                                <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $row['last_name']; ?>" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" placeholder="Enter email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone_no">Phone No</label>
                                                <input type="number" class="form-control" id="phone_no" name="phone_no" value="<?php echo $row['phone_no']; ?>" placeholder="Phone No">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>" placeholder="Address">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="designation">Designation</label>
                                                <input type="text" class="form-control" id="designation" name="designation" value="<?php echo $row['designation']; ?>" placeholder="Designation">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender">Gender</label>
                                                <select class="form-control" name="gender" id="gender">
                                                    <option value="">Select Gender</option>
                                                    <option value="Male"<?php if($row['gender']=='Male'){echo "selected";}?>>Male</option>
                                                    <option value="Female" <?php if($row['gender']=='Female'){echo "selected";}?>>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="joining_date">Joining Date</label>
                                                <input type="date" class="form-control" id="joining_date" name="joining_date" value="<?php echo $row['joining_date']; ?>" placeholder="Joining Date">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="voter_id">Voter ID No</label>
                                                <input type="number" class="form-control" id="voter_id" name="voter_id" value="<?php echo $row['voter_id']; ?>" placeholder="Voter ID No">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="user_type">User Type</label>                      
                                                <select class="form-control" id="user_type" name="user_type">
                                                    <option value=""> Select User Type</option>
                                                    <?php
                                                    $query = mysql_query("select * from user_type order by id asc");
                                                    while ($row2 = mysql_fetch_array($query)) {
                                                        ?>
                                                        <option value="<?= $row2['id']; ?>" <?php if ($row['user_type'] == $row2['id']) {
                                                        echo "selected";
                                                    } ?>><?= $row2['type']; ?></option>
<?php } ?>
                                                </select>
                                            </div>
                                        </div>               
                                    </div>
                                    <!-- /.box-body -->

                                    <div class="box-footer">
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-primary" name="save" value="Update">
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
    </body>
</html>
