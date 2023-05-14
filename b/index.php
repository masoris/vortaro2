<!DOCTYPE html>
<html manifest="./manifest.php">
<head>
<title>시각장애인을 위한 에스페란토 사전</title>
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
 E("rezulto").innerHTML = "<br>검색중...";

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
  // E("vorto2").value = "";
 } else if (v.charCodeAt(0) < 127 || X.indexOf(v.substring(0, 1), 0) >= 0) {
  v = cxapelo(E("vorto").value);
  E("vorto").value = v;
  // E("vorto2").value = v;
 }
}

window.onload = function()
{
  try {
    E("vorto").addEventListener("keyup", function(event) {
      if (event.keyCode == 13) {
        klaku_vorto(E("vorto").value);
      }
    });
 } catch (e) {

 };

 E("vorto").onkeyup = function(e) {
  chapeligo();
  var code = '0';
   code = window.event.keyCode;
  if (window.event) {
   code = window.event.keyCode;
  } else if (e) {
   code = e.which;
  }
  if (code == 13) {
   klaku_vorto(E("vorto").value);
  }
 }

 E("vorto").onkeypress = function(e) {
  chapeligo();
  var code = '0';
   code = window.event.keyCode;
  if (window.event) {
   code = window.event.keyCode;
  } else if (e) {
   code = e.which;
  }
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
}
</script>

<body>


<input type=text id=vorto class=input autocomplete=off><br>


<span id="rezulto" class=klarigo style="font-size:14pt">

  <h1>시각장애인을 위한 에스페란토 사전</h1>
  삿갓 문자를 치려면, 소문자 'x' 를 덧붙이면 됩니다.
최종갱신: 2016-10-17

</span>


</body>
</html>
