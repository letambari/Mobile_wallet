<?php                     
    if (isset($_POST["register"])) {
        $connection = new mysqli("localhost", "root", "", "membershipSystem");

		$firstName = $connection->real_escape_string($_POST["firstName"]);  		
		$lastName = $connection->real_escape_string($_POST["lastName"]);  				
		$email = $connection->real_escape_string($_POST["email"]);  
		$password = sha1($connection->real_escape_string($_POST["password"])); 
			
		$data = $connection->query("INSERT INTO users (firstName, lastName, email, password) VALUES ('$firstName', '$lastName', '$email', '$password')");

    	if ($data === false)
        	echo "Connection error!";
    	else
    	   echo "Your have been signed up - please now Log In";
	}	                 
?>
<html>
    <body>
        <form method="post" action="register.php">      
            <input type="text" name="firstName" placeholder="Your First Name"  />        
            <input type="text" name="lastName" placeholder="Your Last Name"  />        
            <input type="email" name="email" placeholder="Your Email"  />
            <input type="password" name="password" placeholder="Password"  />
            <input type="submit" name="register" value="Register" />                   
        </form>
    </body>
</html>