<?php
	$mounth = date("n");
	$day = date("j");

	spl_autoload_register(function ($class) {
    	include 'classes/' . $class . '.php';
	});

	if($mounth == 10 && $ $day > 23){
		include('online_store.php');
	}else{
		$Halloween = new Halloween();

		$day_to_halloween = $Halloween->day_to_halloween();

		include('timer.php');
	}
?>