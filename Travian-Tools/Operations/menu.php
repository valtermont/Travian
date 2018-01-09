<?php
//session_start();
$_SESSION['active']=TRUE;
$_SESSION['plrNm']='Neo';
function main_menu_bar(){
?>

<ul>
   <li><a href='home.php'><span>Home</span></a></li>
   <li class='navBar'><a href='finders.php'><span>Finders</span></a>
            <div class="navBar-content">
               <a href='finders.php?finder=inactive'><span>Inactive Finder</span></a>
               <a href='finders.php?finder=natar'><span>Natar Finder</span></a>
               <a href='finders.php?finder=neighbour'><span>Neighbour Finder</span></a>
               <a href='finders.php?finder=player'><span>Player Finder</span></a>
               <a href='finders.php?finder=alliance'><span>Alliance Finder</span></a>               
            </div>
   </li>
   <li class='navBar'><a href='calculators.php'><span>Calculators</span></a>
            <div class="navBar-content">
               <a href='calculators.php?calculator=npc'><span>NPC Calculator</span></a>
               <a href='calculators.php?calculator=dist'><span>Distance Calculator</span></a>
               <a href='calculators.php?calculator=loot'><span>Loot Calculator</span></a>
               <a href='calculators.php?calculator=resource'><span>Resource Calculator</span></a>
               <a href='calculators.php?calculator=building'><span>Buildings Calculator</span></a>    
               <a href='calculators.php?calculator=production'><span>Production Calculator</span></a>                           
 </div>
   </li>
   <li class='navBar'><a href='tools.php'><span>Tools</span></a>
            <div class="navBar-content">
               	<a href='tools.php?tool=combat'><span>Combat Simulator</span></a>
				<a href='tools.php?tool=reports'><span>Battle Reports</span></a>    
				<a href='tools.php?tool=train-simple'><span>Train Troops (Simplified)</span></a>
				<a href='tools.php?tool=train-extended'><span>Train Troops (Extended)</span></a>
				<a href='tools.php#'><span>More to come </span></a>                      
 </div>
   </li>
   <li class='navBar'><a href='plus.php'><span>Plus</span></a>
   <div class="navBar-content">
   	<a href='plus.php?plus=leader'><span>Leader Options</span></a>
   	<a href='plus.php?plus=dc'><span>Defense Coordinator</span></a>
    <a href='plus.php?plus=ops'><span>Offense Planner</span></a>
  	<a href='plus.php?plus=troops'><span>Train Troops (Extended)</span></a>
 	<a href='plus.php?plus=artifacts'><span>Artifacts</span></a>
 	<a href='plus.php?plus=#'><span>TBD</span></a>
 	</div>
 	</li>
   <li class='navBar'><a href='account.php'><span>My Account</span></a>
            <div class="navBar-content">
               	<a href='account.php?account=overview'><span>Account Overview</span></a>
				<a href='account.php?account=troops'><span>Troops Details</span></a>    
				<a href='account.php?account=hero'><span>Hero Overview</span></a>
				<a href='account.php?account=alliance'><span>Alliance Overview</span></a>
				<a href='account.php'><span>more to come</span></a>               
 </div>
    </li>  
    <li><a href='servers.php'><span>Servers</span></a></li> 
    <li><a href='body.php'><span>Test</span></a></li> 
</ul>

<?php 
}
?>

<?php 
function finders_side_menu(){

?>
<div class='sideBarLeft'>
             <p><a href='finders.php?finder=inactive'><span>Inactive Finder</span></a></p>
             <p><a href='finders.php?finder=natar'><span>Natar Finder</span></a></p>
             <p><a href='finders.php?finder=neighbour'><span>Neighbour Finder</span></a></p>
             <p><a href='finders.php?finder=player'><span>Player Finder</span></a></p>
             <p><a href='finders.php?finder=alliance'><span>Alliance Finder</span></a></p>
</div>
<?php 
}
?>

<?php 
function tools_side_menu(){
?>    
<div class="sideBarLeft">
   	<p> <a href='tools.php?tool=combat'><span>Combat Simulator</span></a></p>
    <p> <a href='tools.php?tool=BR'><span>Battle Reports</span></a></p>
  	<p> <a href='tools.php?tool=troops'><span>Train Troops</span></a></p>
 	<p> <a href='tools.php?tool=#'><span>TBD</span></a></p>
 	<p> <a href='tools.php?tool=#'><span>TBD</span></a>  </p>
</div>
<?php     
}

?>

<?php 
function account_topright(){
    if($_SESSION['active']==FALSE){
        $menu='<p><a href="login.php">Login/Register</a></p>';
        if(isset($_SESSION['server'])){
            $menu.='<p>'.$_SESSION['server'].'</p>';
        }else $menu.='<p>Choose Server</p>';
    }else{
        $menu='<p><a href="account.php" style="text-decoration:none">'.
            $_SESSION['plrNm'].'</a> (<a href="login.php">Logout</a>)</p>';
            if(isset($_SESSION['server'])){
                $menu.='<p>'.$_SESSION['server'].'</p>';
            }else $menu.='<p>Choose Server</p>';
    }    
    echo $menu;
}

?>

<?php 
function calculators_side_menu(){
?>    
<div class="sideBarLeft">
   	<p> <a href='calculators.php?calculator=npc'><span>NPC Calculator</span></a></p>
    <p> <a href='calculators.php?calculator=dist'><span>Distance Calculator</span></a></p>
  	<p> <a href='calculators.php?calculator=loot'><span>Loot Calculator</span></a></p>
 	<p> <a href='calculators.php?calculator=resource'><span>Resource Calculator</span></a></p>
 	<p> <a href='calculators.php?calculator=building'><span>Buildings Calculator</span></a>  </p>
  	<p>  <a href='calculators.php?calculator=production'><span>Production Calculator</span></a>   </p>
</div>
<?php     
}

?>

<?php 
function plus_side_menu(){
?>    
<div class="sideBarLeft">
	<p> <a href='plus.php?plus=leader'><span>Leader Options</span></a></p>
   	<p> <a href='plus.php?plus=dc'><span>Defense Coordinator</span></a></p>
    <p> <a href='plus.php?plus=ops'><span>Offense Planner</span></a></p>
  	<p> <a href='plus.php?plus=troops'><span>Train Troops (Extended)</span></a></p>
 	<p> <a href='plus.php?plus=artifacts'><span>Artifacts</span></a></p>
 	<p> <a href='plus.php?plus=#'><span>TBD</span></a></p>
</div>
<?php     
}

?>

<?php 
function account_side_menu(){
?>    
    <div class="sideBarLeft">
   	<p> <a href='account.php?account=overview'><span>Account Overview</span></a></p>
    <p> <a href='account.php?account=troops'><span>Troops Overview</span></a></p>
  	<p> <a href='account.php?account=hero'><span>Hero Overview</span></a></p>
 	<p> <a href='account.php?account=alliance'><span>Alliance</span></a></p>
 	<p> <a href='account.php?account=#'><span>TBD</span></a></p>
    </div>
<?php     
}

?>