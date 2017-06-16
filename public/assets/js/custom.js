$(function () {
    $('.info-box').click(function() {
        //
    });
});


// ajax表单验证失败回调函数
var validateErrorCallback = function (XMLHttpRequest) {
    try {
        var m = JSON.parse(XMLHttpRequest.responseText);
    } catch (e) {
        var m = undefined;
    }

    if (m) {
        for (i in m) {
            for (k in m[i]) {
                alert(m[i][k]);
                break;
            }
            break;
        }
    }
}