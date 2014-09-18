
<? include '00_header.php'; ?>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

<script type="text/javascript">
// <![CDATA[
jQuery( function($) {

  var input_email = /^([\w\.-]+)@([a-z\d\.-]+)\.([a-z\.]{2,6})$/; // 이메일 검사식
  var input_pw = /^[a-z0-9_-]{6,18}$/; // 비밀번호 검사식  
  var input_repw = /^[a-z0-9_-]{6,18}$/; // 비밀번호 검사식  
  var input_tel = /^[0-9]{8,11}$/; // 전화번호 검사식
  var input_koname = /^[가-힝]{2,15}$/;// 한글이름 검사식



  
  var 
    form = $('.form'), 
    pw = $('#pw'), 
    repw = $('#repw'), 
    email = $('#email'), 
    tel = $('#tel');
    koname = $('#koname');
    

  form.submit( function() {
    if(input_email.test(email.val()) != true) { // 이메일 검사
      alert('[아이디 입력 오류] 아이디는 이메일 주소입니다. 정확한 형식의 이메일 주소를 입력하여 주세요');
      email.focus();
      return false;
    }else if(input_koname.test(koname.val()) != true) { // 비밀번호 검사
      alert('[이름 입력오류] 한글이름을 입력하여 주세요.');
      pw.focus();
      return false;
    }else if(input_repw.test(repw.val()) != true) { // 비밀번호 검사
      alert('[비밀번호 입력 오류] 6자이상의 숫자,알파벳,기호로 구성된 비밀번호를 입력해 주세요.');
      pw.focus();
      return false;
    }else if(input_pw.test(pw.val()) != true) { // 비밀번호 검사
      alert('[비밀번호 입력 오류] 6자이상의 숫자,알파벳,기호로 구성된 비밀번호를 입력해 주세요.');
      pw.focus();
      return false;
    }else if(pw.val() != repw.val() ) { // 비밀번호 검사
      alert('[비밀번호 재입력 오류] 같은 비밀번호를 입력해주세요.');
      pw.focus();
      return false;
    } else if(input_tel.test(tel.val()) != true) { // 전화번호 검사
      alert('[전화번호 입력 오류] 정확한 숫자로만 이루어진 전화번호를 입력해 주세요.');
      tel.focus();
      return false;
    }
  });

  $('#pw').after('<strong></strong>');

  pw.keyup( function() {
    var s = $(this).next('strong'); 
    if (pw.val().length == 0) { 
      s.text(''); 
    }else if (pw.val().length < 6) { 
      s.text('비밀번호는 최소 6자이상, 최대20자 로 해주시기 바랍니다.'); 
    }else if (pw.val().length > 18) { 
      s.text('비밀번호는 최소 6자이상, 최대20자 로 해주시기 바랍니다.'); 
    }else { }
  });
  

  tel.keydown( function() {
    if(event.keyCode==109 || event.keyCode==189) {
      return false;
    };
  });

});

</script>
<article>
    <section class="Box1024">
        <span class="SubTitleBig"><?=$subTitle[0]?></span>
        <span class="SubTitleSmall">:&nbsp;<?=$subTitle[1]?></span>
        <hr class="HR_orange100">
    </section>
    <section class="Box1024">
        <form class="form" action="memINPUT.php" method='post'>
        <span class="redNotice">
            * 기본정보만 입력 하셔도 사이트 이용이 가능합니다.<br>
            * 입출금 시에는 회원정보 수정란에 본인명의 통장계좌번호와 주민등록번호를 입력하시면 됩니다.<br>
            * 타인의 명의를 이용하여 생기는 모든 책임은 가입자본인에게 있습니다. 꼭 안되며 본인의 정보만을 입력 하시기 바랍니다.
        </span>
        <hr class="HR_gray100">
        <!--아이디입력-->
        <span class="join_data_name">아이디</span>
        <input class= "Input_join_Default" placeholder="아이디는 이메일로 가입하셔야 합니다." id = 'email' name='email'>
        <button class="Button_join_gray" type="submit">아이디 중복확인</button>
        <span class="inputNotice">* 아이디는 수신가능한 이메일로 입력 하셔야 합니다.</span>
        <div class="idcomment">
            <span>이메일로 정보수신을 동의 하시겠습니까?</span>
            <input name="mailagree" id="mailagree" type="radio" class = "radio" checked>
            <span>예</span>
            <input name="nomailagree" id="nomailagree" type="radio" class = "radio" >
            <span>아니오</span>
        </div>
        <hr class="HR_gray100">
        <!--비밀번호입력-->
        <span class="join_data_name">비밀번호</span>
        <input class= "Input_join_Default" placeholder="비밀번호는 최소4자이상이여야 합니다." type="password" name='pw' id='pw'>
        <span class="join_data_name">비밀번호확인</span>
        <input class= "Input_join_Default" placeholder="앞의 비밀번호랑 동일하게 입력하시기 바랍니다." type="password" name='repw' id='repw'>
        <hr class="HR_gray100">
        <!--이름입력-->
        <span class="join_data_name">이름</span>
        <input class= "Input_join_Default" placeholder="본인이름을 정확히 입력하여 주세요" type="text" name='koname' id='koname'>
        <span class="inputNotice">* 이름은 수익금 정산시에 계좌명의와 동일해야 하므로 정확하게 입력하여 주시기 바랍니다.</span>
        <hr class="HR_gray100">
        <!--연락처입력-->
        <span class="join_data_name">연락처</span>
        <input class= "Input_join_Default" placeholder="숫자만 입력 가능합니다. ex) 01012341234" type="text" name='tel' id='tel'>
        <span class="inputNotice">* 연락가능하신 일반전화, 휴대전화를 숫자만 입력하세요."- "빼고 입력하여주세요.</span>
        <hr class="HR_gray100">
        <!--약관부분-->
        <div class="serviceRule">
            <span>서비스이용약관</span>
            <textarea class="textarea"></textarea>
            <div class="agreeRule">
                <span>위의 약관에 동의하십니까?</span>
                <input name="mailagree" type="checkbox" class = "checkbox" checked>
                <span>예</span>
            </div>
        </div>
        <div class="infoRule">
            <span>개인정보취급방침</span>
            <textarea class="textarea"></textarea>
            <div class="agreeRule">
                <span>위의 개인정보취급방침에 동의하십니까?</span>
                <input name="mailagree2" type="checkbox" class = "checkbox" checked>
                <span>예</span>
            </div>
        </div>
        <hr class="HR_gray100">
        <div class="finChkSubmit">
            <button class="Button_join_gray">다시입력</button>
            <button class="Button_join_black">회원가입</button>
        </div>
        </form>
    </section>
</article>
<? include '00_footer.php'; ?>

