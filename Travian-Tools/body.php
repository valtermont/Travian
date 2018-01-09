<?php
    include_once 'Utilities/DBFunctions.php';
    include_once 'Operations/menu.php';
    include_once 'Operations/forms.php';
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
	<link rel="stylesheet" type="text/css" href="CSS/test.css" />

	<title>Home</title>
</head>
<body>
<div id="header">
	<h1> TRAVIAN TOOLS BETA</h1>
</div>
<div id="userMenu">
	<p><a href="login.php">Login/Register</a></p>
	<p>Choose Server</p>
</div>

<?php 
    main_menu_bar();
    finders_side_menu();
?>


<div class="contentRegular">
	<h1>Test H1</h1>
	<p>Test Para text</p>
	<p><a class="button" href="body.php">Green</a></p>
</div>

<div class="contentRegular">
	<h1>Test H1</h1>
	<h2>Test H2</h2>
	<h3>Test H3</h3>
	<p>Test Para text</p>	
</div>

<div id="footer">	
</div>

</body>
</html>