<?php
$connection = mysql_select_db('attendance',mysql_connect('localhost','root','')) or die(mysql_error());
if(!$connection){
    echo "Not connected";
}
?>

