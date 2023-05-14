<!DOCTYPE html>
<?
error_reporting(E_ERROR | E_WARNING | E_PARSE);

#$fp = fopen("./index.php.log", "a+");
#fputs($fp,  date("Y/m/d-H:i:s") . " " . $_SERVER["REMOTE_ADDR"] . " ACCESS\n");
#fclose($fp);

?>
<html manifest="./manifest.php">

<head>
<title>Esperanto Vortaro</title>
<meta http-equiv="Content-Type" CONTENT="text/html; charset=UTF-8" />

<meta name="viewport" content="width=device-width" />

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

  // 1
  var dic_json = localStorage['DIC_JSON_31'];
  if (dic_json != null) { dic = eval(dic_json); }
  if (dic == null) {
     alert("Vi ankoraŭ ne elŝutis datumon.\r\n아직 사전 데이타를 내려 받지 않았습니다. 내려받기를 누르세요.");
     return;
  }

  E("rezulto").innerHTML = "<br>Searching...";

  var result_lines = search(dic, v);
  if (result_lines.length == 0) {
    v = v.toLowerCase();
    result_lines = search(dic, v);
    if (result_lines.length == 0) {
        E("rezulto").innerHTML = "<br><br>Nenio troviĝas por tio.<br>단어를 찾을 수 없습니다.";
        return;
    }
  }

  var result = highlight(result_lines, v);

  var str = "";
  for (var i = 0; i < result.length; i++) {
      str += result[i] + "\n";
  }

  E("rezulto").innerHTML = str;

  first = 1;
}

function has_cxapelon(v)
{
  var X = "xX^h";
  for (var i = 0; i < v.length; i++) {
    if (X.indexOf(v.charAt(i)) >= 0) {
      return true;
    }
  }
  return false;
}

function chapeligo()
{
 var v1 = E("vorto").value;
 if (has_cxapelon(v1)) {
  // alert(v1);
  E("vorto").value = '';
  var v2 = cxapelo(v1);
  // alert(v2);
  E("vorto").style.display='';
  E("vorto").value = v2;
 }
}

var dic = null;

function highlight(lines, vorto)
{
  var new_lines = new Array();

  var suffix = vorto.substring(vorto.length-1, vorto.length);
  if (vorto.length > 2 && "aeiou-/".indexOf(suffix) >= 0) {
    vorto = vorto.substring(0, vorto.length-1);
  }

  for (var i = 0; i < lines.length; i++) {
    var x = new_lines.length;
    new_lines[x] = lines[i];
    new_lines[x] = new_lines[x].split(vorto).join("<font color=blue><b>"+vorto+"</b></font>");
    new_lines[x] = "<b>" + new_lines[x].replace("\t", "</b>&nbsp;&nbsp;") + "<hr>";
    if (new_lines[x].indexOf("<G_1>") >= 0) {
      new_lines[x] = new_lines[x].replace("<G_1>", "<B><font color=green size=-1>[G1]</font></B>");
    }
    if (new_lines[x].indexOf("<G_2>") >= 0) {
      new_lines[x] = new_lines[x].replace("<G_2>", "<B><font color=green size=-1>[G2]</font></B>");
    }
    if (new_lines[x].indexOf("<G_3>") >= 0) {
      new_lines[x] = new_lines[x].replace("<G_3>", "<B><font color=green size=-1>[G3]</font></B>");
    }
    if (new_lines[x].indexOf("<G_4>") >= 0) {
      new_lines[x] = new_lines[x].replace("<G_4>", "<B><font color=green size=-1>[G4]</font></B>");
    }
    if (new_lines[x].indexOf("<G_5>") >= 0) {
      new_lines[x] = new_lines[x].replace("<G_5>", "<B><font color=green size=-1>[G5]</font></B>");
    }
    if (new_lines[x].indexOf("<G_6>") >= 0) {
      new_lines[x] = new_lines[x].replace("<G_6>", "<B><font color=green size=-1>[G6]</font></B>");
    }
    if (new_lines[x].indexOf("<G_7>") >= 0) {
      new_lines[x] = new_lines[x].replace("<G_7>", "<B><font color=green size=-1>[G7]</font></B>");
    }
    if (new_lines[x].indexOf("<G_8>") >= 0) {
      new_lines[x] = new_lines[x].replace("<G_8>", "<B><font color=green size=-1>[G8]</font></B>");
    }
    if (new_lines[x].indexOf("<G_9>") >= 0) {
      new_lines[x] = new_lines[x].replace("<G_9>", "<B><font color=green size=-1>[G9]</font></B>");
    }
    if (new_lines[x].indexOf("<O_A>") >= 0) {
      new_lines[x] = new_lines[x].replace("<O_A>", "<B><font color=green size=-1>[OA]</font></B>");
    }
    if (new_lines[x].indexOf("<G_Y>") >= 0) {
      new_lines[x] = new_lines[x].replace("<G_Y>", "");
    }
  }

  return new_lines;
}

function is_separator(c)
{
    if (c == ' ' || c == ',' || c == '.' || c == '[' ||
        c == ']' || c == ')' || c == '(' || c == '<' ||
        c == '>' || c == '-' || c == '=')
    {
        return 1;
    }

    return 0;
}

function score(word, entry)
{
    var score = 0;

    var suffix = word.substring(word.length-1, word.length);
    if (word.length > 2 && "aeiou-/".indexOf(suffix) >= 0) {
        word = word.substring(0, word.length-1);
    }

    var idx = entry.indexOf(word);
    if (idx == 0) {
        score += 30;
    }

    if (idx > 0 && is_separator(entry.charAt(idx-1))) {
        score += 20;
    }

    if (idx+word.length+1 < entry.length) {
        if (is_separator(entry.charAt(idx+word.length))) {
            if (idx == 0) {
                score += 50;
            } else {
                score += 3;
            }
        }
    }

    var splitted = entry.split(word);
    score += splitted.length;

    score = score+10000;

    return "{" + score + "}" + entry;
}

function search(dic, word)
{
    var result = new Array();
    var found = new Object;

    if (word.length < 2) {
        return result;
    }

    for (var i = 0; i < dic.length; i++) {
        if (word.length == 1) {
            if (dic[i].indexOf(word) == 0) {
                result[result.length] = score(word, dic[i]);
                found[i] = 1;
            }
        } else {
            if (dic[i].indexOf(word) >= 0) {
                result[result.length] = score(word, dic[i]);
                found[i] = 1;
            }
        }
    }

    var suffix = word.substring(word.length-1, word.length);
    if (word.length > 2 && "aeiou-/".indexOf(suffix) >= 0) {
        var word2 = word.substring(0, word.length-1);
        for (var i = 0; i < dic.length; i++) {
            if (! (i in found)) {
                if (dic[i].indexOf(word2) >= 0) {
                    result[result.length] = score(word, dic[i]);
                }
            }
        }
    }

    result.sort();
    result.reverse();

    for (var i = 0; i < result.length; i++) {
        result[i] = result[i].substring(7);
    }

    return result;
}

var load_status = "INIT";

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

 E("Serchu").onclick = function() {
  chapeligo();
  klaku_vorto(E("vorto").value);
  first = 1;
 }

 // 2
 var dic_json = localStorage['DIC_JSON_31'];
 if (dic_json != null) {
  dic = eval(dic_json);
  // E("load").style.visibility = "hidden";
  E("load").value = "Datumo preta. 사전검색 가능함.";
  load_status = "DONE";
 }

 E("Reset").onclick = function() {
  localStorage.clear();
  load_status = "INIT";
  E("load").value = "Elŝutu datumon. 사전 내려받기.";
  E("Reset").disabled = true;
 }

 E("load").onclick = function() {
  if (load_status == "PROGRESS") {
    alert("Elŝutanta ... 다운로드 진행중.");
    return;
  }

  // 3
  var dic_json = localStorage['DIC_JSON_31'];
  if (dic_json != null) {
    dic = eval(dic_json);
    E("load").value = "Datumo preta. 사전검색 가능함.";
    load_status = "DONE";
    return;
  }

  // alert("내려받기에 시간이 걸릴 수 있으므로, OK/예 버튼을 누른 후, 잠시 기다려 주시기 바랍니다.\r\n내려 받는 동안 인터넷이 연결되어 있어야 합니다.");

  E("load").value = "Elŝutanta ... 다운로드 진행중.";
  load_status = "PROGRESS";
  call_ajax_text_post("./dic.json.php", "time=" + new Date(),
     function(r) {
       localStorage.clear();
       localStorage['DIC_JSON_31'] = r;

       E("load").value = "Datumo preta. 사전검색 가능함.";
       load_status = "DONE";
       E("Reset").disabled = false;
     }
  );
 }
}
</script>
</head>

<body style="margin:0; padding:0">

<table class=tb>
 <tr><td class=tbC><b>Esperanto Vortaro 사전</b></td></tr>
</table>

<table class=frm>
 <tr>
  <td class=tdTitle><nobr><font style="font-size:14pt">Esp-Kor:</font></nobr></td>
  <td>
   <input type=email id=vorto class=input autocomplete=off>
  </td>
  <td class=tdButton align=right><img id=Serchu src="./iui/Search.png" width=58 height=30></td>
 </tr>
</table>

<span id="rezulto" class=klarigo style="font-size:14pt">
  Bonvenon al Esperanto/Korea vortaro.<br>
  <br>
  Ĉi tiu vortaro funkcias sen interreto. Vi devas unue elŝuti datumon.<br>
  이 사전은 인터넷 없이도 동작할 수 있도록 만들어진 사전입니다.
  인터넷이 되는 곳에서 먼저 사전 데이타를
  스마트폰으로 다운로드 해 두셔야 합니다.
  <br>
  <input type=button id="load" value="Elŝutu datumon. 사전 내려받기." style="font-size:14pt">
  <br>
  <br>
<p align=center>
  <A href="http://m.esperanto.or.kr/"><font size=+1 color=GREEN><b>★멤링고로 에스페란토 연습하기★</b></font></a><br>
</p>
  <br>
  Ĉi vortaro surbazas de la papera vortaro de Hajpin Li.<br>
  이 사전은 이해평(Hajpin Li)선생님의 에->한 사전을 기반으로 하고 있습니다.
  <br>
  <br>
Vi povas instali ĉi paĝon sur via saĝtelefono.<br>
스마트폰에서 현재 이 페이지를 바탕화면에 바로가기로 설치할 수 있습니다.
<br>

  <br>
  Version: DIC_JSON_31, Laste modifita: 2021.03.09
  <br><br>
  [G1] ... [G9] 레벨 구분은 Akademio에서 권고하는
  Baza Radikaro Oficiala(BRO)를 근거해서 부여한 것입니다. [OA] Oficiala Aldono<br>
  <br>
<table>
 <tr><td>~G5 580 단어</td><td>~G6  990 단어</td></tr>
 <tr><td>~G7 1200 단어</td><td>~G8  1700 단어</td></tr>
 <tr><td>~G9 2500 단어</td><td>~OA 3900 단어</td></tr>
 <tr><td>Tute 18000 단어</td><td></td></tr>
</table>
  <br>
  <br>
  <br>
  내려받은 사전을, 지우고 다시 받으실 수 있습니다.<br>
  <input type=button id="Reset" style="font-size:14pt" value="Forĵetu datumon. 사전 지우기.">

</span>


<BR>
<BR>
<H3>Aliaj vortaroj: 다른 사전</H3>
<UL>
<LI><a href=../e/>마영태 선생님(Leono Ma)의 사전</a>
<LI><a href=../m/>이재현 선생님(Hajpin Li)의 사전</a>
<LI><a href=../ex/>다운로드후 인터넷 없이 쓰는 사전</a>
<LI><a href=../c/>Vortaro por Ĉinoj</a>
<LI><a href=../j/>Vortaro por Japanoj</a>
<LI><a href=../th/>Vortaro por Taja Lingvo</a>
<LI><a href=http://www.reta-vortaro.de/revo/>Reta Vortaro</a>
<br>
<LI><a href=../ek/>이재현 선생님(Hajpin Li)의 PC판</a>
<LI><a href=../ekma/>마영태 선생님(Leono Ma)의 PC판</a>

<LI><a href=../b/>시각장애인을 위한 사전</a>


<LI><A HREF=http://14.63.213.244:9010/radikoj>에스페란토 어근찾기</A>
<LI><A HREF=http://14.63.213.244:9010/morphs>에스페란토 형태소분석</A>
<LI><A HREF=http://14.63.213.244:9010/conv2txt>문서/텍스트변환</A>


</UL>

    <p>
    저작권: 이 사전의 저작권은 한국에스페란토협회에 있으며
          CCL(BY,SA)을 따릅니다.<br>
    </p>

</body>
</html>
