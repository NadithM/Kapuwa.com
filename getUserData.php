<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kapuwa";


$i_userNIC = $_POST["j_userNic"];
$userInfo = new stdClass();
// $userInfo->name = $i_userNIC;
// $userInfo->age = 10;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM person WHERE nic = '$i_userNIC';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
    $userInfo->fname = $row["fname"];
    $userInfo->occup = $row["occup"];
}



// if ($conn->query($sql) === TRUE) {
// 		//echo "New record created successfully"."<br>";
// 		//echo $hgf;
// 	} else {
// 		//echo "Error: " . $sql . "<br>" . $conn->error;
// 	}

// 	$sql = "SELECT userID FROM person WHERE nic = '$nic';";
// 	$result = $conn->query($sql);

// 	if ($result->num_rows > 0) {
//     	$row = $result->fetch_assoc();
// 		$ar = $row;
//         $uid = $row["userID"];
//     }

// $ar = $row;
// $userInfo->name = $row["name"];
echo json_encode($userInfo); // ["apple","orange","banana","strawberry"]
?>