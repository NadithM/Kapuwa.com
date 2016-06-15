<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "kapuwa";
	$heightfeet = "";
	$nic = "";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	if (isset($_POST['nic']))
		$nic = $_POST['nic'];	
	if (isset($_POST['heightfeet']))
		$heightfeet = $_POST['heightfeet'];
	if (isset($_POST['heightinch']))
		$heightinch = $_POST['heightinch'];
	if (isset($_POST['bodytype']))
		$bodytype = $_POST['bodytype'];
	if (isset($_POST['haircolor']))
		$haircolor = $_POST['haircolor'];
	if (isset($_POST['eyecolor']))
		$eyecolor = $_POST['eyecolor'];

	if (isset($_POST['relationship']))
		$relationship = $_POST['relationship'];
	if (isset($_POST['kids']))
		$kids = $_POST['kids'];
	if (isset($_POST['religion']))
		$religion = $_POST['religion'];
	if (isset($_POST['politics']))
		$politics = $_POST['politics'];
	if (isset($_POST['Education']))
		$Education = $_POST['Education'];
	if (isset($_POST['live']))
		$live = $_POST['live'];
	if (isset($_POST['Occupation']))
		$Occupation = $_POST['Occupation'];
	if (isset($_POST['Salery']))
		$Salery = $_POST['Salery'];
	if (isset($_POST['Smokingyou']))
		$Smokingyou = $_POST['Smokingyou'];
	if (isset($_POST['drinkingyou']))
		$drinkingyou = $_POST['drinkingyou'];
	if (isset($_POST['Excersize']))
		$Excersize = $_POST['Excersize'];
	if (!empty($_POST["Sports"])){/////////////////////
		$Sports = $_POST["Sports"];
		foreach ($Sports as $i)
			$Sports = "".$i." ";
	}
	if (!empty($_POST["language"])){////////////////////
		$language = $_POST["language"];
		foreach ($language as $j)
			$language = "".$j." ";
	}
	if (isset($_POST['Ethinity']))
		$Ethinity = $_POST['Ethinity'];
	if (isset($_POST['Cast']))
		$Cast = $_POST['Cast'];
	if (isset($_POST['about']))
		$about = $_POST['about'];

	//partner
	if (isset($_POST['bodytypehim']))
		$bodytypehim = $_POST['bodytypehim'];
	if (isset($_POST['haircolorhim']))
		$haircolorhim = $_POST['haircolorhim'];
	if (isset($_POST['eyecolorhim']))
		$eyecolorhim = $_POST['eyecolorhim'];
	if (isset($_POST['relationshiphim']))
		$relationshiphim = $_POST['relationshiphim'];
	if (isset($_POST['lowerboundage']))
		$lowerboundage = $_POST['lowerboundage'];
	if (isset($_POST['upperboundage']))
		$upperbound = $_POST['upperboundage'];
	if (isset($_POST['religionhim']))
		$religionhim = $_POST['religionhim'];
	if (isset($_POST['politicshim']))
		$politicshim = $_POST['politicshim'];
	if (isset($_POST['Educationhim']))
		$Educationhim = $_POST['Educationhim'];
	if (isset($_POST['Saleryhim']))
		$Saleryhim = $_POST['Saleryhim'];
	if (isset($_POST['Smokingh']))
		$Smokingh = $_POST['Smokingh'];
	if (isset($_POST['drinkinghim']))
		$drinkinghim = $_POST['drinkinghim'];
	if (isset($_POST['Excersizehim']))
		$Excersizehim = $_POST['Excersizehim'];
	if (!empty($_POST["languagehim"])){
		$languagehim = $_POST["languagehim"];
		foreach ($languagehim as $k)
			$languagehim = "".$k." ";
	}
	if (isset($_POST['Ethinityhim']))
		$Ethinityhim = $_POST['Ethinityhim'];
	if (isset($_POST['Casthim']))
		$Casthim = $_POST['Casthim'];
	if (isset($_POST['Hobbieshim']))
		$Hobbieshim = $_POST['Hobbieshim'];
	if (isset($_POST['Occupationhim']))
		$Occupationhim = $_POST['Occupationhim'];
		
	//height
	$hg= intval($heightfeet)*30.48 + intval($heightinch)*2.54;
	echo $nic;
	
	$sql = "UPDATE person  
			SET height = $hg, bodytype =  '$bodytype', hair = '$haircolor', eye = '$eyecolor',
				relstat = '$relationship', kids = '$kids', relign = '$religion', politic = '$politics',
				edu = '$Education', live = '$live', occup = '$Occupation', salary = '$Salery',
				smoke = '$Smokingyou', drink = '$drinkingyou', exerci = '$Excersize',
				eth = '$Ethinity', cast = '$Cast', descri = '$about' 
				WHERE nic = '$nic';";

	if ($conn->query($sql) === TRUE) {
		//echo "New record created successfully"."<br>";
		echo $nic;
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$sql = "SELECT userID FROM person WHERE nic = '$nic';";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    	$row = $result->fetch_assoc();
        $uid = $row["userID"];
    }

	$sql = "INSERT INTO prefPerson 
				VALUES ($uid, $lowerboundage, $upperbound, '$relationshiphim', 
					'$religionhim', '$Casthim', '$Ethinityhim', '$bodytypehim', 
					'$haircolorhim', '$eyecolorhim', NULL, '$politicshim', '$Educationhim', 
					'$Occupationhim', '$Saleryhim', '$Smokingh', '$drinkinghim', '$Excersizehim');";

	if ($conn->query($sql) === TRUE) {
		echo "Record created successfully"."<br>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
?>