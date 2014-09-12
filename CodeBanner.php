<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <title>KoonzPrice.com All CPA,CPS,CPC,CPM Marketing의 모든것</title>
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<link href="css/main.css" rel="stylesheet" type="text/css">
    <link href="css/sub.css" rel="stylesheet" type="text/css">

</head>

<body>
<? include '00_header.php'; ?>
<article>
    <section class="Box1024">
        <span class="SubTitleBig"><?=$subTitle[0]?></span>
        <span class="SubTitleSmall">:&nbsp;<?=$subTitle[1]?></span>
        <hr class="HR_orange100"></hr>
    </section>
    <section class="Box1024">
        <div class="codeTopVis">
            <span class="CodeTopTitle1">
                원하시는 사이트의 코드를 블로그나 카페에 홍보하세요~!
            </span>
            <span class="CodeTopTitle2">
                홍보하실수 있는 앱은 아래 와 같습니다.<br>
                설치율, 실행율 높은 사이트로 홍보를 하면 더욱더 수익률이 극대화됩니다.<br>
                각 앱의 코드•배너보기 버튼을 클릭하면 코드와 배너를 확인할수 있습니다.
            </span>
        </div>
    </section>
    <section class="Box1024">
        
<?
    for($i=1;$i<=7;$i++){
        echo "<!--배너 루푸되는곳-->
        <div style='background-image: url(img/codeBanner_".$i.".png);
                    width:1024px; height:300px; float: left; clear: left;
                    border: 2px;
                    border-style: solid;
                    border-color: #b9b9b9;
                    margin: 10 0 10 0'>
            <div style='background-image: url(img/chart_".$i.".png);
                        width: 112px; height: 300px;float: left; clear: left;
                        font-size: 25pt; color: white;text-align: center; font-weight: bolder;
                        line-height: 112px;text-shadow: 1px 1px 3px #000000;background-repeat: no-repeat;'>
                #".$i."
            </div>
            <p class='codeBigBtn'><a href='#'>코드/베너보기</a></p>
        </div>
        <!--배너 루푸끝-->";
}
?>       
    </section>
</article>



<? include '00_footer.php'; ?>
</body>
</html>
