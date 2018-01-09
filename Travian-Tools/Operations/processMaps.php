<?php
include_once 'forms.php';
include_once '../Utilities/DBFunctions.php';

$srvrDtls = queryDB("SELECT * FROM TRAVIAN_SERVERS WHERE SRVRSTATUS = 'active'");

if(isset($_POST['servers'])){
    
    $srvrList = $_POST['servers'];
    
   if(empty($srvrList)){
        echo '<p> Please select a server to update!! </p>';
        include_once 'menu.php';
        main_menu_bar();	
        displayServerUpdatesForm($srvrDtls);
    }else{        
        while($srvr= $srvrDtls->fetch_object()){           
            for ($i=0; $i<count($srvrList); $i++){
                if($srvrList[$i]==$srvr->SRVRID){
                    echo '</br>****************************</br>'.'Processing '.$srvr->SRVRVER.' '.$srvr->SRVRCNTRY.'</br>';
                    $tableID = downloadnLoadMaps($srvr->SRVRVER, $srvr->SRVRCNTRY);
                   // updateDiffTable($tableID,$srvr->SRVRVER, $srvr->SRVRCNTRY);
                }
            }

        }
        
    }
    
}
	else {
	    include_once 'menu.php';
	    main_menu_bar();	
	    displayServerUpdatesForm($srvrDtls);
	}
?>

<?php
//download the map.sql file
function downloadnLoadMaps( $srvrNm, $cntry) {
        
    include_once '../Utilities/DBFunctions.php';
    
    $date=getdate(date('U'));
    $dateStmp=$date['year'].$date['mon'].$date['mday'];
    
	$url='http://'.$srvrNm.'.travian.'.$cntry.'/map.sql';
	$file='maps_'.$srvrNm.'_'.$cntry.'_'.$dateStmp;
	$fullFile='C:/Users/venigja/Documents/PHP/workspace/Files/'.$file;
		
	file_put_contents($fullFile, fopen($url, 'r'));
		
	echo $file.' downloaded successfully<br>';	
   
    $tableName='maps_'.$srvrNm.'_'.$cntry;
    $tableStamp = $cntry.$srvrNm.'-'.$dateStmp;
    
    if(createMapsTable($tableName)==FALSE){
        echo $tableName.' already exists!!</br>';
    }else{
        echo $tableName.' is created!!</br>';
    }
    
    $sqlTblInStr = "INSERT INTO MAPS_TABLE_LIST VALUES ('".$tableStamp."','".
        $srvrNm."','".$cntry."','".$tableName."', CURRENT_TIMESTAMP(), 'ACTIVE')";
       // echo $sqlTblInStr.'</br>';
        
        if(updateDB($sqlTblInStr)==FALSE){
            echo '</br>Failed to insert, Updating the table </br></br>';
            $sqlTblUpStr = "UPDATE MAPS_TABLE_LIST SET SRVRUPDDT = CURRENT_TIMESTAMP()
                WHERE TABLEID ='".$tableStamp."';".
                "DELETE FROM ".$tableName." WHERE TABLEID ='".$tableStamp."';";
            if(updateDB($sqlTblUpStr)==TRUE){
                echo 'Successfully removed the entries with '.$tableStamp.'</br>';
            }
        }
    
    
    //Opening the stored sql file in read mode
    $fileData = fopen($fullFile,"r") or die("Unable to open file");
    
    //looping over each line
    $sqlUpStr=null;
    $sqlStr=null;
    while(!feof($fileData)){
        
        //fetch data of the current line
        $currLine=fgets($fileData);
        
        $GUID = strtok($currLine, ',');
        $GUID = substr($GUID, strrpos($GUID, '(') + 1);
        $GUID  = "'".$cntry.$srvrNm.'_'.$dateStmp.'_'.$GUID."'";      
                
        $UPDTID = $date['year'].$date['mon'].$date['mday'];
        $sqlUpStr=str_replace("`x_world` VALUES (", "`".$tableName."` VALUES (".$GUID.',', $currLine);        
        $sqlUpStr=str_replace(");",",'".$tableStamp."',CURRENT_TIMESTAMP());" , $sqlUpStr);                           
        
        $sqlStr.=$sqlUpStr;
    }
    fclose($fileData);        
    
    //echo $sqlStr;
    if(updateDB($sqlStr)==TRUE){
        echo 'New maps data loaded successfully'.'</br>';
    }else{
        echo 'Failed to load Query '.'</br>';
        }
    return $tableStamp;
}
?>

<?php 

function updateDiffTable($tableID,$srvrVer,$srvrCntry){
    include_once '../Utilities/DBFunctions.php';
    
    echo $tableID.'</br>';    
    
    $sqlStr = "SELECT * FROM MAPS_TABLE_LIST WHERE SRVRINST ='"
        .$srvrVer."' AND SRVRCNTRY ='".$srvrCntry."' AND MAP_STATUS ='ACTIVE' ORDER BY TABLEID DESC";
    $quryRslt = queryDB($sqlStr);
    
    $i=0;
    $tableName = null;
    while($oldTableArray = $quryRslt->fetch_object()){
        if($i==4){
            $oldTableID=$oldTableArray->TABLEID;
            $tableName = $oldTableArray->TBLNM;
            echo 'Processing diff between '.$tableID.' and '.$oldTableID.'</br>';
        }
        if($i>=5){
            $sqlStr = "UPDATE MAPS_TABLE_LIST SET MAP_STATUS ='TRUNCATE' WHERE TABLEID ='".$oldTableArray->TABLEID."'";
            updateDB($sqlStr);            
        }
        $i++;
    }
    
    echo $tableName.'</br>';
    
    $tableSqlStr = 'SELECT * FROM '.$tableName." WHERE TABLEID ='";
    $oldTableData = queryDB('SELECT * FROM '.$tableName." WHERE TABLEID ='".$oldTableID."'");
    $newTableData = queryDB('SELECT * FROM '.$tableName." WHERE TABLEID ='".$tableID."'");
    
    $diffRows=array();
    $j=0;
    
    if(count($oldTableData)==0){
        echo 'Error in fetching table data of '.$oldTableID.'</br>';
    }else if(count($newTableData)==0){
        echo 'Error in fetching table data of '.$tableID.'</br>';
    }else {
        echo 'Processing the diff data </br>';
        while($newRow=$newTableData->fetch_object()){
            while($oldRow=$oldTableData->fetch_object()){
               // echo "comparing ".$oldRow->WORLDID." with ".$newRow->WORLDID.'</br>';
                if($oldRow->WORLDID==$newRow->WORLDID){
                    $diffRows[$j] = array('WORLDID'=>$newRow->WORLDID,
                            'X'=>$newRow->X,
                            'Y'=>$newRow->Y,
                            'ID'=>$newRow->ID,
                            'VID'=>$newRow->VID,
                            'VILLAGE'=>$newRow->VILLAGE,
                            'UID'=>$newRow->UID,
                            'PLAYER'=>$newRow->PLAYER,
                            'AID'=>$newRow->AID,
                            'ALLIANCE'=>$newRow->ALLIANCE,
                            'POPULATION'=>$newRow->POPULATION,
                            'DIFF'=>($newRow->POPULATION-$oldRow->POPULATION)                            
                     );
                }
            }
            $j++;
        } //echo 'Completed processing the records-'.$j;
    }
    
    //$diffTable = 'MAPS_'.$srvrVer.'_'.$srvrCntry.'_DIFF';
    //$diffTblSqlStr = 'SELECT * FROM '.$diffTable;
    //$diffTableRows = queryDB($diffTblSqlStr);
    
   // $diffUpdtStr = NULL;
    //if(count($diffTableRows)==0){
    for($i=0;$i<count($diffRows);$i++){
            //$diffUpdtStr.='INSERT INTO ';
            echo 'VILLAGE = '.$diffRow[$i]['VILLAGE'].' DIFF = '.$diffRow[$i]['DIFF'].'</br>';
        }
    //}
}

?>
