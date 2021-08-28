<?php
// 判断是否是登录的，如果登录的，我们才可以通过 假如有这个变量$_COOKIE['isLogin'] = 1就是登录了

if (!(isset($_COOKIE['isLogin']) && $_COOKIE['isLogin'] == 1)) {
    echo '<script>
            alert("请重新登录!");
            location = "../index.html"
        </script>';
}
//else {
//    header("location:../view/infoform.html");
//}
//echo "你好{$_COOKIE['username']}";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>信息填写</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="js/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript"
            src="https://api.map.baidu.com/api?v=1.0&&type=webgl&ak=yhwOx4b8viLOG4fREubeKvf0N1qXoXSI"></script>

</head>
<body style="background: #F1F1F1">
<div id="allmap"></div>
<div class="container">
    <div class="jumbotron rounded-0" style="margin-top: 20px; background: #FFFFFF;">
        <h3 class="text-center text-primary">填写打卡信息</h3>
        <form action="../controller/infocontrol.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">打卡地址</label>
                    <input type="text" class="form-control" name="dkdz" id="inputdkdz" readonly required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">现居住地址</label>
                    <input type="text" class="form-control" name="Addressxian" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">详细地址</label>
                <input type="text" class="form-control" name="Addressxiang" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="inputAddress2">常住地址</label>
                <input type="text" class="form-control" name="Addresschang" placeholder="" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputCity">联系电话</label>
                    <input type="tel" class="form-control" name="lxdh" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">是否离校</label>
                    <select name="sflx" class="form-control" required>
                        <option style="display:none;" value="" selected>请选择</option>
                        <option value="1">是</option>
                        <option value="0">否</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">本人今日体温</label>
                    <select name="jrtw" class="form-control" required>
                        <option style="display:none;" value="" selected>请选择</option>
                        <option>[35.0~37.2]正常</option>
                        <option>[37.3~38.0]低热</option>
                        <option>[38.1~39.0]中热</option>
                        <option>[39.1~41.0]高热</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputState">本人异常状况</label>
                    <select name="yczk" class="form-control" required>
                        <option style="display:none;" value="" selected>请选择</option>
                        <option>无症状</option>
                        <option>发热</option>
                        <option>咳嗽</option>
                        <option>乏力</option>
                        <option>咽痛/呼吸困难/胸闷</option>
                        <option>以上症状出现两项或以上</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">本人身体状况</label>
                    <select name="brst" class="form-control" required>
                        <option style="display:none;" value="" selected>请选择</option>
                        <option>身体健康、无异常</option>
                        <option>确诊新冠肺炎、治疗中</option>
                        <option>确诊新冠肺炎、已治愈</option>
                        <option>疑似新冠肺炎</option>
                        <option>疑似新冠肺炎、已解除</option>
                        <option>集中医学隔离</option>
                        <option>居家医学隔离</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">本人接触传染源</label>
                    <select name="brjc" class="form-control" required>
                        <option style="display:none;" value="" selected>请选择</option>
                        <option>未接触传染源</option>
                        <option>到过中高危地区</option>
                        <option>回到中高危地区</option>
                        <option>接待过中高危地区亲朋好友</option>
                        <option>接触过确诊、疑似或无症状新冠肺炎患者</option>
                        <option>参与过旅游/聚会、参与人确诊新冠肺炎</option>
                        <option>居住或去过封闭区、封控区、防控区内</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputState">家人身体状况</label>
                    <select name="jrst" class="form-control" required>
                        <option style="display:none;" value="" selected>请选择</option>
                        <option>身体健康、无异常</option>
                        <option>确诊新冠肺炎、治疗中</option>
                        <option>确诊新冠肺炎、已治愈</option>
                        <option>疑似新冠肺炎</option>
                        <option>疑似新冠肺炎、已解除</option>
                        <option>集中医学隔离</option>
                        <option>居家医学隔离</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">家人接触传染源</label>
                    <select name="jrjc" class="form-control" required>
                        <option style="display:none;" value="" selected>请选择</option>
                        <option>未接触传染源</option>
                        <option>到过中高危地区</option>
                        <option>回到中高危地区</option>
                        <option>接待过中高危地区亲朋好友</option>
                        <option>接触过确诊、疑似或无症状新冠肺炎患者</option>
                        <option>参与过旅游/聚会、参与人确诊新冠肺炎</option>
                        <option>居住或去过封闭区、封控区、防控区内</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">疫苗接种</label>
                    <select name="ymjz" class="form-control" required>
                        <option style="display:none;" value="" selected>请选择</option>
                        <option>未接种</option>
                        <option>已接种未完成</option>
                        <option>已接种已完成</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">备注</label>
                <textarea class="form-control" name="bz" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">提交</button>
        </form>
    </div>
</div>
<script src="js/location.js" type="text/javascript"></script>
<!--<script type="text/javascript">-->
<!--    function submit() {-->
<!--        $.ajax({-->
<!--            //几个参数需要注意一下-->
<!--            type: "POST",//方法类型-->
<!--            // dataType: "json",//预期服务器返回的数据类型-->
<!--            url: "../controller/infocontrol.php",//url-->
<!--            data: $('myform').serialize(),-->
<!--            success: function (result) {-->
<!--                console.log(result);//打印服务端返回的数据(调试用)-->
<!--                if (result.resultCode == 200) {-->
<!--                    alert("SUCCESS");-->
<!--                }-->
<!--                ;-->
<!--            },-->
<!--            error: function () {-->
<!--                alert("异常！");-->
<!--            }-->
<!--        });-->
<!--    }-->
<!--</script>-->
</body>
</html>
