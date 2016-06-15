<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "kapuwa";
    $nic = "";

    $fname ="";
	$lname ="";
	$ad1 ="";
	$ad2 ="";
	$ad3 ="";
	$email ="";
	$nic ="";
	$gender ="";
	$year ="";
	$mnth ="";
	$day ="";
	$hour ="";
	$min ="";
	$tim ="";
    $age= "";
    $mydob= "";
    $adrs = "";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	echo "Connected successfully";
	
	if (isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['NIC'])&&isset($_POST['email'])&&isset($_POST['gender'])&&isset($_POST['add1'])&&isset($_POST['year'])&&isset($_POST['month'])&&isset($_POST['Day'])&&isset($_POST['hour'])&&isset($_POST['min'])&&isset($_POST['time'])) {
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$ad1 = $_POST['add1'];
		$ad2 = $_POST['add2'];
		$ad3 = $_POST['add3'];
		$email = $_POST['email'];
		$nic = $_POST['NIC'];
		$gender = $_POST['gender'];
		$year = $_POST['year'];
		$mnth = $_POST['month'];
		$day = $_POST['Day'];
		$hour = $_POST['hour'];
		$min = $_POST['min'];
		$tim = $_POST['time'];
		
		//age
		$currYr = date("Y");
		$yr = intval($year);
		$age = $currYr - $yr;		
		//address
		$adrs = $ad1." ".$ad2." ".$ad3;
		//DOB
		$mydob = $year." ".$mnth." ".$day;
	}
	$sql = "INSERT INTO person (fName, lName, age ,address, nic, emailadd, dob, gender)
			VALUES ('$fname', '$lname', '$age', '$adrs', '$nic', '$email', '$mydob', '$gender')";

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully"."<br>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
?>

<!DOCTYPE html>
<html>
<head>
    <title>SignUP</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta charset="utf-8"/>
<link rel="stylesheet" href="jquery.mobile-1.4.5.min.css">
<link href="css/bootstrap-2.3.min.css" rel="stylesheet" type="text/css"/>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<script src="jquery-2.1.4.js"></script>
<script src="jquery.mobile-1.4.5.min.js"></script>
    
</head>
<body>

<div data-role="page">
  <div data-role="header" style="height: 100px;">
  <h1 style="alignment-baseline: central; font-size: 30pt;">Kapuwa.com Signup</h1>
  </div>

  <div data-role="header" style="height: 50px;">
    <h1 style="font-size: 16pt; alignment-baseline: text-after-edge">About you..!!</h1>
  </div>
  <script >
		var nic = "<?php echo $nic?>";
		//alert(nic);
		
		
		$("#nic").val(""+nic+"");
		$("#setNIC").hide();
  </script>
      
  <div data-role="main" class="ui-content">
    <form method="POST" id="looks" action = "look.php">
      <fieldset data-role="collapsible">
        <legend>Let's see how you look..!!</legend>
        <div id="setNIC">
			<td>
  				<input type="text" name="nic" id="nic">
			</td>
		</div>
				<table>
					<tr>
						<td>
          				<label>Your Height:</label>
						</td>	
						<td style="width:3%;"></td>
						<td>
          				<input type="text" name="height" id="heightfeet"> feet
						</td>
						<td>
							<input type="text" name="height" id="heightinch"> inches
						</td>
						<td style="width:10%;"></td>
						<td>
							<label for="bodytype">Your body type: </label>
						</td>
						<td style="width:3%;"></td>
						<td>
									<select name="bodytype" id="bodytype">
										<option value="slim">Slim</option>
										<option value="average">Average</option>
										<option value="fat">fat</option>
									</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="haircolor">Your Hair Color: </label>
						</td>
						<td style="width:3%;"></td>
						<td>
							<select name="haircolor" id="haircolor">
										<option value="black">Black</option>
										<option value="blode">Blonde</option>
										<option value="red">red</option>
										<option value="colored">Coloured</option>
										<option value="tinted">Tinted</option>
							</select>
						</td>	
						<td></td>
						<td></td>
						<td>
							<label for="eyecolor">Your eye Color: </label>
						</td>
						<td style="width:3%;"></td>
						<td>						
							<select name="eyecolor" id="eyecolor">
										<option value="black">Black</option>
										<option value="blue">Blue</option>
										<option value="brown">Brown</option>
										<option value="grey">grey</option>
										<option value="hazel">Hezal</option>
							</select> 	
						</td>						
					</tr>				
        </table> 
      </fieldset>
    
      <fieldset data-role="collapsible" >
        <legend>About your current life..</legend>
				<table>
					<tr>
						<td>
          				<label for="relationship">Your relationship status: </label>
						</td>	
						<td style="width:3%;"></td>
          	<td>
									<select name="relationship" id="relationship">
										<option value="nevermarried">Never Married</option>
										<option value="Divorced">Divorced</option>
										<option value="widow">Widow/Widower</option>
									</select>
						</td>
						
						<td style="width:10%;"></td>
						<td>
									<label for="kids: ">Kids </label>
						</td>
						<td style="width:3%;"></td>
						<td>
									<select name="kids" id="kids">
										<option value="none">None</option>
										<option value=1>1</option>
										<option value=2>2</option>
										<option value=3>3</option>
										<option value=4>4</option>
									</select>
						</td>	
					</tr>
					<tr>
						<td>
							<label for="religion">What is your religious beleifs? </label>
						</td>
						<td style="width:3%;"></td>
						<td>
							<select name="religion" id="religion">
										<option value="Buddhist">Buddhist</option>
										<option value="Christian">Christian</option>
										<option value="Catholic">Catholic</option>
										<option value="Hindu">Hindu</option>
										<option value="Islam">Islam</option>
							</select>
						</td>	
						<td style="width:10%;"></td>
						<td>
							<label for="politics">Political Views: </label>
						</td>
						<td style="width:3%;"></td>
						<td>						
							<select name="politics" id="politics">
										<option value="Democratic">Democratic</option>
										<option value="Liberal">Liberal</option>
										<option value="Communist">Communist</option>
										<option value="Middle of the road">Middle of the road</option>
										<option value="Some other viewpoint">Some other viewpoint</option>
							</select> 	
						</td>						
					</tr>				
        </table> 
      
      </fieldset>
    
      <fieldset data-role="collapsible" >
        <legend>About your Financial and Education level</legend>
				<table>
					<tr>
						<td>
          				<label for="Education">Your Education Level :</label>
						</td>	
						<td style="width:3%;"></td>
          	<td>
									<select name="Education" id="Education">
										<option value="O/L">O/L</option>
										<option value="A/L">A/L</option>
										<option value="Bachelors Degree">Bachelors Degree</option>
                                        <option value="Masters Degree">Masters Degree</option>
                                        <option value="PhD">PhD</option>
									</select>
						</td>
						
						<td style="width:10%;"></td>
						<td>
									<label for="live">Where do you live? </label>
						</td>
						<td style="width:3%;"></td>
						<td>
									<input type="text" name="live" id="live">
						</td>	
					</tr>
					<tr>
						<td>
							<label for="Occupation">What is your Occupation? </label>
						</td>
						<td style="width:3%;"></td>
						<td>
							<select name="Occupation" id="Occupation1">
                                <option value="Administrative">Administrative</option>
                                <option value="Artist">Artist</option>
                                <option value="Executive">Executive</option>
                                <option value="Financial">Financial</option>
                                <option value="Labour">Labour</option>
                                <option value="Legal">Legal</option>
                                <option value="Medical">Medical</option>
                                <option value="Civil Service">Civil Service</option>
                                <option value="Retail">Retail</option>
                                <option value="Retired">Retired</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Entrepreneur">Entreprenuer</option>
                                <option value="Student">Student</option>
                                <option value="Education">Education</option>
                                <option value="Engineering">Engineering</option>
                                <option value="Hospitality">Hospitality</option>
                                <option value="Volunteer">Volunteer</option>
                                <option value="National Security">National Security</option>
                                <option value="Fashion">Fashion</option>
                                <option value="Architecture">Architecture</option>
                            </select>
						</td>	
						<td style="width:10%;"></td>
						<td>
							<label for="Salery">Your Salery range: </label>
						</td>
						<td style="width:3%;"></td>
						<td>						
							<select name="Salery" id="Salery">
										<option value="0-25000">Less than 25000</option>
										<option value="25000-35000">25000-35000</option>
										<option value="35000-50000">35000-50000</option>
										<option value="50000-75000">50000-75000</option>
										<option value="75000-100000">75000-100000</option>
                                        <option value="100000-150000">100000-150000</option>
                                        <option value="150000+">150000+</option>
							</select> 	
						</td>						
					</tr>				
        </table> 
      
      </fieldset>
    
      <fieldset data-role="collapsible" >
        <legend>About your lifestyle..</legend>
				<table>
					<tr>
						<td>
          				<label for="Smokingyou">Do you smoke?</label>
						</td>	
						<td style="width:3%;"></td>
          	            <td style="width: 100px;">
							<select name="Smokingyou" id="Smokingyou">
						    	<option value="No">No way</option>
								<option value="Occasionally">Occasionally</option>
								<option value="Daily">Daily</option>
                                <option value="Cigar aficianado">Cigar aficianado</option>
                                <option value="Tyring to quit">Yes, but trying to quit</option>
							</select>
						</td>
						<td style="width:10%;"></td>
						<td>
							<label for="drinkingyou">How often you drink? </label>
						</td>
						<td style="width:3%;"></td>
						<td>
									<select name="drinkingyou" id="drinkingyou">
										<option value="Never">Never</option>
										<option value="Occasionally">Occasionally</option>
										<option value="Social Drinker">Social Drinker</option>
                                        <option value="Regularly">Regularly</option>
                                        <option value="Moderately">Moderately</option>
									</select>
						</td>	
					</tr>
					<tr>
						<td>
							<label>Do you exersize? </label>
						</td>
						<td style="width:3%;"></td>
						<td style="width: auto;">
					<fieldset data-role="controlgroup" data-type="horizontal">
			     	    <label for="Yes1">Yes</label>
                        <input type="radio" name="Excersize" id="Yes1" value="true">
                        <label for="No1">No</label>
                        <input type="radio" name="Excersize" id="No1" value="false">
                           </fieldset>
						</td>	
						<td style="width:10%;"></td>
						<td>
							<label for="Sports">What type of sports you like? </label>
						</td>
						<td style="width:3%;"></td>
						<td>
                            <fieldset data-role="controlgroup" data-type="horizontal">
                            <label for="Cricket">Cricket</label>						
							<input type="checkbox" name="Sports" id="Cricket" Value="Cricket">
                            <label for="Rugby">Rugby</label>
                            <input type="checkbox" name="Sports" id="Rugby" value="Rugby">
                            <label for="Carrom">Carrom</label>
                            <input type="checkbox" name="Sports" id="Carrom" value="Carrom">
                            </fieldset>
                            <fieldset data-role="controlgroup" data-type="horizontal">
                            <label for="Badminton">Badminton</label>
                            <input type="checkbox" name="Sports" id="Badminton" value="Badminton">
                            <label for="Vollyball">Vollyball</label>  
						    <input type="checkbox" name="Sports" id="Vollyball" value="Vollyball">
                            </fieldset>     	
						</td>						
					</tr>				
        </table> 
      
      </fieldset>
    
      <fieldset data-role="collapsible" >
        <legend>About your Background..</legend>
				<table>
					<tr style="height: auto">
						<td>
          				<label for="language">What languages do you speak? </label>
						</td>	
						<td style="width:3%;"></td>
          	            <td >
							<fieldset data-role="controlgroup" data-type="horizontal">
                            <label for="Sinhala1">Sinhala</label>						
							<input type="checkbox" name="language" id="Sinhala1" Value="Sinhala">
                            <label for="Tamil1">Tamil</label>
                            <input type="checkbox" name="language" id="Tamil1" value="Tamil">
                            <label for="English1">English</label>
                            <input type="checkbox" name="language" id="English1" value="English">
                            </fieldset>
						</td>
						
						<td style="width:10%;"></td>
						<td>
									<label for="Ethinity">Ethinity</label>
						</td>
						<td style="width:3%;"></td>
						<td>
									<select name="Ethinity" id="Ethinity">
										<option value="Sinhala">Sinhala</option>
										<option value="Tamil">Tamil</option>
										<option value="Muslim">Muslim</option>
										<option value="Burger">Burger</option>
										<option value="Other">Other</option>
									</select>
						</td>	
					</tr>
					<tr>
						<td>
							<label for="Cast">Your Cast: </label>
						</td>
						<td style="width:3%;"></td>
						<td>
							<input type="text" name="Cast" id="Cast">
						</td>	
						<td style="width:10%;"></td>
						<td>
							<label for="Hobbies"> Your Hobbies: </label>
						</td>
						<td style="width:3%;"></td>
						<td>						
							<select name="Hobbies" id="Hobbies">
										<option value="Reading books">Reading books</option>
										<option value="Alumni collection">Alumni collection</option>
										<option value="Hiking">Hiking</option>
										<option value="Listening to music">Listening to Music</option>
										<option value="I don't have any">I don't have any</option>
							</select> 	
						</td>						
					</tr>				
        </table> 
      
      </fieldset>
    
	
  

      <div data-role="header" style="height: 50px;">
    <h1 style="font-size: 16pt; alignment-baseline: text-after-edge">About your life partner..!!</h1>
  </div>
      
  <div data-role="main" class="ui-content">
    
      <fieldset data-role="collapsible">
        <legend>About the looks..!! (hint: don't be too picky ;))</legend>
				<table>
					<tr>
						<td>
          				<label>His/Her Height:</label>
						</td>	
						<td style="width:3%;"></td>
						<td>
                        Between  
          				<input type="text" name="heighthim" id="heightfeet1"> feet
						</td>
						<td>
                              And  
									<input type="text" name="heighthim" id="heightfeet2"> Feet
						</td>
						<td style="width:10%;"></td>
						<td>
									<label for="bodytypehim">His/Her Body type: </label>
						</td>
						<td style="width:3%;"></td>
						<td>
									<select name="bodytypehim" id="bodytypehim">
                                        <option value="none">No concern</option>
										<option value="slim">Slim</option>
										<option value="average">Average</option>
										<option value="fat">fat</option>
									</select>
						</td>
					</tr>
					<tr>
						<td>
							<label for="haircolorhim">His/Her Hair Color: </label>
						</td>
						<td style="width:3%;"></td>
						<td>
							<select name="haircolorhim" id="haircolorhim">
                                        <option value="none">No concern</option>
										<option value="black">Black</option>
										<option value="blode">Blonde</option>
										<option value="red">red</option>
										<option value="colored">Coloured</option>
										<option value="tinted">Tinted</option>
							</select>
						</td>	
						<td></td>
						<td></td>
						<td>
							<label for="eyecolorhim">His/Her eye Color: </label>
						</td>
						<td style="width:3%;"></td>
						<td>						
							<select name="eyecolorhim" id="eyecolorhim">
                                        <option value="none">No concern</option>
										<option value="black">Black</option>
										<option value="blue">Blue</option>
										<option value="brown">Brown</option>
										<option value="grey">grey</option>
										<option value="hazel">Hezal</option>
							</select> 	
						</td>						
					</tr>				
        </table> 
      
      </fieldset>
    
      <fieldset data-role="collapsible" >
        <legend>About his/her life..</legend>
				<table>
					<tr>
						<td>
          				<label for="relationshiphim">His/Her relationship status: </label>
						</td>	
						<td style="width:3%;"></td>
          	<td>
									<select name="relationshiphim" id="relationshiphim">
                                        <option value="none">No concern</option>
										<option value="nevermarried">Never Married</option>
										<option value="Divorced">Divorced</option>
										<option value="widow">Widow/Widower</option>
									</select>
						</td>
						
						<td style="width:10%;"></td>
						<td>
									<label for="agelimit">Preffered age limit</label>
						</td>
						<td style="width:3%;"></td>
						<td>
							<input type="number" id="lowerbound" name="lowerboundage" style="width:auto;height: auto;" step="5" height="auto" required>
                            to
                            <input type="number" id="upperbound" name="upperboundage" style="width:auto;height: auto" step="5" height="auto" required>
						</td>	
					</tr>
					<tr>
						<td>
							<label for="religionhim">What is his/her religious beleifs? </label>
						</td>
						<td style="width:3%;"></td>
						<td>
							<select name="religionhim" id="religionhim">
                                        <option value="none">No concern</option>
										<option value="Buddhist">Buddhist</option>
										<option value="Christian">Christian</option>
										<option value="Catholic">Catholic</option>
										<option value="Hindu">Hindu</option>
										<option value="Islam">Islam</option>
							</select>
						</td>	
						<td style="width:10%;"></td>
						<td>
							<label for="politicshim"> His/Her Political Views: </label>
						</td>
						<td style="width:3%;"></td>
						<td>						
							<select name="politicshim" id="politicshim">
                                        <option value="none">No concern</option>
										<option value="Democratic">Democratic</option>
										<option value="Liberal">Liberal</option>
										<option value="Communist">Communist</option>
										<option value="Middle of the road">Middle of the road</option>
										<option value="Some other viewpoint">Some other viewpoint</option>
							</select> 	
						</td>						
					</tr>				
        </table> 
      </fieldset>
    
      <fieldset data-role="collapsible" >
        <legend>About his/her Financial and Education level</legend>
				<table>
					<tr>
						<td>
          				<label for="Educationhim">His/Her Education Level :</label>
						</td>	
						<td style="width:3%;"></td>
          	<td>
									<select name="Educationhim" id="Educationhim">
                                        <option value="none">No concern</option>
										<option value="O/L">O/L</option>
										<option value="A/L">A/L</option>
										<option value="Bachelors Degree">Bachelors Degree</option>
                                        <option value="Masters Degree">Masters Degree</option>
                                        <option value="PhD">PhD</option>
									</select>
						</td>
						
						<td style="width:10%;"></td>
						<td>
						</td>
						<td style="width:3%;"></td>
						<td>
						</td>	
					</tr>
					<tr>
						<td>
							<label for="Occupationhim">What is his/her Occupation? </label>
						</td>
						<td style="width:3%;"></td>
						<td>
							<select name="Occupationhim" id="Occupationhim">
                                <option value="Administrative">Administrative</option>
                                <option value="Artist">Artist</option>
                                <option value="Executive">Executive</option>
                                <option value="Financial">Financial</option>
                                <option value="Labour">Labour</option>
                                <option value="Legal">Legal</option>
                                <option value="Medical">Medical</option>
                                <option value="Civil Service">Civil Service</option>
                                <option value="Retail">Retail</option>
                                <option value="Retired">Retired</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Entrepreneur">Entreprenuer</option>
                                <option value="Student">Student</option>
                                <option value="Education">Education</option>
                                <option value="Engineering">Engineering</option>
                                <option value="Hospitality">Hospitality</option>
                                <option value="Volunteer">Volunteer</option>
                                <option value="National Security">National Security</option>
                                <option value="Fashion">Fashion</option>
                                <option value="Architecture">Architecture</option>
                            </select>
						</td>	
						<td style="width:10%;"></td>
						<td>
							<label for="Saleryhim">His/Her Salery range: </label>
						</td>
						<td style="width:3%;"></td>
						<td>						
							<select name="Saleryhim" id="Saleryhim">
                                        <option value="none">No concern</option>
										<option value="0-25000">Less than 25000</option>
										<option value="25000-35000">25000-35000</option>
										<option value="35000-50000">35000-50000</option>
										<option value="50000-75000">50000-75000</option>
										<option value="75000-100000">75000-100000</option>
                                        <option value="100000-150000">100000-150000</option>
                                        <option value="150000+">150000+</option>
							</select> 	
						</td>						
					</tr>				
        </table> 
      </fieldset>
    
      <fieldset data-role="collapsible" >
        <legend style="font-size: 20pt; font-weight: 500">About his/her lifestyle..</legend>
				<table>
					<tr>
						<td>
          				<label for="Smokingh">Does he/she smoke?</label>
						</td>	
						<td style="width:3%;"></td>
          	<td>
									<select name="Smokingh" id="Smokingh">
                                        <option value="none">No concern</option>
										<option value="No">No way</option>
										<option value="Occasionally">Occasionally</option>
										<option value="Daily">Daily</option>
                                        <option value="Cigar aficianado">Cigar aficianado</option>
                                        <option value="Tyring to quit">Yes, but trying to quit</option>
									</select>
						</td>
						
						<td style="width:10%;"></td>
						<td>
									<label for="drinkinghim">How often he/she drink? </label>
						</td>
						<td style="width:3%;"></td>
						<td>
									<select name="drinkinghim" id="drinkinghim">
                                        <option value="none">No concern</option>
										<option value="Never">Never</option>
										<option value="Occasionally">Occasionally</option>
										<option value="Social Drinker">Social Drinker</option>
									</select>
						</td>	
					</tr>
					<tr>
						<td>
							<label>Does he/she exersize? </label>
						</td>
						<td style="width:3%;"></td>
						<td>
							<fieldset data-role="controlgroup" data-type="horizontal">
			     	    <label for="Yes">Yes</label>
                        <input type="radio" name="Excersizehim" id="Yes" value="true">
                        <label for="No">No</label>
                        <input type="radio" name="Excersizehim" id="No" value="false">
                        <label for="None">No concern</label>
                        <input type="radio" name="Excersizehim" id="None" value="None" checked>
                           </fieldset>
						</td>	
						<td style="width:10%;"></td>
						<td>
							
						</td>
						<td style="width:3%;"></td>
						<td>
                                 	
						</td>						
					</tr>				
        </table> 
      </fieldset>
    
      <fieldset data-role="collapsible" >
        <legend>About his/her Background..</legend>
				<table>
					<tr>
						<td>
          				<label for="languagehim">What languages does he/she speak? </label>
						</td>	
						<td style="width:3%;"></td>
          	            <td>
							<fieldset data-role="controlgroup" data-type="horizontal">
                            <label for="Sinhala">Sinhala</label>						
							<input type="checkbox" name="languagehim" id="Sinhala" Value="Sinhala">
                            <label for="Tamil">Tamil</label>
                            <input type="checkbox" name="languagehim" id="Tamil" value="Tamil">
                            <label for="English">English</label>
                            <input type="checkbox" name="languagehim" id="English" value="English">
                            </fieldset>
						</td>
						
						<td style="width:10%;"></td>
						<td>
									<label for="Ethinityhim">His/Her Ethinity</label>
						</td>
						<td style="width:3%;"></td>
						<td>
									<select name="Ethinityhim" id="Ethinityhim">
                                        <option value="none">No concern</option>
										<option value="Sinhala">Sinhala</option>
										<option value="Tamil">Tamil</option>
										<option value="Muslim">Muslim</option>
										<option value="Burger">Burger</option>
										<option value="Other">Other</option>
									</select>
						</td>	
					</tr>
					<tr>
						<td>
							<label for="Casthim">His/Her Cast: </label>
						</td>
						<td style="width:3%;"></td>
						<td>
							<input type="text" name="Casthim" id="Casthim">
						</td>	
						<td style="width:10%;"></td>
						<td>
							<label for="Hobbieshim"> His/Her Hobbies: </label>
						</td>
						<td style="width:3%;"></td>
						<td>						
							<select name="Hobbieshim" id="Hobbieshim">
                                        <option value="none">No concern</option>
										<option value="Reading books">Reading books</option>
										<option value="Alumni collection">Alumni collection</option>
										<option value="Hiking">Hiking</option>
										<option value="Listening to music">Listening to Music</option>
										<option value="I don't have any">I don't have any</option>
							</select> 	
						</td>						
					</tr>				
        </table> 
      </fieldset>
    
        <fieldset data-role="controlgroup">
           
                <table>
                    <tr style="height: 50px">
                        <td style="width: 5%"></td>
                        <td>
                            <label for="Pic">Select and upload your good picture.</label>
                            <input type="file" accept="image/*" name="Pic" id="Pic">
                        </td>
                        <td style="width: 10%"></td>
                        <td>
                            <label for="about">Impress Him/Her.. Write about yourself</label>
                            <textarea id="about" name="about"></textarea>
                        </td>
                    </tr>
                </table>
                            
        </fieldset>
        <button type="submit" id="all" style="width: auto; height: auto; font-size: 20pt; alignment-adjust: middle; alignment-baseline: central;" value="Submit">Submit your data</button>    
            </div>
        </form>
        </div>
    </div>
    
   
    

</body>
</html>

