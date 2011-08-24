VGDeskHome.hideHeader();

var RegisterView = {};

RegisterView.onLoad = function(success)
{
    if (!success)
    {
	console.debug("Script Failed to Load!!!");
    }
};

RegisterView.onRegister = function()
{
    var displayName = document.getElementById("reg-displayname").value;
    var username = document.getElementById("reg-username").value;
    var password = document.getElementById("reg-pass").value;
    var passwordVerify = document.getElementById("reg-passverify").value;
    var email = document.getElementById("reg-email").value;

    if (password != passwordVerify)
    {
	this.onError("Passwords do not match!");
    }

    Login.login(username, password, displayName, email, RegisterView.onRegisterComplete);

};

RegisterView.onRegisterComplete = function(response)
{
    if (resopnse.valid)
    {
	alert("Register Successful");

	VGDeskHome.navigate("overview");
    }
    else
    {
	if (!response.usernameValid)
	{
	    this.onError(response.usernameError);
	}
	else if (!response.passwordValid)
	{
	    this.onError(response.passwordError);
	}
	else if (!response.displayNameValid)
	{
	    this.onError(response.displayNameError);
	}
	else if (!response.emailValid)
	{
	    this.onError(response.emailError);
	}
	else
	{
	    this.onError("Username is already taken. Please Try Again.");
	}
    }
};

RegisterView.onError(error)
{
    alert(error);
};
