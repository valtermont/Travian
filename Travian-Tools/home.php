<?php
include_once 'Utilities/DBFunctions.php';
include_once 'Operations/menu.php';
include_once 'Operations/forms.php';
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
	<link rel="stylesheet" type="text/css" href="CSS/main.css" />
	<link rel="stylesheet" type="text/css" href="CSS/menu.css" />
	<title>Home</title>
</head>
<body>

<div id="header">
	<h1> TRAVIAN TOOLS BETA</h1>
</div>

<?php 
    main_menu_bar();
?>
<div class="contentFull">
	<p>Select the Servers from the list</p>

<?php
    if(isset($_POST['server'])&&$_POST['server']!=NULL){
      $srvrDtls = queryDB("SELECT * FROM TRAVIAN_SERVERS WHERE SRVRID ='".$_POST['server']."'");
      
      while($srvr= $srvrDtls->fetch_object()){         
          $GLOBALS['SRVRVER']= $srvr->SRVRVER;
          $GLOBALS['SRVRCNTRY']=$srvr->SRVRCNTRY;
      }
    }else{
        echo 'server not set';
        $srvrDtls = queryDB("SELECT * FROM TRAVIAN_SERVERS WHERE SRVRSTATUS = 'active'");
        serverSelectForm($srvrDtls);
    }
?>
</div>


<div id="footer"></div>
</body>
</html>
