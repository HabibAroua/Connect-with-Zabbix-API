<?php

	require_once('../app/controllers/session.php');
    require_once('../app/controllers/AdminController.php');
	$s = new Session ();
    $s->LogOut();
	
?>