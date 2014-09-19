<?
$Ajax_return="none";

if ($_POST['email']) {



  $email = $_POST['email'];
  include "koonzprice_CONN.php";
  $mysql = mysql_connect($azure_domain, $azure_id, $azure_pw) or die(mysql_error());
  $mysql = mysql_select_db($azure_db);
  $result = mysql_query("SELECT COUNT(*) FROM members WHERE email='$email'") or die(mysql_error());
  $row = mysql_fetch_array( $result );


  if($row[0] == 0){
    $Ajax_return=1;
  }else{
   $Ajax_return=0;
  };
  echo $Ajax_return;
  mysql_close();
};
?> 
