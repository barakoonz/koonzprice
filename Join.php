
<? include '00_header.php'; ?>

<article>
    <section class="Box1024">
        <span class="SubTitleBig"><?=$subTitle[0]?></span>
        <span class="SubTitleSmall">:&nbsp;<?=$subTitle[1]?></span>
        <hr class="HR_orange100">
    </section>
    <section class="Box1024">
        <form>
        <span class="redNotice">
            * 기본정보만 입력 하셔도 사이트 이용이 가능합니다.<br>
            * 입출금 시에는 회원정보 수정란에 본인명의 통장계좌번호와 주민등록번호를 입력하시면 됩니다.<br>
            * 타인의 명의를 이용하여 생기는 모든 책임은 가입자본인에게 있습니다. 꼭 안되며 본인의 정보만을 입력 하시기 바랍니다.
        </span>
        <hr class="HR_gray100">
        <!--아이디입력-->
        <span class="join_data_name">아이디</span>
        <input class= "Input_join_Default" placeholder="아이디는 이메일로 가입하셔야 합니다.">
        <button class="Button_join_gray" >아이디 중복확인</button>
        <span class="inputNotice">* 아이디는 수신가능한 이메일로 입력 하셔야 합니다.</span>
        <div class="idcomment">
            <span>이메일로 정보수신을 동의 하시겠습니까?</span>
            <input name="mailagree" type="radio" class = "radio" checked>
            <span>예</span>
            <input name="mailagree" type="radio" class = "radio" >
            <span>아니오</span>
        </div>
        <hr class="HR_gray100">
        <!--비밀번호입력-->
        <span class="join_data_name">비밀번호</span>
        <input class= "Input_join_Default" placeholder="비밀번호는 최소4자이상이여야 합니다." type="password">
        <span class="join_data_name">비밀번호확인</span>
        <input class= "Input_join_Default" placeholder="앞의 비밀번호랑 동일하게 입력하시기 바랍니다." type="password">
        <hr class="HR_gray100">
        <!--이름입력-->
        <span class="join_data_name">이름</span>
        <input class= "Input_join_Default" placeholder="본인이름을 정확히 입력하여 주세요" type="password">
        <span class="inputNotice">* 이름은 수익금 정산시에 계좌명의와 동일해야 하므로 정확하게 입력하여 주시기 바랍니다.</span>
        <hr class="HR_gray100">
        <!--연락처입력-->
        <span class="join_data_name">연락처</span>
        <input class= "Input_join_Default" placeholder="숫자만 입력 가능합니다. ex) 01012341234" type="password">
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

