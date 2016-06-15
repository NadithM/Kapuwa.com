<?php
    session_start();

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "kapuwa";
	$heightfeet = "";
	$heightinch = "";
	$nic = "";

	$hg = ""; $bodytype = ""; $haircolor = ""; $eyecolor = ""; $relationship = ""; $religion = ""; 
	$Education = ""; $live = ""; $Occupation = ""; $Salery = ""; $Smokingyou = ""; $drinkingyou = ""; 
	$Ethinity = ""; $Cast = ""; $about = ""; $Excersize = ""; $politics = ""; $kids = ""; 

	$Occupationhim = ""; $Saleryhim = ""; $Smokingh = "";	$drinkinghim = ""; $Excersizehim = "";
	$haircolorhim = ""; $eyecolorhim = ""; $politicshim = ""; $Educationhim = ""; $lowerboundage = "";
	$religionhim = ""; $Casthim = ""; $Ethinityhim = ""; $bodytypehim = "";	$uid = "";  $upperbound = ""; $relationshiphim = "";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	if (isset($_POST['nic'])){
	    $nic = $_POST['nic'];
        $_SESSION["session_nic"] = $nic;
	}
	if (isset($_POST['heightfeet']))
		$heightfeet = $_POST['heightfeet'];
	if (isset($_POST['heightinch']))
		$heightinch = $_POST['heightinch'];
	if (isset($_POST['bodytype']))
		$bodytype = $_POST['bodytype'];
	if (isset($_POST['haircolor']))
		$haircolor = $_POST['haircolor'];
	if (isset($_POST['eyecolor'])){
		$eyecolor = $_POST['eyecolor'];
	}

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
	}
	if (!empty($_POST["language"])){////////////////////
		$language = $_POST["language"];
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
	$hgf = intval($heightfeet)*30.48;
	$hgi = intval($heightinch)*2.54;
	$hg = $hgf + $hgi;
	
	$sql = "UPDATE person  
			SET height = $hg, bodytype =  '$bodytype', hair = '$haircolor', eye = '$eyecolor',
				relstat = '$relationship', kids = '$kids', relign = '$religion', politic = '$politics',
				edu = '$Education', occup = '$Occupation', salary = '$Salery',
				smoke = '$Smokingyou', drink = '$drinkingyou', exerci = '$Excersize',
				eth = '$Ethinity', cast = '$Cast', descri = '$about' 
				WHERE nic = '$nic';";

	if ($conn->query($sql) === TRUE) {
		//echo "New record created successfully"."<br>";
		//echo $hgf;
	} else {
		//echo "Error: " . $sql . "<br>" . $conn->error;
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
		//echo "Record created successfully"."<br>";
	} else {
		//echo "Error: " . $sql . "<br>" . $conn->error;
	}
?>

<!DOCTYPE HTML>
<!--
	Prologue by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Kapuwa.com Profile Page</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assetsp/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assetsp/css/main1.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assetsp/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assetsp/css/ie9.css" /><![endif]-->
        
			
        <script src="assetsp/js/jquery.min.js"></script>
	</head>
	<body>

		<!-- Header -->

        <script>
            $(document).ready(function ()
            {
                <?php if (isset($_POST['nic'])){ ?>
                    window.location.replace("look.php");
               <?php } ?>
            
                <?php if (isset($_SESSION["session_nic"])){ ?>
                       var nic_no = "<?php echo $_SESSION["session_nic"]; ?>";
                     loadDataFromDatabase(nic_no);
               <?php } ?>
            });

            function loadDataFromDatabase(nicNumber)
            {
                $.ajax({
	                type: 'POST',
	                url: 'getUserData.php',
	                data: { 
	                    'j_userNic': nicNumber
	                },
	                success: function(msg){
                        //alert(msg);
                        var data =JSON.parse(msg);
	                    //alert(data.name + ": " + data.age);

                        $("#title").text(data.fname);
                        $("#database_job").text(data.occup);
	                }
	            });
            }
        </script>

			<div id="header">

				<div class="top">

					<!-- Logo -->
						<div id="logo">
							<span class="image avatar48"><img src="assetsp/avatar.jpg" alt="12"/></span>
							<h1 id="title">Jane Doe</h1>
							<p id="database_job">Hyperspace Engineer</p>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<!--

								Prologue's nav expects links in one of two formats:

								1. Hash link (scrolls to a different section within the page)

								   <li><a href="#foobar" id="foobar-link" class="icon fa-whatever-icon-you-want skel-layers-ignoreHref"><span class="label">Foobar</span></a></li>

								2. Standard link (sends the user to another page/site)

								   <li><a href="http://foobar.tld" id="foobar-link" class="icon fa-whatever-icon-you-want"><span class="label">Foobar</span></a></li>

							-->
							<ul>
								<li><a href="look.php#top" id="top-link" class="skel-layers-ignoreHref"><span class="icon fa-home">Intro</span></a></li>
								<li><a href="#portfolio" id="portfolio-link" class="skel-layers-ignoreHref"><span class="icon fa-th">Portfolio</span></a></li>
								<li><a href="#about" id="about-link" class="skel-layers-ignoreHref"><span class="icon fa-user">About Me</span></a></li>
								<li><a href="#contact" id="contact-link" class="skel-layers-ignoreHref"><span class="icon fa-envelope">Contact</span></a></li>
							</ul>
						</nav>

				</div>

				<div class="bottom">

					<!-- Social Icons -->
						<ul class="icons">
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
							<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
							<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
						</ul>

				</div>

			</div>

		<!-- Main -->
			<div id="main">

				<!-- Intro -->
					<section id="top" class="one dark cover">
						<div class="container">

							<header>
								<h2 class="alt">Hi! Welcome to <b><strong>Kapuwa.com</strong></b></h2>
								<p>Find your dream partner<br /></p>
							</header>

							<footer>
								<a href="#portfolio" class="button scrolly">See more...</a>
							</footer>

						</div>
					</section>

				<!-- Portfolio -->
					<section id="portfolio" class="two">
						<div class="container">

							<header>
								<h2>My Profile</h2>
							</header>

							<p>
							
							</p>
								
							<div class="row">
								<div class="4u 12u$(mobile)">
								
								</div>
								<div class="4u 12u$(mobile)">
									
								</div>
								<div class="4u$ 12u$(mobile)">
									
								</div>
							</div>

						</div>
					</section>

				<!-- About Me -->
					<section id="about" class="three">
						<div class="container">

							<header>
								<h2>About Me</h2>
							</header>

							<a href="#" class="image featured"><img src="assetsp/pic08.jpg" alt="15" /></a>

							<p>Tincidunt eu elit diam magnis pretium accumsan etiam id urna. Ridiculus
							ultricies curae quis et rhoncus velit. Lobortis elementum aliquet nec vitae
							laoreet eget cubilia quam non etiam odio tincidunt montes. Elementum sem
							parturient nulla quam placerat viverra mauris non cum elit tempus ullamcorper
							dolor. Libero rutrum ut lacinia donec curae mus vel quisque sociis nec
							ornare iaculis.</p>

						</div>
					</section>

				<!-- Contact -->
					<section id="contact" class="four">
						<div class="container">

							<header>
								<h2>Contact</h2>
							</header>

							<p>Elementum sem parturient nulla quam placerat viverra
							mauris non cum elit tempus ullamcorper dolor. Libero rutrum ut lacinia
							donec curae mus. Eleifend id porttitor ac ultricies lobortis sem nunc
							orci ridiculus faucibus a consectetur. Porttitor curae mauris urna mi dolor.</p>

							<form method="post" action="#">
								<div class="row">
									<div class="6u 12u$(mobile)"><input type="text" name="name" placeholder="Name" /></div>
									<div class="6u$ 12u$(mobile)"><input type="text" name="email" placeholder="Email" /></div>
									<div class="12u$">
										<textarea name="message" placeholder="Message"></textarea>
									</div>
									<div class="12u$">
										<input type="submit" value="Send Message" />
									</div>
								</div>
							</form>

						</div>
					</section>

			</div>

		<!-- Footer -->
			<div id="footer">

				<!-- Copyright -->
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">NR</a></li>
					</ul>

			</div>

		<!-- Scripts -->



			<script src="assetsp/js/jquery.scrolly.min.js"></script>
			<script src="assetsp/js/jquery.scrollzer.min.js"></script>
			<script src="assetsp/js/skel.min.js"></script>
			<script src="assetsp/js/util.js"></script>
			<!--[if lte IE 8]><script src="assetsp/js/ie/respond.min.js"></script><![endif]-->
			<script src="assetsp/js/main.js"></script>


	</body>

</html>
