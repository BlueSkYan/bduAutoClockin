<?php
if (!(isset($_COOKIE['isLogin']) && $_COOKIE['isLogin'] == 1)) {
    echo '<script>
            alert("请重新登录!");
            location = "../index.html"
        </script>';
}
$stunum = $_COOKIE["username"];
$dkAddress = $_POST["dkdz"];
$xianAddress = $_POST["Addressxian"];
$xiangAddress = $_POST["Addressxiang"];
$changAddress = $_POST["Addresschang"];
$phoneNumber = $_POST["lxdh"];
$isLeave = $_POST["sflx"];
$jinTemp = $_POST["jrtw"];
$brAbnormal = $_POST["yczk"];
$brBody = $_POST["brst"];
$brTouch = $_POST["brjc"];
$jrBody = $_POST["jrst"];
$jrTouch = $_POST["jrjc"];
$ymjiezhong = $_POST["ymjz"];
$remark = $_POST["bz"];
include "conn.php";
//$xiangAddress = $conn->real_escape_string($xiangAddress);
//$changAddress = $conn->real_escape_string($changAddress);
$sql = "insert into usersdata(".
        "stunum,dkaddress,xianaddress,xiangaddress,changaddress,".
        "phonenum,isleave,todtemp,brabnormal,brbody,brtouch,jrbody,".
        "jrtouch,ymjz,bz) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
//if (!$stmt = $conn->prepare($sql)){
//    echo $conn->error;
//}
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssssssssss",$stunum,$dkAddress,
    $xianAddress,$xiangAddress,$changAddress,$phoneNumber,$isLeave,$jinTemp,
    $brAbnormal,$brBody,$brTouch,$jrBody,$jrTouch,$ymjiezhong,$remark);
$stmt->execute();
$stmt->close();
$conn->close();
?>