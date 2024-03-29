<?php
    session_start();
    if(!isset($_SESSION["user_ID"]))
    {
        header("Location: main.php");
        exit();
    }
    else
    {
        $user_ID = $_SESSION["user_ID"];
        $screenName = $_SESSION["screenName"];
        
        $db = new mysqli("localhost", "rivero2r", "rivero28", "rivero2r");
        if ($db->connect_error)
        {
            die ("Connection failed: " . $db->connect_error);
        }
        
        $q = "SELECT * FROM poll WHERE user_ID = '$user_ID'";
        $result = $db->query($q);
    }
?> 

<!DOCTYPE html> 

<html lang = "en">
	<head>
		<title>Poll Management</title>
		<meta charset = "utf-8" />
		<link rel="stylesheet" href="style.css" type="text/css"></link>
	</head>
	
	<body>
		<header>
			<section class="logged">
				<img  id="symbol" src="https://cdn.pixabay.com/photo/2013/07/13/10/11/green-156711_960_720.png" alt="Image Not Found">
				
				<h1> Pollit </h1>
			</section>
			
			<section class="logged">
				<div id="info">
					<?=$screenName?> <img id="image" src ="https://iupac.org/cms/wp-content/uploads/2018/05/default-avatar.png" alt="Image Not Found">
					&nbsp;
					<a href = "main.html"> Log out </a>
				</div>
			</section>
		</header>
		
		<div id="block">
		</div>
		
		<!-- SHOULD BE A BUTTON IN THE FUTURE -->
		<a id="button" href = "pollcreation.php"> Create A Poll </a>
		
		<!-- IMPLEMENT A DROP DOWN MENU ONCE LEARNED 
		<h1 id="solo"> Recent Activities &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |Most Recent(Drop down)|</h1> -->
		
		<h1 id="solo"> Recent Activities </h1>
		<section>
			<?php 
			    while ($row = $result->fetch_assoc()) {
			?>
			
			<h3 id="listOfRecentActivities"> <?=$row["question"]?> </h3>
	
			<?php 
			    }
			    $db->close();
			?>
			
			
			<!--  
			<section class="diagram">
				<p> Option 1 </p>
				<p> Option 2 </p>
				<p> Option 3 </p>
				
				<div id="diagram">
					<p id="visual1">50%</p>
				</div>
				
				<div id="diagram2">
					<p id="visual2">30%</p>
				</div>
					
				<div id="diagram3">
					<p id="visual3">20%</p>
				</div>
			-->
				
				
				<!--  <p> Most recent vote @ 12:00PM 12/28/2017 </p>  -->
			</section>
			
			<section class="diagram">
			</section>
		</section>
		
		
	</body>
</html>