<?
echo '아이디_이메일호 : '.htmlspecialchars($_POST['email']);
echo "<br>";
echo '비밀번호0 : '.htmlspecialchars($_POST['pw']);
echo "<br>";
echo '비밀번호1 : '.htmlspecialchars($_POST['pw1']);
echo "<br>";
echo '이름 : '.htmlspecialchars($_POST['name']);
echo "<br>";
echo '전번 : '.htmlspecialchars($_POST['telephone']);
echo "<br>";
echo '메일수신여부 : '. htmlspecialchars($_POST['mailCHK']);
echo "<br>";
echo '이용약관동의 : '.htmlspecialchars($_POST['agreeMEM']);
echo "<br>";
echo "개인정보보호정책동의 : ".htmlspecialchars($_POST['privacy']);
echo "<br>";
echo "현재시간 : ".date("Y-m-d H:i:s");
?><br>