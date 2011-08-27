var Login = {};

Login.getLoggedInUser = function(callback)
{
    var url = "index.php/login/login_api/";
    window.RequestManager.postRequest(url, {}, RequestManager.parseJSON, callback);
}

Login.login = function(username, password, callback)
{
	console.debug("in Login.login");
	
	var url = "index.php/login/login_api/login_user";
	var params = {
		username:username,
		password:password
	};
	window.RequestManager.postRequest(url, params, RequestManager.parseJSON, callback);
};

Login.register = function(username, password, displayName, email, callback)
{
	var url = "index.php/login/login_api/register_user";
	var params = {
		username:username,
		password:password,
		displayName:displayName,
		email:email
	};
	window.RequestManager.postRequest(url, params, RequestManager.parseJSON, callback);
};

Login.logout = function(callback)
{
	var url = "index.php/login/login_api/logout_user";
	window.RequestManager.postRequest(url, null, RequestManager.parseJSON, callback);
};