
<? include '00_header.php'; ?>

<!--아이디중복 script-->
<script type="text/javascript">
    function idchk() {
        var email = document.mem.elements['email'];
        if(!email.value){
          alert("email 없어요!");
          return false;
        };
        if(!chk2(/^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i, email, "이메일 형식에 어긋납니다."))
          return false;   

        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              emailCHKvalue = xmlhttp.responseText;

              if(xmlhttp.responseText == 1){
                alert('사용이 가능한 아이디 입니다.');
                document.getElementById('emailCHKvalue').value = xmlhttp.responseText;
                return true;
              }else if(xmlhttp.responseText == 0){ 
                alert('사용이 불가능한 아이디 입니다.\n다른아이디를 입력하여주세요.');
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
      if(!email.value){ 
        alert("email 가없어요!");
        return false;
      }
      if(!chk(/^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i, email, "이메일 형식에 어긋납니다."))
        return false;   

      var mailCHK = document.mem.elements['mailCHK'].checked;
      if (mailCHK == false){
        alert('이메일수신체크');
        return false;
      };

      var CHKvalue = document.getElementById('emailCHKvalue');
      if(!CHKvalue.value){
        alert("아이디 중복체크를 먼저 해주시기 바랍니다.");
        return false;
      }else{
        var pw = document.mem.elements['pw'];
        if(!pw.value){
          alert("비밀번호 가없어요!");
          return false;
        }
        if(pw.value.length < 4){
          alert("4자이상의 비밀번호입력")
          return false;
        }

        var pw1 = document.mem.elements['pw1'];
        if(!pw1.value){
          alert("비밀번호2 가없어요!");
          return false;
        }
        if(pw1.value.length < 4){
          alert("4자이상의 비밀번호입력")
          return false;
        }

        if(pw.value != pw1.value) {
          alert("비밀번호 같지않아  확인!");
          return false;
        }
        var name = document.mem.elements['name'];
        if(!name.value){
          alert("이름 가없어요!");
          return false;
        }
        if(name.value.length < 2){
          alert("정확한 이름을 한글로 입력하여주세요");
          return false;
        }
        if(!chk(/^[가-힝]{2,15}$/, name, "정확한 이름을 한글로 입력하여주세요~"))
               return false;

        var telephone = document.mem.elements['telephone'];
        if(!telephone.value){ 
          alert("telephone 가없어요!");
          return false;
        }
        if(!chk(/^[0-9]{8,14}$/, telephone, "telephone 형식에 어긋납니다."))
          return false;

        var agreeMEM = document.mem.elements['agreeMEM'].checked;
        if (agreeMEM == false){
          alert('이용약관에 동의하셔야만 회원가입이 가능합니다.');
          return false;
        };

        var privacy = document.mem.elements['privacy'].checked;
        if (privacy == false){
          alert('개인정보 보호정책에 동의하셔야만 회원가입이 가능합니다.');
          return false;
        };
      };


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

<article>
    <section class="Box1024">
        <span class="SubTitleBig"><?=$subTitle[0]?></span>
        <span class="SubTitleSmall">:&nbsp;<?=$subTitle[1]?></span>
        <hr class="HR_orange100">
    </section>
    <section class="Box1024">
        <form name = "mem" action="memINPUT.php" method="post" onsubmit="return validate();">
        <span class="redNotice">
            * 기본정보만 입력 하셔도 사이트 이용이 가능합니다.<br>
            * 입출금 시에는 회원정보 수정란에 본인명의 통장계좌번호와 주민등록번호를 입력하시면 됩니다.<br>
            * 타인의 명의를 이용하여 생기는 모든 책임은 가입자본인에게 있습니다. 꼭 안되며 본인의 정보만을 입력 하시기 바랍니다.
        </span>
        <hr class="HR_gray100">
        <!--아이디입력-->
        <span class="join_data_name">아이디</span>
        <input type="text" name="email" id="email" class= "Input_join_Default"/><br />
        <a href="#" onClick="javascript:idchk()"><span class="span_join_gray" type="submit">아이디 중복확인</span></a>
        <span class="inputNotice">* 아이디는 수신가능한 이메일로 입력 하셔야 합니다.</span>
        <input type="hidden" id="emailCHKvalue" name="emailCHKvalue" >
        <div class="idcomment">
            <span>이메일로 정보수신을 동의 하시겠습니까?</span>
            <input name="mailCHK" type="checkbox"  value="yes" class = "checkbox" checked>
        </div>
        <hr class="HR_gray100">
        <!--비밀번호입력-->
        <span class="join_data_name">비밀번호</span>
        <input type="password" name="pw" id="pw" value="" class= "Input_join_Default" placeholder="비밀번호는 최소4자이상이여야 합니다." />
        <span class="join_data_name">비밀번호확인</span>
        <input type="password" name="pw1" id="pw1" value="" class= "Input_join_Default" placeholder="앞의 비밀번호랑 동일하게 입력하시기 바랍니다."/>
        <hr class="HR_gray100">
        <!--이름입력-->
        <span class="join_data_name">이름</span>
        <input type="text" name="name" id="name" value="" class= "Input_join_Default" placeholder="본인이름을 정확히 입력하여 주세요" />
        <span class="inputNotice">* 이름은 수익금 정산시에 계좌명의와 동일해야 하므로 정확하게 입력하여 주시기 바랍니다.</span>
        <hr class="HR_gray100">
        <!--연락처입력-->
        <span class="join_data_name">연락처</span>
        <input class= "Input_join_Default" placeholder="숫자만 입력 가능합니다. ex) 01012341234" type="text" name='telephone' id='telephone'>
        <span class="inputNotice">* 연락가능하신 일반전화, 휴대전화를 숫자만 입력하세요."- "빼고 입력하여주세요.</span>
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
            <button type = "reset" class="Button_join_gray">다시입력</button>
            <button type = "submit" class="Button_join_black">회원가입</button>
        </div>
        </form>
    </section>
</article>
<? include '00_footer.php'; ?>

