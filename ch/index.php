<!DOCTYPE html>
<?
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$fp = fopen("./index.php.log", "a+");
fputs($fp,  date("Y/m/d-H:i:s") . " " . $_SERVER["REMOTE_ADDR"] . " ACCESS\n");
fclose($fp);
?>
<html manifest="./manifest.php">

<head>
<title>Ĉina Esperanto-Vortaro</title>
<meta http-equiv="Content-Type" CONTENT="text/html; charset=UTF-8" />

<meta name="viewport" content="width=device-width" />

<script type=text/javascript><? include("./ajax.js"); ?></script>

<style><? include("./index.css"); ?></style>

<script type="text/javascript">

function isEmpty(value) {
  if (value == "" || value == null || value == undefined || ( value != null && typeof value == "object" && !Object.keys(value).length ) ) {
    return true;
  } else {
    return false; 
  } 
}

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

function klaku_vorto(v)
{
  if (v == "") return;

  // 1
  var dic_json = localStorage['CX_JSON_2'];
  if (! isEmpty(dic_json)) {
    dic = eval(dic_json);
  } else {
     alert("Ankoraŭ ne elŝutis la datumon.");
     return;
  }

  E("rezulto").innerHTML = "<br>Searching...";

  var result_lines = search(dic, v);
  if (result_lines.length == 0) {
    v = v.toLowerCase();
    result_lines = search(dic, v);
    if (result_lines.length == 0) {
        E("rezulto").innerHTML = "<br><br>Ne povas trovi la vorton.";
        return;
    }
  }

  var result = highlight(result_lines, v);

  var str = "";
  for (var i = 0; i < result.length; i++) {
      str += result[i] + "\n";
  }

  E("rezulto").innerHTML = str;
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
  var dic_json = localStorage['CX_JSON_2'];
  if (isEmpty(dic_json)) {
    E("Reset").disabled = true;
  }

  if (! isEmpty(dic_json)) {
    // alert("(A)length=" + dic_json.length + ", dic_json=" + dic_json);
    try {
      dic = eval(dic_json);
    } catch (e) {
      alert("-ERROR " + e + " (00A)");
      localStorage['CX_JSON_2'] = '';
      load_status = "INIT";
      E("load").value = "Elŝutu ĉe interreta konnekto.";
      return;
    }
    // E("load").style.visibility = "hidden";
    E("load").value = "Datumo estis elŝutita. Vi povas serĉi.";
    E("load").disabled = true;
    load_status = "DONE";
    E("Reset").disabled = false;
  }

  E("vorto").onkeyup = function(e) {
    chapeligo();
    var code = '0';
    if (window.event) code = window.event.keyCode;
    else if (e) code = e.which;
    if (code == 13) {
      klaku_vorto(E("vorto").value);
    }
  };

  E("vorto").onclick = function() {
    E("vorto").select();
  };

  E("Serchu").onclick = function() {
    chapeligo();
    klaku_vorto(E("vorto").value);
  };

  E("Reset").onclick = function() {
    localStorage['CX_JSON_2'] = ''
    load_status = 'INIT';
    E("load").value = "Elŝutu datumon ĉe interreta konekto.";
    E("Reset").disabled = true;
    E("load").disabled = false;
  };

  E("load").onclick = function() {
    if (load_status == "PROGRESS") {
      alert("Elŝutanta...");
      return;
    }

    if (load_status == "DONE") {
      return;
    }

    // 3
    var dic_json = localStorage['CX_JSON_2'];
    if (! isEmpty(dic_json)) {
      try {
        dic = eval(dic_json);
      } catch (e) {
        alert("(b) " + e);
        localStorage['CX_JSON_2'] = '';
        load_status = 'INIT';
        return;
      }
      E("load").value = "Datumo estis elŝutita. Vi povas serĉi.";
      E("load").disabled = true;
      load_status = "DONE";
      E("Reset").disabled = false;
      return;
    }


    E("load").value = "Elŝutanta ...";
    load_status = "PROGRESS";

    call_ajax_text_post("./dic.json.php", "time=" + new Date(),
      function(r) {

        var bytelike= unescape(encodeURIComponent(r));
        r = decodeURIComponent(escape(bytelike));

        localStorage['CX_JSON_2'] = r;
        E("load").value = "Datumo estis elŝutita. Vi povas serĉi.";
        E("load").disabled = true;
        load_status = "DONE";
        E("Reset").disabled = false;
        try {
            dic = eval(localStorage['CX_JSON_2']);
        } catch (e) {
            alert("(c) " + e);
            localStorage['CX_JSON_2'] = '';
            load_status = 'INIT';
            E("load").value = "Elŝutu datumon ĉe interreta konekto.";
            E("Reset").disabled = true;
            return;
        }
      }
    );
  };
}
</script>
</head>

<body style="margin:0; padding:0">

<table class=tb>
 <tr><td class=tbC><b>Ĉina Esperanto-Vortaro</b></td></tr>
</table>

<table class=frm>
 <tr>
  <td class=tdTitle><nobr><font style="font-size:14pt">Esp-Ĉ:</font></nobr></td>
  <td>
   <input type=email id=vorto class=input autocomplete=off>
  </td>
  <td class=tdButton align=right><img id=Serchu src="./iui/Search.png" width=58 height=30></td>
 </tr>
</table>

<span id="rezulto" class=klarigo style="font-size:14pt">
  Bonvenon al Esperanto-vortaro. (Ĉina)<br>
  <br>
  Ĉi tiu vortaro estas uzebla sen interreta konekto.
  <br>
  <input type=button id="load" value="Elŝutu datumon ĉe interreta konekto." style="font-size:14pt">
<br>

  <br>
  CX_JSON_2, Laste modifita: 2018.01.27
  <br><br>
  <input type=button id="Reset" style="font-size:14pt;" value="Forĵetu la datumon.">
  <br>
  <br>
  Origina enhavo estas farita de Abengo.
  <br>

</span>


<BR>
<BR>
<H3>Aliaj Vortaroj</H3>
<UL>
<LI><a href=/e/>Vortaro de Leono Ma (la korea)</a>
<LI><a href=/m/>Vortaro de Hajpin Li (la korea)</a>
<LI><a href=/ex/>Vortaro de Hajpin Li (la korea) sen interreta konekto</a>
<LI><a href=/c/>Vortaro por Ĉinoj</a>
<LI><a href=/j/>Vortaro por Japanoj</a>
<LI><a href=/th/>Vortaro por Taja Lingvo</a>
<LI><a href=http://www.reta-vortaro.de/revo/>Reta Vortaro</a>
<br>
<LI><a href=/ek/>Vortaro de Hajpin Li (PC)</a>
<LI><a href=/ekma/>Vortaro de Leono Ma (PC)</a>

<LI><a href=/b/>Vortaro por blinduloj (la korea)</a>
</UL>

    <p>
    Kopirajto: CCL(BY,SA)?<br>
    </p>

</body>
</html>
