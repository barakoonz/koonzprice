<?
	$loginpoup = '
<!--로그인 팝업부-->
	<div class="popupMain" >
	<div class="bg"></div>
        <div id="loginPopup" class="pop-layer" >
            <div class="pop-container">
            <!--로그인시작, 오렌지줄-->
            <p>
                <h1>로그인</h1>
                <h2>member</h2>
                <span class="btn-r">
                <a href="#" class="cbtn"><img src="img/close.png"></a>
                </span>
                <hr style="width: 492px; border: thin solid #F54E02; clear: left; margin-left: 50px;">            
            </p>
	<form>
            <p><!--아이디 비밀 로그인-->
                <div style="width:395px; float:left">
                <h3>아이디</h3>
                <input type="text">
                <h3>비밀번호</h3>
                <input type="password" >
                </div>
                <button class="big_button_black">로그인</button>
                <!--회색줄-->
                <hr style="width: 492px; border: thin dotted #D4D4D4; margin-left: 50px; float: left; clear: none;">
            </p>
            <button class="normal_button_gray">아이디/비번찾기</button>
            <button class="normal_button_gray">회원가입</button>
	</form>
		</div>
	</div>
</div> 
<script type="text/javascript">
	function layer_open(el){

		var temp = $("#" + el);
		var bg = temp.prev().hasClass("bg");	//dimmed 레이어를 감지하기 위한 boolean 변수

		if(bg){
			$(".popupMain").fadeIn();	//"bg" 클래스가 존재하면 레이어가 나타나고 배경은 dimmed 된다. 
		}else{
			temp.fadeIn();
		}

		// 화면의 중앙에 레이어를 띄운다.
		if (temp.outerHeight() < $(document).height() ) temp.css("margin-top", "-"+temp.outerHeight()/2+"px");
		else temp.css("top", "0px");
		if (temp.outerWidth() < $(document).width() ) temp.css("margin-left", "-"+temp.outerWidth()/2+"px");
		else temp.css("left", "0px");

		temp.find("a.cbtn").click(function(e){
			if(bg){
				$(".popupMain").fadeOut(); //"bg" 클래스가 존재하면 레이어를 사라지게 한다. 
			}else{
				temp.fadeOut();
			}
			e.preventDefault();
		});

		$(".layer .bg").click(function(e){	//배경을 클릭하면 레이어를 사라지게 하는 이벤트 핸들러
			$(".layer").fadeOut();
			e.preventDefault();
		});

	}				
</script>
	';


    $NowPageName = $_SERVER['PHP_SELF'];
    $PageName = ['main','MarketingAPP','CodeBanner','Money','BBS','Company','Join','FindMember'];
    if (preg_match("/main/i", $NowPageName)) {
      $subTitle[0] = "메인"; $subTitle[1] = $PageName[0]; $jsload = "yes";
    }else if (preg_match("/app/i", $NowPageName)) { 
      $subTitle[0] = "마케팅앱"; $subTitle[1] = $PageName[1]; $jsload = "yes";
    }else if(preg_match("/code/i", $NowPageName)) { 
      $subTitle[0] = "코드배너"; $subTitle[1] = $PageName[2];
    }else if(preg_match("/money/i", $NowPageName)) { 
      $subTitle[0] = "수익금내역"; $subTitle[1] = $PageName[3];
    }else if(preg_match("/bbs/i", $NowPageName)) { 
      $subTitle[0] = "게시판"; $subTitle[1] = $PageName[4];
    }else if(preg_match("/company/i", $NowPageName)) {
      $subTitle[0] = "회사소개"; $subTitle[1] = $PageName[5]; $jsload = "yes";
    }else if(preg_match("/join/i", $NowPageName)) { 
      $subTitle[0] = "회원가입"; $subTitle[1] = $PageName[6]; $jsload = "yes";
    }else if(preg_match("/findmem/i", $NowPageName)) { 
      $subTitle[0] = "아이디/비번찾기"; $subTitle[1] = $PageName[7]; $jsload = "yes";
    };
?>
<!--헤더부분-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>KoonzPrice.com All CPA,CPS,CPC,CPM Marketing의 모든것</title>
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<link href="css/main.css" rel="stylesheet" type="text/css">
    <? if($subTitle[1]){ echo "<link href='css/" , $subTitle[1],  ".css' rel='stylesheet' type='text/css'>";}; ?>    

</head>
<body>
<header>
    <!--bi와 우측 연락처정보 부분-->
    <div class="HeaderTop">
        <div class="HeaderTopBI" >
            <a href="main.php"><img src="img/header_h1_bi.png" width="371" height="65"/></a>
        </div>
        <div class="HeaderTopCallmeBox">
            <div class="HeaderCallmeTelEmailBox">
                <h1>070-8816-6672</h1>
                <h2><a href="mailto:koonzprice@gmail.com">koonzprice@gmail.com</a></h2></div>
            <div class="HeaderTopCallmePicBox">
                <img src="img/header_article_callme.png" width="117" height="32"/></div>  
        </div>
    </div>
    <!--메뉴부분 -->
    <nav class="topNav">
        <div class="NavBox">
            <div class="NavBoxLeft">		
                <span><a href="<?=$PageName[0]?>.php">Home</a></span>
                <span><a href="<?=$PageName[1]?>.php">마케팅앱</a></span>
                <span><a href="<?=$PageName[2]?>.php">코드배너</a></span>
                <span><a href="<?=$PageName[3]?>.php">수익금내역</a></span>
                <span><a href="<?=$PageName[4]?>.php">게시판</a></span>
                <span><a href="<?=$PageName[5]?>.php">회사소개</a></span>
            </div>
            <div class="NavBoxRight">
                <span><a href="<?=$PageName[6]?>.php">회원가입</a></span>
                <span>|</span>
                <span><a href="#" class="btn-example" onclick="layer_open('loginPopup');return false;">로그인</a></span>
            </div>
        </div>
    </nav>
</header>
<? if ($jsload == "yes"){
	echo $loginpoup;
	}
?>
