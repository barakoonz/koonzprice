
<? include '00_header.php'; ?>

<!--아이디중복 script-->
<script type="text/javascript">
    function idchk() {
        var email = document.mem.elements['email'];
        var ORGemail = document.getElementById('ORGemail');

        if(ORGemail.value == email.value){
          alert("본인이 사용하시고 있는 이메일 주소입니다. 변경을 하시려면 새로운 이메일 주소를 입력하세요");
          return true;
        }



        if(!email.value){
          alert("아이디는 이메일 형식으로 입력하셔야만 합니다.!");
          return false;
        };
        if(!chk2(/^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i, email, "이메일 형식에 어긋납니다.\n이메일로 입력해주시기 바랍니다."))
          return false;   

        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              emailCHKvalue = xmlhttp.responseText;

              if(xmlhttp.responseText == 1){
                alert('사용이 가능한 아이디 입니다.');
                document.getElementById('emailCHKvalue').value = xmlhttp.responseText;
                document.mem.elements['EDITemail'].value = "ok";
                return true;
              }else if(xmlhttp.responseText == 0){ 
                alert('사용이 불가능한 아이디 입니다.\n다른아이디를 입력하여주세요.');
                document.mem.elements['email'].value = "";
                return false;
              }
              

            }
        }

        xmlhttp.open("POST", "join_chk.php", true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send("email=" + email.value);
    }
    function chk2(re, e, msg) {
      if (re.test(e.value)) {
        return true;
      }
      alert(msg);
      e.value = "";
      e.focus();
      return false;
}

<!--회원가입부분 script-->


    function validate(){

      var email = document.mem.elements['email'];
      var CHKvalue = document.getElementById('emailCHKvalue');
      var ORGemail = document.getElementById('ORGemail');
      var mailCHK = document.mem.elements['mailCHK'].checked;
      var pw = document.mem.elements['pw'];
      var pw1 = document.mem.elements['pw1'];
      var name = document.mem.elements['name'];
      var telephone = document.mem.elements['telephone'];
      var agreeMEM = document.mem.elements['agreeMEM'].checked;
      var privacy = document.mem.elements['privacy'].checked;
      var EDITemail = document.getElementById('EDITemail');

      
      if(!email.value){ 
        alert("아이디를 입력하셔야만 합니다.");
        return false;
      }
      if(!chk(/^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i, email, "이메일 형식에 어긋납니다."))
        return false;   

      
      if (mailCHK == false){
        alert('이메일 정보 수신체크를 해주셔야 가입이 가능합니다.');
        return false;
      };

      
      if(ORGemail.value != email.value){
        if(!CHKvalue.value){
          alert("변경하실 아이디의 중복여부를 체크 해주시기 바랍니다.");
          return false;
        }
      }
      if((ORGemail.value == email.value) || (EDITemail.value == "ok")){

        if(!pw.value){
          alert("비밀번호 가 입력되지 않았습니다.");
          return false;
        }
        if(pw.value.length < 4){
          alert("비밀번호는 4자이상의 숫자 또는 영문 등으로 구성된 비밀번호를 입력하여 주시기 바랍니다.")
          document.mem.elements['pw'].value = "";
          return false;
        }
        if(!pw1.value){
          alert("앞에 입력된 비밀번호랑 같지 않습니다. 비밀번호는정확하게 앞에 입력된 비밀번호를 입력하여 주시기 바랍니다.");
          document.mem.elements['pw1'].value = "";
          return false;
        }
        if(pw1.value.length < 4){
          alert("비밀번호는 4자이상의 숫자 또는 영문 등으로 구성된 비밀번호를 입력하여 주시기 바랍니다.")
          return false;
        }

        if(pw.value != pw1.value) {
          alert("입력된 비밀번호가 서로 동일해야 합니다.");
          document.mem.elements['pw1'].value = "";
          return false;
        }
        if(!name.value){
          alert("이름은 필수 입력 사항입니다.");
          return false;
        }
        if(name.value.length < 2){
          alert("정확한 이름을 한글로 입력하여주세요");
          return false;
        }
        if(!chk(/^[가-힝]{2,15}$/, name, "정확한 이름을 한글로 입력하여주세요~"))
               return false;

        if(!telephone.value){ 
          alert("연락가능한 전화번호, 휴대폰번호를 입력하여 주시기 바랍니다.");
          document.mem.elements['telephone'].value = "";
          return false;
        }
        if(!chk(/^[0-9]{8,14}$/, telephone, "숫자로만 이루어진 전화번호를 입력하여 주시기 바랍니다."))
          return false;

        if (agreeMEM == false){
          alert('이용약관에 동의하셔야만 회원가입이 가능합니다.');
          return false;
        }
        if (privacy == false){
          alert('개인정보 보호정책에 동의하셔야만 회원가입이 가능합니다.');
          return false;
        }
      }


    }
    function chk(re, e, msg) {
      if (re.test(e.value)) {
        return true;
      }
      alert(msg);
      e.value = "";
      e.focus();
      return false;
    }
</script>

<!--회원가입부분 script-->
<?
include 'koonzprice_CONN.php';  
if(!$mysql){
  echo("<script>window.alert('정상적인 접근이 아닙니다.');location.replace('index.html');</script>");
  exit;
}else{
  if(!$db){
    echo("<script>window.alert('서비스가 정상적이지 못합니다. 잠시후에 접속하시기 바랍니다.');location.replace('index.html');</script>");
    exit;
  }else{

    $result = mysql_query("SELECT * FROM members WHERE email = '$_SESSION[email]'") or die('error');
    $row = mysql_fetch_array( $result ) or die('error');
    mysql_close();
  }
}
    
?>

<article>
    <section class="Box1024">
        <span class="SubTitleBig"><?=$subTitle[0]?></span>
        <span class="SubTitleSmall">:&nbsp;<?=$subTitle[1]?></span>
        <hr class="HR_orange100">
    </section>
    <section class="Box1024">
        <form name = "mem" action="modify.php" method="post" onsubmit="return validate();">
        <span class="redNotice">
            * 기본정보만 입력 하셔도 사이트 이용이 가능합니다.<br>
            * 입출금 시에는 회원정보 수정란에 본인명의 통장계좌번호와 주민등록번호를 입력하시면 됩니다.<br>
            * 타인의 명의를 이용하여 생기는 모든 책임은 가입자본인에게 있습니다. 꼭 안되며 본인의 정보만을 입력 하시기 바랍니다.
        </span>
        <hr class="HR_gray100">
        <!--아이디입력-->
        <span class="join_data_name">아이디</span>
        <input type="hidden" value="<?=$row[email];?>" name="ORGemail" id="ORGemail">
        <input type="hidden" value="" name="EDITemail" id="EDITemail">
        <input type="text"  name="idx" id="idx" value="<?=$row[id];?>">
        <input type="text" name="email" id="email" class= "Input_join_Default" value="<?=$row[email];?>"/><br />
        <a href="#" onClick="javascript:idchk()"><span class="span_BTN" type="hidden">아이디 중복확인</span></a>
        <span class="inputNotice">* 아이디는 수신가능한 이메일로 입력 하셔야 합니다.</span>
        <input type="hidden" id="emailCHKvalue" name="emailCHKvalue" >
        <div class="idcomment">
            <span>이메일로 정보수신을 동의 하시겠습니까?</span>
            <input name="mailCHK" type="checkbox"  value="yes" class = "checkbox" checked>
        </div>
        <hr class="HR_gray100">
        <!--비밀번호입력-->
        <span class="join_data_name">비밀번호</span>
        <input type="password" name="pw" id="pw" value="<?=$row[pw];?>" class= "Input_join_Default" placeholder="비밀번호는 최소4자이상이여야 합니다." />
        <span class="join_data_name">비밀번호확인</span>
        <input type="password" name="pw1" id="pw1" value="<?=$row[pw];?>" class= "Input_join_Default" placeholder="앞의 비밀번호랑 동일하게 입력하시기 바랍니다."/>
        <hr class="HR_gray100">
        <!--이름입력-->
        <span class="join_data_name">이름</span>
        <input type="text" name="name" id="name" value="<?=$row[name];?>" class= "Input_join_Default" placeholder="본인이름을 정확히 입력하여 주세요" />
        <span class="inputNotice">* 이름은 수익금 정산시에 계좌명의와 동일해야 하므로 정확하게 입력하여 주시기 바랍니다.</span>
        <hr class="HR_gray100">
        <!--연락처입력-->
        <span class="join_data_name">연락처</span>
        <input class= "Input_join_Default"  type="text" name='telephone' id='telephone' value="<?=$row[tel];?>">
        <span class="inputNotice">* 연락가능하신 일반전화, 휴대전화를 숫자만 입력하세요."- "빼고 입력하여주세요.</span>
        <hr class="HR_gray100">
        <!--은행명-->
        <span class="join_data_name">은행명</span>
        <input class= "Input_join_Default" type="text" name='bank' id='bank' value="<?=$row[bank];?>">
        <hr class="HR_gray100">
        <!--게좌번호-->
        <span class="join_data_name">계좌번호</span>
        <input class= "Input_join_Default" placeholder="숫자만 입력 가능합니다. ex) 01012341234" type="text" name='banknum' id='banknum' value="<?=$row[banknum];?>">
        <span class="inputNotice">* 계좌번호는 가입하신분의 본인 이름과 주민등록번호로 개설된 계좌여야 합니다.</span>
        <hr class="HR_gray100">
        <!--주민등록번호-->
        <span class="join_data_name">주민등록번호</span>
        <input class= "Input_join_Default" placeholder="숫자만 입력 가능합니다. ex) 01012341234" type="text" name='jumin' id='jumin' value="<?=$row[jumin];?>">
        <span class="inputNotice">* 주민등록번호는 국세법상 소득정산을 위해선 꼭 필요한 서류 입니다.</span>
        <hr class="HR_gray100">
        <!--마지막 공지-->
        <span class="inputNotice">* 추가 입력사항인 입금처, 계좌번호, 주민등록번호는 가입하신분 본인명의로 입력해주셔야만 합니다.<br>
            * 부정확한 입력에 의한 입금 불가시에는 자동 익월입금 처리되며 3개월 이상 입금이 부정확한 정보에 의해 입렫 될시에는 입금이 처리 되지 않으며 자동탈퇴 처리 됩니다.<br><br></span>
        <hr class="HR_gray100">            
        <!--약관부분-->
        <div class="serviceRule">
            <span>서비스이용약관</span>
            <textarea class="textarea"></textarea>
            <div class="agreeRule">
                <span>위의 약관에 동의하십니까?</span>
                <input type="checkbox" name="agreeMEM" value="yes" checked class = "checkbox">
                <span>예</span>
            </div>
        </div>
        <div class="infoRule">
            <span>개인정보취급방침</span>
            <textarea class="textarea"></textarea>
            <div class="agreeRule">
                <span>위의 개인정보취급방침에 동의하십니까?</span>
                <input name="privacy" type="checkbox"  value="yes" class = "checkbox" checked>
                <span>예</span>
            </div>
        </div>
        <hr class="HR_gray100">
        <div class="finChkSubmit">
            <button type = "reset" class="Button_join_gray">회원탈퇴</button>
            <button type = "submit" class="Button_join_black">회원정보수정</button>
        </div>
        </form>
    </section>
</article>
<? include '00_footer.php'; ?>

