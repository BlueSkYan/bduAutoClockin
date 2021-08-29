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
$sql1 = "select stunum from usersdata where stunum=?";

$sql2 = "update usersdata
    set dkaddress=?,xianaddress=?,xiangaddress=?,
    changaddress=?,phonenum=?,isleave=?,todtemp=?,
    brabnormal=?,brbody=?,brtouch=?,jrbody=?,jrtouch=?,ymjz=?,bz=? where stunum=?";
//echo $sql2;
$sql = "insert into usersdata(" .
    "stunum,dkaddress,xianaddress,xiangaddress,changaddress," .
    "phonenum,isleave,todtemp,brabnormal,brbody,brtouch,jrbody," .
    "jrtouch,ymjz,bz) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
//if (!$stmt = $conn->prepare($sql) || !$stmt1 = $conn->prepare($sql1) || !$stmt2=$conn->prepare($sql2)) {
//    echo $conn->error;
//}
$stmt1 = $conn->prepare($sql1);
$stmt1->bind_param("s", $stunum);
$stmt1->execute();
$stmt1->store_result();
if ($stmt1->num_rows > 0) {
    $conn->query($sql2);
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("sssssssssssssss", $dkAddress, $xianAddress,
        $xiangAddress, $changAddress, $phoneNumber, $isLeave, $jinTemp, $brAbnormal,
        $brBody, $brTouch, $jrBody, $jrTouch, $ymjiezhong, $remark, $stunum);
    $stmt2->execute();
    $stmt2->close();
} else {
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssssss", $stunum, $dkAddress,
        $xianAddress, $xiangAddress, $changAddress, $phoneNumber, $isLeave, $jinTemp,
        $brAbnormal, $brBody, $brTouch, $jrBody, $jrTouch, $ymjiezhong, $remark);
    $stmt->execute();
}
$stmt1->close();
$stmt->close();
$conn->close();
?>