<?php
session_start();
if (($_SESSION['login_status']) != 'TRUE') {
    header('Location: login.php');
}
include 'db_con.php';
if (!empty($_GET)) {
    if (!empty($_GET['id'])) {
        $id = $_GET['id'] / 359537;
        $delete = mysql_query("Delete from employee where id='$id'");
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
                                    <h3 class="box-title">View Employees</h3>
                                </div>
                                <!-- /.box-header -->
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
                                            <?php
                                            $condition = " Where 1=1";
                                            $gender = '';
                                            $user_type = '';
                                            $keyword = '';
                                            $order_by = '';
                                            $order_type = '';
                                            if (!empty($_POST)) {
                                                if (!empty($_POST['gender'])) {
                                                    $gender = $_POST['gender'];
                                                    $condition.= " and gender='$_POST[gender]'";
                                                }
                                                if (!empty($_POST['user_type'])) {
                                                    $user_type = $_POST['user_type'];
                                                    $condition.= " and user_type='$_POST[user_type]]'";
                                                }
                                                if (!empty($_POST['keyword'])) {
                                                    $keyword = $_POST['keyword'];
                                                    $condition.= " and (first_name like '%$_POST[keyword]%' or last_name='%$_POST[keyword]%' or email like '%$_POST[keyword]%' or phone_no like '%$_POST[keyword]%' or address like '%$_POST[keyword]%' or designation like '%$_POST[keyword]%' or joining_date like '%$_POST[keyword]%' or voter_id like '%$_POST[keyword]%')";
                                                }
                                                if (!empty($_POST['order_by'])) {
                                                    $order_by = $_POST['order_by'];
                                                    $order_type = $_POST['order_type'];
                                                    ;
                                                    $condition.= " order by $_POST[order_by] $_POST[order_type]";
                                                }
                                            }
                                            ?>
                                            <form action="" method="POST" id="contact_form">
                                                <div class="box-body">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="gender">Gender</label>
                                                            <select class="form-control" name="gender" id="gender">
                                                                <option value="">Select Gender </option>
                                                                <option value="Male"<?php
                                                                if ($gender == 'Male') {
                                                                    echo "selected";
                                                                }
                                                                ?>>Male</option>
                                                                <option value="Female"<?php
                                                                if ($gender == 'Female') {
                                                                    echo "selected";
                                                                }
                                                                ?>>Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="user_type">User Type</label>
                                                            <select class="form-control" name="user_type" id="user_type">
                                                                <option value="">Select Employee Name </option>
                                                                <?php
                                                                $employee = mysql_query("Select * from user_type order by id asc");
                                                                while ($get_employee = mysql_fetch_array($employee)) {
                                                                    ?>
                                                                    <option value="<?php echo $get_employee['id']; ?>" <?php
                                                                            if ($get_employee['id'] == $user_type) {
                                                                                echo "Selected";
                                                                            }
                                                                            ?>><?php echo $get_employee['type']; ?></option>
<?php } ?>                                            
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="keyword">Other Searching Keyword</label>
                                                            <input type="text" name="keyword" class="form-control" value="<?php
if (!empty($keyword)) {
    echo $keyword;
}
?>"placeholder="Enter Keyword"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="order_by">Order By</label>
                                                            <select class="form-control" name="order_by" id="order_by">
                                                                <option value="">Select Field Name </option>
                                                                <?php
                                                                $employee = mysql_query("SELECT `COLUMN_NAME` 
                                                                    FROM `INFORMATION_SCHEMA`.`COLUMNS` 
                                                                    WHERE `TABLE_SCHEMA`='attendance' 
                                                                        AND `TABLE_NAME`='employee' AND COLUMN_NAME !='password'
                                                                    ");
                                                                while ($get_employee = mysql_fetch_array($employee)) {
                                                                    ?>
                                                                    <option value="<?php echo $get_employee['COLUMN_NAME']; ?>" <?php
                                                                        if ($get_employee['COLUMN_NAME'] == $order_by) {
                                                                            echo "selected";
                                                                        }
                                                                        ?>><?php echo $get_employee['COLUMN_NAME']; ?></option>
<?php } ?>                                            
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="order_type">Order Type</label>
                                                            <select class="form-control" name="order_type" id="order_type">
                                                                <option value="ASC"<?php
                                                                    if ($order_type == "ASC") {
                                                                        echo "Selected";
                                                                    }
                                                                    ?>>Ascending</option>
                                                                <option value="DESC" <?php
                                                                if ($order_type == "DESC") {
                                                                    echo "Selected";
                                                                }
                                                                ?>>Descending</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
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
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Address</th>
                                                        <th>Gender</th>
                                                        <th>Designation</th>
                                                        <th>Date of Joining</th>
                                                        <th>Voter ID</th>
                                                        <th>User Type</th>
                                                        <th>Update By</th>
                                                        <th>Update Datetime</th>
                                                    <?php if ($_SESSION['user_type'] == 'Admin User') { ?>
                                                            <th width="12%">Action</th>
                                                    <?php } ?>
                                                    </tr>
                                                    <?php
                                                    $i = 1;
                                                    $query = mysql_query("SELECT *,(SELECT TYPE FROM user_type WHERE id=user_type) AS usertype,(SELECT CONCAT(first_name,' ',last_name) FROM employee AS emp WHERE emp.`id`=employee.`update_by`) AS update_by_name FROM employee $condition");
                                                    $count = mysql_num_rows($query);
                                                    if ($count >= 1) {
                                                        while ($row = mysql_fetch_array($query)) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $i; ?></td>
                                                                <td><?php echo $row['first_name'] . " " . $row['last_name']; ?></td>                            
                                                                <td><?php echo $row['email']; ?></td>
                                                                <td><?php echo $row['phone_no']; ?></td>
                                                                <td><?php echo $row['address']; ?></td>
                                                                <td><?php echo $row['gender']; ?></td>
                                                                <td><?php echo $row['designation']; ?></td>
                                                                <td><?php echo $row['joining_date']; ?></td>
                                                                <td><?php echo $row['voter_id']; ?></td>
                                                                <td><?php echo $row['usertype']; ?></td>
                                                                <td><?php echo $row['update_by_name']; ?></td>
                                                                <td><?php echo $row['insert_datetime']; ?></td>
                                                            <?php if ($_SESSION['user_type'] == 'Admin User') { ?>
                                                                    <td width="12%">
                                                                        <a href="emp_edit_employee.php?id=<?php echo $row['id'] * 359537; ?>" class="btn btn-sm btn-info"/>Edit</a>
                                                                        <a href="emp_view_employee.php?id=<?php echo $row['id'] * 359537; ?>" class="btn btn-sm btn-danger"/>Delete</a>
                                                                    </td>
        <?php } ?>
                                                            </tr>
        <?php
        $i++;
    }
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
