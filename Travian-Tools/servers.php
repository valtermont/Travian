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
	<title>Servers</title>
</head>
<body>

<div id="header">
	<h1>TRAVIAN TOOLS BETA</h1>
</div>

<?php 
    main_menu_bar();
?>


	<h3 style="text-align:center;padding-top:0px"><span>SELECT SERVER</span></h3>

<?php 
      $srvrCntry = queryDB("SELECT DISTINCT (SRVRCNTRY) FROM TRAVIAN_SERVERS WHERE SRVRSTATUS ='active'");
      
      while($cntry= $srvrCntry->fetch_object()){ 
          echo '<div class="contentFull"><p style="font-weight:bold;">'.
                    strtoupper($cntry->SRVRCNTRY).' servers </p>';
          
          $srvrDtls = queryDB("SELECT * FROM TRAVIAN_SERVERS WHERE SRVRSTATUS ='active' 
                                and SRVRCNTRY ='".$cntry->SRVRCNTRY."'");
          
          while($srvr= $srvrDtls->fetch_object()){
              echo '<form action="home.php" method="post">';
              echo '<p><button class="button" type="submit" name ="submit">'.substr($srvr->SRVRURL, 7).
                        '</button></p></form>';
          }
       echo '</div>';        
    }
?>


<div id="footer"></div>
</body>
</html>
