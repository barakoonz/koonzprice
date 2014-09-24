
<? include '00_header.php'; ?>

<!--아이디중복 script-->
<script type="text/javascript">
// <![CDATA[

function idCHK(){

  var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

          if(xmlhttp.responseText > 0){
            alert('사용이 가능한 아이디 입니다.');
            document.getElementById('f_edit_emailID_chkValue').value = 1;
            document.getElementById('f_idCHK').value = 1;
            return true;
          }else if(xmlhttp.responseText <= 0){ 
            alert('기존에 사용하시던 아이디이거나 ,사용 불가능한 아이디 입니다.다른아이디를 입력하여주세요.');
            document.mem.elements['f_emailID'].value = "";
            return false;
          }
          

        }
    }
    xmlhttp.open("POST", "join_chk.php", true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send("email=" + document.mem.elements['f_edit_emailID'].value);

}



jQuery( function($) {

  var re_id = /^([\w\.-]+)@([a-z\d\.-]+)\.([a-z\.]{2,6})$/; // 이메일 검사식
  var re_pw1 = /^[a-z0-9_-]{4,20}$/; // 비밀번호 검사식
  var re_pw2 = /^[a-z0-9_-]{4,20}$/; // 비밀번호 검사식
  var re_name = /^[가-힣]{2,20}$/;//한글이름체크
  var re_tel = /^[0-9]{8,11}$/;

  var 
    form = $('.form'), 
    func_emailID = $('#f_edit_emailID'), 
    func_pw1 = $('#f_pw1'), 
    func_pw2 = $('#f_pw2'), 
    func_name = $('#f_name'),
    func_tel = $('#f_tel');   


  form.submit( function() {






    if (re_id.test(func_emailID.val()) != true) { // 아이디 검사
      alert('[ID 입력 오류]\n정확한 이메일주소로 입력하여 주시기 바랍니다.');
      f_edit_emailID.focus();
      return false;
    } else if( !($('#f_mailCHK').is(":checked")) ){
      alert('[이메일정보수신 오류]\n이메일 정보수신을 동의하셔야만 회원 가입이 가능합니다.');
      $('#f_mailCHK').focus();
      return false;
    } else if( !($('#f_memnotice').is(":checked")) ){
      alert('[이용약관동의 오류]\n이용약관을 동의 하셔야만 회원가입이 됩니다. 약관 동의를 해주시기 바랍니다.');
      $('#f_memnotice').focus();
      return false;
    } else if( !($('#f_privacy').is(":checked")) ){
      alert('[개인정보보호정책 동의오류]\n개인정보보호정책을 동의해야만 가입이 가능합니다.');
      $('#f_privacy').focus();
      return false;
    } else if(re_pw1.test(func_pw1.val()) != true) { // 비밀번호 검사
      alert('[비밀번호 입력 오류]\n비밀번호는 숫자,알파벳,기호등으로 이루어진 4자이상 20자이하로 입력해 주세요.');
      f_pw1.focus();
      return false;
    } else if(re_pw2.test(func_pw2.val()) != true) { // 비밀번호 검사
      alert('[비밀번호확인 입력 오류]\n비밀번호는 숫자,알파벳,기호등으로 이루어진 4자이상 20자이하로 입력해 주세요.');
      f_pw2.focus();
      return false;
    } else if(f_pw1.value != f_pw2.value) {
      alert('[비밀번호입력오류]\n동일한 비밀번호를 숫자,알파벳,기호등으로 이루어진 4자이상 20자이하로 입력해 주세요.');
      f_pw1.focus();
      return false;
    } else if(re_name.test(func_name.val()) != true) {
      alert('[이름입력오류]\n이름은 한글로 이루어진 본인이름을 입력하여 주시기 바랍니다.');
      f_name.focus();
      return false;
    } else if(re_tel.test(func_tel.val()) != true) { // 전화번호 검사
      alert('[전화번호 입력 오류]\n"-" 를 제외한 정확한 전화번호를 입력해 주세요.');
      f_tel.focus();
      return false;
    } else if(document.mem.elements['f_edit_emailID_chkValue'].value > 0){
        if (document.mem.elements['f_idCHK'].value < 1){
          alert('[아이디수정 오류]\n아이디를 수정하시려면 아이디중복체크를 하셔야만 수정이 가능합니다.')
          f_idCHK.focus();
          return false;
        }
    }
  });
  tel.keydown( function() {
    if(event.keyCode==109 || event.keyCode==189) {
      return false;
    }
  });

});
// ]]>
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
        <form action="memQuery.php" class="form" name="mem" method = "post">
           <input type="hidden" name="f_status" id="f_status" value = "edit">
        <span class="redNotice">
            * 기본정보만 입력 하셔도 사이트 이용이 가능합니다.<br>
            * 입출금 시에는 회원정보 수정란에 본인명의 통장계좌번호와 주민등록번호를 입력하시면 됩니다.<br>
            * 타인의 명의를 이용하여 생기는 모든 책임은 가입자본인에게 있습니다. 꼭 안되며 본인의 정보만을 입력 하시기 바랍니다.
        </span>
        <hr class="HR_gray100">
        <!--아이디입력-->
        <span class="join_data_name">아이디</span>
        <input type="hidden" value="<?=$row[email];?>" name="f_org_emailID" id="f_org_emailID">
        <input type="hidden" name="f_edit_emailID_chkValue" id="f_edit_emailID_chkValue" value=0>
        <input type="hidden" name="f_idCHK" id="f_idCHK" value=0>
        <input type="hidden"  name="f_idx" id="f_idx" value="<?=$row[id];?>">
        <input type="text" name="f_edit_emailID" id="f_edit_emailID" class= "Input_join_Default" value="<?=$row[email];?>"/><br />
        <a href="#" onClick="javascript:idCHK()"><span class="span_BTN" type="hidden">아이디 중복확인</span></a>
        <span class="inputNotice">* 아이디는 수신가능한 이메일로 입력 하셔야 합니다.</span>
        <div class="idcomment">
            <span>이메일로 정보수신을 동의 하시겠습니까?</span>
            <input name="f_mailCHK" id="f_mailCHK" type="checkbox"  value="yes" class = "checkbox" checked>
        </div>
        <hr class="HR_gray100">
        <!--비밀번호입력-->
        <span class="join_data_name">비밀번호</span>
        <input type="password" name="f_pw1" id="f_pw1" value="<?=$row[pw];?>" class= "Input_join_Default" placeholder="비밀번호는 최소4자이상이여야 합니다." />
        <span class="join_data_name">비밀번호확인</span>
        <input type="password" name="f_pw2" id="f_pw2" value="<?=$row[pw];?>" class= "Input_join_Default" placeholder="앞의 비밀번호랑 동일하게 입력하시기 바랍니다."/>
        <hr class="HR_gray100">
        <!--이름입력-->
        <span class="join_data_name">이름</span>
        <input type="text" name="f_name" id="f_name" value="<?=$row[name];?>" class= "Input_join_Default" placeholder="본인이름을 정확히 입력하여 주세요" />
        <span class="inputNotice">* 이름은 수익금 정산시에 계좌명의와 동일해야 하므로 정확하게 입력하여 주시기 바랍니다.</span>
        <hr class="HR_gray100">
        <!--연락처입력-->
        <span class="join_data_name">연락처</span>
        <input class= "Input_join_Default"  type="text" name='f_tel' id='f_tel' value="<?=$row[tel];?>">
        <span class="inputNotice">* 연락가능하신 일반전화, 휴대전화를 숫자만 입력하세요."- "빼고 입력하여주세요.</span>
        <hr class="HR_gray100">
        <!--은행명-->
        <span class="join_data_name">은행명</span>
        <input class= "Input_join_Default" type="text" name='f_bank' id='f_bank' value="<?=$row[bank];?>">
        <hr class="HR_gray100">
        <!--게좌번호-->
        <span class="join_data_name">계좌번호</span>
        <input class= "Input_join_Default" placeholder="숫자만 입력 가능합니다. ex) 54652341234" type="text" name='f_banknum' id='f_banknum' value="<?=$row[banknum];?>">
        <span class="inputNotice">* 계좌번호는 가입하신분의 본인 이름과 주민등록번호로 개설된 계좌여야 합니다.</span>
        <hr class="HR_gray100">
        <!--주민등록번호-->
        <span class="join_data_name">주민등록번호</span>
        <input class= "Input_join_Default" placeholder="숫자만 입력 가능합니다. ex) 7101011001010" type="text" name='f_jumin' id='f_jumin' value="<?=$row[jumin];?>">
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
                <input type="checkbox" id="f_memnotice" name="f_memnotice" value="yes" checked class = "checkbox">
                <span>예</span>
            </div>
        </div>
        <div class="infoRule">
            <span>개인정보취급방침</span>
            <textarea class="textarea"></textarea>
            <div class="agreeRule">
                <span>위의 개인정보취급방침에 동의하십니까?</span>
                <input id="f_privacy" name="f_privacy" type="checkbox"  value="yes" class = "checkbox" checked>
                <span>예</span>
            </div>
        </div>
        <hr class="HR_gray100">
        <div class="finChkSubmit">
            <button type = "reset" class="Button_join_gray">회원탈퇴</button>
            <button type="submit" name="btnSubmit" id="btnSubmit" class="Button_join_black">회원정보수정</button>
        </div>
        </form>
    </section>
</article>
<? include '00_footer.php'; ?>

