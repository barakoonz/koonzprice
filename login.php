
<? 

include 'koonzprice_CONN.php';

$id = htmlspecialchars($_POST['id']);
$pw = htmlspecialchars($_POST['pw']);


$mysql = mysql_connect($azure_domain, $azure_id, $azure_pw); 
  if(!$mysql)
  {
  echo("<script>
  window.alert('DB에 접속할 수 없습니다.');
  history.go(-1);
  </script>");
  exit;
  }
  $mysql = mysql_select_db($azure_db);
  if(!$mysql)
  {
  echo("<script>
  window.alert('DB를 선택 할 수 없습니다.');
  history.go(-1);
  </script>");
  exit;
  }
     #----------------DB에 등록된 회원인지를 확인------------------#
    $query = "INSERT INTO members (email, pw, name) 
                   VALUES ('barakoonz@naver.com','0518','dncnstlr')" or die('erro1');
$result = mysql_query($query);



mysql_close();






?>