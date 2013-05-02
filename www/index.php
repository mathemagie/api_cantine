<?php
	require_once 'db.php';
	$do = $_GET['do'];
	$all_method = array('up','down');

	function up() {
		global $db;
		$sql = "UPDATE number_person SET number = number + 1";
  		$sth = $db->query($sql);
	}

	function down() {
		global $db;
		$sql = "UPDATE number_person SET number = number - 1";
		$sth = $db->query($sql);
	}

	if ($do == 'up') up();
	if ($do == 'down') down();
	echo "OK";

?>