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
