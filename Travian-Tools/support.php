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
	<title>Support</title>
</head>
<body>

<div id="header">
	<h1> TRAVIAN TOOLS BETA</h1>
</div>

<?php 
    main_menu_bar(); 
?>
	<p>Contact Us - Email</p>
	<p>Payment tab</p>
	<p> Currently selected <?php echo $GLOBALS['SRVRVER'].' IN '.$GLOBALS['SRVRCNTRY'];?>
	

<div id="footer"></div>
</body>
</html>
