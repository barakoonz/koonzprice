<?
session_start();
if($_SESSION['email'] and htmlspecialchars($_POST['email']) and 
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
                $idx = htmlspecialchars($_POST['idx']);
            	$email = htmlspecialchars($_POST['email']);
            	$pw = htmlspecialchars($_POST['pw']);
            	$tel = htmlspecialchars($_POST['telephone']);
            	$name = htmlspecialchars($_POST['name']);
                $bank = htmlspecialchars($_POST['bank']);
                $banknum = htmlspecialchars($_POST['banknum']);
                $jumin = htmlspecialchars($_POST['jumin']);
                $date = date("Y-m-d H:i:s");
                mysql_query(" update members set 
                    name='$name', pw='$pw', tel='$tel', bank='$bank', regDate='$date',
                    banknum='$banknum', jumin='$jumin', email='$email' where id='1' ") or die('eeee');
                mysql_close();
                echo "<script>window.alert('회원수정이 모두 성공적으로 이루어졌습니다.잠시후 자동로그아웃 됩니다.');location.replace('auth.php');</script>";
            };
        };
}else{
    echo "<script>alert('정상적인 접근이 아닙니다.');location.replace('index.html')</script>";
}

?>