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

<div id="login-body">
	<div id="center-floater">
		<div class="section" id="login-box">
			<div id="login-title">Login to $project</div>
			<div id="login-forms">
				<form action="#" method="post">
					<fieldset>
						<label for="username">Username</label>
							<input type="text" name="username" /><br>
						<label for="password">Password</label>
							<input type="password" name="password" /><br>
						
						<input type="submit" value="Login" /><input type="button" value="Register" />
						</fieldset>
							
				</form>
			</div>
		<?php
			if ($user != null)
			{
				echo "Current Logged In User: " . $user->username; //should go to home_view instead
			}
			else
			{
				echo "";
			}
		?>
		</div>
	</div>
</div>
