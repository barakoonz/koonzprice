<?
if(htmlspecialchars($_POST['email']) and htmlspecialchars($_POST['pw']) and htmlspecialchars($_POST['koname']) and htmlspecialchars($_POST['tel'])){

	include 'koonzprice_CONN.php';
	$mysql = mysql_connect($azure_domain, $azure_id, $azure_pw) or die(mysql_error());
	if(!$mysql){
            echo("<script>window.alert('정상적인 접근이 아닙니다.');location.replace('index.html');</script>");
            exit;
        }else{
        	$mysql = mysql_select_db($azure_db);
            if(!$mysql){
                echo("<script>window.alert('서비스가 정상적이지 못합니다. 잠시후에 접속하시기 바랍니다.');location.replace('index.html');</script>");
                exit;
            }else{
            	$email = htmlspecialchars($_POST['email']);
            	$pw = htmlspecialchars($_POST['pw']);
            	$tel = htmlspecialchars($_POST['tel']);
            	$name = htmlspecialchars($_POST['koname']);
            	$result = mysql_query("insert into members (email,name,pw,tel) values('$email','$name','$pw','$tel')");
            	echo "입력성공";
            	mysql_close();
            	echo("<script>window.alert('회원가입이 모두 성공적으로 이루어졌습니다.');location.replace('index.html');</script>");
            };
        };
}else{
	echo "<script>location.replace('index.html')</script>";
}

?>