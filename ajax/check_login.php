<?php
$hostname = "RonkChamberAdmin.db.2324072.hostedresource.com";
$username = "RonkChamberAdmin";
$dbpassword = "Admin1234!";
$database = "RonkChamberAdmin";
$mysqli = new mysqli($hostname, $username, $dbpassword, $database);
if ($mysqli->connect_errno) {
    die('Connect Error: ' . $mysqli->connect_errno);
}
foreach ($_POST as $key => $value)$$key = $_POST[$key];
$user_name = trim($user_name);
$returnArray = array('username_valid' => false, 'password_valid' => false, 'username' => '$user_name');
$query = "SELECT * FROM admin_acct WHERE user_name = TRIM('$user_name')";
$res = $mysqli->query($query);
if ($res -> num_rows > 0){
	$returnArray['username_valid'] = true;
	$row = $res -> fetch_assoc();
	if (md5($password) == $row['user_pass']){
		$returnArray['password_valid'] = true;
	}
}
echo json_encode($returnArray);
//while($row = $res -> fetch_assoc()){}
?>