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
	<title>Tools</title>
</head>
<body>

<div id="header">
	<h1> TRAVIAN TOOLS BETA</h1>
</div>

<?php 
    main_menu_bar();
    tools_side_menu();   
?>
<div class="contentRegular">
	<p>Combat Simulator</p>
	<p>Battle Reports</p>
	<p>Train Troops</p>
	<p>Call for Defense</p>
	<p>TBD</p>	
</div>


<div id="footer"></div>
</body>
</html>

<?php 
function allianceFinder(){    
    include_once 'Operations/forms.php';
    getAllianceForm();
    
}
?>
<?php 
function playerFinder(){    
    include_once 'Operations/forms.php';
    getPlayerForm();
    
}
?>
<?php 
function neighbourFinder(){    
    include_once 'Operations/forms.php';
    getNeighbourForm();
    
}
?>
