<?php
session_start();
if (($_SESSION['login_status']) != 'TRUE') {
    header('Location: login.php');
}
include 'db_con.php';
if (!empty($_GET)) {
    $id = $_GET['id']/359537;
}
$msg = '';
$msg_err = '';
$password = '';
if (!empty($_POST)) {
    $emp_id = $_POST['id'];
    $old_password = $_POST['old_password'];
    $password = $_POST['new_password'];
    $chk_password = mysql_query("select * from employee where id='$emp_id' and password='$old_password'");
    $count_row = mysql_num_rows($chk_password);
    if ($count_row > 0) {
        $update = mysql_query("Update employee set password='$password' where id='$emp_id'");
        if ($update) {
            $msg = "Password Update Successfully";
        }
    } else {
        $msg_err = "<span style='color:red'>Old Password Not Match</span>";
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
                                    <h3 class="box-title">Update Password</h3>
                                </div>
                                <?php if (!empty($msg)) { ?>
                                    <div class="row" style="margin-left:10px;margin-top:10px;">
                                        <div class="col-md-6">
                                            <div class="alert alert-success" role="alert"><strong><?php echo $msg; ?></strong></div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form action="" method="POST" onsubmit="return validateForm()" id="contact_form">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <div class="box-body">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="old_password">Old Password <span><?php if (!empty($msg_err)) {
                                    echo $msg_err;
                                } ?></span></label>
                                                <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter Old Password" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="new_password">New Password</label>
                                                <input type="password" class="form-control" id="new_password" name="new_password" value="<?php echo $password ?>" placeholder="Password" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="conf_new_password">Confirm New Password <span id="not_match"></span></label>
                                                <input type="password" class="form-control" id="conf_new_password" name="conf_new_password" value="<?php echo $password ?>" placeholder="Confirm Password" required>
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
        <script>
            function validateForm() {
                var password = document.getElementById("new_password").value;
                var conf_pass = document.getElementById("conf_new_password").value;
                if (password != conf_pass)
                {
                    document.getElementById("not_match").innerHTML = "<span style='color:red;'><strong>Password Not Match</strong></span>";
                    return false;
                }
                ;

            }
            ;
        </script>
<?php $msg_err = '';$msg=''; ?>
    </body>
</html>
                                                         <option value="">Select Gender</option>
                                                    <option value="male"<?php if($row['gender']=='male'){echo "selected";}?>>Male</option>
                                                    <option value="female" <?php if($row['gender']=='female'){echo "selected";}?>>Female</option>
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
                       