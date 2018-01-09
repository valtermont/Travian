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
	<title>Calculators</title>
</head>
<body>

<div id="header">
	<h1> TRAVIAN TOOLS BETA</h1>
</div>

<?php 
    main_menu_bar();
    calculators_side_menu();
?>	
<div class="contentRegular">
	<p>NPC Calculator</p>
	<p>Distance Calculator</p>
	<p>Loot calculator</p>
	<p>Resource calculator</p>
	<p>Buidlings Calculator</p>
	<p>Production Calculator</p>
	<p>Unit Attributes Calculator</p>
	<p>TBD</p>
</div>


<div id="footer"></div>
</body>
</html>
