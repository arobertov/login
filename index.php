<?php
include "common.php";
try {
	$userHttpHandler->index( $userService );
}catch (Exception $e){
	echo "O'pss error";
	echo '<a href="index.php">';
	echo " go back";
	echo '</a>';
}