<?php
	require 'utils/utils.php';
	
	$array_error = [];
	$array_dats = [];

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(empty($_POST['firstName'])){
			$array_error[] = 'El campo First Name es obligatorio';
		}else{
			$array_dats[] = $_POST['firstName'];
		}
		if(!empty($_POST['lastName'])){
			$array_dats[] = $_POST['lastName'];
		}
		if(empty($_POST['mail'])){
			$array_error[] = 'El campo Email es obligatorio';
		}else{
			$array_dats[] = $_POST['mail'];
		}
		if(empty($_POST['subject'])){
			$array_error[] = 'El campo Subject es obligatorio';
		}else{
			$array_dats[] = $_POST['subject'];
		}
	}
	
	
	
	require 'views/contact.view.php';
?>