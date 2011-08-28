var LoginView = {};
	
LoginView.onLoad = function(success)
{
    if (!success)
    {
	console.debug("Script Failed to Load!!!");
    }

    VGDeskHome.setLoggedInUser(null);
};

LoginView.onRegister = function()
{
    VGDeskHome.navigate("register");
}
	
LoginView.onLogin = function()
{
    var username = document.getElementById("username-input").value;
    var password = document.getElementById("password-input").value;
		
    Login.login(username, password, LoginView.onLoginComplete);
};
	
LoginView.onLoginComplete = function(response)
{
    VGDeskHome.setLoggedInUser(response.user);
    
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
