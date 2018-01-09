<?php
function getInactiveFarms($Xcor,$Ycor,$dist){
    echo 'Finding Inactive farms in range of '.$dist.' fields from '.$Xcor.'|'.$Ycor;    
    
}
?>

<?php
function getNatars($Xcor,$Ycor,$dist){
    
    echo 'Finding Natar villages in range of '.$dist.' fields from '.$Xcor.'|'.$Ycor;
    
}
?>

<?php 
function getAlliance($alliance,$dist){
    
    echo 'Finding villages of '.$alliance.' in the range of '.$dist;
    
}
?>

<?php 
function getNeighbours($Xcor,$Ycor){
    echo 'Finding Neighbours of '.$Xcor.'|'.$Ycor.'</br>';
    
    $neiSqlStr = "SELECT * FROM MAPS_TS1_US WHERE TABLEID= 
            (SELECT TABLEID FROM MAPS_TABLE_LIST WHERE SRVRINST ='".$GLOBALS['SRVRVER'].
            "' AND SRVRCNTRY = '".$GLOBALS['SRVRCNTRY']."' ORDER BY TABLEID DESC LIMIT 1) ORDER BY 
            (X-".$Xcor.')*(X-'.$Xcor.')+(Y-'.$Ycor.')*(Y-'.$Ycor.') ASC LIMIT 100';
    
    echo $neiSqlStr;
    
}
?>

<?php 
function getPlayer($player){
    echo 'List of all the villages of the player '.$player;
    
    include_once 'Utilities/DBFunctions.php';
    
    $sqlStr="SELECT * FROM maps_table_list WHERE SRVRINST = '".$GLOBALS['srvr']."' and SRVRCNTRY = '".
        $GLOBALS['cntry']."' order by `SRVRUPDDT` desc LIMIT 1";    
   
   $tables = queryDB($sqlStr);
   
   while($table=$tables->fetch_object()){
        
        $plrSqlStr = "SELECT * FROM ".$table->TABLEID." WHERE player like '%".$player."%'";        
        $plrDtls = queryDB($plrSqlStr);
        
        if(count($plrDtls)==0){
            echo '<p> Player not found!! </p>';
        }else{
            
        }
        
    }
    
    
}
?>