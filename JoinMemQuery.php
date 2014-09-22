<?



include 'koonzprice_CONN.php';

if(htmlspecialchars($_POST['f_emailID']) and htmlspecialchars($_POST['f_idCHK']) and
    htmlspecialchars($_POST['f_emailID']) == htmlspecialchars($_POST['f_idCHK']) and
    htmlspecialchars($_POST['f_pw1']) == htmlspecialchars($_POST['f_pw2']) and
    htmlspecialchars($_POST['f_emailID']) and htmlspecialchars($_POST['f_name']) and
    htmlspecialchars($_POST['f_tel']) and htmlspecialchars($_POST['f_mailCHK']) == "yes" and
    htmlspecialchars($_POST['f_memnotice']) == "yes" and 
    htmlspecialchars($_POST['f_privacy']) == "yes" and $mysql)
{
    date_default_timezone_set("Asia/Seoul");            
	$email = htmlspecialchars($_POST['f_emailID']);
    $pw = htmlspecialchars($_POST['f_pw1']);
    $telephone = htmlspecialchars($_POST['f_tel']);
    $name = htmlspecialchars($_POST['f_name']);
    $date = date("Y-m-d H:i:s");

    $idCHKresult = mysql_query("SELECT COUNT(*) FROM members WHERE email='$email'") or die(mysql_error());
    $idCHKresultQuery = mysql_fetch_array( $idCHKresult );
    if($idCHKresultQuery[0] == 0){
        $result = mysql_query("insert into members (email,name,pw,tel,regDate) values('$email','$name','$pw','$telephone','$date')");
        mysql_close();
        session_start();
            $_SESSION["email"] = $email;
            $_SESSION["name"] = $name;
        echo("<script>window.alert('회원가입이 모두 성공적으로 이루어졌습니다.');location.replace('index.html');</script>");
    }else{
        echo "<script>alert('동일한 이메일 아이디가 있습니다. 재가입신청해주시기 바랍니다.');location.replace('index.html')</script>";
    }
}else{
	echo "<script>alert('정상적인 접근이 아닙니다.');location.replace('index.html')</script>";
}

?>