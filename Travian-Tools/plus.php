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
	<title>Plus</title>
</head>
<body>

<div id="header">
	<h1> TRAVIAN TOOLS BETA</h1>
</div>

<?php 
    main_menu_bar();
    plus_side_menu();   
?>
<div class="contentRegular">
	<p>Admin</p>
	<p>Defense Coordinator</p>
	<p>Ops Planner</p>
	<p>Train Troops(Extended)</p>
	<p>Artifacts</p>
</div>


<div id="footer"></div>
</body>
</html>
