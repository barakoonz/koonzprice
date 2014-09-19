
<? 
    if(htmlspecialchars($_POST['email']) and htmlspecialchars($_POST['pw'])){
        
        $email = htmlspecialchars($_POST['email']);
        $pw = htmlspecialchars($_POST['pw']);

        include 'koonzprice_CONN.php';    
        
        if(!$mysql){
            echo("<script>window.alert('정상적인 접근이 아닙니다.');location.replace('index.html');</script>");
            exit;
        }else{
            if(!$db){
                echo("<script>window.alert('서비스가 정상적이지 못합니다. 잠시후에 접속하시기 바랍니다.');location.replace('index.html');</script>");
                exit;
            }else{
                $result = mysql_query("SELECT * FROM members WHERE email = '$email' and pw='$pw'") or die(mysql_error());
                $row = mysql_fetch_array( $result );

                if ($row[0] == ""){
                    echo("<script>window.alert('아이디와 비밀번호를 확인해 주세요');location.replace('index.html');</script>");
                    exit;
                }else{
                    session_cache_expire(30);
                    session_start();
                    $_SESSION["email"]=$row['email'];
                    $_SESSION["name"]=$row['name'];
                    $_SESSION["pw"]=$row['pw'];
                    mysql_close();
                    echo "<script>window.alert('".$_SESSION["name"]."님 반갑습니다. 오늘도 대박나는 하루보내세요!!~~');location.replace('index.html')</script>";
                    exit;
                }
            }
        }
    }else{
        session_start();
        if ($_SESSION["email"]){
            session_destroy();
            echo "<script>alert('로그아웃이 성공적으로 되었습니다.');location.replace('index.html')</script>";
            exit;
        }else{
            echo"<script>alert('잘못된 접근입니다.');location.replace('index.html')</script>";
            exit;
        }
}

?>