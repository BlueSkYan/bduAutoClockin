<?php
$user = $_POST['stunum'];
$pass = $_POST['password'];
$confirm = $_POST['confirm'];

if (strlen($user)!=10||!is_numeric($user)){
    echo "<script type='text/javascript'>alert('用户名必须为10位学号！'); location='../register.html';</script>";
} elseif (strlen($pass)>6||!is_numeric($pass)){
    echo "<script type='text/javascript'>alert('密码为身份证后六位与学工平台一值！'); location='../register.html';</script>";
} elseif ($pass != $confirm){
    echo "<script type='text/javascript'>alert('两次密码不一致！'); location='../register.html';</script>";
} else {
    $pwd = md5($pass);
    include "conn.php";
    $user = $conn->real_escape_string($user);
    $pass = $conn->real_escape_string($pass);
    $sql1 = "select username from users where username=?";
    $stmt = $conn->prepare($sql1);;
    $stmt->bind_param("s",$user);
    $stmt->execute();
    if ($stmt->fetch()>0) {
        echo "<script type='text/javascript'>alert('用户名已存在！'); location='../register.html';</script>";
    }else{
        $sql2 = "insert into users(username,password) values (?,?)";
        $stmt = $conn->prepare($sql2);
        $stmt->bind_param("ss",$user,$pwd);
        $stmt->execute();
        echo "<script type='text/javascript'>alert('注册成功！'); location='../index.html';</script>";
    }
}
$stmt->close();
$conn->close();
?>