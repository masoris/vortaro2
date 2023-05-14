<!DOCTYPE html>
<html manifest="./manifest.php">
<head>
<title>Esperanto Vortaro (Ĉina)</title>
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
// v = v.replace("ch","ĉ").replace("gh","ĝ").replace("hh","ĥ");
// v = v.replace("jh","ĵ").replace("sh","ŝ").replace("uh","ŭ");
// v = v.replace("Ch","Ĉ").replace("Gh","Ĝ").replace("Hh","Ĥ");
// v = v.replace("Jh","Ĵ").replace("Sh","Ŝ").replace("Uh","Ŭ");
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
 E("rezulto").innerHTML = "<br>Searching...";

 call_ajax_text_post("../ek/tiru-enhavon-2.php", "vorto=" + encodeURI(v),
  function(r) { E("rezulto").innerHTML = r; }
 );
 first = 1;
}

function klaku_vorto(v)
{
 if (v == "") return;
 E("rezulto").innerHTML = "<br>Searching...";

 call_ajax_text_post("../ek/tiru-enhavon-3.php", "vorto=" + encodeURI(v),
  function(r) { E("rezulto").innerHTML = r; }
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

 E("vorto2").onkeyup = function(e) {
  var code = '0';
  if (window.event) code = window.event.keyCode;
  else if (e) code = e.which;
  if (code == 13) {
   click_vorto(E("vorto2").value);
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

<body leftmargin=0 rightmargin=0>

<table class=tb>
 <tr><td class=tbC>Esperanto Vortaro (Ĉina)</td></tr>
</table>

<table class=frm>
 <tr>
  <td width=40>E-Ĉ:</td>
  <td>
   <input type=text id=vorto class=input autocapitalize=off autocorrect=off>
  </td>
  <td width=65><img id=Serchu src="./iui/Search.png" width=58 height=30></td>
 </tr>
 <tr>
  <td width=40>Eng:</td>
  <td>
   <input type=text id=vorto2 class=input autocapitalize=off autocorrect=off>
  </td>
  <td width=65><img id=Search src="./iui/Search.png" width=58 height=30></td>
 </tr>
</table>

<span id="rezulto">
 <p align=center>
  Bonvenon al Esperanto vortaro.<br>
  Esperpanto - Ĉina<br>
  Esperanto - Angla<br>
  Por ĉaperitaj literoj, uzu 'x' aŭ '^'<br><br>

  <br>
  Lasta modifo: 2016-07-15
 </p>

</span>


<BR>
<BR>
<H3>Aliaj Vortaroj</H3>
<UL>
<LI><a href=../e/>Esp-Kor Vortaro de Leono Ma</a>
<LI><a href=../m/>Esp-Kor Vortaro de Hajpin Li</a>
<LI><a href=../ex/>Esp-Kor Vortaro (Elŝutebla)</a>

<LI><a href=../c/>Vortaro por Ĉinoj</a>
<LI><a href=../j/>Vortaro por Japanoj</a>
<LI><a href=../th/>Vortaro por Taja Lingvo</a>
<LI><a href=http://www.reta-vortaro.de/revo/>Reta Vortaro</a>


<LI><a href=http://www.reta-vortaro.de/revo/>Reta Vortaro</a>
</UL>


</body>
</html>
