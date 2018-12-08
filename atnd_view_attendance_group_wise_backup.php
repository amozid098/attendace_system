<?php
session_start();
if (($_SESSION['login_status']) != 'TRUE') {
    header('Location: login.php');
}
include 'db_con.php';
if (!empty($_GET)) {
    if (!empty($_GET['id'])) {
        $delete = mysql_query("Delete from employee where id='$_GET[id]'");
        if ($delete) {
            echo "<script>alert('Delete Successfully');</script>";
        }
    }
}
$msg = '';
if (!empty($_SESSION)) {
    $msg = $_SESSION['msg'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Dashboard</title>
        <?php include 'shared/csslinks.php'; ?>
        <style type="text/css">
            th,td{text-align: center;}
        </style>    
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
                                    <h3 class="box-title">View Total Attendance</h3>
                                </div>
                                <!-- /.box-header -->
                                <?php
                                $condition = " 1=1";
                                $date_from = date('Y-m-01');
                                $date_to = date('Y-m-d');
                                $attendance_of = '';
                                if (!empty($_POST)) {
                                    $date_from = $_POST['date_from'];
                                    $date_to = $_POST['date_to'];
                                    $attendance_of = $_POST['attendance_of'];
                                    if (!empty($_POST['attendance_of'])) {
                                        $condition = $condition . " and attendance_of='$attendance_of'";
                                    }
                                }
                                $date1 = new DateTime($date_from);
                                $date2 = new DateTime($date_to);
                                $tot_day_diff = $date2->diff($date1)->format("%a") + 1;
                                ?>
                                <!-- form start -->
                                <div class="box-body">
                                    <?php if (!empty($msg)) { ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="alert alert-success" role="alert"><?php echo $msg; ?></div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form action="" method="POST" id="contact_form">
                                                <div class="box-body">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="date_from">Date From </label>
                                                            <input type="date" class="form-control" id="date_from" name="date_from" value="<?php echo $date_from;
                                    ?>">
                                                        </div>
                                                    </div>                                        
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="date_to">Date To</label>
                                                            <input type="date" class="form-control" id="date_to" name="date_to" value="<?php echo $date_to;
                                    ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="mode">Employee Name</label>
                                                            <select class="form-control" name="attendance_of" id="attendance_of">
                                                                <option value="">Select Employee Name </option>
                                                                <?php
                                                                $employee = mysql_query("Select * from employee order by id asc");
                                                                while ($get_employee = mysql_fetch_array($employee)) {
                                                                    ?>
                                                                    <option value="<?php echo $get_employee['id']; ?>" <?php
                                                                    if ($attendance_of == $get_employee['id']) {
                                                                        echo "selected";
                                                                    }
                                                                    ?>><?php echo $get_employee['first_name'] . " " . $get_employee['last_name']; ?></option>
                                                                        <?php } ?>                                            
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group" style="margin-top:25px;">                                                            
                                                            <input type="submit" class="btn btn-primary" name="search" value="Search">
                                                        </div>                                                        
                                                    </div>              
                                                </div>

                                            </form>
                                            <div class="table-responsive">
                                                <table class="table table-striped" id="myTable">
                                                    <tr class="info">
                                                        <th>Sl</th>
                                                        <th>Name</th>
                                                        <th>Total Days</th>
                                                        <th>Present</th>
                                                        <th>Absent</th>
                                                        <th>Attendance</th>
                                                        <th>Attendance Bar</th>
                                                        <th>Total Hours</th>
                                                        <th>Total Minutes</th>
                                                        <th>Total Second</th>                                                        
                                                        <th width="12%">Action</th>
                                                    </tr>
                                                    <?php
                                                    $i = 1;
                                                    $sum_total_hours = 0;
                                                    $sum_total_minutes = 0;
                                                    $sum_total_second = 0;
                                                    $query = mysql_query("SELECT 
                                                        *,(SELECT COUNT(attendance_date) FROM employee WHERE id=attendance_of) AS count_day,
                                                        SUM(hours) AS tot_hrs,
                                                        SUM(minutes) AS tot_mins,
                                                        SUM(seconds) AS tot_secs 
                                                      FROM
                                                        (SELECT 
                                                          *,
                                                          HOUR(on_duty) AS hours,
                                                          MINUTE(on_duty) AS minutes,
                                                          SECOND(on_duty) AS seconds 
                                                        FROM
                                                          (SELECT 
                                                            *,
                                                            (SELECT 
                                                              CONCAT(first_name, ' ', last_name) 
                                                            FROM
                                                              employee 
                                                            WHERE id = attendance_of) AS emp_name,
                                                            SUBTIME(
                                                              attendance_time_out,
                                                              attendance_time_in
                                                            ) AS on_duty 
                                                          FROM
                                                            `attendance` WHERE $condition and attendance_date BETWEEN '$date_from' AND '$date_to') AS a) AS b 
                                                      GROUP BY attendance_of ASC");
                                                    $count = mysql_num_rows($query);
                                                    if ($count >= 1) {
                                                        while ($row = mysql_fetch_array($query)) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $row['emp_name']; ?></td>                            
                                                                <td><?php echo $tot_day_diff; ?></td>
                                                                <td><?php echo $present = $row['count_day']; ?></td>
                                                                <td><?php echo $absent = $tot_day_diff - $present; ?></td>
                                                                <?php $attendance = number_format(($present / $tot_day_diff) * 100, 2); ?>
                                                                <td><span class="<?php
                                                                    if ($attendance >= 50) {
                                                                        echo "badge bg-green";
                                                                    } elseif ($attendance < 50) {
                                                                        echo "badge bg-red";
                                                                    }
                                                                    ?>"><?php echo $attendance; ?> %</span></td>
                                                                <td>
                                                                    <div class="progress progress-xs progress-striped active">
                                                                        <div class="<?php
                                                                        if ($attendance >= 50) {
                                                                            echo "progress-bar progress-bar-success";
                                                                        } elseif ($attendance < 50) {
                                                                            echo "progress-bar progress-bar-danger";
                                                                        }
                                                                        ?>" style="width: <?php echo $attendance; ?>%"></div>
                                                                    </div>
                                                                </td> 
                                                                <?php
                                                                //recalculate secs
                                                                $tot_secs = $row['tot_secs'];
                                                                $tot_secs1 = floor($tot_secs / 60);
                                                                $tot_secs2 = ($tot_secs % 60);
                                                                //grand total secs
                                                                $sum_total_second+=$tot_secs2;
                                                                //recalculate mins
                                                                $tot_mins = $row['tot_mins'] + $tot_secs1;
                                                                $tot_mins1 = floor($tot_mins / 60);
                                                                $tot_mins2 = ($tot_mins % 60);
                                                                //grand total mins
                                                                $sum_total_minutes+=$tot_mins;
                                                                //recalculate hrs
                                                                $tot_hrs = $row['tot_hrs'] + $tot_mins1;
                                                                //grand total hrs
                                                                $sum_total_hours+=$tot_hrs;
                                                                ?>
                                                                <td>
                                                                    <?php
                                                                    echo $tot_hrs;
                                                                    ?>
                                                                </td>
                                                                <td><?php
                                                                    echo $tot_mins2;
                                                                    ?></td>
                                                                <td><?php
                                                                    echo $tot_secs2;
                                                                    ?></td>                                                                
                                                                <td width="12%">
                                                                    <a href="atnd_view_attendance_employee_wise.php?id=<?php echo $row['attendance_of']; ?>" class="btn btn-sm btn-info"/>View Details</a>                                                                    
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            $i++;
                                                        }
                                                        //recalculate grand total
                                                        $sum_total_second1 = floor($sum_total_second / 60);
                                                        $sum_total_second2 = ($sum_total_second % 60);
                                                        $sum_total_minutes = $sum_total_minutes + $sum_total_second1;
                                                        $sum_total_minutes1 = floor($sum_total_minutes / 60);
                                                        $sum_total_minutes2 = ($sum_total_minutes % 60);
                                                        $sum_total_hours2 = $sum_total_hours + $sum_total_minutes1;

                                                        echo"<tr class='info'>
                                                        <th colspan='7'>Grand Total</th>                                                        
                                                        <th>{$sum_total_hours2}Testing{$sum_total_minutes1}</th>
                                                        <th>{$sum_total_minutes2}</th>
                                                        <th>{$sum_total_second2}</th>                                                        
                                                        <th width='12%'></th>
                                                    </tr>";
                                                    } else
                                                        echo "<tr><td colspan='12'><span style='color:red;'><strong>Data not found</stron></span></td></tr>";
                                                    ?>                                                
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
            $(document).ready(function () {
                $('#myTable').DataTable();
            })
        </script>
    </body>
    <?php $_SESSION['msg'] = ''; ?>
</html>
