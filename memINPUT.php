<?
if(htmlspecialchars($_POST['email']) and htmlspecialchars($_POST['emailCHKvalue']) > 0 and
    htmlspecialchars($_POST['pw']) == htmlspecialchars($_POST['pw1']) and
    htmlspecialchars($_POST['email']) and htmlspecialchars($_POST['name']) and
    htmlspecialchars($_POST['telephone']) and htmlspecialchars($_POST['mailCHK']) == "yes" and
    htmlspecialchars($_POST['agreeMEM']) == "yes" and htmlspecialchars($_POST['privacy']) == "yes")

{



    date_default_timezone_set("Asia/Seoul");
	include 'koonzprice_CONN.php';
	
	if(!$mysql){
            echo("<script>window.alert('정상적인 접근이 아닙니다.');location.replace('index.html');</script>");
            exit;
        }else{
        	
            if(!$db){
                echo("<script>window.alert('서비스가 정상적이지 못합니다. 잠시후에 접속하시기 바랍니다.');location.replace('index.html');</script>");
                exit;
            }else{
            	$email = htmlspecialchars($_POST['email']);
            	$pw = htmlspecialchars($_POST['pw']);
            	$telephone = htmlspecialchars($_POST['telephone']);
            	$name = htmlspecialchars($_POST['name']);
                $date = date("Y-m-d H:i:s");
            	$result = mysql_query("insert into members (email,name,pw,tel,regDate) values('$email','$name','$pw','$telephone','$date')");
            	mysql_close();
                session_start();
                    $_SESSION["email"] = $email;
                    $_SESSION["name"] = $name;
            	echo("<script>window.alert('회원가입이 모두 성공적으로 이루어졌습니다.');location.replace('index.html');</script>");
            };
        };
}else{
	echo "<script>alert('정상적인 접근이 아닙니다.');location.replace('index.html')</script>";
}

?>