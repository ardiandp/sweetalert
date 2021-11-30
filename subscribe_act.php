<!--
Created By : Aguzrybudy
Blog	   : Aguzrybudy.blogspot.co.id
time	   : Sunday, 17 April 2016
-->
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Aguzrybudy.com</title>
<link rel="stylesheet" href="alert/css/sweetalert.css">
</head>
<body>

<?php
$mysqli=new mysqli('localhost', 'root', '', 'latihan');
$mysqli->query("SET NAMES 'utf8'");

$email = $_POST['email'];


$sql="SELECT * FROM subscribe WHERE email = '$email'";
$result=mysqli_query($mysqli,$sql);

if (mysqli_num_rows($result)>0){ 
 
  echo "
  <script type='text/javascript'>
	setTimeout(function () { 
	
		swal({
            title: 'Already Email',
            text:  '$email',
            type: 'success',
            timer: 3000,
            showConfirmButton: true
        });		
	},10);	
	window.setTimeout(function(){ 
		window.location.replace('index.php');
	} ,3000);	
  </script>";
  


 
  
}else{
	$save = $mysqli->real_query("INSERT INTO subscribe (email) VALUES ('$email')");
	if($save) {
		
	echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Subscribe Added',
				text:  'For $email',
				type: 'success',
				timer: 3000,
				showConfirmButton: true
			});		
		},10);	
		window.setTimeout(function(){ 
			window.location.replace('index.php');
		} ,3000);	
	  </script>";
		
		
	}else{
		
	echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Subscribe Failed',
				text:  'For $email',
				type: 'success',
				timer: 3000,
				showConfirmButton: true
			});		
		},10);	
		window.setTimeout(function(){ 
			window.location.replace('index.php');
		} ,3000);	
	  </script>";
		
	}
}
 
?> 

<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script src="alert/js/sweetalert.min.js"></script>
<script src="alert/js/qunit-1.18.0.js"></script>

</body>
</html>
