<?php
    $host = "ja-cdbr-azure-east-a.cloudapp.net";
    $user = "b8ecf437586f84";
    $pwd = "8231c34b649555d";
    $db = "koonzpriceDB";

    $db_server = mysql_connect($host,$user,$pwd) or die ("error1");
    mysql_select_db($db_server) or die ("error2");
    mysql_close();

?>
