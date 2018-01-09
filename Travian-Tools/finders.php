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
	<title>Finders</title>
</head>
<body>

<div id="header">
	<h1> TRAVIAN TOOLS BETA</h1>
</div>

<?php 
    main_menu_bar();
    finders_side_menu();
?>

	<?php 
	       if(isset($_GET["finder"]) AND $_GET["finder"]=='inactive'){
	           inactiveFinder();
	       }else if(isset($_GET["finder"]) AND $_GET["finder"]=='natar'){
	           natarFinder();
	       }else if(isset($_GET["finder"]) AND $_GET["finder"]=='neighbour'){
	           neighbourFinder();
	       }else if(isset($_GET["finder"]) AND $_GET["finder"]=='player'){
	           playerFinder();
	       }else if(isset($_GET["finder"]) AND $_GET["finder"]=='alliance'){
	           allianceFinder();
	       }else{	  
	?>

<div class="contentRegular">
	<p>Player Finder</p>
	<p>Alliance Finder</p>
	<p>Inactive Finder</p>
	<p>Natar Finder</p>
	<p>Neighbourhood Scan</p>		
</div>

<?php }
?>

<div id="footer"></div>
</body>
</html>

<?php 
function inactiveFinder(){    
    echo '<div id="finders">';
    include_once 'Operations/forms.php';
    getInactiveForm();
    echo '</div>';
    
}
?>

<?php 
function natarFinder(){    
    echo '<div id="finders">';
    include_once 'Operations/forms.php';
    getNatarsForm();    
    echo '</div>';
}
?>

<?php 
function allianceFinder(){    
    echo '<div id="finders">';
    include_once 'Operations/forms.php';
    getAllianceForm();
    echo '</div>';
}
?>

<?php 
function playerFinder(){    
    echo '<div id="finders">';
    include_once 'Operations/forms.php';
    getPlayerForm();
    echo '</div>';
}
?>

<?php 
function neighbourFinder(){  
    echo '<div id="finders">';
    include_once 'Operations/forms.php';
    getNeighbourForm();
    echo '</div>';
}
?>
