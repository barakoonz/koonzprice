
<? include '00_header.php'; ?>
<article>
    <section class="MainVisBox">
    <!--메인비주얼 -->

        <h1>모바일앱,CPA 전문 제휴마케팅사이트</h1>
        <h2>자신의 웹사이트, 블로그, 게시판, SNS 등을 통해</h2>
        <h3>극대화된 수익을 창출하세요!!</h3>
        <h4>KOONZprice와 함께라면<br>
        모든것이 가능해집니다.</h4>
        <? 
            if(!$_SESSION['email']){
                echo '<div class="mainMemJoin"><a href="Join.php">&gt; 회원가입</a></div>';
            }else{
                echo '<div class="mainMemJoin"><a href="Money.php">&gt; 수익확인</a></div>';
            }
        ?>
        
    </section>


    <!--메인컨텐츠1-->
    <section class="ContentsBox1">
        <div class="Box1024">
        <div class="ContentsBoxTitle">
            &gt;&gt; SERVICE INTRODUCTION
        </div>
            <div class="ContentsBox1_IMG">
                <img src="img/main_contents_vis_1.png" width="118" height="140"/>
                <div class="ContentsBox1_IMG_title">
                    광고코드를 가져다 노출을 합니다.
                </div>
                <div class="ContentsBox1_IMG_text">
                    배너, 텍스트광고를 방문자들이 클릭하여 앱을 설치합니다. 유선과 무선을 모두 제공하므로 가입자들이 설치를 하는데 불편함은 없습니다.
                </div>
            </div>
            <div class="ContentsBox1_CenterArrow">
                <img src="img/main_contents_vis_0.png" width="22" height="93"/>
            </div>
            <div class="ContentsBox1_IMG">
                <img src="img/main_contents_vis_2.png" width="118" height="140"/>
                <div class="ContentsBox1_IMG_title">
                    광고코드를 가져다 노출을 합니다.
                </div>
                <div class="ContentsBox1_IMG_text">
                    배너, 텍스트광고를 방문자들이 클릭하여 앱을 설치합니다. 유선과 무선을 모두 제공하므로 가입자들이 설치를 하는데 불편함은 없습니다.
                </div>
            </div>
            <div class="ContentsBox1_CenterArrow">
                <img src="img/main_contents_vis_0.png" width="22" height="93"/>
            </div>
            <div class="ContentsBox1_IMG">
                <img src="img/main_contents_vis_3.png" width="118" height="140"/>
                <div class="ContentsBox1_IMG_title">
                    광고코드를 가져다 노출을 합니다.
                </div>
                <div class="ContentsBox1_IMG_text">
                    배너, 텍스트광고를 방문자들이 클릭하여 앱을 설치합니다. 유선과 무선을 모두 제공하므로 가입자들이 설치를 하는데 불편함은 없습니다.
                </div>
            </div>    
        </div>        
    </section>
    <!--메인컨텐츠2-->
    <section class="Box1024">
        <div class="ContentsBoxTitle">
            &gt;&gt; EASY TO USE
        </div>
        <div class="ContentsBox2Headcopy">
            “지인들에게 SMS, 카카오톡, SNS로 홍보하세요.”
        </div>
    </section>
    <section class="Box1024">        
        <div class="ContentsBox2VisualIcon">
            <img src="img/main_contents2_vis_1.png"><br>
            플레이 스토어에서 KOONZprice 앱을 검색, 설치하세요.
        </div>
        <div class="ContainerMainContents2Visualcenter">
            <img src="img/main_contents2_vis_center.png">
        </div>        
        <div class="ContentsBox2VisualIcon">
            <img src="img/main_contents2_vis_2.png"><br>
            다운르도 받은 KOONZprice앱을 실행하신 후 로그인을 하세요.
        </div>
        <div class="ContainerMainContents2Visualcenter">
            <img src="img/main_contents2_vis_center.png">
        </div>        
        <div class="ContentsBox2VisualIcon">
            <img src="img/main_contents2_vis_3.png"><br>
            원하시는 홍보툴을 선택하세요.
        </div>
        <div class="ContainerMainContents2Visualcenter">
            <img src="img/main_contents2_vis_center.png">
        </div>
        <div class="ContentsBox2VisualIcon">
            <img src="img/main_contents2_vis_4.png"><br>
            홍보문구를 선택하신후 마케팅을 진행 하세요.
        </div>
        <div class="ContentsBox2VisualNotice">
            마케팅에 사용하는 SMS 는 자신의 휴대폰에서 발송이 됩니다.문자무제한 요금제에 가입하시고 사용하시기 바랍니다. 
            <br>카카오톡 마케팅이 경우 데이터요금이 본인 휴대폰요금에 과금이 되므로 가급적 와이파이 상태에서 사용하시기 바랍니다. 
            <br>절대로 스팸성 문구, 불특정다수에게 발송하는 스팸성 불가하며 적발시 환수조치하며 당사는 아무런 도움을 드리지 못합니다. 유념하시기 바랍니다.
        </div>
    </section>
</article>
<!--푸터-->
<? include '00_footer.php'; ?>
