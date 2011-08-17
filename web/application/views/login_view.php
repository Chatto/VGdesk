<span class="page-script" >
<!--
	// hide the home container
	VGDeskHome.hideHeader();
	
	function onLoad(success)
	{
		if (!success)
		{
			alert("Script Failed to Load!!!");
		}
	}
	
	IncludeManager.includeScripts([
		"js/login.js"
	], onLoad);
	
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
