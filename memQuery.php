<?

include 'koonzprice_CONN.php';



if (htmlspecialchars($_POST['f_status'])){


    if(htmlspecialchars($_POST['f_status']) == "join"){


        //회원가입시----


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
            $date = date("YmdHis");

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
    }elseif(htmlspecialchars($_POST['f_status']) == "edit"){


        //회원정보수정시


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

                        $result = mysql_query("SELECT * FROM members WHERE email='$email'") or die(mysql_error());
                        $row = mysql_fetch_array( $result );
                        $date = $row[regDate].'/'.date("Y-m-d H:i:s");





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






    }elseif(htmlspecialchars($_POST['f_status']) == "free"){

        //회원탈퇴

    }else{
        echo "<script>alert('정상적인 접근이 아닙니다.');location.replace('index.html')</script>";
    }





}else{
    echo "<script>alert('정상적인 접근이 아닙니다.');location.replace('index.html')</script>";
}

?>