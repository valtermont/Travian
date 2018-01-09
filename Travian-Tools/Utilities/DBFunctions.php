<?php
function updateDB($sqlStr){
    
    include_once 'Connections.php';
    $dbConn=getDBConnection();
    
    $result = null;
    
    if($dbConn->multi_query($sqlStr)==TRUE){
        //echo 'updateDB completed successfully';
        $result=TRUE;
    }else{
        echo $dbConn->error.'</br>';
        $result=FALSE;
    }
    
    $dbConn->close();
    return $result;
    
}

//To Query the DB
function queryDB($sqlStr){
    
    include_once 'Connections.php';
    $dbConn=getDBConnection();
    
    
    $result = $dbConn->query($sqlStr);
    //echo $result;
    
    $dbConn->close();
    return $result;
    
}

function createMapsTable($tableName){
    
    include_once 'Connections.php';
    $dbConn=getDBConnection();
    
    $sqlStr = 'CREATE TABLE '. $tableName.' (
                    GUID VARCHAR (50) PRIMARY KEY,
                    WorldId INT(11),
                    x INT(11),
                    y INT(11),
                    id INT(11),
                    vid INT(11),
                    village VARCHAR(50),
                    uid INT(11),
                    player VARCHAR(50),
                    aid INT(11),
                    alliance VARCHAR(50),
                    population INT(11),
                    TABLEID VARCHAR(20),
                    UPDATETIME VARCHAR(25))';
    
    $result = $dbConn->query($sqlStr);
    echo $result;
    
    $dbConn->close();
    return $result;
}

function dropTable($tableName){
    
    include_once 'Connections.php';
    $dbConn=getDBConnection();
    
    $sqlStr='DROP TABLE '.$tableName;
    
    $result = $dbConn->query($sqlStr);
    echo $result;
    
    $dbConn->close();
    return $result;    
}
?>

<?php 
function truncateTable($tableName){
    
    include_once 'Connections.php';
    $dbConn=getDBConnection();
    
    $sqlStr='TRUNCATE '.$tableName;
    
    $result = $dbConn->query($sqlStr);
    echo $result;
    
    $dbConn->close();
    return $result;    
}
?>