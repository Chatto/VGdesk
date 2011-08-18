<span class="page-script" >
<!--
	VGDeskHome.hideHeader();
	
	var LoginView = {};
	
	LoginView.onLoad = function(success)
	{
		if (!success)
		{
			alert("Script Failed to Load!!!");
		}
	};
	
	LoginView.onLogin = function()
	{
		var username = document.getElementById("username-input").value;
		var password = document.getElementById("password-input").value;
		
		alert(username);
		
		Login.login(username, password, LoginView.onLoginComplete);
	};
	
	LoginView.onLoginComplete = function(response)
	{
		if (response.valid)
		{
			alert("response is valid");
			
			VGDeskHome.navigate("overview");
		}
		else
		{
			alert("response is not valid");
		}
	};

	IncludeManager.includeScripts([
		"js/pages/login/login.js"
	], LoginView.onLoad);
-->
</span>

<div id="login-body">
	<div id="center-floater">
		<div class="section" id="login-box">
			<div id="login-title">Login to $project</div>
			<div id="login-forms">
				<form action="javascript:LoginView.onLogin()" method="post">
					<fieldset>
						<label for="username">Username</label>
							<input id="username-input" type="text" name="username" /><br>
						<label for="password">Password</label>
							<input id="password-input" type="password" name="password" /><br>
						
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
