<?php
session_start();
if (($_SESSION['login_status']) != 'TRUE') {
    header('Location: login.php');
}
include 'db_con.php';
if (!empty($_POST)) {
    $mode = $_POST['mode'];
    $attendance_of = $_POST['attendance_of'];
    $attendance_date = $_POST['attendance_date'];
    $attendance_time = $_POST['attendance_time'];
    $update_by = $_SESSION['id'];
    $insert_datetime = date('Y-m-d H:i:s a');
    if ($mode == 'in') {
        if ($attendance_date <= date('Y-m-d')) {
            $insert = mysql_query("insert into attendance values('','$attendance_of','$attendance_date','$attendance_time','','1','','$update_by','$insert_datetime')");
            if ($insert) {
                $_SESSION['msg'] = "Attendance In Time Added Successfully";
                header('Location: atnd_view_attendance_employee_wise.php?id=' . $attendance_of);
            }
        }else{
            echo "<script>alert('Advance Attendance Not Allowed')</script>";
        }
    } elseif ($mode == 'out') {
        $insert = mysql_query("update attendance set attendance_time_out='$attendance_time',mode_out='1' where attendance_of='$attendance_of' and attendance_date='$attendance_date'");
        $a = mysql_affected_rows();
        if ($a > 0) {
            $_SESSION['msg'] = "Attendance Out Time Added Successfully";
            header('Location: atnd_view_attendance_employee_wise.php?id=' . $attendance_of);
        } else {
            echo "<script>alert('In Record Not Found. Please Entry In Record');</script>";
        }
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
                                    <h3 class="box-title">Add Attendance</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form action="" method="POST" onsubmit="return validateForm()" id="contact_form">
                                    <div class="box-body">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="attendance_of">Attendance For</label>
                                                <select class="form-control" id="attendance_of" name="attendance_of">
                                                    <option value=""> Select Employee Name</option>
                                                    <?php
                                                    $query = mysql_query("select * from employee order by id asc");
                                                    while ($row = mysql_fetch_array($query)) {
                                                        ?>
                                                        <option value="<?= $row['id']; ?>"><?= $row['first_name'] . " " . $row['last_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>                                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="attendance_date">Date Of Attendance</label>
                                                <input type="date" class="form-control" id="attendance_date" name="attendance_date" value="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="attendance_time">Attendance Time</label>
                                                <input type="time" class="form-control" id="attendance_time" name="attendance_time" step="1" value="<?php echo date('H:i:s', strtotime('+4 hour')); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="mode">Mode</label>
                                                <select class="form-control" name="mode" id="mode">
                                                    <option value="">Select Attendance Mode </option>
                                                    <option value="in">IN</option>
                                                    <option value="out">OUT</option>
                                                </select>
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
