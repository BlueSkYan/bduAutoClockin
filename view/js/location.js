var map = new BMapGL.Map("allmap");
var point = new BMapGL.Point(116.501573, 39.900877);
map.centerAndZoom(point, 16)

// 此处二种方案可选其一，自测方案2更准确，1和2的方案，大致位置来讲都是准的
// 定位对象方案1 : 百度获取经纬度
var geoc = new BMapGL.Geocoder();
var geolocation = new BMapGL.Geolocation();
geolocation.getCurrentPosition(function (r) {
    if (this.getStatus() == BMAP_STATUS_SUCCESS) {
        var mk = new BMapGL.Marker(r.point);
        map.addOverlay(mk);
        map.panTo(r.point);
        // console.log("当前位置经度为:" + r.point.lng + "纬度为:" + r.point.lat);
        setLocation(r.point);
    } else {
        alert('无法定位到您的当前位置！' + this.getStatus());
        // console.log('无法定位到您的当前位置，导航失败，请手动输入您的当前位置！' + this.getStatus());
    }
}, {enableHighAccuracy: true});

// 定位对象方案2：geolocation获取经纬度
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function (pos) {
        <!-- pos 的出参 -->
        <!-- {speed: "-1.000000", longitude: "121.451945", latitude: "31.184739", accuracy: "65.000000", timestamp: "2018-06-27 07:12:33 +0000", …} -->
        var point = new BMapGL.Point(pos.coords.longitude, pos.coords.latitude);
        setLocation(point);
    }, function (err) {
        console.log(err, 'err----')
    })
}

//获取地理位置的函数
function setLocation(point) {
    geoc.getLocation(point, function (rs) {
        var addComp = rs.addressComponents;
        var result = addComp.province + addComp.city+ addComp.district;// + addComp.street + addComp.streetNumber
        //$("#start").val(result);
        //$("#start_location").val(result);
        // alert("当前的位置为:" + result);
        document.getElementById("inputdkdz").value = result;
    });
}


