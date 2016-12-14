<?php
	
	
	
	$userEmail = "";
	$userName = "";
	$userPhone = "";

	//to check whether data is posted or not
	//and initialize the variables.
	if(isset($_POST['name'])){ 
		$userName = $_POST['name'];  
    	header('200 OK'); 
		}
	else{
			header('internal error at username');
		}

	if(isset($_POST['email'])){
		$userEmail = $_POST['email']; 
		header('200 OK');
	} 
	else{
		header('internal error at useremail');
	}

	if(isset($_POST['phone'])){
		$userPhone = $_POST['phone']; 
		header('200 OK');
	} 
	else{
		header('internal error at userphone');
	}

	

	//enter the website owner's email here
	$ownerEmail = 'owner@domain.com';
	$subjectToOwner = 'user offer';
	$subjectToUser = 'scheduled for promo code';
	$bodyToOwner = 'From:' .$userName. '\r\n email:' .$userEmail.'\r\n scheduled to redeem promo code';
	$bodyToUser = 'Thank you' .$userName. 'for scheduling the offer. For your verification\
	entered number is' .$userPhone;

	//declaring headers for owner
	$headerso =  'MIME-Version: 1.0' . "\r\n"; 
	$headerso .= 'From: $userEmail' . "\r\n";
	$headerso .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

	//declaring headers for user
	$headersu =  'MIME-Version: 1.0' . "\r\n"; 
	$headersu .= 'From: $ownerEmail' . "\r\n";
	$headersu .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

	//send email to owner
	mail($ownerEmail, $subjectToOwner, $bodyToOwner, $headersu);

	//send email to user
	mail($userEmail, $subjectToUser, $bodyToUser, $headerso);

	//if both client and server side emails are sent 
	if(mail($ownerEmail, $subjectToOwner, $bodyToOwner, $headersu) && mail($userEmail, $subjectToUser, $bodyToUser, $headerso)){
			echo 'sent emails on client and server side';
		}
	else{
			echo 'oops! error occured';
		}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		echo "<h1>Thank you! you have successfully scheduled your free estimate</h1>";
	?>
</body>
</html>
