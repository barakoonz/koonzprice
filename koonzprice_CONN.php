<?php
    $azure_domain = "ja-cdbr-azure-east-a.cloudapp.net";
    $azure_id = "b8ecf437586f84";
    $azure_pw = "8231c34b649555d";
    $azure_db = "koonzpriceDB";
    $mysql = mysql_connect($azure_domain, $azure_id, $azure_pw) or die(mysql_error());
    $db = mysql_select_db($azure_db);
?>