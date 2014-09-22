<?
session_start();
if($_SESSION['email'] and htmlspecialchars($_POST['f_edit_emailID']) and 
    htmlspecialchars($_POST['f_pw1']) == htmlspecialchars($_POST['f_pw2']) 
    and htmlspecialchars($_POST['f_name']) and
    htmlspecialchars($_POST['f_tel']) and htmlspecialchars($_POST['f_mailCHK']) == "yes" and
    htmlspecialchars($_POST['f_memnotice']) == "yes" and htmlspecialchars($_POST['f_privacy']) == "yes")
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
                $idx = htmlspecialchars($_POST['f_idx']);
            	$email = htmlspecialchars($_POST['f_edit_emailID']);
            	$pw = htmlspecialchars($_POST['f_pw1']);
            	$tel = htmlspecialchars($_POST['f_tel']);
            	$name = htmlspecialchars($_POST['f_name']);
                $bank = htmlspecialchars($_POST['f_bank']);
                $banknum = htmlspecialchars($_POST['f_banknum']);
                $jumin = htmlspecialchars($_POST['f_jumin']);
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