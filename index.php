<?php
session_start();
if (($_SESSION['login_status']) != 'TRUE') {
    header('Location: login.php');
}
include "db_con.php";
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
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        $today = date('Y-m-d');
                                        $query = mysql_query("SELECT COUNT(id) as counter FROM employee");
                                        $row = mysql_fetch_array($query);
                                        echo $total_employee = $row['counter'];
                                        ?>
                                    </h3>

                                    <p>Total Employee</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios-people"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        $presents = mysql_query("SELECT COUNT(DISTINCT(attendance_of)) AS counter FROM attendance WHERE attendance_date='$today'");
                                        $get_presents = mysql_fetch_array($presents);
                                        echo $present_employee = $get_presents['counter'];
                                        ?>
                                    </h3>

                                    <p>Today's Present Employee</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-happy"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3><?php echo $total_employee - $present_employee; ?></h3>

                                    <p>Today's Absent Employee</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-sad"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3><?php echo number_format((($present_employee / $total_employee) * 100), 2) ?><sup style="font-size: 20px">%</sup></h3>

                                    <p>Percentage of employee present</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <!-- LINE CHART -->
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Attendance Trend of Last 6 days</h3>
                                    <div class="box-tools pull-right">

                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body chart-responsive">
                                    <div class="chart" id="mmr" style="height: 280px; position: relative;" ></div>
                                    <script language="JavaScript">
                                        function drawChart() {
                                            // Define the chart to be drawn.
                                            var data = google.visualization.arrayToDataTable([
                                                ['data1', 'Values', {role: 'annotation'}],
<?php
$graph1 = mysql_query("SELECT * FROM (SELECT SUBSTR(attendance_date,9,2) AS attend_date,COUNT(attendance_of) AS counter FROM attendance GROUP BY attendance_date ORDER BY attendance_date DESC LIMIT 0,6) AS a ORDER BY attend_date ASC");
while ($res_graph1 = mysql_fetch_array($graph1)) {
    $date = $res_graph1['attend_date'];
    $value = $res_graph1['counter'];
    echo"['{$date}', {$value}, {$value}],";
}
?>
                                            ]);

                                            // Set chart options
                                            var options = {
                                                title: "",
                                                //vAxis: {title: 'data1'},
                                                //hAxis: {title: 'Person'},
                                                seriesType: 'bars',
                                                //colors: ['#2E8A8A'],
                                                legend: {'position': 'none'},
                                                //hAxis: {title: 'Source: Attendace System of AUST'},
                                                chartArea: {top: 20, left: 25, height: '75%', width: '90%'},
                                                series: {1: {type: 'line'}},
                                                backgroundColor: {
                                                    stroke: '#64D8D8',
                                                    strokeWidth: 0
                                                }
                                            };

                                            // Instantiate and draw the chart.
                                            var chart = new google.visualization.ComboChart(document.getElementById('mmr'));
                                            chart.draw(data, options);
                                        }
                                        google.charts.setOnLoadCallback(drawChart);
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <!-- LINE CHART -->
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Attendance Trend Of Last 6 months</h3>
                                    <div class="box-tools pull-right">

                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="box-body chart-responsive">
                                    <div class="chart" id="mmr2" style="height: 280px; position: relative;" ></div>

                                    <script type="text/javascript">
                                        google.charts.load('current', {'packages': ['corechart']});
                                        google.charts.setOnLoadCallback(drawChart);

                                        function drawChart() {
                                            var data = google.visualization.arrayToDataTable([
                                                ['Year', 'Values', {role: 'annotation'}],
<?php
$graph1 = mysql_query("SELECT * FROM(SELECT 
    COUNT(DISTINCT(attendance_of)) AS counter,
    MONTHNAME(STR_TO_DATE(attend_month, '%m')) AS month_name,
    attend_year 
  FROM
    (SELECT 
      *,
      SUBSTR(attendance_date, 6, 2) AS attend_month,
      SUBSTR(attendance_date, 1, 4) AS attend_year 
    FROM
      attendance) AS a 
  GROUP BY attend_month,attend_year 
  ORDER BY attend_year DESC LIMIT 0,6) AS a ORDER BY month_name,attend_year ASC");
while ($res_graph1 = mysql_fetch_array($graph1)) {
    $month = $res_graph1['month_name'];
    $value = $res_graph1['counter'];
    echo"['{$month}', {$value}, {$value}],";
}
?>
                                            ]);

                                            var options = {
                                                title: 'Attendance trend of last 6 months',
                                                legend: {'position': 'none'},
                                                pointsVisible: true,
                                                //hAxis: {title: 'Source: Attendace System of AUST'},
                                                chartArea: {top: 5, left: 35, height: '80%', width: '95%'}
                                            };

                                            var chart = new google.visualization.LineChart(document.getElementById('mmr2'));

                                            chart.draw(data, options);
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <?php include "shared/footer_index.php"; ?>
        </div>
        <!-- ./wrapper -->

        <?php include 'shared/jslinks.php' ?>
    </body>
</html>
