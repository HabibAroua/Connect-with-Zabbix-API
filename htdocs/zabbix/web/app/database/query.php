<?php


	function input($req)
    {
        global $connection;
        $res=$connection->con->exec($req); //connection variable de classe Connection; con : chaine de connection ; exec pour executer la requette
        if($res!=0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    function output($req)
    {
        global $connection;
        $res=$connection->con->query($req);
        return $res;
    }
	
?>