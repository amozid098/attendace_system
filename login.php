<?php
session_start();
include "db_con.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>IUG/Admin | Log in</title>
        <?php
        include 'shared/csslinks.php';
        $msg='';
        if (!empty($_POST)) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $valid = mysql_query("SELECT e.*,ut.type FROM employee AS e LEFT JOIN user_type AS ut ON e.user_type=ut.id where email='$email' and password='$password'");
            $count = mysql_num_rows($valid);
            $row = mysql_fetch_array($valid);
            if ($count > 0) {
                $_SESSION['name'] = $row['first_name'] . " " . $row['last_name'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['designation'] = $row['designation'];
                $_SESSION['joining_date'] = $row['joining_date'];
                $_SESSION['user_type'] = $row['type'];
                $_SESSION['login_status'] = TRUE;
                $_SESSION['msg']='';
                header('Location: index.php');
            }else{
                $msg="Wrong Username Password";
            }
        }
        ?>
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">         
                <a href="index.php">Admin Panel</a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to login</p>
                <?php if(!empty($msg)){?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="alert alert-danger" role="alert"><b><?php echo $msg;?></b></div>
                    </div>
                </div>
                <?php } ?>
                <form action="login.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group has-feedback">
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 col-xs-offset-8">
                            <input type="submit" name="submit" value="Sign In" class="btn btn-primary btn-block btn-flat">
                        </div><!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center">         
                    <a href="http://iugbd.org/" class="btn btn-block btn-social btn-google btn-flat">
                        &copy;  Atish Dipankar
                    </a>
                </div><!-- /.social-auth-links -->


            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <?php include 'shared/jslinks.php'; ?>
        
    </body>
</html>
