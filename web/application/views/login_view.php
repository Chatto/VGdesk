<!DOCTYPE html>
<html lang="en">

<body>Login Page Here</body>

<br><br>

<?php
	if ($user != null)
	{
		echo "Current Logged In User: " . $user->username;
	}
	else
	{
		echo "Not Logged In.";
	}
?>

</html>