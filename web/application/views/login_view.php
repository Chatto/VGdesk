<span class="page-script" >
	VGDeskHome.hideHeader();
	
	var LoginView = {};
	
	LoginView.onLoad = function(success)
	{
		if (!success)
		{
			console.debug("Script Failed to Load!!!");
		}
	};
	
	LoginView.onLogin = function()
	{
		var username = document.getElementById("username-input").value;
		var password = document.getElementById("password-input").value;
		
		Login.login(username, password, LoginView.onLoginComplete);
	};
	
	LoginView.onLoginComplete = function(response)
	{
		if (response.valid)
		{
			alert("Login Successful");
			
			VGDeskHome.navigate("overview");
		}
		else
		{
			alert("Login Unsuccessful");
		}
	};

	IncludeManager.includeScripts([
		"js/pages/login/login.js"
	], LoginView.onLoad);

</span>

<div id="login-body">
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
