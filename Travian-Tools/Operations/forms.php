<?php
//To create the form to get the Input for inactive villages
function getInactiveForm(){
?>
		<h3>Inactive Villages finder</h3>
        <form action="finders.php?finder=inactive" method="post">
		<p>Coordinates : <input type="text" name="Xcor" value=
            <?php
                if(isset($_POST['Xcor'])){
                    echo "'".$_POST['Xcor']."'";
                } else echo "'0'";                     
            ?> size='4'/>
            
            | <input type="text" name="Ycor" value=
                        <?php
                if(isset($_POST['Ycor'])){
                    echo "'".$_POST['Ycor']."'";
                } else echo "'0'";                     
            ?> size='4'/></p>            
            <p>Distance : <input type="text" name="dist" value=
			            <?php
                if(isset($_POST['dist'])){
                    echo "'".$_POST['dist']."'";
                } else echo "'100'";                     
            ?> size='5'/></p>
            <p><button class="button" type="submit" name ="submit">Find Them</button></p>
        </form>
            
<?php
    if((isset($_POST['Xcor']))&&(isset($_POST['Ycor']))&&(isset($_POST['dist']))){
        include_once 'processFinders.php';
        getInactiveFarms($_POST['Xcor'],$_POST['Ycor'],$_POST['dist']);       
    } 
}
?>    

<?php
// To create the form to get the Input for Natars villages
function getNatarsForm(){
?>
        <h3>Natar village finder</h3>
        <form action="finders.php?finder=natar" method="post">
		<p>Coordinates : <input type="text" name="Xcor" value=
            <?php
                if(isset($_POST['Xcor'])){
                    echo "'".$_POST['Xcor']."'";
                } else echo "'0'";                     
            ?> size='4'/>
            
            | <input type="text" name="Ycor" value=
                        <?php
                if(isset($_POST['Ycor'])){
                    echo "'".$_POST['Ycor']."'";
                } else echo "'0'";                     
            ?> size='4'/></p>            
            <p>Distance : <input type="text" name="dist" value=
			            <?php
                if(isset($_POST['dist'])){
                    echo "'".$_POST['dist']."'";
                } else echo "'100'";                     
            ?> size='5'/></p>
            <p><button class="button" type="submit" name ="submit">Find Them</button></p>
        </form>
            
<?php
    if((isset($_POST['Xcor']))&&(isset($_POST['Ycor']))&&(isset($_POST['dist']))){
        include_once 'processFinders.php';
        getNatars($_POST['Xcor'],$_POST['Ycor'],$_POST['dist']);       
    } 
}
?>  

<?php
// To create the form to Input villages from Alliance
function getAllianceForm(){
?>
        <h3>Alliance village finder</h3>
        <form action="finders.php?finder=alliance" method="post">
            <p>Alliance Name: <input type="text" name="alliance" 
            <?php
                if(isset($_POST['alliance'])){
                    echo " value='".$_POST['alliance']."' ";
                }                     
            ?> size='20'/></p>
            
			<p>Coordinates : <input type="text" name="Xcor" value=
            <?php
                if(isset($_POST['Xcor'])){
                    echo "'".$_POST['Xcor']."'";
                } else echo "'0'";                     
            ?> size='4'/>
            
            | <input type="text" name="Ycor" value=
                        <?php
                if(isset($_POST['Ycor'])){
                    echo "'".$_POST['Ycor']."'";
                } else echo "'0'";                     
            ?> size='4'/></p>  
            
            <p>Distance :<input type="text" name="dist" value=
			            <?php
                if(isset($_POST['dist'])){
                    echo "'".$_POST['dist']."'";
                } else echo "'100'";                     
            ?> size='5'/></p>
            
            <p><button class="button" type="submit" name ="submit">Find Alliance</button></p>
        </form>
            
<?php
    if((isset($_POST['alliance']))&&(isset($_POST['dist']))){
        include_once 'processFinders.php';
        getAlliance($_POST['alliance'],$_POST['dist']);       
    } 
}
?>  

<?php
// To create the form to Input villages from Alliance
function getPlayerForm(){
?>
        <h3>Player villages finder</h3>
        <form action="finders.php?finder=player" method="post">
            <p>Player Name: <input type="text" name="player" 
            <?php
                if(isset($_POST['player'])){
                    echo " value='".$_POST['player']."' ";
                }                     
            ?> size='20'/></p>
            <p><button class="button" type="submit" name ="submit">Find Player</button></p>
        </form>
            
<?php
    if((isset($_POST['player']))){
        include_once 'processFinders.php';
        getPlayer($_POST['player']);       
    } 
}
?>

<?php
// To create the form to Input villages from Alliance
function getNeighbourForm(){
?>
        <h3>Village Neighbour Finder</h3>
        <form action="finders.php?finder=neighbour" method="post">
<p>Coordinates : <input type="text" name="Xcor" value=
            <?php
                if(isset($_POST['Xcor'])){
                    echo "'".$_POST['Xcor']."'";
                } else echo "'0'";                     
            ?> size='4'/>
            
            | <input type="text" name="Ycor" value=
                        <?php
                if(isset($_POST['Ycor'])){
                    echo "'".$_POST['Ycor']."'";
                } else echo "'0'";                     
            ?> size='4'/></p>  
            
            <p>Distance :<input type="text" name="dist" value=
			            <?php
                if(isset($_POST['dist'])){
                    echo "'".$_POST['dist']."'";
                } else echo "'100'";                     
            ?> size='5'/></p>
            
            <p><button class="button" type="submit" name ="submit">Scan Neighbours</button></p>
        </form>
            
<?php
if(isset($_POST['Xcor'])&&isset($_POST['Ycor'])&&(isset($_POST['dist']))){
        include_once 'processFinders.php';
        getNeighbours($_POST['Xcor'],$_POST['Ycor'],$_POST['dist']);       
    } 
}
?>


<?php 
function serverSelectForm($srvrDtls){
    ?>
	<h3>List of the available servers</h3>
	<form action="home.php" method="post">
	<select name ="server">
	<option value="">--Select Server--</option>
<?php 
    while($srvr= $srvrDtls->fetch_object()){
        echo '<option value="'.$srvr->SRVRID.'">'.$srvr->SRVRURL.'</option>';        
    }
?>
	</select><p><button class="button" type="submit" name ="submit">Select Servers</button></p>
	</form>

<?php 
}
?>


<?php 

function displayServerUpdatesForm($srvrDtls){
?>
	<h3>List of the available servers</h3>
	<form action="processMaps.php" method="post">
<?php 
    while($srvr= $srvrDtls->fetch_object()){
        echo '<input type="checkbox" name="servers[]" value="'.$srvr->SRVRID.'" />'.$srvr->SRVRURL.'<br />';
    }
?>
	<input type="submit" name="submit" value="Update Servers" />
	</form>

<?php 
}

?>
