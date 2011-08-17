
<span class="page-script">
<!--
	// Insert your javascript here.
	alert("Hello World!!");
-->
</span>

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
