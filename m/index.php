<!DOCTYPE html>
<html manifest="./manifest.php">
<head>
<title>Esperanto-Vortaro (Hajpin Li)</title>
<meta http-equiv=Content-Type CONTENT="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width">
<script type=text/javascript><? include("./ajax.js"); ?></script>
<style><? include("./index.css"); ?></style>
<script type="text/javascript">
function E(e) { return document.getElementById(e); }
function cxapelo(v)
{
 if (v.length > 100) { return v.subtring(0,100); }
 v = v.replace("cx","ĉ").replace("gx","ĝ").replace("hx","ĥ");
 v = v.replace("jx","ĵ").replace("sx","ŝ").replace("ux","ŭ");
 v = v.replace("Cx","Ĉ").replace("Gx","Ĝ").replace("Hx","Ĥ");
 v = v.replace("Jx","Ĵ").replace("Sx","Ŝ").replace("Ux","Ŭ");
 v = v.replace("ch","ĉ").replace("gh","ĝ").replace("hh","ĥ");
 v = v.replace("jh","ĵ").replace("sh","ŝ").replace("uh","ŭ");
 v = v.replace("Ch","Ĉ").replace("Gh","Ĝ").replace("Hh","Ĥ");
 v = v.replace("Jh","Ĵ").replace("Sh","Ŝ").replace("Uh","Ŭ");
 v = v.replace("c^","ĉ").replace("g^","ĝ").replace("h^","ĥ");
 v = v.replace("j^","ĵ").replace("s^","ŝ").replace("u^","ŭ");
 v = v.replace("C^","Ĉ").replace("G^","Ĝ").replace("H^","Ĥ");
 v = v.replace("J^","Ĵ").replace("S^","Ŝ").replace("U^","Ŭ");
 v = v.replace("au","aŭ").replace("eu","eŭ").replace("Au","Aŭ").replace("Eu","Eŭ");
 v = v.replace("ŭx","ŭ").replace("Ŭx","Ŭ").replace("w","ŭ").replace("W","Ŭ");
 return v;
}

var first = 1;
function click_vorto(v)
{
 if (v == "") return;

 try {
   var r = localStorage[v];
   if (r != null) {
     E("rezulto").innerHTML = "CV:" + r;
     return;
   }
 } catch (e) {
   /* alert("a:"+e); */
 }


 E("rezulto").innerHTML = "<br>Searching...";

 call_ajax_text_post("../ek/tiru-enhavon-2.php", "vorto=" + encodeURI(v),
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
 try {
   var r = localStorage[v];
   if (r != null) {
     E("rezulto").innerHTML = "KV:" + r;
     return;
   }
 } catch (e) {
   /* alert("a:"+e); */
 }
 E("rezulto").innerHTML = "<br>Searching...";

 call_ajax_text_post("../ek/tiru-enhavon.php", "vorto=" + encodeURI(v),
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
  E("vorto2").value = "";
 } else if (v.charCodeAt(0) < 127 || X.indexOf(v.substring(0, 1), 0) >= 0) {
  v = cxapelo(E("vorto").value);
  E("vorto").value = v;
  E("vorto2").value = v;
 }
}

window.onload = function()
{
 E("vorto").onkeyup = function(e) {
  chapeligo();
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

 E("Search").onclick = function() {
  click_vorto(E("vorto2").value);
 }

 E("Serchu").onclick = function() {
  chapeligo();
  klaku_vorto(E("vorto").value);
  first = 1;
 }
}
</script>

<body style="margin:0; padding:0">

<table class=tb>
 <tr><td class=tbC><b>Esperanto-Vortaro</b></td></tr>
</table>


<table class=frm>
 <tr>
  <td class=tdTitle><nobr><font style="font-size:14pt">Esp-Kor:</font></nobr></td>
  <td>
   <input type=email id=vorto class=input autocomplete=off autocorrect=off autocapitalize=off>
  </td>
  <td class=tdButton align=right><img id=Serchu src="./iui/Search.png" width=58 height=30></td>
 </tr>
 <tr>
  <td align=right><font style="font-size:14pt">Eng:</font></td>
  <td>
   <input type=text id=vorto2 class=input autocomplete=off>
  </td>
  <td class=tdButton align=right><img id=Search src="./iui/Search.png" width=58 height=30></td>
 </tr>
</table>

<span id="rezulto" class=klarigo style="font-size:14pt">
  Bonvenon al Esperanto vortaro. (Korea,Angla)
  <br><br>
  이재현 선생님의 에스페란토 사전입니다.
  <br>
  <br>
  <a href=/j/>Esperpanto - Japana</A><br>
  <a href=/c/>Esperpanto - Ĉina</A>
  <br>
  <br>
  최종수정: 2016-08-24
  <br>
  <br>
  [G1] ... [G9] 레벨 구분은 Akademio에서 권고하는
  Baza Radikaro Oficiala(BRO)를 근거해서 부여한 것입니다. [OA] Oficiala Aldono<br>
  <br>
  G5 까지 580여 단어, G6 까지 990여 단어,<br>
G7 까지 1,200여 단어, G8 까지 1,700여 단어,<br>
G9 까지 2,500여 단어, OA 까지 3,900여 단어.<br>
사전 전체 18,000여 단어 수준.


</span>


<BR>
<BR>
<H3>다른 사전 보기</H3>
<UL>
<LI><a href=../e/>마영태 선생님(Leono Ma)의 사전</a>
<LI><a href=../m/>이재현 선생님(Hajpin Li)의 사전</a>
<LI><a href=../ex/>다운로드후 인터넷 없이 쓰는 사전</a>

<LI><a href=../c/>Vortaro por Ĉinoj</a>
<LI><a href=../j/>Vortaro por Japanoj</a>
<LI><a href=../th/>Vortaro por Taja Lingvo</a>
<LI><a href=http://www.reta-vortaro.de/revo/>Reta Vortaro</a>

<LI><a href=http://www.reta-vortaro.de/revo/>Reta Vortaro</a>
<br>
<LI><a href=../ek/>이재현 선생님(Hajpin Li)의 PC판</a>
<LI><a href=../ekma/>마영태 선생님(Leono Ma)의 PC판</a>
<LI><a href=../b/>시각장애인을 위한 사전</a>
</UL>


    <p>
    저작권: 이 사전의 저작권은 한국에스페란토협회에 있으며
          CCL(BY,SA)을 따릅니다.<br>
    </p>

</body>
</html>
