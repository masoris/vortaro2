<? header('Content-Type: text/html; charset=utf-8'); ?>
<!DOCTYPE HTML>
<html manifest="cache.manifest">
<head>
<title>에스페란토 사전 (이재현) ... 에스페란토사전</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width">

<!meta http-equiv="X-UA-Compatible" content="IE=7" />
</head>

<!--
<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="jquery.history.js"></script>
<script language=JavaScript>
function pageload(hash)
{
  // alert("pageload: " + hash);
  // hash doesn't contain the first # character.
  if (hash) {
    // restore ajax loaded state
    if($.browser.msie) {
      // jquery's $.load() function does't work when hash include special characters like aao.
      hash = encodeURIComponent(hash);
    }
    $("#load").load(hash + ".html");
  } else {
    // start page
    $("#load").empty();
  }
}
	
$(document).ready(function()
{
  // Initialize history plugin.
  // The callback is called at once by present location.hash. 
  $.historyInit(pageload, "jquery_history.html");
	
  // set onlick event for buttons
  $("a[rel='history']").click(function() {
    // 
    var hash = this.href;
    hash = hash.replace(/^.*#/, '');
    // moves to a new page. 
    // pageload is called at once. 
    // hash don't contain "#", "?"
    $.historyLoad(hash);
    return false;
  });
});
</script>
-->


<script src="./ajax.js"></script>
<script language=JavaScript>
function convert_cxapelo(vorto)
{
  {
    vorto = vorto.replace("cx", "ĉ");
    vorto = vorto.replace("gx", "ĝ");
    vorto = vorto.replace("hx", "ĥ");
    vorto = vorto.replace("jx", "ĵ");
    vorto = vorto.replace("sx", "ŝ");
    vorto = vorto.replace("ux", "ŭ");

    vorto = vorto.replace("Cx", "Ĉ");
    vorto = vorto.replace("Gx", "Ĝ");
    vorto = vorto.replace("Hx", "Ĥ");
    vorto = vorto.replace("Jx", "Ĵ");
    vorto = vorto.replace("Sx", "Ŝ");
    vorto = vorto.replace("Ux", "Ŭ");
  }

  {
//  vorto = vorto.replace("ch", "ĉ");
//  vorto = vorto.replace("gh", "ĝ");
//  vorto = vorto.replace("hh", "ĥ");
//  vorto = vorto.replace("jh", "ĵ");
//  vorto = vorto.replace("sh", "ŝ");
//  vorto = vorto.replace("uh", "ŭ");

//  vorto = vorto.replace("Ch", "Ĉ");
//  vorto = vorto.replace("Gh", "Ĝ");
//  vorto = vorto.replace("Hh", "Ĥ");
//  vorto = vorto.replace("Jh", "Ĵ");
//  vorto = vorto.replace("Sh", "Ŝ");
//  vorto = vorto.replace("Uh", "Ŭ");
  }

  {
    vorto = vorto.replace("c^", "ĉ");
    vorto = vorto.replace("g^", "ĝ");
    vorto = vorto.replace("h^", "ĥ");
    vorto = vorto.replace("j^", "ĵ");
    vorto = vorto.replace("s^", "ŝ");
    vorto = vorto.replace("u^", "ŭ");

    vorto = vorto.replace("C^", "Ĉ");
    vorto = vorto.replace("G^", "Ĝ");
    vorto = vorto.replace("H^", "Ĥ");
    vorto = vorto.replace("J^", "Ĵ");
    vorto = vorto.replace("S^", "Ŝ");
    vorto = vorto.replace("U^", "Ŭ");
  }

  {
    vorto = vorto.replace("au", "aŭ");
    vorto = vorto.replace("eu", "eŭ");

    vorto = vorto.replace("Au", "Aŭ");
    vorto = vorto.replace("Eu", "Eŭ");

    vorto = vorto.replace("ŭx", "ŭ"); // ux 로 타이핑하면 'x'가 남게 됨
    vorto = vorto.replace("Ŭx", "Ŭ");
  }

    vorto = vorto.replace("x", "ks"); // 에스페란토에는 'x' 가 없음.
    vorto = vorto.replace("X", "Ks"); // 에스페란토에는 'x' 가 없음.
    vorto = vorto.replace("w", "ŭ"); // 에스페란토에는 'w' 가 없음.
    vorto = vorto.replace("W", "Ŭ"); // 에스페란토에는 'w' 가 없음.

    return vorto;
}

function klak_vorto(vorto)
{
  if (vorto == "") { return; }

  var parameters = "vorto=" + vorto;
  var t0 = (new Date()).getTime();

  call_ajax_text_post("./tiru-enhavon.php", parameters,
    function(rezulto) {
      document.getElementById("rezulto").innerHTML = rezulto;
      var t1 = (new Date()).getTime();
      document.getElementById("rezulto").innerHTML += "<br><font size=-2 color=#EEEEEE>" + (t1-t0)/1000 + " sekundoj.</font>"
    }
  );
}

function click_vorto(vorto)
{
  if (vorto == "") { return; }

  var parameters = "vorto=" + vorto;
  var t0 = (new Date()).getTime();

  call_ajax_text_post("./tiru-enhavon-2.php", parameters,
    function(rezulto) {
      document.getElementById("rezulto").innerHTML = rezulto;
      var t1 = (new Date()).getTime();
      document.getElementById("rezulto").innerHTML += "<br><font size=-2 color=#EEEEEE>" + (t1-t0)/1000 + " sekundoj.</font>"
    }
  );
}


function show_words(vorto)
{
  if (vorto == "") { return; }

  var parameters = "vorto=" + encodeURI( vorto );

  var t0 = (new Date()).getTime();
  call_ajax_text_post("./tiru-vortojn.php", parameters,
    function(rezulto) {
      rezultoj = rezulto.split("|^|");

      rezulto = "";
      for (i = 0; i < rezultoj.length; i++) {
        rezultoj[i] = rezultoj[i].replace(/^\s+|\s+$/g,"");
        if (rezultoj[i] != "") {
          rezulto += "<LI><a href=# onClick=\"javascript:klak_vorto('" + rezultoj[i] + "')\">" + rezultoj[i] + "</a><br>\n";
        }
      }

      document.getElementById("rezulto").innerHTML = rezulto;
      var t1 = (new Date()).getTime();
      document.getElementById("rezulto").innerHTML += "<br><font size=-2 color=#EEEEEE>" + (t1-t0)/1000 + " sekundoj.</font>"
    }
  );
}

function submit_correct()
{
  // alert("korektajxo: " + document.getElementById("korektajxo").value);
  var parameters = "korektajxo=" + encodeURI( document.getElementById("korektajxo").value );
   
  var t0 = (new Date()).getTime();
  call_ajax_text_post("./submit-korektajxo.php", parameters,
    function(rezulto) {
      document.getElementById("rezulto").innerHTML = rezulto;
      var t1 = (new Date()).getTime();
      document.getElementById("rezulto").innerHTML += "<br><font size=-2 color=#EEEEEE>" + (t1-t0)/1000 + " sekundoj.</font>";
    }
  );
}

function show_korektajxojn()
{
  // alert("korektajxo: " + document.getElementById("korektajxo").value);
  var parameters = "korektajxo=" + encodeURI( document.getElementById("korektajxo").value );

  var t0 = (new Date()).getTime();
  call_ajax_text_post("./show-korektajxo.php", parameters,
    function(rezulto) {
      document.getElementById("rezulto").innerHTML = rezulto;
      var t1 = (new Date()).getTime();
      document.getElementById("rezulto").innerHTML += "<br><font size=-2 color=#EEEEEE>" + (t1-t0)/1000 + " sekundoj.</font>";
    }
  );
}

function show_korektajxojn_malnova()
{
  // alert("korektajxo: " + document.getElementById("korektajxo").value);
  var parameters = "korektajxo=" + encodeURI( document.getElementById("korektajxo").value );

  var t0 = (new Date()).getTime();
  call_ajax_text_post("./show-korektajxo-malnova.php", parameters,
    function(rezulto) {
      document.getElementById("rezulto").innerHTML = rezulto;
      var t1 = (new Date()).getTime();
      document.getElementById("rezulto").innerHTML += "<br><font size=-2 color=#EEEEEE>" + (t1-t0)/1000 + " sekundoj.</font>";
    }
  );
}

var prev = "";
var focus = false;

function checkText()
{
  if (! focus) { return; }

  if (prev != document.getElementById("vorto").value) {
    prev = document.getElementById("vorto").value;
    show_words(document.getElementById("vorto").value);
  }

  setTimeout('checkText()', 100);
}



window.onload = function()
{
  document.getElementById("vorto").onfocus = function()
  {
    focus = true;
    checkText();
  }

  document.getElementById("vorto").onblur = function()
  {
    focus = false;
  }

    document.getElementById("sercxu").onclick = function()
    {
        var vorto = document.getElementById("vorto").value;
        klak_vorto(vorto);
    }

    document.getElementById("sercxu").keyup = function()
    {
        var vorto = document.getElementById("vorto").value;
        klak_vorto(vorto);
    }

    document.getElementById("sercxu2").onclick = function()
    {
        var vorto = document.getElementById("vorto2").value;
        click_vorto(vorto);
    }

    document.getElementById("sercxu2").keyup = function()
    {
        var vorto = document.getElementById("vorto2").value;
        click_vorto(vorto);
    }

    document.getElementById("vorto").onkeyup = function(event)
    {
        var vorto = document.getElementById("vorto").value;
        var cxapelitaj = "ĉĝĥĵŝŭĈĜĤĴŜŬ";
        // alert("vorto:" + vorto);

        if (vorto.length == 0) {
            document.getElementById("vorto2").value = "";
        } else if (vorto.charCodeAt(0) < 127) {
            document.getElementById("vorto").value = convert_cxapelo(vorto);
            document.getElementById("vorto2").value = document.getElementById("vorto").value;
        } else if (cxapelitaj.indexOf(vorto.substring(0, 1), 0) >= 0) {
            document.getElementById("vorto").value = convert_cxapelo(vorto);
            document.getElementById("vorto2").value = document.getElementById("vorto").value;
        }
    }

    document.getElementById("vorto").onkeydown = function(event)
    {
        var keycode = '0';
        if (window.event) keycode = window.event.keyCode;
        else if (event) keycode = event.which;
        if (keycode == 13) {
            var vorto = document.getElementById("vorto").value;
            klak_vorto(vorto);
            return false;
        }

        // show_words( document.getElementById("vorto").value );
    }

    document.getElementById("vorto2").onkeydown = function(event)
    {
        var keycode = '0';
        if (window.event) keycode = window.event.keyCode;
        else if (event) keycode = event.which;
        if (keycode == 13) {
            var vorto = document.getElementById("vorto2").value;
            click_vorto(vorto);
            return false;
        }
    }

    document.getElementById("korektu").onmouseover = function()
    {
        document.getElementById("korektu").style.cursor='pointer';
    }

    document.getElementById("korektu").onclick = function()
    {
        document.getElementById("rezulto").innerHTML = 
          "<textarea id=korektajxo style='width:100%;height:50' style='border:solid 1px gray;'>신고자:\n" +
          "</textarea><br>" +
          "오타나 수정할 내용 또는 개선할 요청사항을 입력해 주세요.<br>"+
          "<input type=button id=korektu_petu value='보내기' onClick='javascript:submit_correct()'>" +
          "        " +
          "<input type=button id=montru_korektajxon value='기존 요청사항 보기' onClick='javascript:show_korektajxojn()'> <input type=button id=montru_korektajxon value='오래된 요청사항 보기' onClick='javascript:show_korektajxojn_malnova()'><br>";
    }

 /*
    document.getElementById("donacu").onclick = function()
    {
        // window.showModalDialog('http://www.mobigen.com/~hiongun/ek/donaci.php','', 'status=no;dialogWidth:400px;dialogHeight:260px;');
        window.open('http://www.mobigen.com/~hiongun/ek/donaci.php', '', 'width=400,height=250');
    }
  */
}
</script>

<script language=JavaScript>
function addToFavorites(url, title)
{
    if (window.external) {
        window.external.AddFavorite(url, title);
    }
}
</script>

<body>

<table>
 <tr>
  <td>
<table style="border:solid 1px GREEN">
 <tr>
  <td>
<!--
<table border=0 width=100%>
 <tr>
  <td width=100%>
   <nobr><font face="Times" size=+2><b>에스페란토 사전</b></font><br>Esperanto-Korea Vortaro
      &nbsp;&nbsp;&nbsp;&nbsp;
      <input type=button id=korektu value='오타/정정/개선/추가 요청' onClick="#korektu"></nobr>
  </td>
 </tr>
</table>
-->
<table border=0 width=100%>
 <tr>
  <td width=100%>
   <table>
    <tr>
     <td> <font face="Times" size=+2><b>에스페란토 사전</b></font> </td>
     <td align=right>
</td>
    </tr>
    <tr>
     <td>Esperanto-Korea Vortaro</td>
     <td><input type=button id='korektu' value='오타/정정/개선/추가 요청'></td>
    </tr>
   </table>
  </td>
 </tr>
</table>
  </td>
 </tr>
 <tr>
  <td>

<table align=left>
 <tr>
  <td><font type=Times><nobr>에-한 <input value="" type=text id=vorto style="border:solid 3px GREEN;" size=10></font></nobr></td>
  <td><input value="serĉu" type=button id=sercxu></td>
  <td><font type=Times><nobr>에-영 <input value="" type=text id=vorto2 style="border:solid 3px GREEN;" size=10></font></nobr></td>
  <td><input value="search" type=button id=sercxu2></td>
 </tr>
</table>

  </td>
 </tr>
</table>
  </td>
 </tr>
 <tr>
  <td>
<table width=100% border=0 align=left style="border:solid 1px GREEN;">
 <tr width=100% align=left>
  <td width=100% align=left>
   <span id=rezulto>
    해평 이재현 선생님 사전의 인터넷판입니다.<br>
    <br>
    삿갓문자는 'x' 또는 '^'를 이용해서 입력하세요.<br>
    영어판은 인터넷에서 공개된 사전을 사용했습니다.<br><br>
    우리말/에스페란토 다 받아들입니다.<br>
    단어 일부만 입력해도 최대한 찾아줍니다.<br>
    <br>
    종이로 된 에스페란토 사전 구입은 <br>
    협회 대표전화 02-717-6974 또는 <br>
    kea(골뱅이)esperanto.or.kr로<br>
    연락 하시면 구매하실 수 있습니다.<br>
    <A href=http://www.esperanto.or.kr/>에스페란토 협회</a>
    <br>
    <br>
    최종수정: 2013-08-24
    <br>
    <br>
    [G1] ... [G9] 레벨구분은 Akademio에서 발표한<br>
    단어 빈도 기준입니다. "Baza Radikaro Oficiala(BRO)" <br>
    및 [OA] "Oficiala Aldono" 참고.<br>
    <br>
    G5레벨까지 누적 580여 단어,<BR>
    G6레벨까지 누적 990여 단어,<BR>
    G7레벨까지 누적 1,200여 단어,<BR>
    G8레벨까지 누적 1,700여 단어,<BR>
    G9레벨까지 누적 2,500여 단어,<BR>
    OA레벨까지 누적 3,900여 단어.<BR>
    사전 전체 18,000여 단어 수준.<BR>
    </p>

   </span>
  </td>
 </td>
</table>

  </td>
 </tr>
</table>

<H3>다른 사전 보기</H3>
<UL>
<LI><a href=../e/?<?echo time()?>>마영태 선생님(Leono Ma)의 사전</a>
<LI><a href=../m/?<?echo time()?>>이재현 선생님(Hajpin Li)의 사전</a>
<LI><a href=../ex/?<?echo time()?>>다운로드후 인터넷 없이 쓰는 사전</a>
<LI><a href=../c/?<?echo time()?>>Vortaro por Ĉinoj</a>
<LI><a href=../j/?<?echo time()?>>Vortaro por Japanoj</a>
<LI><a href=../th/?<?echo time()?>>Vortaro por Tajlandanoj</a>
<LI><a href=http://www.reta-vortaro.de/revo/>Reta Vortaro</a>
<br>
<LI><a href=../ek/?<?echo time()?>>이재현 선생님(Hajpin Li)의 PC판</a>
<LI><a href=../ekma/?<?echo time()?>>마영태 선생님(Leono Ma)의 PC판</a>
<LI><a href=../b/?<?echo time()?>>시각장애인을 위한 사전</a>
</UL>

    <p>
    저작권: 이 사전의 저작권은 한국에스페란토 협회에 있으며,
       CCL(BY, SA)을 따릅니다.<br>
    </p>

</body>

</html>
