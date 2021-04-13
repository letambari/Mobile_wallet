<?php
	require ("logincheck.php");
?> 
    
<html>
	<body>
		Welcome <?php echo $_SESSION["email"] ?>.
	</body>
</html>