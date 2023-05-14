<!DOCTYPE html>
<html manifest="./manifest.php">
<head>
<title>Vietnamese Dictionary</title>
<meta http-equiv=Content-Type CONTENT="text/html; charset=UTF-8">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="viewport" content="width=device-width; height=device-height; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;">
<meta name="apple-touch-fullscreen" content="YES">
<script type=text/javascript>
window.addEventListener('load',function(){setTimeout(scrollTo,0,0,1);},false);
</script>
<script type=text/javascript><? include("./ajax.js"); ?></script>
<style><? include("./index.css"); ?></style>
<script type="text/javascript">
function E(e) { return document.getElementById(e); }
function cxapelo(v)
{
 v = v.replace("ŭx","ŭ").replace("Ŭx","Ŭ").replace("w","ŭ").replace("W","Ŭ");
 return v;
}

var first = 1;
function click_vorto(v)
{
 if (v == "") return;

if (false) {
 try {
   var r = localStorage[v];
   if (r != null) {
     E("rezulto").innerHTML = "CV:" + r;
     return;
   }
 } catch (e) {
   /* alert("a:"+e); */
 }
}


 E("rezulto").innerHTML = "<br>Searching...";

 call_ajax_text_post("../ekma/tiru-enhavon-2.php", "vorto=" + encodeURI(v),
  function(r) {
    E("rezulto").innerHTML = r;
    try { localStorage[v] = r; } catch (e) { /* alert("b:"+e); */ }
  }
 );
 first = 1;
}

function klaku_vorto(v)
{
 if (v == "") return;

if (false) {
 try {
   var r = localStorage[v];
   if (r != null) {
     E("rezulto").innerHTML = "KV:" + r;
     return;
   }
 } catch (e) {
   /* alert("a:"+e); */
 }
}

 E("rezulto").innerHTML = "<br>Searching...";

 call_ajax_text_post("./tiru-enhavon.php", "vorto=" + encodeURI(v),
  function(r) {
    E("rezulto").innerHTML = r;
    try { localStorage[v] = r; } catch (e) { /* alert("b:" + e); */ }
  }
 );
 first = 1;
}

function chapeligo()
{
 var X = "ĉĝĥĵŝŭĈĜĤĴŜŬ";
 var v = E("vorto").value;
 if (v.length == 0) {

 } else if (v.charCodeAt(0) < 127 || X.indexOf(v.substring(0, 1), 0) >= 0) {
  v = cxapelo(E("vorto").value);
  E("vorto").value = v;
 }
}

window.onload = function()
{
 E("vorto").onkeyup = function(e) {
  // chapeligo();
  var code = '0';
  if (window.event) code = window.event.keyCode;
  else if (e) code = e.which;
  if (code == 13) {
   klaku_vorto(E("vorto").value);
  }
 }

 E("vorto").onclick = function() {
  if (first) {
   E("vorto").select();
   first = 0;
  }
 }

 E("Serchu").onclick = function() {
  // chapeligo();
  klaku_vorto(E("vorto").value);
  first = 1;
 }
}
</script>

<body>

<div class=banner>
<table class=tb>
 <tr><td class=tbC>베트남어사전</td></tr>
</table>
</div>

<div class=moveable>

<table class=frm>
 <tr>
  <td class=tdTitle><nobr>Viet-Kor:</nobr></td>
  <td>
   <input type=text id=vorto class=input autocomplete=off>
  </td>
  <td class=tdButton align=right><img id=Serchu src="./iui/Search.png" width=58 height=30></td>
 </tr>
</table>

<span id="rezulto" class=klarigo>
  우리말/베트남어 사전입니다.<br><br>
  네이버 베트남어 사전에 대한 모바일 인터페이스입니다. 따라서 네이버 사전이 동작하지 않으면, 이 인터페이스도 동작하지 않습니다.
  <br><br>
  우리말 단어 또는 베트남어 단어를 입력하시면, 검색이 가능합니다. <br><br>
  베트남 문자는 구둣점 없이 단순 영문자만 입력해도 검색이 가능합니다. <br><br>
  네이버 서비스에 빌붙어있는 서비스라서, 네이버 정책에 따라서 아무때고 서비스 중지될 수 있습니다.
  품질 보장 못하는 것이니, 불평하지 마시기 바랍니다.<br><br>
  --주인백<br>
 

  <br>
</span>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> 
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> 

</div>

</body>
</html>
