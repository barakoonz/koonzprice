<?
    session_start();





    function PageName(){
        return ['main','MarketingAPP','CodeBanner','Money','BBS','Company','Join','FindMember'];
    }
    function subTitle(){

        $urlData = $_SERVER['PHP_SELF'];
        $urlData=str_replace('/koonzprice/',"",$urlData);
        $urlData=str_replace('.php',"",$urlData);
        if ($urlData == "main"){ 
            return  array("메인",$urlData,"yes");    
        }elseif ($urlData == "MarketingAPP") {
            return  array("마케팅앱","MarketingAPP","yes");    
        }elseif ($urlData == "CodeBanner") {
            return  array("코드/배너",$urlData,"no");    
        }elseif ($urlData == "Money") {
            return  array("수익금내역",$urlData,"no");    
        }elseif ($urlData == "BBS") {
            return  array("게시판",$urlData,"no");    
        }elseif ($urlData == "Company") {
            return  array("회사소개",$urlData,"yes");    
        }elseif ($urlData == "Join") {
            return  array("회원가입",$urlData,"yes");    
        }elseif ($urlData == "FindMember") {
            return  array("아이디/비번찾기",$urlData,"yes");    
        };
    };
 
    $PageName = PageName();
    $subTitle = subTitle();

    if(!$_SESSION["email"]){
        if($subTitle[1]=="BBS" or $subTitle[1]=="CodeBanner" or $subTitle[1]=="Money" ){
            echo '<script>alert("로그인이 필요한 서비스 입니다. 로그인후 사용하여 주시기 바랍니다.");location.replace("index.html")</script>';

        };
    };

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
	<form action = "auth.php" method="post">
            <p><!--아이디 비밀 로그인-->
                <div style="width:395px; float:left">
                <h3>아이디</h3>
                <input type="text" name="id">
                <h3>비밀번호</h3>
                <input type="password" name="pw">
                </div>
                <button class="big_button_black"  type="submit">로그인</button>
                <!--회색줄-->
                <hr style="width: 492px; border: thin dotted #D4D4D4; margin-left: 50px; float: left; clear: none;">
            </p>
            <button class="normal_button_gray" type="submit">아이디/비번찾기</button>
            <button class="normal_button_gray" type="submit">회원가입</button>
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
            <a href="index.html"><img src="img/header_h1_bi.png" width="371" height="65"/></a>
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

                
<?
    function pageCHKsession($data){
        if($_SESSION["email"]){
            echo '<a href="'.$data.'.php">';
        }elseif(!$_SESSION["email"]){
            echo '<a href="#" class="btn-example" onclick=layer_open("loginPopup");return false;>';
        };  
    }
?>

    <nav class="topNav">
        <div class="Box1024">
            <div class="NavBoxLeft">
                <span class="NavBoxLeft_me"><a href="<?=$PageName[0]?>.php">Home</a></span>
                <span class="NavBoxLeft_Default"><a href="<?=$PageName[1]?>.php">마케팅앱</a></span>
                <span class="NavBoxLeft_Default"><?pageCHKsession($PageName[2])?>코드배너</a></span>
                <span class="NavBoxLeft_Default"><?pageCHKsession($PageName[3])?>수익금내역</a></span>
                <span class="NavBoxLeft_Default"><?pageCHKsession($PageName[4])?>게시판</a></span>
                <span class="NavBoxLeft_Default"><a href="<?=$PageName[5]?>.php">회사소개</a></span>
            </div>
            <div class="NavBoxRight">

<?
    if($_SESSION["email"]){
        echo'<!--로그인후-->
                <span class="loginSUC_name">'.$_SESSION["name"].'!</span>
                <span class="loginSUC_ment">님 반갑습니다~</span>

                <span class="NavBoxRight_join">
                    <a href="'.$PageName[6].'.php">회원정보수정</a>
                </span>
                <span class="NavBoxLeftCenter">|</span>
                <span class="NavBoxRight_login">
                    <a href="auth.php">로그아웃</a>
                </span>
                <!--로그인전-->';

    }else{
        echo '<!--로그인전-->
                <span class="NavBoxRight_join">
                    <a href="'.$PageName[6].'.php">회원가입</a>
                </span>
                <span class="NavBoxLeftCenter">|</span>
                <span class="NavBoxRight_login">
                    <a href="#" class="btn-example" onclick=layer_open("loginPopup");return false;>로그인</a>
                </span>
                <!--로그인전-->';
    };
?>


                
            </div>
        </div>
    </nav>
</header>
<? if ($subTitle[2] == "yes"){
	echo $loginpoup;
	}
?>
