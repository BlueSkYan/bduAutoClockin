<?php
$dbhost = "localhost";
$dbname = "DakaData";    //数据库名称
$dbuser = "root";        //数据库用户名
$dbpass = "yan224..";    //数据库密码

$conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if ($conn->connect_error){
    die("连接失败: " . $conn->connect_error);
}
//$sql = "insert into information(username,password) value ('111', '222')";
//$conn->query($sql);
//$conn->close();
//echo "success";
?>