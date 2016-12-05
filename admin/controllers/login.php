<?php
	require_once ("../models/login.php");
	extract($_POST);
	login($user, $pass);
?>