<?php
// 判断是否是登录的，如果登录的，我们才可以通过 假如有这个变量$_COOKIE['isLogin'] = 1就是登录了
echo $_COOKIE['username'];
//if(!(isset($_COOKIE['isLogin']) && $_COOKIE['isLogin'] == 1)){
//    echo '<script>
//            alert("你还没有登录，请登录!");
//            location = "../index.html"
//        </script>';
//}
//echo "你好{$_COOKIE['username']}";
?>