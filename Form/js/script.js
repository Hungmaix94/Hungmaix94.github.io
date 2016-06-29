/**
 * Created by I_am_Po on 6/28/2016.
 */

function GetURLParameter(sParam) {
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) {
            return decodeURIComponent(sParameterName[1]);
        }
    }

}

function rePlace(str){
    str.indexOf('+');
    var substring=str.replace("+"," ");
    return substring;
}

window.onload = function () {

    document.getElementById('result').innerHTML +="<div>Họ tên: "+ rePlace(GetURLParameter('Hoten'))+"</div>";
    document.getElementById('result').innerHTML +="<div>Ngàysinh: "+rePlace(GetURLParameter('date'))+"</div>";
    document.getElementById('result').innerHTML +="<div>Tháng: "+rePlace(GetURLParameter('month'))+"</div>";
    document.getElementById('result').innerHTML +="<div>Năm: "+GetURLParameter('year')+"</div>";
    document.getElementById('result').style.textAlign = "center";
}