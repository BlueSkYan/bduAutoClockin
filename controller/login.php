<?php
$user = $_POST['stunum'];
$pass = $_POST['password'];
include "conn.php";
$sql = "select password from users where username = ? ";
$sql1 = "select username from users where username = ?";
$stmt1 = $conn->prepare($sql1);
$stmt1->bind_param("s",$user);
$stmt1->execute();
$stmt1->store_result();
if ($stmt1->num_rows==0){
    echo "<script type='text/javascript'>alert('账号不存在，请先注册！'); location='../register.html';</script>";
    $stmt1->close();
}else{
    $stmt2 = $conn->prepare($sql);
    $stmt2->bind_param("s",$user);
    $stmt2->execute();
    $stmt2->bind_result($result);
    while ($stmt2->fetch()){
        $pwd = $result;
    }
    if ($result==md5($pass)){
        $time = time()+60*60;
        setcookie("username", $user, $time, "/");
        setcookie("isLogin", 1, $time, "/");
        header("location:../view/infoform.php");
        $stmt2->close();
//        echo "<script type='text/javascript'>alert('登陆成功！'); location='../index.html';</script>";
    }else{
        echo "<script type='text/javascript'>alert('密码或账号不正确！'); location='../index.html';</script>";
    }
}
$conn->close();
?>

