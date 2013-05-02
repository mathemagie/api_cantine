<?php
	require 'pusher-php-server-master/lib/Pusher.php';
	require_once 'db.php';
	
	$do = $_GET['do'];
	$all_method = array('up','down');

	$app_id = '43155';
	$app_key = '1fbe9243adcdd1024b64';
	$app_secret = 'cd1b7210ddb6e46895a2';
	$pusher = new Pusher( $app_key, $app_secret, $app_id );


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

	function get_total() {
		global $db;

		$sql = "SELECT number from number_person";
		$sth = $db->query($sql);
		$data = array();
	    foreach($sth as $row) {
	      $total_number = $row['number'];
	    }
	    return $total_number;
	}

	if ($do == 'up') up();
	if ($do == 'down') down();
	
	$total = get_total();
	echo $total;
	echo "<br/>";
	$pusher->trigger( 'test_channel', 'my_event', $total );
	echo "OK";

?>
